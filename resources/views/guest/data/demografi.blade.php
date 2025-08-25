@extends('layouts.app')
@section('title', 'Demografi Desa')
@section('content')
<section>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Demografi Desa</h1>
            <p class="page-subtitle">Data demografi penduduk berdasarkan berbagai kategori.</p>
        </div>
        <div class="piramida-container">
            <h2>Piramida Penduduk</h2>
            <div class="piramida-image-wrapper">
                @if($piramidaImage)
                    <img src="{{ asset('storage/' . $piramidaImage) }}" alt="Piramida Penduduk Desa Jaya Mulya">
                @else
                    <div class="placeholder-box" style="height: 400px;">
                        <p>Gambar piramida penduduk belum diunggah.</p>
                    </div>
                @endif
            </div>
        </div>
        <div class="demografi-container">
            @forelse($demographics as $category => $items)
            <div class="demografi-kategori">
                <h3>Berdasarkan {{ $category }}</h3>
                <ul>
                    @foreach($items as $item)
                    <li>
                        <span>{{ $item->label }}</span>
                        <strong>{{ number_format($item->value) }} Jiwa</strong>
                    </li>
                    @endforeach
                </ul>
            </div>
            @empty
            <p class="text-center">Data demografi belum tersedia.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection