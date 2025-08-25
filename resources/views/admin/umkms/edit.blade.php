@extends('layouts.admin')
@section('title', 'Edit UMKM')
@section('content')
    <h1 class="content-title">Edit Data UMKM</h1>
    <div class="content-box">
        <form action="{{ route('admin.umkms.update', $umkm) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.umkms._form', ['umkm' => $umkm])
        </form>
    </div>
@endsection