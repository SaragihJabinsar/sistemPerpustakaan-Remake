<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Anggota</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            background-color: #ffffff;
            margin: 40px;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            border-bottom: 2px solid #4f46e5;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px 10px;
            border: 1px solid #ccc;
            font-size: 12px;
        }

        thead {
            background-color: #4f46e5;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #e0e7ff;
        }

        .footer {
            text-align: center;
            font-size: 10px;
            margin-top: 50px;
            color: #888;
        }
    </style>
</head>
<body>
    <h1>Data Anggota</h1>
    <table>
        <thead>
            <tr>
                <th>ID Anggota</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Jenis Kelamin</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $anggota)
                <tr>
                    <td>{{ $anggota->idAnggota }}</td>
                    <td>{{ $anggota->nama }}</td>
                    <td>{{ $anggota->alamat }}</td>
                    <td>{{ $anggota->status }}</td>
                    <td>{{ $anggota->jenisKelamin }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: {{ \Carbon\Carbon::now('Asia/Jakarta')->format('d-m-Y H:i') }} WIB
    </div>

</body>
</html>
