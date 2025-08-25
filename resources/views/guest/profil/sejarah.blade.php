@extends('layouts.app')
@section('title', 'Sejarah Desa')
@section('content')
<section class="bg-white">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Sejarah Desa Jaya Mulya</h1>
            <p class="page-subtitle">Menelusuri jejak langkah dan asal-usul berdirinya desa.</p>
        </div>
        <div class="prose" style="max-width: 800px; margin: 0 auto;">
            @if($sejarah)
                {!! $sejarah !!}
            @else
                <p>Konten sejarah desa belum tersedia.</p>
            @endif
        </div>
    </div>
</section>
@endsection