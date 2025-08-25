@extends('layouts.admin')
@section('title', 'Pengaturan Website')
@section('content')
    <h1 class="content-title">Pengaturan Website</h1>
    <div class="content-box">
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="visi_desa" class="form-label">Visi Desa</label>
                <textarea name="visi_desa" id="visi_desa" class="form-control">{{ old('visi_desa', $settings['visi_desa'] ?? '') }}</textarea>
            </div>
            <div class="form-group">
                <label for="misi_desa" class="form-label">Misi Desa</label>
                <textarea name="misi_desa" id="misi_desa" class="form-control">{{ old('misi_desa', $settings['misi_desa'] ?? '') }}</textarea>
            </div>
            <div class="form-group">
                <label for="sejarah_desa" class="form-label">Sejarah Desa</label>
                <textarea name="sejarah_desa" id="sejarah_desa" class="form-control" style="min-height: 250px;">{{ old('sejarah_desa', $settings['sejarah_desa'] ?? '') }}</textarea>
            </div>
            <div class="form-group">
                <label for="struktur_pemerintahan_image" class="form-label">Gambar Struktur Pemerintahan</label>
                @if(isset($settings['struktur_pemerintahan_image']))
                    <img src="{{ asset('storage/' . $settings['struktur_pemerintahan_image']) }}" alt="Struktur saat ini" style="max-width: 400px; margin-bottom: 1rem; border: 1px solid #ddd; padding: 5px;">
                @endif
                <input type="file" name="struktur_pemerintahan_image" id="struktur_pemerintahan_image" class="form-control">
                <p class="form-help-text">Unggah gambar baru untuk mengganti yang lama.</p>
            </div>
            <hr style="border-color: var(--border-color); margin: 2rem 0;">
            <div class="form-group">
                <label for="piramida_penduduk_image" class="form-label">Gambar Piramida Penduduk</label>
                @if(isset($settings['piramida_penduduk_image']))
                    <img src="{{ asset('storage/' . $settings['piramida_penduduk_image']) }}" alt="Piramida saat ini" style="max-width: 400px; margin-bottom: 1rem; border: 1px solid #ddd; padding: 5px;">
                @endif
                <input type="file" name="piramida_penduduk_image" id="piramida_penduduk_image" class="form-control">
                <p class="form-help-text">Unggah gambar untuk halaman Demografi. Kosongkan jika tidak ingin mengubah.</p>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
            </div>
        </form>
    </div>
@endsection