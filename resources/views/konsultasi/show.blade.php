@extends('layouts.main')
<div class="background-image">
  <img src="/image/1.png" alt="" style="position: absolute; top: 0; left: 0; z-index: -1; width: 100%; height: 100%;">
@section('content')
<style>
    .center-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh; /* Ensure it takes full viewport height */
    }
   
    .container {
        width: 80%; /* Adjust as needed */
        margin: auto; /* Center horizontally */
    }
    @media print {
        .navbar { 
            display: none;
        }
        .container {
            width: 80%;
        }
        .no-print {
            display: none;
        }
    }
</style>
<div class="center-container">
    <div class="container  ">
        <h1 class="text-center text-white mb-3">Hasil Diagnosa</h1>
        <form action="{{ route('konsultasi.riwayat') }}" method="POST">
            @csrf
            <div class="card print-area ">
                <div class="card-header">
                            <p class="">Nama Anda : {{ $namaPasien }}</p>
                            <p>Umur :{{ $umurPasien }}</p>
                            <p>Alamat :{{ $alamatPasien }}</p>
                            <hr>
                {{-- </div> --}}
                    <h2 class="text-center">Gejala Yang Dipilih</h2>
                <div class="card-body">
                    @if(!empty($selectedGejalas))
                        <ul>
                            @foreach($selectedGejalas as $gejala)
                                <li>{{ $gejala->nama_gejala }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>No symptoms selected.</p>
                    @endif
                </div>
                <hr>
                
                <div class="card-body text-center">
                    <h2>Hasil Menunjukkan bahwa</h2>
                </div>
                <div class="card-body">
                    @if(!empty($totalBayes))
                        <table class="table">
                            <thead class="text-center ">
                                <tr>
                                    <th>Penyakit</th>
                                    <th>Probability</th>
                                    <th>Solusi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($totalBayes as $bayes)
                                    <tr>
                                        <td>{{ $bayes['nama_penyakit'] }}</td>
                                        <td>{{ number_format($bayes['result'] * 100, 2) }}%</td>
                                        <td>{{ $bayes['solusi_penyakit'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No related diseases found.</p>
                    @endif
                </div>
                <hr>
                {{-- <div class="card-header"> --}}
                    <h2 class="text-center ">Conclusion</h2>
                {{-- </div> --}}
                @if(!empty($totalBayes))
                                    <p class="">Jadi dari hasil system diagnosa menunjukkan bahwa anda mengalami <span class="text-danger fw-bolder "> {{ $nilai_tertinggi['nama_penyakit'] }} </span>
                                        dengan tingkat kemungkinan terjadinya <span  class="text-danger fw-bolder "> {{ number_format($nilai_tertinggi['result'] * 100, 2) }}%</span></p>
                                    </tr>
                    @else
                        <p>No related diseases found.</p>
                    @endif
                </div>
            </div>
            
            {{-- <div class="text-center mt-3">
                <button type="submit" class="btn btn-lg btn-success">Download</button>
            </div> --}}
            <div class="text-center mt-3 btn-print ">
                <button type="submit" class="btn btn-success no-print">Simpan</button>
            </div>
        </form>
</div>
<script>
</script>
@endsection
