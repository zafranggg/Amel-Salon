<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 400px;
            margin: auto;
            font-size: 14px;
        }
        h2 {
            text-align: center;
            margin-bottom: 10px;
        }
        .info, .treatment, .total {
            margin-bottom: 15px;
        }
        .treatment li {
            list-style: none;
            padding: 3px 0;
            border-bottom: 1px dotted #ccc;
        }
        .right {
            float: right;
        }
        .clear {
            clear: both;
        }
        hr {
            border: 0;
            border-top: 1px solid #ccc;
        }
        .center {
            text-align: center;
            margin-top: 20px;
        }
        .small {
            font-size: 12px;
            color: #555;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>

    <h2>Amel Salon</h2>
    <p class="center small">Jl. Jambi - Muara Bulian, Mendalo Darat, Kec. Jambi Luar Kota, Kabupaten Muaro Jambi, Jambi - Telp: 0853-6693-9694</p>
    <hr>

    <div class="info">
        <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d-m-Y') }}</p>
        <p><strong>Nama Pelanggan:</strong> {{ $transaksi->pelanggan->nama_pelanggan ?? $transaksi->pelanggan_baru }}</p>
        <p><strong>Metode:</strong> {{ ucfirst($transaksi->metode_pembayaran) }}</p>
    </div>

    <div class="treatment">
        <p><strong>Daftar Treatment:</strong></p>
        <ul>
            @foreach ($transaksi->treatments as $t)
                <li>
                    {{ $t->nama_treatment }}
                    <span class="right">Rp {{ number_format($t->pivot->harga, 0, ',', '.') }}</span>
                    <div class="clear"></div>
                </li>
            @endforeach
        </ul>
    </div>

    <hr>

    <div class="total">
        <p><strong>Total:</strong> <span class="right">Rp {{ number_format($transaksi->total_pembayaran, 0, ',', '.') }}</span></p>
        <div class="clear"></div>
        <p><strong>Bayar:</strong> <span class="right">Rp {{ number_format($transaksi->uang_dibayar, 0, ',', '.') }}</span></p>
        <div class="clear"></div>
        <p><strong>Kembalian:</strong> <span class="right">Rp {{ number_format($transaksi->kembalian, 0, ',', '.') }}</span></p>
        <div class="clear"></div>
    </div>

    <hr>

    <div class="center">
        <p>~ Terima kasih telah berkunjung ~</p>
    </div>

</body>
</html>
