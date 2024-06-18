@extends('layouts.main')
<div class="background-image">
  <img src="/image/1.png" alt="" style="position: absolute; top: 0; left: 0; z-index: -1; width: 100%; height: 100%;">
@section('content')
<style>
    .form-check-input-shadow {
        border-radius: 5px;
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.3);
    }
  </style>
 @if($riwayat->isEmpty())
 <p>Tidak ada riwayat konsultasi yang ditemukan.</p>
@else
 <table class="table">
     <thead>
         <tr>
             <th>Tanggal</th>
             <th>Nama Pasien</th>
             <th>Nama Penyakit</th>
             <th>Probabilitas</th>
             <th>Gejala yang Dipilih</th>
         </tr>
     </thead>
     <tbody>
         @foreach($riwayat as $entry)
         <tr>
             <td>{{ $entry->created_at }}</td>
             <td>{{ $entry->namaPasien }}</td>
             <td>{{ $entry->nama_penyakit }}</td>
             <td>{{ number_format($entry->result * 100, 2) }}%</td>
             <td>
                 @php
                     $gejalas = json_decode($entry->selected_gejalas);
                     $gejalaNames = \App\Models\Gejala::whereIn('id', $gejalas)->pluck('nama_gejala')->toArray();
                     echo implode(', ', $gejalaNames);
                 @endphp
             </td>
         </tr>
         @endforeach
     </tbody>
 </table>
@endif
</div>
@endsection