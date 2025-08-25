@extends('layouts.app')
@section('title', 'Profil Perangkat Desa')
@section('content')
<section>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Perangkat Desa Jaya Mulya</h1>
            <p class="page-subtitle">Tim yang berdedikasi melayani masyarakat Desa Jaya Mulya.</p>
        </div>
        <div class="perangkat-grid">
            @forelse ($perangkatDesa as $perangkat)
                <div class="perangkat-card">
                    <img src="{{ $perangkat->photo ? asset('storage/' . $perangkat->photo) : asset('images/default-profile.png') }}" alt="Foto {{ $perangkat->name }}">
                    <h3>{{ $perangkat->name }}</h3>
                    <p>{{ $perangkat->position }}</p>
                </div>
            @empty
                <p class="text-center">Data perangkat desa belum tersedia.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection