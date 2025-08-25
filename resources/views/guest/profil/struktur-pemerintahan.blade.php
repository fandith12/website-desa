@extends('layouts.app')
@section('title', 'Struktur Pemerintahan Desa')
@section('content')
<section>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Struktur Pemerintahan Desa</h1>
            <p class="page-subtitle">Bagan organisasi Pemerintah Desa Jaya Mulya.</p>
        </div>
        <div class="struktur-img-container">
            @if($strukturImage)
                 <img src="{{ asset('storage/' . $strukturImage) }}" alt="Struktur Pemerintahan Desa">
            @else
                <div class="placeholder-box">
                     <p>Gambar struktur pemerintahan belum diunggah.</p>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection