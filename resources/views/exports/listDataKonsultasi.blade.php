<!DOCTYPE html>
<html>
<head>
    <title>Hasil Konsultasi</title>
    <style>
        h2 {
            text-align: center;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .footer {
            margin-top: 20px;
        }
        .footer th, .footer td {
            border: none;
        }
        * {
            font-family: 'Times New Roman', Times, serif;
        }
        .container {
            display: flex
        }
        .title {
            margin: auto;
            font-size: 40px;
        }
    </style>
</head>
<body>
    <table class="title">
        {{-- <th><img src="#" alt="Logo"></th>     --}}
        <th>PUSKESMAS PADANG LUAR</th>
        {{-- <th><img src="/image/1.png" alt="Logo"></th>     --}}
    </table>
    <hr>
    <h2 class="text-center">Lampiran Data Hasil Konsultasi Pasien TB 2024</h2>
    <table>
        <th></th>
        <th></th>
        <tr>
            <td>Penanggung Jawab</td>
            <td>:</td>
            <td>Dr. {{ Auth::user()->nama }}</td>
        </tr>
        <tr>
            <td>Kecamatan</td>
            <td>:</td>
            <td>Banu Hampu</td>
        </tr>
        <tr>
            <td>Tanggal Cetak: </td>
            <td>:</td>
            <td>{{ now()->format('d-m-Y H:i') }}</td>
        </tr>
    </table>
    <table class="table">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama Pasien</th>
                <th>Nama Penyakit</th>
                <th>Probability</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach($results as $result)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $result->nama }}</td>
                    <td>{{ $result->nama_penyakit }}</td>
                    <td>{{ number_format($result->result * 100) }}%</td>
                    <td>{{ $result->created_at->format('d-m-Y H:i') }}</td>
                    {{-- <td>{{ $result->dokterPenanggungJawab }}</td> <!-- Adjust this line based on your model --> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
