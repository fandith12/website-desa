@extends('layouts.admin')
@section('title', 'Edit Data Demografi')
@section('content')
    <h1 class="content-title">Edit Data Demografi</h1>
    <div class="content-box">
        <form action="{{ route('admin.demographics.update', $demographic) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.demographics._form', ['demographic' => $demographic])
        </form>
    </div>
@endsection