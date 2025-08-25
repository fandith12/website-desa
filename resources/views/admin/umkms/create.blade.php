@extends('layouts.admin')
@section('title', 'Tambah UMKM')
@section('content')
    <h1 class="content-title">Tambah Data UMKM Baru</h1>
    <div class="content-box">
        <form action="{{ route('admin.umkms.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.umkms._form')
        </form>
    </div>
@endsection