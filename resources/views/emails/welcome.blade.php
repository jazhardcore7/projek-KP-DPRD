<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP</title>
</head>
<body>
    <h1>Berikut adalah Kode OTP Lupa Password Anda!</h1>
    <p>Hai {{ $get_user_name}} !</p>
    <p>KODE VERIF : {{ $validToken}}</p>
</body>
</html>
