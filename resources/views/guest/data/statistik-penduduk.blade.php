@extends('layouts.app')
@section('title', 'Statistik Penduduk')
@section('content')
<section>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Statistik Penduduk</h1>
            <p class="page-subtitle">Data kependudukan Desa Jaya Mulya dari tahun ke tahun.</p>
        </div>
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Tahun</th>
                        <th>Jumlah Laki-laki</th>
                        <th>Jumlah Perempuan</th>
                        <th>Total Penduduk</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($populations as $pop)
                    <tr>
                        <td>{{ $pop->year }}</td>
                        <td>{{ number_format($pop->male_count) }} Jiwa</td>
                        <td>{{ number_format($pop->female_count) }} Jiwa</td>
                        <td>{{ number_format($pop->total_population) }} Jiwa</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Data statistik belum tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection