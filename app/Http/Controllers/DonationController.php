<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index(){
        return view('index');
    }

    public function store (Request $request){
        $validasi = $request->validate([
            'donor_name' => 'required',
            'donor_email' => 'required|email',
            'donor_type' => 'required',
            'amount' => 'required',
            'note' => 'required'
        ]);

        $validasi['status'] = 'Unpaid';

        $donation = Donation::create($validasi);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('app.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $donation->id,
                'gross_amount' => $request->amount,
            ),
            'customer_details' => array(
                'first_name' => $request->donor_name,
                'last_name' => '',
                'email' => $request->donor_email
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('checkout', compact('snapToken','donation'));
    }

    public function callback(Request $request){
        $serverKey = config('app.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' or $request->transaction_status == 'settlement') {
                $donation = Donation::find($request->order_id);
                $donation->update(['status' => 'Paid']);
            }
        }
    }

    public function invoice($id){
        return view('invoice',[
            'donation' => Donation::find($id)
        ]);
    }
}
