<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="admin-body">
    <div class="admin-layout">
        <aside class="sidebar">
            <h2 class="sidebar-header">Admin Desa</h2>
            <nav class="sidebar-nav">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a href="{{ route('admin.posts.index') }}">Berita Desa</a>
                <a href="{{ route('admin.officials.index') }}">Perangkat Desa</a>
                <a href="{{ route('admin.umkms.index') }}">UMKM Desa</a>
                <a href="{{ route('admin.populations.index') }}">Statistik Penduduk</a>
                <a href="{{ route('admin.demographics.index') }}">Demografi</a>
                <a href="{{ route('admin.settings.index') }}">Pengaturan Website</a>
                <a href="{{ route('home') }}">
                    <span>Lihat Website</span>
                    <!-- Ikon eksternal link -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" style="display: inline-block; margin-left: auto;">
                        <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
                        <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/>
                    </svg>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </nav>
        </aside>
        <main class="main-content">
            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>