<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Sistem Arsip Inaktif Digital DPRD Sumsel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/styles_user.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/img/logodprd.png')}}" type="image/x-icon">
    <style>
         /* Add hover effect for feature images */
    .feature-img-container {
        position: relative;
        overflow: hidden;
        cursor: pointer;
        transition: transform 0.3s ease;
    }
    
    .feature-img-container:hover {
        transform: scale(1.1); /* Scale up on hover */
    }

    .feature-img-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black overlay */
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0; /* Hidden by default */
        transition: opacity 0.3s ease;
    }

    .feature-img-container:hover .feature-img-overlay {
        opacity: 1; /* Show overlay on hover */
    }

    .feature-img-overlay h5,
    .feature-img-overlay p {
        text-align: center;
        padding: 0 10px;
    }
    </style>
</head>
<body>
    <div class="d-flex">
        <div id="sidebar" class="text-white p-3">
            <div class="sidebar-header">
                <span class="hamburger-icon" id="sidebarToggle"></span>
                <div class="logo">
                    <img src="{{asset('assets/img/logodprd.png')}}" alt="Logo" class="img-fluid" style="height: 40px;">
                </div>
                <div class="title" style="font-size: small;">
                    <span>Sistem Arsip Inaktif Digital</span>
                    <span>DPRD Sumatera Selatan</span>
                </div>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white active" href="/dashboardadm">
                        <i class="bi bi-house"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/showusers">
                        <i class="bi bi-person"></i>
                        <span>User</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/arsipadm">
                        <i class="bi bi-folder"></i>
                        <span>Arsip</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/profileadm">
                        <i class="bi bi-person-circle"></i>
                        <span>Profil</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/setting">
                        <i class="bi bi-gear"></i>
                        <span>Setting</span>
                    </a>
                </li>
            </ul>
            <div class="mt-auto profile-section">
                <div class="profile-info fs-6" style="margin-left:7%">
                    @if($data)
                    <img src="{{ asset('storage/data/' . $data->gambar) }}" alt="Profile" class="rounded-circle" style="height: 60px;">
                    <div>
                        <p class="mt-2 mb-0" id="sidebarProfileName">{{ $data->name }}</p>
                        <p class="text-white" id="sidebarProfileRole">{{ $data->jabatan }}</p>
                    </div>
                    @endif
                </div>
                <div class="text-center mt-3 footer-section si-copy fs-16">
                    <img src="{{asset('assets/img/hero.png')}}" alt="" class="img-fluid bg-white" style="height: 80px; border-radius:50%">
                    <p class="text-white mb-0" style="margin-top: 10px;">© Sistem Arsip Inaktif Digital 2024</p>
                    <p class="text-white mb-0">All Rights Reserved</p>
                    <p><a href="/creator-adm" class="text-white">Creators</a></p>
                </div>
            </div>
        </div>
        <div id="content" class="p-3 flex-grow-1">
            <div class="d-flex justify-content-end align-items-center mb-3">
                @if($data)
                <p class="mb-0 me-3">Welcome, {{ $data->name }}</p>
                <div class="dropdown">
                    <img src="{{ asset('storage/data/' . $data->gambar) }}" alt="Profile" class="img-fluid rounded-circle me-2 dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="height: 40px;">
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="/profileuser">Profile</a></li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </div>
                @endif
            </div>
            <!-- Add your main content here -->
            <div class="container mt-5">
                <!-- Bagian Selamat Datang -->
                <div class="text-center mb-5">
                    <h1>Selamat datang di Sistem Arsip Inaktif DPRD Provinsi Sumatera Selatan</h1>
                    <p class="lead">Kami berkomitmen untuk menyediakan sistem yang bertujuan mengolah dan mewadahi arsip inaktif di DPRD Sumatera Selatan</p>
                    <p>Baik Anda admin, arsiparis, atau pegawai yang membutuhkan akses arsip, platform kami dirancang untuk memenuhi kebutuhan arsip Anda dengan presisi dan efektivitas.</p>
                </div>
                
                <!-- Bagian Fitur-fitur -->
<!-- Bagian Fitur-fitur -->
<div class="row">
    <div class="col-lg-3 col-md-6 text-center mb-4">
        <div class="feature-img-container">
            <img src="{{asset('assets/img/fitur1.png')}}" alt="Fitur 1" class="img-fluid mb-2" style="height: 150px;">
            <div class="feature-text">
                <h5>Fitur 1: Pencarian Arsip</h5>
                <p>Akses arsip dengan pencarian yang efisien dan terintegritas</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 text-center mb-4">
        <div class="feature-img-container">
            <img src="{{asset('assets/img/fitur2.png')}}" alt="Fitur 2" class="img-fluid mb-2" style="height: 150px;">
            <div class="feature-text">
                <h5>Fitur 2: Manipulasi Arsip</h5>
                <p>Admin dapat melakukan Create Read Update dan Delete arsip</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 text-center mb-4">
        <div class="feature-img-container">
            <img src="{{asset('assets/img/fitur3.png')}}" alt="Fitur 3" class="img-fluid mb-2" style="height: 150px;">
            <div class="feature-text">
                <h5>Fitur 3: Download Arsip</h5>
                <p>Simpan dokumen yang diinginkan ke perangkat anda</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 text-center mb-4">
        <div class="feature-img-container">
            <img src="{{asset('assets/img/fitur4.png')}}" alt="Fitur 4" class="img-fluid mb-2" style="height: 150px;">
            <div class="feature-text">
                <h5>Fitur 4: Kelola User</h5>
                <p>Admin dapat melihat dan mengelola user yang akan menggunakan website</p>
            </div>
        </div>
    </div>
    
</div>


            
        </div>
    </div>

    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.getElementById('content').classList.toggle('collapsed');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>