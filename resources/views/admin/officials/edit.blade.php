@extends('layouts.admin')
@section('title', 'Edit Perangkat Desa')
@section('content')
    <h1 class="content-title">Edit Data Perangkat Desa</h1>
    <div class="content-box">
        <form action="{{ route('admin.officials.update', $official) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.officials._form', ['official' => $official])
        </form>
    </div>
@endsection