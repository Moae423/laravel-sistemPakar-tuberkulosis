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
</style>
<div class="container pt-3">
    <h2 class="text-center">Laporan Hasil Diagnosa</h2>

    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <center>
    <table class="table table-striped table-bordered rounded">
        <thead class=" rounded-top text-center">
            <tr>
                <th scope="col">Nomor</th>
                <th scope="col">Nama Pasien</th>
                <th scope="col">Nama Penyakit</th>
                <th scope="col">Result</th>
                <th scope="col">Tanggal</th>
                <th colspan="2" scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @php
                $no = 1;
            @endphp

            @foreach($results as $result)
            <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $result->namaPasien }}</td>
                <td>{{ $result->nama_penyakit }}</td>
                <td>{{ number_format($result->result * 100) }}%</td>
                <td>{{ $result->created_at->format('d-m-Y H:i') }}</td>
                <td>
                    <a href="#" class="btn btn-primary">
                        <i class="fas fa-edit"></i> 
                    </a>
                </td>
                <td>
                    <form action="#" method="POST">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Data Gejala Mau Dihapus')"><i class="fas fa-trash-alt"></i> </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </center>
</div>
@endsection
