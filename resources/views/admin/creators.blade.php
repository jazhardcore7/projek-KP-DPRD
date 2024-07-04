<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creators - Sistem Arsip Inaktif Digital</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #E7E3F3;
        }
        .creator-card {
            border-radius: 15px;
            text-align: center;
            padding: 20px;
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .creator-card img {
            border-radius: 50%;
            margin-bottom: 15px;
        }
        .contact-button {
            background-color: #fff;
            border: 2px solid #007bff;
            color: #007bff;
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: 600;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }
        .contact-button:hover {
            background-color: #007bff;
            color: #fff;
        }
        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="text-center my-5">Creators of <strong>"Sistem Arsip Inaktif Digital"</strong><br>Sekretariat DPRD Sumatera Selatan</h2>
        <div class="row justify-content-center">
            <h4>Sebagai Proyek Akhir Kerja Praktek yang dilaksanakan pada 03 Juni - 05 Juli</h4>
            <div class="col-md-4">
                <div class="creator-card">
                    <img src="{{asset('assets/img/abin.jpg')}}" alt="Ahmad Bintara Mansur" class="img-fluid" style="height: 150px; width: 150px; object-fit: cover; border-radius: 50%">
                    <h5>Ahmad Bintara Mansur</h5>
                    <p>09021282227041<br>Fakultas Ilmu Komputer<br>Teknik Informatika 2022</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="creator-card">
                    <img src="{{asset('assets/img/aldi.jpg')}}" alt="Reynaldi Ashari" class="img-fluid" style="height: 150px; width: 150px; object-fit: cover; border-radius: 50%">
                    <h5>Reynaldi Ashari</h5>
                    <p>09021282227038<br>Fakultas Ilmu Komputer<br>Teknik Informatika 2022</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="creator-card">
                    <img src="{{asset('assets/img/kipeb.jpg')}}" alt="Rizki Pebrian" class="img-fluid" style="height: 150px; width: 150px; object-fit: cover; border-radius: 50%">
                    <h5>Rizki Pebrian</h5>
                    <p>09021282227046<br>Fakultas Ilmu Komputer<br>Teknik Informatika 2022</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="/dashboardadm" class="contact-button">Kembali</a>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
