@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
    <h1 class="content-title">Dashboard</h1>
    <div class="content-box">
        <p>Selamat datang di panel admin, {{ auth()->user()->name }}!</p>
    </div>
@endsection