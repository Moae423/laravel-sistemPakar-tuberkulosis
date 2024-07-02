@extends('admin.layouts.main')
@section('content')
    <style>
      .tanggal {
          white-space: nowrap; /* Prevent text wrapping */
          width: 100px; /* Set a fixed width */
      }
  </style>
<div class="container pt-3">
  
    <h2 class="text-center">Laporan Data Pasien</h2>
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
      {{ session('success') }}
    </div>
  @endif
    <table class="table table-striped table-bordered rounded">
      <thead class="text-center">
        <tr>
          <th scope="col">Nomor</th>
          <th scope="col">Nama Pasien</th>
          <th scope="col">Email</th>
          <th scope="col">Umur</th>
          <th scope="col" class="tanggal">Tanggal</th>
          <th scope="col">Alamat</th>
          <th colspan="2" scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
       @php
            $no=1;
        @endphp
        @foreach ($users as $user)
          <tr>
          <th scope="row" class="text-center">{{ $no++ }}</th>
          <td>{{ $user->namaPasien }}</td>
          <td>{{ $user->email }}</td>
          <td class="text-center">{{ $user->umur }}</td>
          <td>{{ $user->created_at->format('d-m-Y') }}</td>
          <td>{{ $user->alamat }}</td>
          <td>
            <a href="/daftar/{{$user->id}}/edit" class="btn btn-primary">
              <i class="fas fa-edit"></i> 
           </a>
          </td>
          <td>
            <form action="/daftar/{{$user->id}}" method="POST">
              @method('delete')
              @csrf
              <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Data Pasien Mau Dihapus')"><i class="fas fa-trash-alt"></i> </button>
            </form>
          </td>

        </tr> 
        @endforeach 
      </tbody>
    </table>
    <div class="d-flex justify-content-center">
      {{ $users->links() }}
  </div>
  </div>
@endsection