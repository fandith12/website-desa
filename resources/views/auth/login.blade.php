<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="login-body">
    <div class="login-box">
        <h1 class="login-title">Admin Login</h1>
        @if($errors->any())
            <div style="color: red; margin-bottom: 1rem; text-align:center;">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" name="password" required class="form-control">
            </div>
            <!-- PERUBAHAN DI SINI: Menambahkan div wrapper untuk tombol -->
            <div class="login-button-wrapper">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
            </div>
        </form>
    </div>
</body>
</html>