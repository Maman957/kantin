<div class="content">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Ubah Produk
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <!-- END: Profile Menu -->
        <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
            <!-- BEGIN: Display Information -->
            <div class="intro-y box lg:mt-5">
                <div class="p-5">
                    <div class="flex-col-reverse xl:flex-row flex-col">
                        <div class="flex-1 mt-6 xl:mt-0">
                            <form method="post" action="<?= base_url('update_produk') ?>" enctype="multipart/form-data">
                                <div class="grid grid-cols-12 gap-x-5">
                                    <div class="col-span-12 2xl:col-span-4">
                                        <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
                                        <div>
                                            <label for="update-profile-form-1" class="form-label">Nama Produk</label>
                                            <input id="update-profile-form-1" type="text" class="form-control" name="nama" placeholder="Nama produk" value="<?= $produk['nama_produk'] ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="update-profile-form-3" class="form-label">Stok Produk</label>
                                            <input id="update-profile-form-1" type="number" class="form-control" name="stok" placeholder="Masukkan stok produk" value="<?= $produk['stok'] ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="update-profile-form-2" class="form-label">Kategori</label><br>
                                            <input class="form-check-input" type="radio" id="kategori" name="kategori" value="1" <?php if ($produk['id_kategori'] == '1') echo 'checked'; ?>>
                                            <label class="form-check-label" for="kategori">Makanan</label><br>
                                            <input class="form-check-input" type="radio" id="kategori" name="kategori" value="2" <?php if ($produk['id_kategori'] == '2') echo 'checked'; ?>>
                                            <label class="form-check-label" for="kategori">Minuman</label>
                                        </div>
                                    </div>
                                    <div class="col-span-12 2xl:col-span-5">
                                        <div>
                                            <label for="update-profile-form-4" class="form-label">Harga Beli</label>
                                            <input id="update-profile-form-4" type="number" class="form-control" name="harga_beli" placeholder="Rp0" value="<?= $produk['harga_beli'] ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="update-profile-form-4" class="form-label">Harga Jual</label>
                                            <input id="update-profile-form-4" type="number" class="form-control" name="harga_jual" placeholder="Rp0" value="<?= $produk['harga_jual'] ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="update-profile-form-5" class="form-label">Deskripsi Produk</label>
                                            <textarea id="update-profile-form-5" class="form-control" name="deskripsi" placeholder="Deskripsi produk" required><?= $produk['deskripsi'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-span-12 2xl:col-span-3">
                                        <div class="w-52 mx-auto xl:mr-0 xl:ml-5">
                                            <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                                <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                    <input type="file" id="fileInput" style="display: none" accept="image/*" name="gambar" value="<?= $produk['gambar'] ?>" />
                                                    <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                        <img id="image" class="rounded-md" src="<?= base_url('assets/img/produk/' . $produk['gambar']) ?>" alt=" Click to upload image">
                                                    </div>
                                                    <input type="hidden" name="gambar_lama" value="<?= $produk['gambar'] ?>" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-20 mt-3">Simpan</button>
                                    <a href="<?= base_url('produk') ?>"><button type="button" class="btn btn-danger w-20 mt-3">Kembali
                                        </button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('fileInput');
        const image = document.getElementById('image');

        image.addEventListener('click', function() {
            fileInput.click();
        });

        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    image.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>