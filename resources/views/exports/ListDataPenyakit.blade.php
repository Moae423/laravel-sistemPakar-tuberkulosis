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
        body {
            /* scale: 90%; */
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
            font-size: 40px;
        }
        .tandaTangan {
            visibility: visible;
        }
        .container {

        }
        .card {
            border: none;
        }
        .dinas {
            font-size: 20px;
        }
        .identity {
            font-size: 20px;
        }
    }
    .dinas {
        /* font-size: 25px; */
    }
    .tandaTangan {
        visibility: hidden;
    }
</style>

<div class="container-lg pt-3">
<div class="card p-2 border-2 border-dark">
    <div class="card d-flex justify-content-center align-items-center">
        <div>
            <h6 class="text-center my-0">DINAS KESEHATAN KABUPATEN AGAM</h6>
        </div>
        <div class="d-flex justify-content-center align-items-center gap-2 my-0">
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
    <hr class="border border-dark border-5 opacity-75 my-0">
    <h1 class="text-center mb-3 fw-bold">LAPORAN DATA PENYAKIT TB 2024</h1>
    <table class="mt-3 identity">
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
    </table>
    {{-- <hr> --}}

    <center>
        <table class="table table-striped table-bordered mt-3">
            <thead class="text-center">
                <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Kode Gejala</th>
                    <th scope="col">Nama Gejala</th>
                    <th scope="col">Detail Penyakit</th>
                    <th scope="col">Solusi Penyakit</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($penyakit as $g)
                <tr>
                    <td scope="row" class="text-center">{{ $no++ }}</td>
                    <td class="text-center">{{ $g->kode_penyakit }}</td>
                    <td class="text-left">{{ $g->nama_penyakit }}</td>
                    <td class="text-left">{{ $g->detail_penyakit }}</td>
                    <td class="text-left">{{ $g->solusi_penyakit }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </center>
    <div class="text-center pb-2">
        <button class="btn btn-info no-print my-2" onclick="window.print()">Download PDF</button>
    </div>
    <div class="d-flex justify-content-end no-print">
        <div class="w-25 text-center">
            <div class="">Penanggung Jawab Program TB,</div>
            <div class="">Puskesmas Padang Luar</div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="">dr Yulia Sartika, {{ now()->format('d-m-Y') }}</div>
        </div>
    </div>
</div>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
