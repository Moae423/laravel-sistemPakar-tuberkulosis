<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cases Report</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .header img {
            max-height: 80px;
        }
    </style>

</head>

<body>
    <div class="header" style="display: flex;
            justify-content: space-between;
            margin-bottom: 25px;">
        <div>
            <img src="logo.png" alt="Logo">
        </div>
        <div>
        </div>
    </div>
    
    <h2>Puskesmas Padang Luar</h2>
    <div class="identitas">
        <strong>Nama Pasien : {{ Auth::user()->nama }}</strong><br>
    </div>
    <table style="border-collapse: collapse;">
        <thead>
            <tr>
                <th scope="col">Nomor</th>
                <th scope="col">Nama Pasien</th>
                <th scope="col">Nama Penyakit</th>
                <th scope="col">Result</th>
                <th scope="col">Tanggal</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @php
                $no = 1;
            @endphp

            @foreach($results as $result)
            <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $result->nama }}</td>
                <td>{{ $result->nama_penyakit }}</td>
                <td>{{ number_format($result->result * 100) }}%</td>
                <td>{{ $result->created_at->format('d-m-Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
