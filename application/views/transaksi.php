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
                        <th class="whitespace-nowrap">Produk</th>
                        <th class="text-right whitespace-nowrap">Harga Satuan</th>
                        <th class="text-center whitespace-nowrap">Jumlah</th>
                        <th class="text-right whitespace-nowrap">Total Harga</th>
                        <th class="text-center whitespace-nowrap">Tgl Pembelian</th>
                        <th class="text-center whitespace-nowrap">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transaksi as $item) : ?>
                        <tr class="intro-x">
                            <td class="!py-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 image-fit zoom-in">
                                        <img alt="Midone - HTML Admin Template" class="rounded-lg border-1 border-white shadow-md tooltip" src="<?= base_url() ?>assets/img/produk/<?= $item->gambar ?>">
                                    </div>
                                    <a href="" class="font-medium whitespace-nowrap ml-4"><?= $item->nama_produk; ?></a>
                                </div>
                            </td>
                            <td class="text-right whitespace-nowrap">Rp<?= number_format($item->harga_jual, 0, ',', '.') ?></td>
                            <td class="text-center whitespace-nowrap"><?= $item->jumlah ?></td>
                            <td class="text-right whitespace-nowrap">Rp<?= number_format($item->harga, 0, ',', '.') ?></td>
                            <td class="text-center whitespace-nowrap"><?= $item->tanggal_penjualan ?></td>
                            <td>
                                <?php if ($item->metode_pembayaran == 1) { ?>
                                    <div class="text-center whitespace-nowrap text-success"> Lunas Tunai </div>
                                <?php } elseif ($item->metode_pembayaran == 2) { ?>
                                    <div class="text-center whitespace-nowrap text-success"> Lunas Non Tunai </div>
                                <?php } else { ?>
                                    <div class="text-center whitespace-nowrap text-danger"> Hutang </div>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($item->metode_pembayaran == 0) { ?>
                                    <a class="btn btn-sm btn-rounded-success text-white">Terbayar Tunai</a>
                                    <a class="btn btn-sm btn-rounded-success text-white">Terbayar Non Tunai</a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>