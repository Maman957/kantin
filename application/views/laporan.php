<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        Laporan Penjualan
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <div class="flex w-full sm:w-auto">
                <div class="w-48 relative text-slate-500"></div>
            </div>
            <div class="hidden xl:block mx-auto text-slate-500"></div>
            <div class="w-full xl:w-auto flex flex-wrap xl:flex-nowrap items-center gap-y-3 mt-3 xl:mt-0">
                <a href="<?= base_url('cetak') ?>" class="btn btn-primary shadow-md mr-2"> <i data-lucide="printer" class="w-4 h-4"></i></a>
            </div>
        </div>
        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
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