<div class="content">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Laporan Penjualan Bulan Ini
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <div class="flex w-full sm:w-auto">
                <div class="w-48 relative text-slate-500"></div>
            </div>
            <div class="hidden xl:block mx-auto text-slate-500"></div>
            <div class="w-full xl:w-auto flex flex-wrap xl:flex-nowrap items-center gap-y-3 mt-3 xl:mt-0">
                <a href="<?= base_url('cetak') ?>" class="btn btn-primary shadow-md mr-2"> <i data-lucide="printer" class="w-4 h-4"></i></a>
            </div>
        </div>
        <!-- END: Profile Menu -->
        <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
            <!-- BEGIN: Display Information -->
            <div class="intro-y box lg:mt-2">
                <div class="p-5">
                    <div class="flex-col-reverse xl:flex-row flex-col">
                        <div class="flex-1 mt-6 xl:mt-0">

                            <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
                                <div class="table-responsive">
                                    <table class="table table-bordered tm-table-striped-even mt-3">
                                        <thead>
                                            <tr class="tm-bg-gray">
                                                <th scope="col" width="3%">No</th>
                                                <th scope="col" class="text-center" width="15%">Nama Pembeli</th>
                                                <th scope="col" class="text-center">Produk</th>
                                                <th scope="col" class="text-center" width="15%">Tanggal Pembelian</th>
                                                <th scope="col" class="text-center" width="15%">Total Harga</th>
                                                <th scope="col" class="text-center" width="12%">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            function tanggal_indo($tanggal)
                                            {
                                                $bulan = array(
                                                    1 => 'Januari',
                                                    'Februari',
                                                    'Maret',
                                                    'April',
                                                    'Mei',
                                                    'Juni',
                                                    'Juli',
                                                    'Agustus',
                                                    'September',
                                                    'Oktober',
                                                    'November',
                                                    'Desember'
                                                );
                                                $pecahkan = explode('-', $tanggal);
                                                return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
                                            }
                                            $no = 1;
                                            function formatRupiah($angka)
                                            {
                                                return 'Rp' . number_format($angka, 0, ',', '.');
                                            };
                                            foreach ($laporan as $item): ?>
                                                <tr class="tm-bg-white">
                                                    <td class="tm-product-name"><?= $no++; ?></td>
                                                    <td class="tm-product-name"><?= $item['nama_pengguna']; ?></td>
                                                    <td>
                                                        <?php
                                                        $produkStr = '';
                                                        $na = 'a';
                                                        foreach ($item['produk'] as $produk) :
                                                            $produkStr .= $na++ . '. ' . $produk->nama_produk . ' - ' . $produk->deskripsi . ' x ' . $produk->jumlah . ' produk. <br>';
                                                        endforeach;
                                                        echo $produkStr;
                                                        ?>
                                                    </td>
                                                    <td><?= tanggal_indo(date('Y-m-d', strtotime($item['tanggal_penjualan']))); ?></td>
                                                    <td class="text-right"><?= formatRupiah($item['total_harga']); ?></td>
                                                    <td>
                                                        <?php if ($item['metode_pembayaran'] == 1): ?>
                                                            <div class="whitespace-nowrap text-primary"> Lunas Tunai </div>
                                                        <?php elseif ($item['metode_pembayaran'] == 2): ?>
                                                            <div class="whitespace-nowrap text-success"> Lunas Non Tunai </div>
                                                        <?php else: ?>
                                                            <div class="whitespace-nowrap text-danger"> Hutang </div>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>

                                            <tr>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>