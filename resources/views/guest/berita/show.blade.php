@extends('layouts.app')
@section('title', $post->title)
@section('content')
<section class="bg-white">
    <div class="container">
        <div class="berita-detail-header text-center">
            <h1 class="berita-detail-title">{{ $post->title }}</h1>
            <p class="berita-detail-meta">Dipublikasikan pada {{ \Carbon\Carbon::parse($post->published_at)->format('d F Y') }}</p>
        </div>
        <img class="berita-detail-img" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
        <div class="berita-detail-body prose">
            {!! $post->body !!}
        </div>
        <div class="text-center" style="margin-top: 3rem;">
            <a href="{{ url()->previous() }}" class="btn-kembali">&larr; Kembali</a>
        </div>
    </div>
</section>
@endsection