{{-- @extends('admin.layouts.main') --}}
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Halaman | {{$title}} </title>
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('style.css') }}"> --}}
<div class="container pt-3">
    <style>
        img {
            width: 50px;
            height: 50px;
        }
        @media print {
            body {
                font-family: 'Times New Roman', Times, serif;
                /* margin: none;
                padding: 0; */
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
    <div class="d-flex justify-content-center align-items-center gap-3">
    <img src="{{ asset('image/kabupaten.png') }}" alt="">
    <h1 class="text-center mr-3 title">PUSKESMAS PADANG LUAR</h1>
    <img src="{{ asset('image/kabupaten.png') }}" alt="">
</div>
<hr>

    
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
      {{ session('success') }}
    </div>
  @endif
  <table>
    <tr>
        <td>Penanggung Jawab</td>
        <td>:</td>
        <td>Dr {{ Auth::user()->namaPasien }}</td>
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
  </table>
  <hr>
  <center>
    <table class="table table-striped table-bordered min-h-screen">
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
<div class=" d-flex justify-content-end no-print">
    <div class="w-25   text-center">
        <div class="">Penanggung Jawab Program TB</div>
        <div class="">Puskesmas Padang Luar</div>
        <br>
        <br>
        <br>
        <div class="">Dr {{ Auth::user()->namaPasien }}, {{ now()->format('d-m-Y H:i') }} </div>
    </div>
</div>
<div class="text-center pb-2">
    <button class="btn btn-info no-print " onclick="window.print()">Download PDF</button>
</div>
</div>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
