@extends('admin.layouts.main')
@section('content')
<div class="container pt-3">
    <h2 class="text-center">Laporan Data Pasien</h2>
    
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
      {{ session('success') }}
    </div>
  @endif
    <table class="table table-striped">
      <thead class="text-center">
        <tr>
          <th scope="col">Nomor</th>
          <th scope="col">Nama Pasien</th>
          <th scope="col">Email</th>
          <th scope="col">Umur</th>
          <th scope="col">Alamat</th>
          <th colspan="2" scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody class="text-center">
       @php
            $no=1;
        @endphp
        @foreach ($users as $user)
          <tr>
          <th scope="row">{{ $no++ }}</th>
          <td>{{ $user->namaPasien }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->umur }}</td>
          <td>{{ $user->alamat }}</td>
          <td>
            <a href="/register/{{$user->id}}/edit" class="btn btn-primary">
              <i class="fas fa-edit"></i> 
           </a>
          </td>
          <td>
            <form action="/register/{{$user->id}}" method="POST">
              @method('delete')
              @csrf
              <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Data Pasien Mau Dihapus')"><i class="fas fa-trash-alt"></i> </button>
            </form>
          </td>

        </tr> 
        @endforeach 
      </tbody>
    </table>
  </div>
@endsection