<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SiDonasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        body {
            min-height: 75rem;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">SiDonasi</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">SiDonasi <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="jumbotron" style="background-image: url('/assets/afterglow.png'); background-size: cover; background-repeat: no-repeat;">
        <div class="container text-white">
            <h1 class="display-4">Invoice</h1>
            <p class="lead">Ini adalah halaman invoice</p>
        </div>
    </div>

    <div class="container">
        <table class="table table-primary">
            <tr>
                <td>Nama </td>
                <td> : {{$donation->donor_name}}</td>
            </tr>
            <tr>
                <td>Email </td>
                <td> : {{$donation->donor_email}}</td>
            </tr>
            <tr>
                <td>Tipe </td>
                <td> : {{$donation->donor_type}}</td>
            </tr>
            <tr>
                <td>Total Donasi </td>
                <td> : {{$donation->amount}}</td>
            </tr>
            <tr>
                <td>Note </td>
                <td> : {{$donation->note}}</td>
            </tr>
        </table>
    </div>



    <script src="https://code.jquery.com/jquery-3.4.1.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
    </script>
</body>

</html>
