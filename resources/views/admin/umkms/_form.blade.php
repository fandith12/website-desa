<div class="form-group">
    <label for="name" class="form-label">Nama Usaha</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $umkm->name ?? '') }}" required>
</div>
<div class="form-group">
    <label for="owner_name" class="form-label">Nama Pemilik</label>
    <input type="text" name="owner_name" id="owner_name" class="form-control" value="{{ old('owner_name', $umkm->owner_name ?? '') }}" required>
</div>
<div class="form-group">
    <label for="image" class="form-label">Foto Produk/Usaha</label>
    @if(isset($umkm) && $umkm->image)
        <img src="{{ asset('storage/' . $umkm->image) }}" alt="Foto saat ini" style="width: 200px; margin-bottom: 1rem;">
    @endif
    <input type="file" name="image" id="image" class="form-control">
</div>
<div class="form-group">
    <label for="description" class="form-label">Deskripsi</label>
    <textarea name="description" id="description" class="form-control">{{ old('description', $umkm->description ?? '') }}</textarea>
</div>
<div class="form-group">
    <label for="address" class="form-label">Alamat</label>
    <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $umkm->address ?? '') }}">
</div>
<div class="form-group">
    <label for="phone_number" class="form-label">Nomor Telepon/WA</label>
    <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number', $umkm->phone_number ?? '') }}">
</div>
<div class="form-actions">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.umkms.index') }}" class="btn btn-secondary">Batal</a>
</div>