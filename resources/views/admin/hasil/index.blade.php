@extends('admin.layouts.main')

@section('content')
<style>
  .table {
    border-radius: 15px;
    overflow: hidden;
}

.table thead {
    border-radius: 15px 15px 0 0;
}

.table th, .table td {
    vertical-align: middle;
}

.tombolCari {
    width: 100%;
}
</style>
<div class="container pt-3">
    <h2 class="text-center">Laporan Hasil Diagnosa</h2>

    <!-- Form Pencarian dan Sortir -->
    <form method="GET" action="{{ route('hasil.index') }}" class="mb-4">
        <div class="row g-3 align-items-end text-white">
            <div class="col-md-3">
                <label for="nama" class="form-label text-dark">Nama Pasien</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ request('nama') }}" placeholder="Cari nama pasien">
            </div>
            <div class="col-md-3">
                <label for="filter_date" class="form-label text-dark">Pilih Tanggal Konsultasi</label>
                <input type="date" name="filter_date" id="filter_date" class="form-control" value="{{ request('filter_date') }}">
            </div>
            <div class="col-md-3">
                <label for="sort_by" class="form-label text-dark">Sortir Berdasarkan Tanggal</label>
                <select name="sort_by" id="sort_by" class="form-select">
                    <option value="">Pilih</option>
                    <option value="asc" {{ request('sort_by') == 'asc' ? 'selected' : '' }}>Terlama</option>
                    <option value="desc" {{ request('sort_by') == 'desc' ? 'selected' : '' }}>Terbaru</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary tombolCari">Cari</button>
                <a href="{{ route('pdf.downloadPdf') }}" class="btn btn-danger tombolCari">Download PDF</a>
            </div>
        </div>
    </form>

    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <center>
    <table class="table table-striped table-bordered rounded">
        <thead class="rounded-top text-center">
            <tr>
                <th scope="col">Nomor</th>
                <th scope="col">Nama Pasien</th>
                <th scope="col">Nama Penyakit</th>
                <th scope="col">Result</th>
                <th scope="col">Tanggal</th>
                <th colspan="3" scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @php
                $no = 1;
            @endphp

            @foreach($results as $result)
            <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $result->nama }}</td>
                <td>{{ $result->nama_penyakit }}</td>
                <td>{{ number_format($result->result * 100) }}%</td>
                <td>{{ $result->created_at->format('d-m-Y H:i') }}</td>
                <td>
                    <form action="/admin/hasil/{{ $result->id }}" method="POST">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Data Gejala Mau Dihapus')"><i class="fas fa-trash-alt"></i> </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $results->links() }}
    </div>
    </center>
</div>
@endsection
