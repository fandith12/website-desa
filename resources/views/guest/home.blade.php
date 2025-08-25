@extends('layouts.app')
@section('title', 'Beranda')
@section('content')
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>Selamat Datang di Website</h1>
            <h2>Desa Jaya Mulya</h2>
        </div>
    </section>
    <section id="sambutan" class="bg-white">
        <div class="container grid-2-col">
            <div class="sambutan-img-wrapper">
                <img class="sambutan-img" src="{{ $kepalaDesa && $kepalaDesa->photo ? asset('storage/' . $kepalaDesa->photo) : asset('images/kepala-desa.jpg') }}" alt="Foto Kepala Desa">
            </div>
            <div class="sambutan-text">
                <h2 class="section-title">Sambutan Kepala Desa</h2>
                <p>Assalamu'alaikum Warahmatullahi Wabarakatuh. Puji syukur kehadirat Allah SWT atas rahmat dan karunia-Nya kita semua dapat menikmati kemajuan teknologi informasi. Selamat datang di website resmi Desa Jaya Mulya...</p>
            </div>
        </div>
    </section>
    <section id="berita">
        <div class="container text-center">
            <div class="berita-intro">
                <h2 class="section-title">Berita Terkini</h2>
                <p>Informasi dan kegiatan terbaru dari Desa Jaya Mulya.</p>
            </div>
            <div class="grid-3-col">
                @forelse ($latestPosts as $post)
                <div class="berita-card">
                    <a href="{{ route('berita.show', $post->slug) }}" class="card-img">
                        <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('images/berita-default.jpg') }}" alt="{{ $post->title }}">
                    </a>
                    <div class="card-body">
                        <p class="card-date">{{ \Carbon\Carbon::parse($post->published_at)->format('d F Y') }}</p>
                        <h3 class="card-title">{{ $post->title }}</h3>
                        <p class="card-text">{{ Str::limit(strip_tags($post->body), 100) }}</p>
                        <a href="{{ route('berita.show', $post->slug) }}" class="card-link">Baca Selengkapnya &rarr;</a>
                    </div>
                </div>
                @empty
                <p>Belum ada berita yang dipublikasikan.</p>
                @endforelse
            </div>
        </div>
    </section>
    <section id="contact" class="bg-white">
        <div class="container grid-2-col">
            <div class="contact-form">
                <h2 class="section-title">Hubungi Kami</h2>

                <!-- Menampilkan pesan sukses setelah mengirim -->
                @if(session('success'))
                    <div class="alert-success" style="margin-bottom: 1.5rem;">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Form yang sudah diperbaiki -->
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <input type="text" name="name" required placeholder="Nama Anda" value="{{ old('name') }}">
                    <input type="email" name="email" required placeholder="Email Anda" value="{{ old('email') }}">
                    <textarea name="message" rows="5" required placeholder="Pesan Anda">{{ old('message') }}</textarea>
                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                </form>
            </div>
            <div class="contact-info">
                <h2 class="section-title">Informasi Kontak</h2>
                <p><strong>Alamat:</strong><br>Jl. Raya Jaya Mulya No. 1, Kec. Maju Jaya, Kab. Sejahtera, 12345</p>
                <p><strong>Telepon:</strong><br>(021) 123-4567</p>
                <p><strong>Email:</strong><br>kontak@jayamulya.desa.id</p>
            </div>
        </div>
    </section>
@endsection