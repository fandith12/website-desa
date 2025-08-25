<div class="form-group">
    <label for="title" class="form-label">Judul Berita</label>
    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title ?? '') }}" required>
</div>
<div class="form-group">
    <label for="image" class="form-label">Gambar Utama</label>
    @if(isset($post) && $post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar saat ini" style="width: 200px; margin-bottom: 1rem;">
    @endif
    <input type="file" name="image" id="image" class="form-control">
    <p class="form-help-text">Kosongkan jika tidak ingin mengubah gambar.</p>
</div>
<div class="form-group">
    <label for="body" class="form-label">Isi Berita</label>
    <textarea name="body" id="body" class="form-control">{{ old('body', $post->body ?? '') }}</textarea>
</div>
<div class="form-group">
    <label for="published_at" class="form-label">Tanggal Publikasi</label>
    <input type="datetime-local" name="published_at" id="published_at" class="form-control" value="{{ old('published_at', isset($post) && $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('Y-m-d\TH:i') : '') }}">
    <p class="form-help-text">Kosongkan untuk menyimpan sebagai draft.</p>
</div>
<div class="form-actions">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Batal</a>
</div>