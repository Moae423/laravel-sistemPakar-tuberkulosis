<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosa Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Diagnosa Results</h1>
    <p>Nama: {{ Auth::user()->nama}}</p>
    <p>Umur: {{ Auth::user()->umur }}</p>
    <p>Alamat: {{ Auth::user()->alamat}}</p>

    <h2>Gejala yang Dipilih:</h2>
    <ul>
        @foreach ($selectedGejalas as $gejala)
            <li>{{ $gejala->nama_gejala }}</li>
        @endforeach
    </ul>

    <h2>Diagnosis:</h2>
    <p>Penyakit: {{ $nilai_tertinggi['nama_penyakit'] }}</p>
    <p>Probabilitas: {{ $nilai_tertinggi['nilai_probabilitas'] }}</p>
    <p>Solusi: {{ $nilai_tertinggi['solusi_penyakit'] }}</p>

    <h2>Probabilitas Total:</h2>
    <table>
        <thead>
            <tr>
                <th>ID Penyakit</th>
                <th>Nama Penyakit</th>
                <th>Probabilitas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($totalBayes as $bayes)
                <tr>
                    <td>{{ $bayes['id'] }}</td>
                    <td>{{ $bayes['nama_penyakit'] }}</td>
                    <td>{{ $bayes['result'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
