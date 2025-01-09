<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LEVCAFE - Struk {{$penjualan->id}}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="../../assets/images/logos/favicon.png" />
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        .receipt {
            max-width: 320px;
            margin: auto;
            background: #fff;
            padding: 10px;
            border: 1px solid #ddd;
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
        }
        .header h2 {
            font-size: 18px;
            margin-bottom: 5px;
        }
        .header p {
            margin: 0;
        }
        .table-receipt {
            width: 100%;
            margin-bottom: 10px;
        }
        .table-receipt td {
            padding: 2px;
        }
        .line {
            border-top: 1px dashed #000;
            margin: 8px 0;
        }
        .total {
            text-align: right;
            margin-bottom: 10px;
        }
        .footer {
            text-align: center;
        }
        .footer p {
            margin: 0;
        }
        .button {
            display: inline-block;
            margin-top: 15px;
            padding: 8px 16px;
            font-size: 14px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }
        .buttons {
            margin-top: 10px;
            text-align: center;
        }
        /* Hides the buttons when printing */
        @media print {
            .buttons {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="receipt">
        <!-- Header Section -->
        <div class="header">
            <h2><b>Levcafe</b></h2>
            <p>Nobon: {{ $penjualan->id }}</p>
            <p>Waktu: {{ $penjualan->created_at->format('d M Y H:i') }}</p>
        </div>

        <!-- Order Info Section -->
        <table class="table-receipt">
            <tr>
                <td>Atas Nama</td>
                <td>: {{ $penjualan->pelanggan->nama_pelanggan }}</td>
            </tr>
            <tr>
                <td>Kasir</td>
                <td>: {{ $penjualan->user->name }}</td>
            </tr>
        </table>

        <!-- Product List Section -->
        <div class="line"></div>
        @foreach($penjualan->detailpenjualan as $detail)
        <table class="table-receipt">
            <tr>
                <td>{{ $detail->jumlah }} {{ $detail->produk->nama_produk }}</td>
                <td style="text-align:right">{{ 'Rp ' . number_format($detail->harga, 0, ',', '.') }}</td>
            </tr>
        </table>
        @endforeach
        <div class="line"></div>

        <!-- Total Section -->
        <table class="table-receipt">
            <tr>
                <td>Subtotal</td>
                <td style="text-align:right">{{ 'Rp ' . number_format($penjualan->total, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Diskon</td>
                <td style="text-align:right">{{ $penjualan->diskon }}%</td>
            </tr>
            <tr>
                <td>Total Tagihan</td>
                <td style="text-align:right">{{ 'Rp ' . number_format($penjualan->total * (1 - $penjualan->diskon / 100), 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Total Bayar</td>
                <td style="text-align:right">{{ 'Rp ' . number_format($penjualan->bayar, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Kembalian</td>
                <td style="text-align:right">{{ 'Rp ' . number_format($penjualan->kembali, 0, ',', '.') }}</td>
            </tr>
        </table>

        <!-- Footer Section -->
        <div class="line"></div>
        <div class="footer">
            <p>Terima Kasih!</p>
            <p>{{$penjualan->pelanggan->nama_pelanggan}} The <b>{{$penjualan->pelanggan->level}}</b></p>
        </div>
    </div>
    <br>
    <!-- Buttons (Hidden on Print) -->
    <div class="buttons">
        <a class="btn btn-info" href="/penjualan">Kembali</a>
        <a href="javascript:window.print()" class="btn btn-warning">Cetak Struk</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
