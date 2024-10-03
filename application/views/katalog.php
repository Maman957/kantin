<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        Katalog Produk Kantin Kejujuran
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <div class="flex w-full sm:w-auto">
                <form action="<?= base_url('katalog') ?>" method="post">
                    <div class="w-56 relative text-slate-500">
                        <input type="text" class="form-control w-56 box pr-10" placeholder="Cari..." name="keyword">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search" type="submit"></i>
                    </div>
                </form>
                <select class="w-48 xl:w-auto form-select box ml-2" onchange="navigateToPage(this)">
                    <option value="">Kategori</option>
                    <option value="<?= base_url('katalog') ?>">Semua</option>
                    <option value="<?= base_url('makanan/1') ?>">Makanan</option>
                    <option value="<?= base_url('minuman/2') ?>">Minuman</option>
                </select>
            </div>
            <div class="hidden xl:block mx-auto text-slate-500"></div>
            <div class="w-full xl:w-auto flex flex-wrap xl:flex-nowrap items-center gap-y-3 mt-3 xl:mt-0">
            </div>
        </div>
        <?php foreach ($produk as $item) : ?>
            <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
                <div class="box">
                    <div class="p-5">
                        <img alt="Midone - HTML Admin Template" class="rounded-md" src="<?= base_url() ?>assets/img/produk/<?= $item->gambar ?>">
                        <div class="text-slate-600 dark:text-slate-500 mt-5">

                            <div class="flex items-center">
                                <h5 class="intro-y text-lg font-small"><?= $item->nama_produk ?> </b></h5>
                            </div>
                            <div class="flex items-center">
                                <h4 class="intro-y text-lg font-small"><b>Rp <?= number_format($item->harga_jual, 0, ',', '.') ?> </b></h4>
                            </div>
                            <div class="flex items-center mt-2"><?= $item->deskripsi ?> </div>
                            <div class="flex items-center mt-2"> <i data-lucide="layers" class="w-4 h-4 mr-2"></i> Stok <?= number_format($item->stok, 0, ',', '.') ?> | <?php if ($item->jumlah_terjual > 0) {
                                                                                                                                                                                echo number_format($item->jumlah_terjual, 0, ',', '.');
                                                                                                                                                                            } else {
                                                                                                                                                                                echo 0;
                                                                                                                                                                            }
                                                                                                                                                                            ?> terjual </div>
                        </div>
                    </div>
                    <div class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60">
                        <form action="<?= base_url('simpan_keranjang') ?>" method="post">
                            <input type="hidden" name="id_produk" value="<?= $item->id_produk; ?>">
                            <input type="hidden" name="id_pengguna" value="<?= $this->session->userdata('id_pengguna') ?>">
                            <input type="hidden" name="jumlah" value="1">
                            <button class="flex items-center btn btn-sm btn-primary mr-1" type="submit"> <i data-lucide="shopping-cart" class="w-4 h-4 mr-1"></i> Keranjang </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>