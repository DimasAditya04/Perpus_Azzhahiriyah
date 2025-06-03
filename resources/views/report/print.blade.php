<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;

        }

        .triangle-text {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
            font-size: 0.9rem;
            font-weight: bold;
            line-height: 1;
            color: #6b7280;
            margin-top: 0;
        }

        .header-icon {
            margin-right: 12px;
            /* Jarak antara icon dan teks */
            margin-top: 0;
            margin-left: 30px;
        }

        .top-text {
            font-size: 0.9rem;
            letter-spacing: 0.1em;
            margin-bottom: 2px;
            margin-left: 30px;
            /* Hilangkan margin left */
        }

        .bottom-text {
            font-size: 0.9rem;
            letter-spacing: 0.2em;
            position: relative;
        }
    </style>
</head>

<body>
    <header>
        <img src="{{ public_path('azzhahiriyah.png') }}" width="80px" class="header-icon">
        <div class="triangle-text">
            <div class="top-text">YAYASAN</div>
            <div class="bottom-text">AZZHAHIRIYAH</div>
        </div>
    </header>
    <center>
        <h3>Laporan Peminjaman Buku</h3>
        <p><strong>Periode:</strong> {{ $tanggal_mulai->format('d M Y') }} - {{ $tanggal_selesai->format('d M Y') }}</p>

    </center>

    <table>
        <thead>
            <tr>
                <th>Nomor Peminjaman</th>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Total Denda</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $p)
                <tr>
                    <td>{{ $p->no_peminjaman }}</td>
                    <td>{{ $p->user->nama }}</td>
                    <td>{{ $p->buku->nama_buku }}</td>
                    <td>{{ Carbon\Carbon::parse($p->tgl_peminjaman)->format('d M Y') }}</td>
                    <td>{{ Carbon\Carbon::parse($p->tgl_pengembalian)->format('d M Y') }}</td>
                    <td>Rp. {{ $p->total_denda }}</td>
                    <td>{{ $p->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>