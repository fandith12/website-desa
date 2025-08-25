@extends('layouts.admin')
@section('title', 'Tambah Data Demografi')
@section('content')
    <h1 class="content-title">Tambah Data Demografi Baru</h1>
    <div class="content-box">
        <form action="{{ route('admin.demographics.store') }}" method="POST">
            @csrf
            @include('admin.demographics._form')
        </form>
    </div>
@endsection