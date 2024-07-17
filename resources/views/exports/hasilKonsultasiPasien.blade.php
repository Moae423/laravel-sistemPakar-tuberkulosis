<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>{{ $title . ' ' . 'Pasien' . ' ' . $nama }}</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
        }
        .container-lg {
            padding-top: 1rem;
            width: 100%;
            max-width: 1140px;
            margin-right: auto;
            margin-left: auto;
        }
        .card {
            padding: 1rem;
            border: 2px solid black;
            margin-bottom: 1rem;
            border-radius: 0.25rem;
            background-color: #fff;
        }
        .card img {
            width: 70px;
            height: 70px;
        }
        .text-center {
            text-align: center;
        }
        .fw-bold {
            font-weight: bold;
        }
        .d-flex {
            display: flex;
        }
        .justify-content-center {
            justify-content: center;
        }
        .align-items-center {
            align-items: center;
        }
        .gap-2 {
            gap: 0.5rem;
        }
        .border {
            border: 5px solid black;
            opacity: 0.75;
        }
        .mt-3 {
            margin-top: 1rem;
        }
        .mb-3 {
            margin-bottom: 1rem;
        }
        .my-0 {
            margin-top: 0;
            margin-bottom: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 0.5rem;
            text-align: left;
        }
        th.text-center, td.text-center {
            text-align: center;
        }
        .text-left {
            text-align: left;
        }
        .pb-2 {
            padding-bottom: 0.5rem;
        }
        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #17a2b8;
            border: none;
            border-radius: 0.25rem;
            margin: 0.5rem 0;
        }
        .no-print {
            display: block;
        }
        .w-25 {
            width: 25%;
        }
        @media print {
            @page {
                size: auto;
                margin: 0;
            }
            .card { 
                border: none;
            }
            body {
                margin: 0;
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
            .dinas {
                font-size: 20px;
            }
            .identity {
                font-size: 20px;
            }
        }
        .dinas {
            font-size: 25px;
        }
        .tandaTangan {
            visibility: hidden;
        }
        .hasilAkhir {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="container-lg">
        <div class="card">
            <div class="text-center">
                <h6 class="my-0">DINAS KESEHATAN KABUPATEN AGAM</h6>
            </div>
            <div class="d-flex justify-content-center align-items-center gap-2 my-0">
                <img src="{{ asset('image/kabupaten.png') }}" alt="">
                <h1 class="fw-bold title">PUSKESMAS PADANG LUAR</h1>
                <img src="{{ asset('image/kabupaten.png') }}" alt="">
            </div>
            <div class="text-center">
                <p class="my-0">KECAMATAN BANUHAMPU KABUPATEN AGAM</p>
                <p class="my-0">Jl. Raya Padang Panjang - Bukittinggi Padang No.Km.5</p>
            </div>
            <hr class="border">
            <h1 class="text-center mb-3 fw-bold">HASIL DIAGNOSA PENYAKIT TB</h1>
            <table class="mt-3 identity">
                <tr>
                    <td>Penanggung Jawab</td>
                    <td>dr Yulia Sartika</td>
                </tr>
                <tr>
                    <td>Kecamatan/Kabupatan</td>
                    <td>Kec. Banuhampu, Kabupaten Agam</td>
                </tr>
                <tr>
                    <td>Tanggal Cetak: </td>
                    <td>{{ now()->format('d-m-Y H:i') }}</td>
                </tr>
            </table>
            <hr>
                <h1 class="fw-bolder">Identitas Pasien</h1>
                <table class="table mt-3 identity">
                    <tr>
                        <td>Nama</td>
                        <td>{{ $nama }}</td>
                    </tr>
                    <tr>
                        <td>Umur</td>
                        <td>{{ $umurPasien}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{ $alamatPasien }}</td>
                    </tr>
                </table>
                @if(!empty($result['totalBayes']))
                <table class="table">
                    <thead class="text-center ">
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
                                <td>{{ number_format($bayes['result'] * 100, 2) }}%</td>
                                <td>{{ $bayes['solusi_penyakit'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No related diseases found.</p>
            @endif
                @if(!empty($result['totalBayes']))
                    <p class="hasilAkhir p-2">Jadi dari hasil system diagnosa menunjukkan bahwa anda mengalami 
                        <span class="text-danger fw-bolder">{{ $nilai_tertinggi['nama_penyakit'] }}</span>
                        dengan tingkat kemungkinan terjadinya 
                        <span class="text-danger fw-bolder">{{ number_format($nilai_tertinggi['result'] * 100, 2) }}%</span>, dengan solusi 
                        <span class="text-danger fw-bolder"> {{ $nilai_tertinggi['solusi_penyakit'] }}</span>
                    </p>
                @else
                    <p class="hasilAkhir">Tidak ada data yang ditemukan</p>
                @endif
            </div>
            <div class="text-center pb-2">
                <button class="btn text-center btn-info no-print my-2" target="_BLANK" onclick="printAndDownload()">Download PDF</button>
            </div>
    </div>
</body>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script>
     function printAndDownload() {
            window.print();
            setTimeout(function() {
        // Tampilkan notifikasi menggunakan API Notification
        if ('Notification' in window) {
            if (Notification.permission === 'granted') {
                new Notification('File Sudah Tersimpan');
            } else if (Notification.permission !== 'denied') {
                Notification.requestPermission(function(permission) {
                    if (permission === 'granted') {
                        new Notification('Printing...');
                    }
                });
            }
        }
    }, 200);
        }
</script>
</html>
