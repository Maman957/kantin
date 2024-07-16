<div class="row tm-mt-big">
    <div class="col-xl-12 col-lg-10 col-md-12 col-sm-12">
        <div class="bg-white tm-block">
            <div class="row mt-4">
                <br>
                <div class="col-xl-3 col-lg-3 mb-4 mx-auto">
                    <center>
                        <div class="tm-product-img-dummy">
                            <form method="post" action="<?= base_url('upload_foto') ?>" enctype="multipart/form-data" class="tm-edit-product-form">
                                <input type="hidden" name="id_pengguna" value="<?= $pengguna['id_pengguna'] ?>">
                                <input id="fileInput" name="foto" type="file" style="display:none;" required />
                                <?php if ($pengguna['foto'] == null) {
                                ?> <i class="fas fa-5x fa-cloud-upload-alt" onclick="document.getElementById('fileInput').click();"></i> <?php
                                                                                                                                        } else {
                                                                                                                                            ?> <i class=" fas fa-5x" onclick="document.getElementById('fileInput').click();"><img src="<?= base_url('assets/img/produk/' . $pengguna['foto']) ?>" height="200px"></i> <?php
                                                                                                                                                                                                                                                                                                                    } ?>
                        </div>
                        <br>
                        <h2 class="tm-block-title d-inline-block mx-auto"><strong><?= $pengguna['nama_pengguna'] ?></strong></h2>
                        <h5 class="mx-auto"><?php if ($pengguna['role'] == 1) {
                                                echo 'Admin';
                                            } else {
                                                echo 'Pelanggan';
                                            } ?></h5><br>
                        <div class="mx-auto">
                            <button type="submit" class="btn btn-primary">Upload
                            </button>
                        </div>
                    </center>
                </div>
                </form>
                <br>
                <div class="col-xl-8 col-lg-8 col-md-12">

                    <form method="post" action="<?= base_url('update_akun') ?>" class="tm-edit-product-form">
                        <input type="hidden" name="id_pengguna" value="<?= $pengguna['id_pengguna'] ?>">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input value="<?= $pengguna['nama_pengguna'] ?>" id="nama" name="nama" type="text" class="form-control validate">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input value="<?= $pengguna['username'] ?>" id="username" name="username" type="text" class="form-control validate">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input value="<?= $pengguna['password'] ?>" id="password" name="password" type="password" class="form-control validate">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea id="alamat" name="alamat" class="form-control validate"><?= $pengguna['alamat'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="nomor_telepon">Nomor Telepon</label>
                            <input value="<?= $pengguna['nomor_telepon'] ?>" id="nomor_telepon" name="nomor_telepon" type="tel" class="form-control validate">
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <button type="submit" class="btn btn-primary">Simpan
                                </button>
                                <a href="<?= base_url('akun') ?>" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script>
    function konfirmHapus(id) {
        Swal.fire({
            title: "Apakah Anda ingin menghapus akun ini?",
            text: "Akun tidak dapat dipulihkan setelah dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Tidak jadi"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= base_url('hapus_akun/') ?>" + id
            }
        });
    }
</script>