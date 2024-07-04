<!DOCTYPE html>
<html>
<head>
    <title>Create Archive</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/img/logodprd.png')}}" type="image/x-icon">
    <style>
        .top{
            margin-top: 190px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="top"><h2>Create Archive</h2></div>
        <a href="/arsipadm"><button class="btn btn-danger">Kembali</button></a>
        <p>Anda Bisa Mengupload Arsip anda disini !</p>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('validasiarsip') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="kode_kelas">Kode Kelas:</label>
                <input type="text" class="form-control" id="kode_kelas" name="kode_kelas" required>
            </div>
            <div class="form-group">
                <label for="jenis_arsip">Jenis Arsip:</label>
                <input type="text" class="form-control" id="jenis_arsip" name="jenis_arsip" required>
            </div>
            <div class="form-group">
                <label for="uraian">Uraian:</label>
                <textarea class="form-control" id="uraian" name="uraian" required></textarea>
            </div>
            <div class="form-group">
                <label for="kurun_waktu">Kurun Waktu:</label>
                <input type="text" class="form-control" id="kurun_waktu" name="kurun_waktu" required>
            </div>
            <div class="form-group">
                <label for="jumlah_berkas">Jumlah Berkas:</label>
                <input type="number" class="form-control" id="jumlah_berkas" name="jumlah_berkas" required>
            </div>
            <div class="form-group">
                <label for="tanggal_entry">Tanggal Entry:</label>
                <input type="date" class="form-control" id="tanggal_entry" name="tanggal_entry" required>
            </div>
            <div class="form-group">
                <label for="uploader">Uploader:</label>
                <input type="text" class="form-control" id="uploader" name="uploader" value="{{ Auth::user()->name }}" required readonly>
            </div>
            <div class="form-group">
                <label for="file">File:</label>
                <input type="file" class="form-control" id="file" name="file" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
