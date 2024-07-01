<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Sistem Arsip Inaktif DPRD Sumsel</title>
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/lupa.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/img/logodprd.png')}}" type="image/x-icon">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .card {
            max-width: 400px;
            width: 100%;
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 2rem;
        }
        .logo {
            max-width: 100px; /* Sedikit mengurangi ukuran logo */
            height: auto;
            margin-top: 10px; /* Margin atas logo */
            margin-bottom: 20px; /* Margin bawah judul */
        }
        .form-group {
            margin-bottom: 1.2rem; /* Mengurangi margin antar elemen */
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #003366;
            border: none;
            width: 100%;
            margin-top: 10px; /* Margin atas tombol */
        }
        .btn-primary:hover {
            background-color: #002244;
        }
        .text-danger {
            color: #dc3545;
            text-decoration: none
        }
        .text-danger:hover {
            color: #0056b3;
            text-decoration: underline;
        }
        /* Responsive Adjustments */
        @media (max-width: 576px) {
            .card-body {
                padding: 1rem; /* Padding lebih kecil untuk layar kecil */
            }
        }
    </style>
</head>
<body>
    <div class="card shadow-lg">
        <div class="card-body">
            <div class="text-center">

                <img src="{{asset('assets/img/logodprd.png')}}" class="logo">
                <h2 class="mt-3">Lupa Password</h2>
            </div>
            <form action="{{ route('cekmail') }}" method="POST" class="formx">
                @csrf
                @if(session()->has('alert'))
                <div class="alert alert-success">
                    {{ session()->get('alert') }}
                </div>
                @endif
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Tuliskan Alamat Email Saat Registrasi" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
                <div class="form-group text-center">
                    <a href="/logins" class="text-danger">Kembali ke Halaman Login</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
