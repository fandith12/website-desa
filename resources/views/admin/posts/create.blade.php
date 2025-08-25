@extends('layouts.admin')
@section('title', 'Tambah Berita')
@section('content')
    <h1 class="content-title">Tambah Berita Baru</h1>
    <div class="content-box">
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.posts._form')
        </form>
    </div>
@endsection