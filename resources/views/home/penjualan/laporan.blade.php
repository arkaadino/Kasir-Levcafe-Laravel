<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LEVCAFE - Laporan Penjualan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="../../assets/images/logos/favicon.png" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .table-header {
            text-align: center;
            margin-bottom: 15px;
        }
        .table-responsive {
            max-width: 1000px;
            margin: 0 auto;
            padding: 15px;
         }

        @media print {
            .buttons {
                display: none;
            }
        }

    </style>
</head>
<body>
    <div class="buttons">
        <a class="btn btn-info btn-back" href="/penjualan">Kembali</a>
        <a href="javascript:window.print()" class="btn btn-warning btn-back">Cetak Laporan</a>
    </div>
    <br>
    <div class="table-header">
        <h1><b>LEVCAFE</b></h1>
        <p>Laporan Penjualan</p>
    </div>

    <!-- Tabel Penjualan -->
    <div class="table-responsive">
        <table class="table table-bordered" id="datatable">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Nama User</th>
                    <th scope="col">Total</th>
                    <th scope="col">Diskon</th>
                    <th scope="col">Bayar</th>
                    <th scope="col">Kembali</th>
                    <th scope="col">Layanan</th>
                    <th scope="col">Tanggal</th>
                </tr>
            </thead>
            <tbody id="table-body">
                @foreach($penjualan as $penjualan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $penjualan->pelanggan->nama_pelanggan }}</td>
                    <td>{{ $penjualan->user->name}}</td>
                    <td>{{ 'Rp ' . number_format($penjualan->total, 0, ',', '.') }}</td>
                    <td>{{ $penjualan->diskon}}</td>
                    <td>{{ 'Rp ' . number_format($penjualan->Bayar, 0, ',', '.') }}</td>
                    <td>{{ 'Rp ' . number_format($penjualan->Kembali, 0, ',', '.') }}</td>
                    <td>{{ $penjualan->Layanan}}</td>
                    <td>{{ $penjualan->created_at->format('Y-m-d') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
