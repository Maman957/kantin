<div class="row tm-mt-big">
    <div class="col-xl-12 col-lg-10 col-md-12 col-sm-12">
        <div class="bg-white tm-block">
            <div class="row">
                <div class="col-12">
                    <h2 class="tm-block-title d-inline-block">Tambah Produk</h2>
                </div>
            </div>
            <div class="row mt-4 tm-edit-product-row">
                <div class="col-xl-7 col-lg-7 col-md-12">
                    <form method="post" action="<?= base_url('simpan_produk') ?>" enctype="multipart/form-data" class="tm-edit-product-form">
                        <div class="input-group mb-3">
                            <label for="nama" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">
                                Nama
                            </label>
                            <input id="nama" name="nama" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" required>
                        </div>
                        <div class="input-group mb-3">
                            <label for="kategori" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Kategori</label>
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-7">
                                <input type="radio" id="kategori" name="kategori" value="1">
                                <label for="kategori">Makanan</label><br>
                                <input type="radio" id="kategori" name="kategori" value="2">
                                <label for="kategori">Minuman</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label for="harga_beli" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">
                                Harga Beli
                            </label>
                            <input id="harga_beli" name="harga_beli" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" required>
                        </div>
                        <div class="input-group mb-3">
                            <label for="harga_jual" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">
                                Harga Jual
                            </label>
                            <input id="harga_jual" name="harga_jual" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" required>
                        </div>
                        <div class="input-group mb-3">
                            <label for="stok" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">
                                Stok
                            </label>
                            <input id="stok" name="stok" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-7 col-sm-7" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                <button type="submit" class="btn btn-primary m-1">Simpan
                                </button>
                                <a href="<?= base_url('produk') ?>"><button type="button" class="btn btn-danger m-1">Kembali
                                    </button></a>
                            </div>
                        </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 mx-auto mb-4">
                    <div class="tm-product-img-dummy mx-auto">
                        <input id="fileInput" name="gambar" type="file" style="display:none;" required />
                        <i class="fas fa-5x fa-cloud-upload-alt" onclick="document.getElementById('fileInput').click();"></i>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>