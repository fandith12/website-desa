@extends('layouts.admin')
@section('title', 'Manajemen Perangkat Desa')
@section('content')
    <div class="content-header">
        <h1 class="content-title">Manajemen Perangkat Desa</h1>
        <a href="{{ route('admin.officials.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="content-box">
        <div class="table-container">
            <table class="data-table admin-table">
                <thead>
                    <tr>
                        <th>Urutan</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Tipe</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($officials as $official)
                    <tr>
                        <td>{{ $official->order }}</td>
                        <td>{{ $official->name }}</td>
                        <td>{{ $official->position }}</td>
                        <td>{{ ucwords(str_replace('_', ' ', $official->type)) }}</td>
                        <td class="actions">
                           <a href="{{ route('admin.officials.edit', $official) }}" class="btn btn-secondary">Edit</a>
                           <form action="{{ route('admin.officials.destroy', $official) }}" method="POST" onsubmit="return confirm('Yakin hapus?');">
                               @csrf @method('DELETE')
                               <button type="submit" class="btn btn-danger">Hapus</button>
                           </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center">Tidak ada data.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="pagination">
            {{ $officials->links() }}
        </div>
    </div>
@endsection