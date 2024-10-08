@extends('admin.layouts.main')
@section('content')
<div class="container pt-3">
    <h2 class="text-center">Daftar Rule</h2>
    
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
      {{ session('success') }}
    </div>
  @endif
    <table class="table table-striped">
      <thead class="text-center">
        <tr>
          <th scope="col">Nomor</th>
          <th scope="col">Kode Penyakit</th>
          <th scope="col">Kode Gejala</th>
          <th scope="col">Nilai Probabilitas</th>
          <th colspan="2" scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody class="text-center">
        @php
            $no=1;
        @endphp
        @foreach ($rules as $rule)
          <tr>
          <th scope="row">{{ $no++ }}</th>
          <td>{{$rule->idPenyakit }}</td>
          <td>{{$rule->idGejala }}</td>
          <td>{{ $rule->nilai_probabilitas }}</td>
          <td>
            <a href="/admin/rule/{{$rule->id}}/edit" class="btn btn-primary">
              <i class="fas fa-edit"></i> 
           </a>
          </td>
          <td>
            <form action="/admin/rule/{{$rule->id}}" method="POST">
              @method('delete')
              @csrf
              <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Data Rule Mau Dihapus')"><i class="fas fa-trash-alt"></i> </button>
            </form>
          </td>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection