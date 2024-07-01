<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="no-cache">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="{{asset('assets/img/logodprd.png')}}" type="image/x-icon">
    <title>Ganti Password - Sistem Arsip Inaktif DPRD Sumsel</title>
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/gantipw.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/font-awesome-4.7.0/css/font-awesome-animation.min.css')}}">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
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
            max-width: 150px;
            height: auto;
            margin-bottom: 1rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-group {
            display: flex;
            justify-content: space-between;
        }
        .btn-primary {
            background-color: #003366;
            border: none;
            flex: 1; /* Menggunakan flex untuk membagi ruang secara merata */
            margin-right: 5px; /* Menambahkan sedikit ruang antara tombol */
        }
        .btn-primary:last-child {
            margin-right: 0; /* Menghapus margin kanan dari tombol terakhir */
        }
        .btn-primary:hover {
            background-color: #002244;
        }
        .text-danger {
            color: #dc3545;
            text-decoration: none;
        }
        .text-danger:hover {
            color: #0056b3;
            text-decoration: underline;
        }
        /* Responsive Adjustments */
        @media (max-width: 576px) {
            .card-body {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="text-center">
                    <img src="{{asset('assets/img/logodprd.png')}}" width="80px">
                    <h2 class="mt-3">Ubah Password</h2>
                </div>
                @if(session()->has('alert'))
                <div class="alert alert-success">
                    {{ session()->get('alert') }}
                </div>
                @endif
                <form action="{{ route('savepw') }}" method="POST" class="form-horizontal formx" role="form">
                    @csrf
                    <input type="hidden" name="email" value="{{ session('reset_email') }}">
                    <div class="form-group">
                        <input class="form-control inputx" type="password" name="password" placeholder="Password Baru" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control inputx" type="password" name="password_confirmation" placeholder="Konfirmasi Password Baru" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary buttonx" name="change-password">
                            <i class="fa fa-save (alias) faa-tada animated-hover"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
