@extends('admin.layouts.main')
@section('content')

<style>
    .dataPasien {
        margin: 0 auto;
        padding: 0.8em;
        font-weight: bold;

    }
</style>

<h1 class="text-center p-3"><strong>Dashboard Sistem Pakar</strong></h1>
<div class="row ">
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-disease"></i></span>
    
        <div class="info-box-content">
            <span class="info-box-text ">Penyakit TB</span>
            <span class="info-box-number">
                {{ $penyakits}}
            </span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-diagnoses"></i></span>
    
        <div class="info-box-content">
        <span class="info-box-text">Gejala TB</span>
        <span class="info-box-number">
            {{$gejalas}}
        </span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-code-branch"></i></span>
    
        <div class="info-box-content">
        <span class="info-box-text">Basis Pengetahuan</span>
        <span class="info-box-number">
            {{ $rules }}
        </span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-injured"></i></span>
    
        <div class="info-box-content">
        <span class="info-box-text">Pasien</span>
        <span class="fs-1">{{ $jumlahPasiens }}</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <h2 class="dataPasien">Data Pasien</h2>
    <table class="table table-striped table-bordered rounded">
        <thead class="text-center">
        <tr>
                <th scope="col">Nomor</th>
                <th scope="col">Nama Pasien</th>
                <th scope="col">Email</th>
                <th scope="col">Umur</th>
                <th scope="col" class="tanggal">Tanggal</th>
                <th scope="col">Alamat</th>
        </tr>
        </thead>
        <tbody>
        @php
            $no=1;
        @endphp
        @foreach ($users as $user)
            <tr>
            <th scope="row" class="text-center">{{ $no++ }}</th>
            <td>{{ $user->nama }}</td>
            <td>{{ $user->email }}</td>
            <td class="text-center">{{ $user->umur }}</td>
            <td>{{ $user->created_at->format('d-m-Y') }}</td>
            <td>{{ $user->alamat }}</td>
        </tr> 
        @endforeach 
        </tbody>
    </table>
        <div class="d-flex justify-content-center w-100">
        {{ $users->links() }}
        </div>
        <h2 class="dataPasien">Konsultasi Pasien</h2>
            <table class="table table-striped table-bordered rounded">
                <thead class="text-center">
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Nama Penyakit</th>
                        <th scope="col">Result</th>
                        <th scope="col">Tanggal</th>
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $results->links() }}
            </div>
</div>
@endsection
