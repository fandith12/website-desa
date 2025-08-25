@extends('layouts.admin')
@section('title', 'Tambah Perangkat Desa')
@section('content')
    <h1 class="content-title">Tambah Data Perangkat Desa</h1>
    <div class="content-box">
        <form action="{{ route('admin.officials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.officials._form')
        </form>
    </div>
@endsection