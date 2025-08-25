@extends('layouts.admin')
@section('title', 'Statistik Penduduk')
@section('content')
    <div class="content-header">
        <h1 class="content-title">Statistik Penduduk</h1>
        <a href="{{ route('admin.populations.create') }}" class="btn btn-primary">Tambah Data Tahunan</a>
    </div>
    <div class="content-box">
        <div class="table-container">
            <table class="data-table admin-table">
                <thead>
                    <tr>
                        <th>Tahun</th>
                        <th>Laki-laki</th>
                        <th>Perempuan</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($populations as $population)
                    <tr>
                        <td>{{ $population->year }}</td>
                        <td>{{ $population->male_count }}</td>
                        <td>{{ $population->female_count }}</td>
                        <td>{{ $population->total_population }}</td>
                        <td class="actions">
                           <a href="{{ route('admin.populations.edit', $population) }}" class="btn btn-secondary">Edit</a>
                           <form action="{{ route('admin.populations.destroy', $population) }}" method="POST" onsubmit="return confirm('Yakin hapus?');">
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
            {{ $populations->links() }}
        </div>
    </div>
@endsection