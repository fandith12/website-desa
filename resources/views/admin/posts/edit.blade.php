@extends('layouts.admin')
@section('title', 'Edit Berita')
@section('content')
    <h1 class="content-title">Edit Berita</h1>
    <div class="content-box">
        <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.posts._form', ['post' => $post])
        </form>
    </div>
@endsection