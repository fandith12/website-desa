@extends('layouts.app')
@section('title', 'Visi dan Misi')
@section('content')
<section>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Visi dan Misi Desa</h1>
            <p class="page-subtitle">Arah dan tujuan pembangunan Desa Jaya Mulya.</p>
        </div>
        <div class="visi-misi-container">
            <div class="visi-box">
                <h2>Visi</h2>
                <div class="prose">
                    @if($visi) {!! $visi !!} @else <p>Visi desa belum ditetapkan.</p> @endif
                </div>
            </div>
            <div class="misi-box">
                <h2>Misi</h2>
                <div class="prose">
                     @if($misi) {!! $misi !!} @else <p>Misi desa belum ditetapkan.</p> @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection