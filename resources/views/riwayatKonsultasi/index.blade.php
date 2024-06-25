@extends('layouts.main')
<div class="background-image">
  <img src="/image/1.png" alt="" style="position: absolute; top: 0; left: 0; z-index: -1; width: 100%; height: 100%;">
@section('content')
<style>
    .table {
    border-radius: 15px;
    overflow: hidden;
}

.table thead {
    border-radius: 15px 15px 0 0;
}
</style>
{{-- <div class="container"> --}}
    <h1 class="mb-4 text-white">Riwayat Konsultasi</h1>

    <!-- Form Pencarian dan Sortir -->
    <form method="GET" action="{{ route('konsultasi.riwayat') }}" class="mb-4">
        <div class="row g-3 align-items-end text-white">
            <div class="col-md-4">
                <label for="namaPasien" class="form-label">Nama Pasien</label>
                <input type="text" name="namaPasien" id="namaPasien" class="form-control" value="{{ request('namaPasien') }}" placeholder="Cari nama pasien">
            </div>
            <div class="col-md-4">
                <label for="sort_by" class="form-label">Sortir Berdasarkan Tanggal</label>
                <select name="sort_by" id="sort_by" class="form-select">
                    <option value="">Pilih</option>
                    <option value="asc" {{ request('sort_by') == 'asc' ? 'selected' : '' }}>Terlama</option>
                    <option value="desc" {{ request('sort_by') == 'desc' ? 'selected' : '' }}>Terbaru</option>
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">Cari</button>
            </div>
        </div>
    </form>

    @if($riwayat->isEmpty())
        <div class="alert alert-warning" role="alert">
            Tidak ada riwayat konsultasi yang ditemukan.
        </div>
    @else
        <div class=" rounded">
            <table class="table table-striped table-hover rounded table-responsive  " style="table-layout: auto; width: 100%;">
                <thead class="table-dark text-center rounded-top">
                    <tr>
                        <th>Tanggal Konsultasi</th>
                        <th>Nama Pasien</th>
                        <th>Nama Penyakit</th>
                        <th>Probabilitas</th>
                        <th>Gejala yang Dipilih</th>
                        <th>Solusi Penyakit</th>
                    </tr>
                </thead>
                <tbody class="table-responsive ">
                    @foreach($riwayat as $entry)
                    <tr>
                        <td>{{ $entry->created_at->format('d-m-Y') }}</td>
                        <td>{{ $entry->namaPasien }}</td>
                        <td>{{ $entry->nama_penyakit }}</td>
                        {{-- @if ($entry->result == $highestResult) style="background-color: yellow;" @endif> --}}
                        <td>{{ number_format($entry->result * 100, 2) }}%</td>
                        <td>
                            @php
                                $gejalas = json_decode($entry->selected_gejalas);
                                $gejalaNames = \App\Models\Gejala::whereIn('id', $gejalas)->pluck('nama_gejala')->toArray();
                                echo implode(', ', $gejalaNames);
                            @endphp
                        </td>
                        <td>{{ $entry->solusi_penyakit }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
