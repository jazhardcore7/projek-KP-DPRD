<!DOCTYPE html>
<html>
<head>
    <title>Change Archive</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Arsip</h2>
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

        <form action="{{ route('updatearsip', ['arsip' => $arsip->nomor]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="kode_kelas">Kode Kelas:</label>
                <input type="text" class="form-control" id="kode_kelas" name="kode_kelas" value="{{ $arsip->kode_kelas }}" required>
            </div>
            <div class="form-group">
                <label for="jenis_arsip">Jenis Arsip:</label>
                <input type="text" class="form-control" id="jenis_arsip" name="jenis_arsip" value="{{ $arsip->jenis_arsip }}" required>
            </div>
            <div class="form-group">
                <label for="uraian">Uraian:</label>
                <textarea class="form-control" id="uraian" name="uraian" required>{{ $arsip->uraian }}</textarea>
            </div>
            <div class="form-group">
                <label for="kurun_waktu">Kurun Waktu:</label>
                <input type="text" class="form-control" id="kurun_waktu" name="kurun_waktu" value="{{ $arsip->kurun_waktu }}" required>
            </div>
            <div class="form-group">
                <label for="jumlah_berkas">Jumlah Berkas:</label>
                <input type="number" class="form-control" id="jumlah_berkas" name="jumlah_berkas" value="{{ $arsip->jumlah_berkas }}" required>
            </div>
            <div class="form-group">
                <label for="uploader">Uploader:</label>
                <input type="text" class="form-control" id="uploader" name="uploader" value="{{ $arsip->uploader }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
