<div class="content">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <form action="<?= base_url('katalog') ?>" method="post">
                    <div class="w-56 relative text-slate-500">
                        <input type="text" class="form-control w-56 box pr-10" placeholder="Cari..." name="keyword">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search" type="submit"></i>
                    </div>
                </form>
            </div>
        </div>
        <!-- BEGIN: Users Layout -->
        <?php foreach ($produk as $item) : ?>
            <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
                <div class="box">
                    <div class="p-5">
                        <div class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t">
                            <img alt="Midone - HTML Admin Template" class="rounded-md" src="<?= base_url() ?>assets/img/produk/<?= $item->gambar ?>">
                            <span class="absolute top-0 bg-pending/80 text-white text-xs m-5 px-2 py-1 rounded z-10">New</span>
                            <div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <a href="" class="block font-medium text-base"><?= $item->nama_produk ?></a> </div>
                        </div>
                        <div class="text-slate-600 dark:text-slate-500 mt-5">
                            <div class="flex items-center"> <i data-lucide="link" class="w-4 h-4 mr-2"></i>
                                <h4 class="intro-y text-lg font-small"> Harga: <b>Rp <?= number_format($item->harga_jual, 0, ',', '.') ?> </b></h4>
                            </div>
                            <div class="flex items-center mt-2"> <i data-lucide="layers" class="w-4 h-4 mr-2"></i> Stok: <?= number_format($item->stok, 0, ',', '.') ?> </div>
                        </div>
                    </div>
                    <div class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60">
                        <form id="form-keranjang">
                            <input type="hidden" name="id_produk" value="<?= $item->id_produk; ?>">
                            <input type="hidden" name="id_pengguna" value="<?= $this->session->userdata('id_pengguna') ?>">
                            <button class="flex items-center btn btn-sm btn-primary mr-3" onclick="simpanKeranjang()"> <i data-lucide="shopping-cart" class="w-4 h-4 mr-1"></i> Keranjang </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>