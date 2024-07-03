{{-- @extends('admin.layouts.main') --}}
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{$title}} </title>
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('style.css') }}"> --}}
<style>
        img {
            width: 70px;
            height: 70px;
        }
        body {
            font-family: 'Times New Roman', Times, serif;

        }
        @media print {
            @page {
            size: auto; /* auto is the current printer page size */
            margin: 0; /* this will set the margins to zero */
            
        }

            .card {
                border: none;   
            }
            body {
            /* scale: 88%; */
            margin: 0;
            /* padding: 0; */
            font-family: 'Times New Roman', Times, serif;
            }
            
            .content-to-print {
                margin: 0;
                padding: 0;
            }
            .no-print {
                display: none;
            }
            
            .title {
                font-size: 20px   
            }
            .laporan {
                font-size: 30px;
            }
            .tandaTangan {
                visibility:visible;
            }
        }
        .tandaTangan{
            visibility:hidden;
        }
        
        /* .container {
            display: flex;
            justify-content: space-between;
            } */
            </style>
<div class="container pt-3">
    <div class="card p-2">
        <div class="card">
            <div>
                <h6 class="text-center my-0">DINAS KESEHATAN KABUPATEN AGAM</h6>
            </div>
            <div class="d-flex justify-content-center align-items-center gap-3">
                <img src="{{ asset('image/kabupaten.png') }}" alt="">
                <h1 class="text-center fw-bold mr-3 title">PUSKESMAS PADANG LUAR</h1>
                <img src="{{ asset('image/kabupaten.png') }}" alt="">
            </div>
            <div>
                <p class="text-center my-0">KECAMATAN BANUHAMPU KABUPATEN AGAM</p>
            </div>
            <div>
                <p class="text-center my-0">Jl. Raya Padang Panjang - Bukittinggi Padang No.Km.5</p>
            </div>
        </div>
        <hr class="border border-dark border-5 my-0 opacity-75">
    
    
  <table>
    <tr>
        <td>Penanggung Jawab</td>
        <td>:</td>
        <td>dr {{ Auth::user()->nama }}</td>
    </tr>
    <tr>
        <td>Kecamatan/Kabupatan</td>
        <td>:</td>
        <td>Kec. Banuhampu, Kabupaten Agam</td>
    </tr>
    <tr>
        <td>Tanggal Cetak: </td>
        <td>:</td>
        <td>{{ now()->format('d-m-Y H:i') }}</td>
    </tr>
    <h1 class="text-center mb-3 fw-bolder my-0 laporan">LAPORAN DATA GEJALA TB 2024</h1>
  </table>
  {{-- <hr> --}}
  <div class="text-center pb-2">
    <button class="btn btn-info no-print " onclick="window.print()">Download PDF</button>
</div>
  <center>
    <table class="table table-striped table-bordered ">
      <thead class="text-center">
        <tr>
          <th scope="col">Nomor</th>
          <th scope="col">Kode Gejala</th>
          <th scope="col">Nama Gejala</th>
        </tr>
      </thead>
      <tbody>
        @php
            $no=1;
        @endphp
        @foreach ($gejala as $g)
        
        <tr>
          <th scope="row"  class="text-center">{{ $no++ }}</th>
          <td class="text-center">{{ $g->kode_gejala }}</td>
          <td class="text-left">{{ $g->nama_gejala }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
</center>
</div>
<div class=" d-flex justify-content-end no-print">
    <div class="text-center">
        <div class="">Penanggung Jawab Program TB, </div>
        <div class="">Puskesmas Padang Luar</div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="">Dr {{ Auth::user()->namaPasien }}, {{ now()->format('d-m-Y') }} </div>
    </div>
</div>
</div>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
