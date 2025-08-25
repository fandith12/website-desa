@extends('layouts.app')
@section('title', 'Profil Kepala Desa')
@section('content')
<section>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Profil Kepala Desa</h1>
            <p class="page-subtitle">Mengenal lebih dekat pemimpin Desa Jaya Mulya.</p>
        </div>
        @if($kepalaDesa)
        <div class="profil-card">
            <img class="profil-card-img" src="{{ $kepalaDesa->photo ? asset('storage/' . $kepalaDesa->photo) : asset('images/kepala-desa.jpg') }}" alt="Foto {{ $kepalaDesa->name }}">
            <div class="profil-card-body">
                <h2>{{ $kepalaDesa->name }}</h2>
                <p class="posisi">{{ $kepalaDesa->position }}</p>
                <div class="bio prose">
                   {!! $kepalaDesa->bio !!}
                </div>
            </div>
        </div>
        @else
        <p class="text-center">Profil Kepala Desa belum tersedia.</p>
        @endif
    </div>
</section>
@endsection