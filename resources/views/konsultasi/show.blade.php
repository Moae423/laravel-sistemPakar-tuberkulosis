@extends('layouts.main')
<div class="background-image">
  <img src="/image/1.png" alt="" style="position: absolute; top: 0; left: 0; z-index: -1; width: 100%; height: 100%;">
@section('content')
<style>
    .center-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
    }
   
    .container {
        width: 100%;
        max-width: 1200px;
        margin: auto;
    }

    .card {
        overflow: hidden; /* Ensure content stays inside */
    }

    .card-body {
        overflow: auto; /* Prevent content overflow */
    }

    .table-responsive {
        margin-bottom: 0; /* Adjusts the margin to prevent overflowing */
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
    <div class="container">
        <h1 class="text-center text-white mb-3">Hasil Diagnosa</h1>
        {{-- <form action="{{ route('konsultasi.riwayat') }}" method="POST">
            @csrf --}}
            <div class="card print-area">
                <div class="card-header">
                    <p class="mb-1">Nama Anda: {{ $nama }}</p>
                    <p class="mb-1">Umur: {{ $umurPasien }}</p>
                    <p class="mb-1">Alamat: {{ $alamatPasien }}</p>
                    <hr>
                    <h2 class="text-center">Gejala Yang Dipilih</h2>
                </div>
                <div class="card-body">
                    @if(!empty($result['totalBayes']))
                        <ul>
                            @foreach($result['selectedGejalas'] as $gejala)
                                <li>{{ $gejala->nama_gejala }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-center">No symptoms selected.</p>
                    @endif
                </div>
                <hr>
                
                <div class="card-body text-center">
                    <h2>Hasil Menunjukkan bahwa</h2>
                </div>
                <div class="card-body">
                    @if(!empty($result['totalBayes']))
                        <table class="table table-responsive">
                            <thead class="text-center">
                                <tr>
                                    <th>Penyakit</th>
                                    <th>Probability</th>
                                    <th>Solusi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($result['totalBayes'] as $bayes)
                                    <tr>
                                        <td>{{ $bayes['nama_penyakit'] }}</td>
                                        <td>{{ number_format($bayes['result'], 3) }}</td>
                                        <td>{{ $bayes['solusi_penyakit'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center">No related diseases found.</p>
                    @endif
                </div>
                <hr>
                <div class="card-body text-center">
                    <h2>Conclusion</h2>
                    @if(!empty($result['totalBayes']))
                        <p>Jadi dari hasil sistem diagnosa menunjukkan bahwa anda mengalami 
                           <span class="text-danger fw-bolder">{{ $nilai_tertinggi['nama_penyakit'] }}</span>
                           dengan tingkat kemungkinan terjadinya <span>{{ number_format($nilai_tertinggi['result'], 3)}}</span> atau 
                           <span class="text-danger fw-bolder">{{ number_format($nilai_tertinggi['result'] * 100, 2) }}%</span>
                        </p>
                    @else
                        <p class="text-center">No related diseases found.</p>
                    @endif
                </div>
                <form method="POST" target="_blank" action="{{ route('konsultasi.printDiagnosaPDF') }}">
                    @csrf
                    @foreach($selectedGejalas as $gejala)
                        <input type="hidden" name="selectedGejalas[]" value="{{ $gejala }}">
                    @endforeach
                    <div class="text-center">
                        <button class="btn btn-info no-print my-2" type="submit">Cetak</button>
                    </div>
                </form>
            </div>
    </div>
</div>

<script>
</script>
@endsection
