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
</style>
<div class="center-container">
<div class="container">
    <h1 class="text-center text-primary">Diagnosis Results</h1>

    <div class="card">
        <div class="card-header">
            <h2>Selected Symptoms</h2>
        </div>
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
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h2>Related Diseases</h2>
        </div>
        <div class="card-body">
            @if(!empty($totalBayes))
                <table class="table">
                    <thead>
                        <tr>
                            <th>Peenyakit</th>
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
    </div>
</div>
</div>
@endsection