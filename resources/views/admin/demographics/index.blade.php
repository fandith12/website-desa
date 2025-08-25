@extends('layouts.admin')
@section('title', 'Manajemen Demografi')
@section('content')
    <div class="content-header">
        <h1 class="content-title">Manajemen Demografi</h1>
        <a href="{{ route('admin.demographics.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="content-box">
        <div class="table-container">
            <table class="data-table admin-table">
                <thead>
                    <tr>
                        <th>Kategori</th>
                        <th>Label</th>
                        <th>Jumlah (Value)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($demographics as $demographic)
                    <tr>
                        <td>{{ $demographic->category }}</td>
                        <td>{{ $demographic->label }}</td>
                        <td>{{ $demographic->value }}</td>
                        <td class="actions">
                           <a href="{{ route('admin.demographics.edit', $demographic) }}" class="btn btn-secondary">Edit</a>
                           <form action="{{ route('admin.demographics.destroy', $demographic) }}" method="POST" onsubmit="return confirm('Yakin hapus?');">
                               @csrf @method('DELETE')
                               <button type="submit" class="btn btn-danger">Hapus</button>
                           </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-center">Tidak ada data.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="pagination">
            {{ $demographics->links() }}
        </div>
    </div>
@endsection
