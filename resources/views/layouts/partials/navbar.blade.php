<nav class="navbar">
    <div class="container navbar-container">
        <a href="{{ route('home') }}" class="nav-logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Desa">
            <span class="nav-logo-text">Desa Jaya Mulya</span>
        </a>

        <!-- Menu untuk Desktop -->
        <ul class="nav-links desktop-menu">
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li class="nav-dropdown">
                <a href="#" class="dropdown-toggle">
                    <span>Profil</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/></svg>
                </a>
                <div class="dropdown-menu">
                    <a href="{{ route('profil.kepala_desa') }}">Profil Kepala Desa</a>
                    <a href="{{ route('profil.perangkat_desa') }}">Profil Perangkat Desa</a>
                    <a href="{{ route('profil.struktur') }}">Struktur Pemerintahan</a>
                    <a href="{{ route('profil.sejarah') }}">Sejarah Desa</a>
                    <a href="{{ route('profil.visimisi') }}">Visi dan Misi</a>
                </div>
            </li>
            <li class="nav-dropdown">
                <a href="#" class="dropdown-toggle">
                    <span>Data</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/></svg>
                </a>
                <div class="dropdown-menu">
                    <a href="{{ route('data.statistik') }}">Statistik Penduduk</a>
                    <a href="{{ route('data.demografi') }}">Demografi Desa</a>
                </div>
            </li>
            <li><a href="{{ route('umkm') }}">UMKM</a></li>
            @auth
                @if(auth()->user()->is_admin)
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary" style="padding: 0.6rem 1.2rem; border-radius: 50px;">
                            Dashboard
                        </a>
                    </li>
                @endif
            @endauth
        </ul>

        <!-- Tombol Hamburger untuk Mobile -->
        <button class="hamburger-button" id="hamburger-button" aria-label="Buka Menu">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </button>
    </div>

    <!-- Panel Menu Mobile -->
    <div class="mobile-menu" id="mobile-menu">
        <ul>
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li class="mobile-menu-title">Profil Desa</li>
            <li><a href="{{ route('profil.kepala_desa') }}">- Profil Kepala Desa</a></li>
            <li><a href="{{ route('profil.perangkat_desa') }}">- Profil Perangkat Desa</a></li>
            <li><a href="{{ route('profil.struktur') }}">- Struktur Pemerintahan</a></li>
            <li><a href="{{ route('profil.sejarah') }}">- Sejarah Desa</a></li>
            <li><a href="{{ route('profil.visimisi') }}">- Visi dan Misi</a></li>
            <li class="mobile-menu-title">Data Desa</li>
            <li><a href="{{ route('data.statistik') }}">- Statistik Penduduk</a></li>
            <li><a href="{{ route('data.demografi') }}">- Demografi Desa</a></li>
            <li><a href="{{ route('umkm') }}">UMKM</a></li>
            @auth
                @if(auth()->user()->is_admin)
                    <li class="mobile-menu-dashboard"><a href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
                @endif
            @endauth
        </ul>
    </div>
</nav>
