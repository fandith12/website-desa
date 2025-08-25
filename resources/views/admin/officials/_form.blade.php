<div class="form-group">
    <label for="name" class="form-label">Nama Lengkap</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $official->name ?? '') }}" required>
</div>
<div class="form-group">
    <label for="position" class="form-label">Jabatan</label>
    <input type="text" name="position" id="position" class="form-control" value="{{ old('position', $official->position ?? '') }}" required>
</div>
<div class="form-group">
    <label for="type" class="form-label">Tipe</label>
    <select name="type" id="type" class="form-control" required>
        <option value="kepala_desa" @selected(old('type', $official->type ?? '') == 'kepala_desa')>Kepala Desa</option>
        <option value="perangkat_desa" @selected(old('type', $official->type ?? '') == 'perangkat_desa')>Perangkat Desa</option>
    </select>
</div>
<div class="form-group">
    <label for="order" class="form-label">Nomor Urut Tampil</label>
    <input type="number" name="order" id="order" class="form-control" value="{{ old('order', $official->order ?? '0') }}" required>
</div>
<div class="form-group">
    <label for="photo" class="form-label">Foto</label>
    @if(isset($official) && $official->photo)
        <img src="{{ asset('storage/' . $official->photo) }}" alt="Foto saat ini" style="width: 150px; margin-bottom: 1rem;">
    @endif
    <input type="file" name="photo" id="photo" class="form-control">
</div>
<div class="form-group">
    <label for="bio" class="form-label">Bio Singkat (Khusus Kepala Desa)</label>
    <textarea name="bio" id="bio" class="form-control">{{ old('bio', $official->bio ?? '') }}</textarea>
</div>
<div class="form-actions">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.officials.index') }}" class="btn btn-secondary">Batal</a>
</div>