<div class="form-group">
    <label for="category" class="form-label">Kategori</label>
    <input type="text" name="category" id="category" class="form-control" value="{{ old('category', $demographic->category ?? '') }}" required placeholder="Contoh: Pendidikan, Pekerjaan, Agama">
</div>
<div class="form-group">
    <label for="label" class="form-label">Label</label>
    <input type="text" name="label" id="label" class="form-control" value="{{ old('label', $demographic->label ?? '') }}" required placeholder="Contoh: SD, Petani, Islam">
</div>
<div class="form-group">
    <label for="value" class="form-label">Jumlah (Jiwa)</label>
    <input type="number" name="value" id="value" class="form-control" value="{{ old('value', $demographic->value ?? '0') }}" required>
</div>
<div class="form-actions">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.demographics.index') }}" class="btn btn-secondary">Batal</a>
</div>