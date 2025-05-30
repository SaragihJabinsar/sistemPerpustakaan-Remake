<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Buku</title>
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
    <h1>Data Buku</h1>
    <table>
        <thead>
            <tr>
                <th>ID Buku</th>
                <th>Judul Buku</th>
                <th>Kategori</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $buku)
                <tr>
                    <td>{{ $buku->idBuku }}</td>
                    <td>{{ $buku->judulBuku }}</td>
                    <td>{{ $buku->kategori }}</td>
                    <td>{{ $buku->pengarang }}</td>
                    <td>{{ $buku->penerbit }}</td>
                    <td>{{ $buku->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: {{ \Carbon\Carbon::now('Asia/Jakarta')->format('d-m-Y H:i') }} WIB
    </div>
</body>
</html>
