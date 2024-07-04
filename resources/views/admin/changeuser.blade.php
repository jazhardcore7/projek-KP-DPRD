<!DOCTYPE html>
<html>
<head>
    <title>Change User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .top{
            margin-top: 190px;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <div class="top">
        <h2>Change User</h2>
        </div>
        
        <form action="{{ route('updateuser', ['email' => $user->email]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $user->jabatan }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select class="custom-select" id="role" name="role" required>
                    <option value="" disabled>Select a role</option>
                    <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="User" {{ $user->role == 'User' ? 'selected' : '' }}>User</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
