@extends('layouts.app')
@section('title', 'UMKM Desa')
@section('content')
<section>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">UMKM Desa Jaya Mulya</h1>
            <p class="page-subtitle">Produk dan usaha unggulan dari masyarakat desa.</p>
        </div>
        <div class="grid-3-col">
            @forelse ($umkms as $umkm)
            <div class="berita-card umkm-card">
                <div class="card-img">
                    <img src="{{ $umkm->image ? asset('storage/' . $umkm->image) : asset('images/default-umkm.png') }}" alt="{{ $umkm->name }}">
                </div>
                <div class="card-body">
                    <h3 class="card-title">{{ $umkm->name }}</h3>
                    <p class="card-text">{{ Str::limit($umkm->description, 100) }}</p>
                    <p class="card-link">Pemilik: {{ $umkm->owner_name }}</p>
                </div>
            </div>
            @empty
            <p class="text-center">Data UMKM belum tersedia.</p>
            @endforelse
        </div>
        <div class="pagination">
            {{ $umkms->links() }}
        </div>
    </div>
</section>
@endsection