<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Arsip Inaktif DPRD Sumsel</title>
      <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/img/logodprd.png')}}" type="image/x-icon">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="#">
            <img src="{{asset('assets/img/logodprd.png')}}" alt="Logo">
            <div class="brand-text">
                <div class="line">Sistem Arsip Inaktif Digital</div>
                <div class="line_subtitle">DPRD Sumsel</div>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="">Arsip</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/creator-log">Tentang</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content -->
    <div class="container d-flex align-items-center min-vh-100">
        <div class="row justify-content-center w-100">
            <div class="col-md-10">
                    
                    <div class="bg-primary card shadow-lg p-3 d-flex align-items-center justify-content-center">
                        <div class="row no-gutters w-100">
                            <div class="col-md-6 d-flex flex-column align-items-center justify-content-center bg-primary text-white p-4">
                                <img src="{{asset('assets/img/hero.png')}}" alt="Logo" class="img-fluid mb-4">
                                <h4 class="text-center">Sistem Arsip Inaktif Digital DPRD Sumatera Selatan</h4>
                            </div>
                            <div class="col-md-6 d-flex flex-column justify-content-center bg-primary p-4">
                                <div class="bg-white p-4 rounded w-100">
                                    <h5 class="text-center mb-4 text-dark">Silahkan Masukkan Data Anda</h5>
                                    <form action="/validasilogin" method="post" class="form-horizontal formx" role="form">
                                        @csrf
                                        @if(session()->has('alert'))
                                        <div class="alert alert-success">
                                            {{ session()->get('alert') }}
                                        </div>
                                        @endif
                                        <div class="form-group text-dark">
                                            <input type="text" class="form-control" name="username" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block text-white">Masuk</button>
                                        <a href="/forgots" class="text-danger text-center d-block mt-3">Lupa Password</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>


    <!-- Bootstrap JS and dependencies -->
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
