@extends('admin.layouts.main')
@section('content')
<div class="container pt-3">
    <h2 class="text-center">Daftar Penyakit</h2>
    <a href="{{ route('pdf.dataPenyakit') }}" target="_blank"><button class="btn btn-info mb-3">Download PDF</button></a>
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
      {{ session('success') }}
    </div>
  @endif
    <table class="table table-striped table-bordered">
      <thead class="text-center">
        <tr>
          <th scope="col">Nomor</th>
          <th scope="col">Kode Penyakit</th>
          <th scope="col">Nama Penyakit</th>
          <th scope="col">Detail Penyakit</th>
          <th scope="col">Solusi Penyakit</th>
          <th colspan="2" scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody >
        @php
            $no=1;
        @endphp
        @foreach ($penyakit as $p)
        <center>
        <tr>
          <th scope="row" class="text-center">{{ $no++ }}</th>
          <td class="text-center">{{ $p->kode_penyakit }}</td>
          <td>{{ $p->nama_penyakit }}</td>
          <td>{{ $p->detail_penyakit }}</td>
          <td>{{ $p->solusi_penyakit }}</td>
          <td>
            <a href="/admin/penyakit/{{$p->id}}/edit" class="btn btn-primary">
              <i class="fas fa-edit"></i> 
           </a>
          </td>
          <td>
            <form action="/admin/penyakit/{{$p->id}}" method="POST">
              @method('delete')
              @csrf
              <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Data Penyakit Mau Dihapus')"><i class="fas fa-trash-alt"></i> </button>
            </form>
          </td>

        </tr>
      </center>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection