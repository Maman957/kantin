<div class="row tm-content-row tm-mt-big">
    <div class="col-xl-12 col-lg-12 tm-md-12 tm-sm-12 tm-col">
        <div class="bg-light tm-block h-100">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <a href="<?= base_url('cetak') ?>" class="btn btn-small btn-primary m-1">Cetak Data</a>
                </div>
                <div class="col-md-3 col-sm-12 text-right">

                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered tm-table-striped-even mt-3">
                    <thead>
                        <tr class="tm-bg-gray">
                            <th scope="col" width="3%">No</th>
                            <th scope="col">Nama Pembeli</th>
                            <th scope="col" class="text-center">Nama Produk</th>
                            <th scope="col" class="text-center">Harga Satuan</th>
                            <th scope="col" class="text-center">Jumlah</th>
                            <th scope="col" class="text-center">Tanggal Pembelian</th>
                            <th scope="col" class="text-center">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        function formatRupiah($angka)
                        {
                            return 'Rp' . number_format($angka, 0, ',', '.');
                        };
                        foreach ($produk as $item) { ?>
                            <tr class="tm-bg-white">
                                <td class="tm-product-name"><?= $no++; ?></td>
                                <td class="tm-product-name"><?= $item->nama_pengguna; ?></td>
                                <td class="text-center"><?= $item->nama_produk; ?></td>
                                <td class="text-right"><?= formatRupiah($item->harga_jual); ?></td>
                                <td class="text-center"><?= $item->jumlah; ?></td>
                                <td class="text-center"><?= $item->tanggal_penjualan; ?></td>
                                <td class="text-right"><?= formatRupiah($item->harga); ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-center"><b>Total Penghasilan</b></td>
                            <td class="tm-bg-white text-right"><b><?= formatRupiah($total['total_harga']) ?></b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>