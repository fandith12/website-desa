@extends('layouts.admin')
@section('title', 'Tambah Data Populasi')
@section('content')
    <h1 class="content-title">Tambah Data Populasi Baru</h1>
    <div class="content-box">
        <form action="{{ route('admin.populations.store') }}" method="POST">
            @csrf
            @include('admin.populations._form')
        </form>
    </div>
@endsection