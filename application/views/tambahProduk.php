<div class="content">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Tambah Produk
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <!-- END: Profile Menu -->
        <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
            <!-- BEGIN: Display Information -->
            <div class="intro-y box lg:mt-5">
                <div class="p-5">
                    <div class="flex flex-col-reverse xl:flex-row flex-col">
                        <div class="flex-1 mt-6 xl:mt-0">
                            <form method="post" action="<?= base_url('simpan_produk') ?>" enctype="multipart/form-data">
                                <div class="grid grid-cols-12 gap-x-5">
                                    <div class="col-span-12 2xl:col-span-6">
                                        <div>
                                            <label for="update-profile-form-1" class="form-label">Nama Produk</label>
                                            <input id="update-profile-form-1" type="text" class="form-control" name="nama" placeholder="Nama produk" required>
                                        </div>
                                        <div class="mt-3">
                                            <label for="update-profile-form-1" class="form-label">Gambar Produk</label>
                                            <input id="update-profile-form-1" class="form-control" name="gambar" type="file" required></input>
                                        </div>
                                        <div class="mt-4">
                                            <label for="update-profile-form-4" class="form-label">Harga Beli</label>
                                            <input id="update-profile-form-4" type="number" class="form-control" name="harga_beli" placeholder="Rp0" required>
                                        </div>
                                    </div>
                                    <div class="col-span-12 2xl:col-span-6">
                                        <div class="mt-3 2xl:mt-0">
                                            <label for="update-profile-form-3" class="form-label">Stok Produk</label>
                                            <input id="update-profile-form-1" type="number" class="form-control" name="stok" placeholder="Masukkan stok produk" required>
                                        </div>
                                        <div class="mt-3">
                                            <label for="update-profile-form-2" class="form-label">Kategori</label><br>
                                            <input type="radio" id="kategori" name="kategori" value="1">
                                            <label for="kategori">Makanan</label>
                                            <input class="ml-3" type="radio" id="kategori" name="kategori" value="2">
                                            <label for="kategori">Minuman</label>
                                        </div>
                                        <div class="mt-5">
                                            <label for="update-profile-form-4" class="form-label">Harga Jual</label>
                                            <input id="update-profile-form-4" type="number" class="form-control" name="harga_jual" placeholder="Rp0" required>
                                        </div>
                                    </div>
                                    <div class="col-span-12">
                                        <div class="mt-3">
                                            <label for="update-profile-form-5" class="form-label">Deskripsi Produk</label>
                                            <textarea id="update-profile-form-5" class="form-control" name="keterangan" placeholder="Deskripsi produk" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary w-20 mt-3">Simpan</button>
                                <a href="<?= base_url('produk') ?>"><button type="button" class="btn btn-danger w-20 mt-3">Kembali
                                    </button></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>