<div class="content">
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Keranjang Pembelian
        </h2>
        <?php if ($this->session->flashdata('success')): ?>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 mt-6 -mb-6 intro-y">
                    <div class="alert alert-dismissible show box bg-primary text-white flex items-center mb-6" role="alert">
                        <span><?= $this->session->flashdata('success'); ?> Terima kasih, <b><?php echo $this->session->userdata('nama_pengguna') ?></b>, sudah berbelanja di Kantin Kejujuran kami. Semoga puas dengan layanan kami dan sampai jumpa lagi!</span>
                        <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close">
                            <i data-lucide="x" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 mt-6 -mb-6 intro-y">
                    <div class="alert alert-dismissible show box bg-danger text-white flex items-center mb-6" role="alert">
                        <span>Mohon maaf, <b><?php echo $this->session->userdata('nama_pengguna') ?></b>, <?= $this->session->flashdata('error'); ?> Silakan kembali berbelanja setelah stok tersedia. Terima kasih atas pengertiannya!</span>
                        <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close">
                            <i data-lucide="x" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="<?= site_url('katalog') ?>" class="btn btn-success text-white shadow-md mr-2">Lanjut Belanja</a>
            <a href="<?= base_url('hapus_keranjang/' . $this->session->userdata('id_pengguna')) ?>" class="btn btn-danger shadow-md mr-2" onclick="return confirm('Apakah Anda ingin menghapus data produk ini?\nData produk tidak dapat dipulihkan setelah dihapus!')">Hapus Semua</a>
        </div>
    </div>
    <!-- BEGIN: Transaction Details -->
    <div class="intro-y grid grid-cols-11 gap-5 mt-5">

        <div class="col-span-12 lg:col-span-12 2xl:col-span-8">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Detail Pesanan</div>
                    <div class="flex items-center ml-auto ">
                        <form action="<?= base_url('checkout') ?>" method="post">
                            <select class="w-48 xl:w-auto form-select box border-b border-slate-200/60 dark:border-darkmode-400 mr-6" name="metode_pembayaran" id="metode_pembayaran">
                                <option value="0">Metode pembayaran</option>
                                <option value="1">Tunai</option>
                                <option value="2">Non tunai</option>
                                <option value="0">Hutang</option>
                            </select>
                            <button class="btn btn-primary shadow-md mr-2 ml-2" type="submit">CHECKOUT</button>
                        </form>
                    </div>
                </div>
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap !py-5">Produk</th>
                                <th class="whitespace-nowrap text-right" width="15%">Harga satuan</th>
                                <th class="whitespace-nowrap text-center" width="13%">Jumlah</th>
                                <th class="whitespace-nowrap text-right" width="15%">Subtotal</th>
                                <th class="whitespace-nowrap text-center" width="5%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="list-data">
                            <tr>
                                <td></td>
                                <td></td>
                                <td><strong>Total Harga</strong></td>
                                <td class="text-right"><strong id="total">0</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Transaction Details -->
</div>