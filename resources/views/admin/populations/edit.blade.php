@extends('layouts.admin')
@section('title', 'Edit Data Populasi')
@section('content')
    <h1 class="content-title">Edit Data Populasi</h1>
    <div class="content-box">
        <form action="{{ route('admin.populations.update', $population) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.populations._form', ['population' => $population])
        </form>
    </div>
@endsection