<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        History Transaksi
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <div class="flex w-full sm:w-auto">
                <select class="w-48 xl:w-auto form-select box ml-2" onchange="navigateToPage(this)">
                    <option hidden>Status</option>
                    <option value="<?= base_url('transaksi') ?>">Semua</option>
                    <option value="<?= base_url('tunai/1') ?>">Lunas Tunai</option>
                    <option value="<?= base_url('nontunai/2') ?>">Lunas Non Tunai</option>
                    <option value="<?= base_url('hutang/0') ?>">Hutang</option>
                </select>
            </div>
            <div class="hidden xl:block mx-auto text-slate-500"></div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap" width="15%">Tanggal Pembelian</th>
                        <th class="text-center whitespace-nowrap">Produk</th>
                        <th class="text-right whitespace-nowrap" width="15%">Total Harga</th>
                        <th class="text-center whitespace-nowrap" width="12%">Status</th>
                        <th class="text-center whitespace-nowrap" width="22%"></th>
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
                    foreach ($transaksi_lengkap as $laporan) : ?>
                        <tr class="intro-x">
                            <td class="!py-4">
                                <div class="flex items-center">
                                    <a href="" class="font-medium whitespace-nowrap ml-4"><?= tanggal_indo(date('Y-m-d', strtotime($laporan['tanggal_penjualan']))); ?></a>
                                </div>
                            </td>
                            <td class="whitespace-nowrap">
                                <?php
                                $produkStr = '';
                                $na = 1;
                                foreach ($laporan['produk'] as $produk) :
                                    $produkStr .= $na++ . '. ' . $produk->nama_produk . ' - ' . $produk->deskripsi . ' x ' . $produk->jumlah . ' produk. <br>';
                                endforeach;
                                echo $produkStr;
                                ?>
                            </td>
                            <td class="text-right whitespace-nowrap">Rp<?= number_format($laporan['total_harga'], 0, ',', '.') ?></td>
                            <td>
                                <?php if ($laporan['metode_pembayaran'] == 1) { ?>
                                    <div class="whitespace-nowrap text-primary"> Lunas Tunai </div>
                                <?php } elseif ($laporan['metode_pembayaran'] == 2) { ?>
                                    <div class="whitespace-nowrap text-success"> Lunas Non Tunai </div>
                                <?php } else { ?>
                                    <div class="whitespace-nowrap text-danger"> Hutang </div>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($laporan['metode_pembayaran'] == 0) { ?>
                                    <div style="display: flex; gap: 0.5rem;">
                                        <form action="<?= base_url('update_status') ?>" method="post">
                                            <input type="hidden" name="id_penjualan" value="<?= $laporan['id_penjualan'] ?>">
                                            <input type="hidden" name="metode" value="1">
                                            <button type="submit" class="btn btn-sm btn-rounded-primary text-white">Terbayar Tunai</button>
                                        </form>
                                        <form action="<?= base_url('update_status') ?>" method="post">
                                            <input type="hidden" name="id_penjualan" value="<?= $laporan['id_penjualan'] ?>">
                                            <input type="hidden" name="metode" value="2">
                                            <button type="submit" class="btn btn-sm btn-rounded-success text-white">Terbayar Non Tunai</button>
                                        </form>
                                    </div>
                                <?php } ?>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>