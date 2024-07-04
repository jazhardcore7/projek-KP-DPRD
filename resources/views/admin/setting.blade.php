<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting - Sistem Arsip Inaktif Digital DPRD Sumsel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/styles_user.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/img/logodprd.png')}}" type="image/x-icon">
    <style>
        .container_tb {
            margin-top: 20px;
        }

        .form-container {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
        }
        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        label {
            flex: 1;
            margin-right: 10px;
            color: black;
        }

        input[type="password"] {
            flex: 2;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .button-group {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        button {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button[type="reset"] {
            background-color: #f44336;
            color: white;
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
                    <a class="nav-link text-white" href="/dashboardadm">
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
                    <a class="nav-link text-white active" href="/setting">
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
            <!-- Bantuan Content -->
            <div class="container_tb">
                <div class="form-container">
                    <h4>Security Settings</h4>
                    <form action="{{ route('changepw') }}" method="POST" autocomplete="off" class="form-horizontal formx" role="form">
                        @csrf
                        <p>Silahkan ganti password Anda. Ketika Anda sudah berhasil mengganti password Anda, Anda akan diminta untuk melakukan login ulang, dan setelah itu Anda baru diizinkan untuk melakukan akses terhadap fitur.</p>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <input type="hidden" name="username" value="{{ session('user') }}">
                        <div class="form-group">
                            <label for="password">Masukkan Password Baru Anda</label>
                            <input type="password" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasikan Kembali Password Baru Anda</label>
                            <input type="password" id="password_confirmation" name="password_confirmation">
                        </div>
                        <div class="button-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>

    <script>
        // Sidebar Toggle Functionality
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.getElementById('content').classList.toggle('collapsed');
        });
    </script>
</body>

</html>
