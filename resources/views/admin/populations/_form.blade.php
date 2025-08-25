<div class="form-group">
    <label for="year" class="form-label">Tahun</label>
    <input type="number" name="year" id="year" class="form-control" value="{{ old('year', $population->year ?? date('Y')) }}" required>
</div>
<div class="form-group">
    <label for="male_count" class="form-label">Jumlah Laki-laki</label>
    <input type="number" name="male_count" id="male_count" class="form-control" value="{{ old('male_count', $population->male_count ?? '0') }}" required>
</div>
<div class="form-group">
    <label for="female_count" class="form-label">Jumlah Perempuan</label>
    <input type="number" name="female_count" id="female_count" class="form-control" value="{{ old('female_count', $population->female_count ?? '0') }}" required>
</div>
<div class="form-actions">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.populations.index') }}" class="btn btn-secondary">Batal</a>
</div>
