<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Sistem Arsip Inaktif Digital DPRD Sumsel</title>
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
        .table th, .table td {
            vertical-align: middle;
        }
        .table th {
            font-weight: bold;
        }
        .search-bar {
            max-width: 300px;
            margin-left: auto;
            margin-bottom: 20px;
        }
        .table thead th {
            background-color: #f8f9fa;
        }
        .table .d-inline-flex {
            display: flex;
            gap: 10px;
        }

        .table .d-inline-flex .btn {
            flex: 1;
        }

        .card-footer .btn-block {
            width: 100%;
            display: block;
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
                    <a class="nav-link text-white active" href="/showusers">
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
            <div class="container_tb">
                <div class="table-container">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="mb-3">Tabel User</h2>
                        <input type="text" id="searchInput" class="form-control search-bar" placeholder="Search">
                    </div>
                    <table class="table table-striped table-hover">
                        @if(session()->has('alert'))
                                    <div class="alert alert-success">
                                        {{ session()->get('alert') }}
                                    </div>
                                    @endif
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Jabatan</th>
                                            <th>Role</th>
                                            <th>Registration Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($showuser as $show)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$show->name}}</td>
                                            <td>{{$show->email}}</td>
                                            <td>{{$show->jabatan}}</td>
                                            <td>{{$show->role}}</td>
                                            <td>{{$show->created_at}}</td>
                                            <td>
                                                <div class="d-inline-flex">
                                                        <a href="{{ route('edituser', ['email' => $show->email]) }}" class="btn btn-warning">Change</a>
                                                        <form action="{{ route('deleteuser', ['user' => $show->email]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');" class="ml-2">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @empty
                                    <div class="alert alert-danger">
                                        Data user belum Tersedia.
                                    </div>
                                @endforelse
                                
                                </table>
                                <div class="card-footer">
                                    <a href="/createuser" class="btn btn-primary btn-block">Create User</a>
                                </div>

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
        // Search Functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var value = this.value.toLowerCase();
            var rows = document.querySelectorAll('.table tbody tr'); // Update selector here
            rows.forEach(function(row) {
                row.style.display = row.textContent.toLowerCase().includes(value) ? '' : 'none';
            });
        });

        // Sidebar Toggle Functionality
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.getElementById('content').classList.toggle('collapsed');
        });
    </script>
</body>
</html>