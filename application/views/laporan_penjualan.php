<html>

<head>
    <title>Laporan Data Akun</title>
    <style>
        .header {
            background: orange;
        }

        .container {
            width: 65%;
        }
    </style>
</head>

<body>
    <div class="container">
        <center>
            <h2> Laporan Data Akun</h2>
        </center>
        <hr><br>

        <table width="100%" border="1">
            <thead class="header">
                <th>No</th>
                <th>Nama</th>
                <th>Gambar</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($produk as $item) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $item->nama_produk; ?></td>
                        <td><img src="<?= base_url() ?>assets/img/produk/<?= $item->gambar ?>" height="100px"></td>
                        <td>Rp<?= $item->harga_beli; ?></td>
                        <td>Rp<?= $item->harga_jual; ?></td>
                        <td><?= $item->stok; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>