<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Sistem Arsip Inaktif Digital DPRD Sumsel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/styles_user.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/img/logodprd.png')}}" type="image/x-icon">
    <style>
        .container_tb {
            margin-top: 20px;
        }
        .table-container {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
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
                    <a class="nav-link text-white" href="/dashboarduser">
                        <i class="bi bi-house"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/arsipuser">
                        <i class="bi bi-folder"></i>
                        <span>Arsip</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/bantuanuser">
                        <i class="bi bi-telephone"></i>
                        <span>Bantuan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white active" href="/profileuser">
                        <i class="bi bi-person"></i>
                        <span>Profil</span>
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
                    <p><a href="{{ route('creators') }}" class="text-white">Creators</a></p>
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
            <!-- Profile Content -->
            <div class="container_tb">
                <div class="table-container">
                    <h2 class="mb-3">Profil</h2>
                    <form action="{{ route('updatedatauser', $data->username) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($data)
                        <div class="mb-3 text-center">
                            <img src="{{ asset('/storage/data/'.$data->gambar) }}" alt="Profil" class="rounded-circle mb-3" style="height: 100px;" data-bs-toggle="modal" data-bs-target="#changeProfilePictureModal">
                        </div>
                        <div class="mb-3">
                            <label for="profileName" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="profileName" name="name" value="{{$data->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="profileEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="profileEmail" name="email" value="{{$data->email}}">
                        </div>
                        <div class="mb-3">
                            <label for="profilePhone" class="form-label">Telepon</label>
                            <input type="tel" class="form-control" id="profilePhone" name="hp" value="{{$data->hp}}">
                        </div>
                        <div class="mb-3">
                            <label for="profileRole" class="form-label">Jabatan</label>
                            <input type="text" class="form-control" id="profileRole" name="jabatan" value="{{$data->jabatan}}">
                        </div>
                        <div class="mb-3">
                            <label for="profileRole" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="profilePicture" name="gambar" value="{{$data->gambar}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        @endif
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

        // Highlight the active menu item based on the current page
        document.querySelectorAll('#sidebar .nav-link').forEach(function(link) {
            if (link.getAttribute('href') === window.location.pathname) {
                link.classList.add('active');
            }
        });

        // Change Profile Picture Functionality
        document.getElementById('saveProfilePicture').addEventListener('click', function() {
            var fileInput = document.getElementById('profilePictureInput');
            var file = fileInput.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var profilePics = document.querySelectorAll('img[alt="Profile"]');
                    profilePics.forEach(function(profilePic) {
                        profilePic.src = e.target.result;
                    });
                    // Close the modal
                    var changeProfilePictureModal = document.getElementById('changeProfilePictureModal');
                    var modal = bootstrap.Modal.getInstance(changeProfilePictureModal);
                    modal.hide();
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>