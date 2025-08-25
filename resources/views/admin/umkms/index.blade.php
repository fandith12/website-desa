@extends('layouts.admin')
@section('title', 'Manajemen UMKM')
@section('content')
    <div class="content-header">
        <h1 class="content-title">Manajemen UMKM</h1>
        <a href="{{ route('admin.umkms.create') }}" class="btn btn-primary">Tambah UMKM</a>
    </div>
    <div class="content-box">
        <div class="table-container">
            <table class="data-table admin-table">
                <thead>
                    <tr>
                        <th>Nama Usaha</th>
                        <th>Pemilik</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($umkms as $umkm)
                    <tr>
                        <td>{{ $umkm->name }}</td>
                        <td>{{ $umkm->owner_name }}</td>
                        <td class="actions">
                           <a href="{{ route('admin.umkms.edit', $umkm) }}" class="btn btn-secondary">Edit</a>
                           <form action="{{ route('admin.umkms.destroy', $umkm) }}" method="POST" onsubmit="return confirm('Yakin hapus?');">
                               @csrf @method('DELETE')
                               <button type="submit" class="btn btn-danger">Hapus</button>
                           </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="text-center">Tidak ada data UMKM.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="pagination">
            {{ $umkms->links() }}
        </div>
    </div>
@endsection