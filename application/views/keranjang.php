<div class="content">
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Keranjang
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="<?= site_url('katalog') ?>" class="btn btn-primary shadow-md mr-2">Lanjut Belanja</a>
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
                        <select class="w-48 xl:w-auto form-select box border-b border-slate-200/60 dark:border-darkmode-400 mr-6">
                            <option value="">Metode pembayaran</option>
                            <option value="1">Tunai</option>
                            <option value="2">Non tunai</option>
                            <option value="0">Hutang</option>
                        </select>
                        <a href="<?= site_url('dashboard/checkout') ?>" class="btn btn-primary shadow-md mr-2 ml-2">CHECKOUT </a>
                    </div>
                </div>
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">Hapus</th>
                                <th class="whitespace-nowrap !py-5">Produk</th>
                                <th class="whitespace-nowrap text-right">Harga satuan</th>
                                <th class="whitespace-nowrap text-center">Jumlah</th>
                                <th class="whitespace-nowrap text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="list-data">
                            <tr>
                                <td colspan="4"></td>
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