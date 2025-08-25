@extends('layouts.admin')
@section('title', 'Manajemen Berita')
@section('content')
    <div class="content-header">
        <h1 class="content-title">Manajemen Berita</h1>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Tambah Berita</a>
    </div>
    <div class="content-box">
        <div class="table-container">
            <table class="data-table admin-table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Status</th>
                        <th>Tanggal Publikasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{!! $post->published_at ? '<span style="color:green">Published</span>' : '<span style="color:orange">Draft</span>' !!}</td>
                        <td>{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d M Y H:i') : '-' }}</td>
                        <td class="actions">
                           <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-secondary">Edit</a>
                           <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Yakin hapus?');">
                               @csrf @method('DELETE')
                               <button type="submit" class="btn btn-danger">Hapus</button>
                           </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-center">Tidak ada berita.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="pagination">
            {{ $posts->links() }}
        </div>
    </div>
@endsection