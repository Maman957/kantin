<head>
    <title>Kantin LP3I Yogyakarta - Pembayaran Non-Tunai Menggunakan QR Code</title>
    <link rel="shortcut icon" href="<?= base_url('assets/img/icon.png') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pembayaran non-tunai menggunakan QR code untuk Kantin LP3I Yogyakarta">
    <meta name="keywords" content="QR code payment, Kantin LP3I Yogyakarta, non-tunai payment">
    <link rel="stylesheet" href="<?= site_url('asset') ?>/admin/dist/css/app.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
    <script src="<?= base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
    <style>
        .container {
            width: 80%;
            margin: 40px auto;
            text-align: center;
            background-color: #F7F7F7;
            /* Light gray background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .qr-code-container {
            background-color: #1e3a8a;
            /* Dark blue background */
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
        }

        .qr-code-container img {
            width: 400px;
            height: 400px;
            background-color: #FFFFFF;
            /* White background */
            padding: 10px;
            border-radius: 10px;
        }

        .payment-info {
            margin-top: 20px;
            text-align: center;
        }

        .payment-info h2 {
            margin-top: 0;
        }

        .payment-info ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .payment-info li {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="intro-y text-lg text-3xl mt-10 mb-5"><strong>Pembayaran Non-Tunai Menggunakan QR Code</strong></h1>
        <div class="qr-code-container">
            <img src="<?= base_url() ?>assets/img/produk/qr.jpg" alt="QR Code">
            <p class="text-white mt-2">Pindai untuk membayar</p>
        </div>
        <?php
        /* function formatRupiah($angka)
        {
            return 'Rp' . number_format($angka, 0, ',', '.');
        }
        foreach ($produk as $item) {
            $subtotal = $item['jumlah'] * $item['harga_jual'];
            $total += $subtotal;
        } */ ?>
        <div class="payment-info">
            <h2 class="intro-y text-lg font-medium mt-10">Total yang harus dibayar</h2>
        </div>
        <a href="<?= base_url('terbayar/') ?>"><button type="button" class="btn btn-primary w-20 mt-3 mr-5">Terbayar</button></a>
        <a href="<?= base_url('keranjang') ?>"><button type="button" class="btn btn-danger w-20 mt-3 ml-5">Batal
            </button></a>
    </div>

</body>