<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .text-danger { color: red; }
        .fw-bolder { font-weight: bolder; }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>Nama: {{ $nama }}</p>
    <p>Umur: {{ $umurPasien }}</p>
    <p>Alamat: {{ $alamatPasien }}</p>

    @if(!empty($result['totalBayes']))
        <p>Jadi dari hasil system diagnosa menunjukkan bahwa anda mengalami 
            <span class="text-danger fw-bolder">{{ $nilai_tertinggi['nama_penyakit'] }}</span>
            dengan tingkat kemungkinan terjadinya 
            <span class="text-danger fw-bolder">{{ number_format($nilai_tertinggi['result'] * 100, 2) }}%</span>
        </p>
    @else
        <p>Tidak ada data yang ditemukan</p>
    @endif

    @if(isset($result['totalBayes']) && !empty($result['totalBayes']))
        <h2>Hasil Diagnosa:</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Nama Penyakit</th>
                    <th>Probabilitas</th>
                    <th>Solusi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($result['totalBayes'] as $bayes)
                    <tr>
                        <td>{{ $bayes['nama_penyakit'] }}</td>
                        <td>{{ number_format($bayes['result'] * 100, 2)  }}%</td>
                        <td>{{ $bayes['solusi_penyakit'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada data yang ditemukan</p>
    @endif
</body>
</html>
