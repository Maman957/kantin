<div class="row tm-mt-big">
    <div class="col-xl-12 col-lg-10 col-md-12 col-sm-12">
        <div class="bg-white tm-block">
            <div class="row mt-4">
                <br>
                <div class="col-xl-3 col-lg-3 mb-4 mx-auto">
                    <center>

                        <div class="tm-product-img-dummy">
                            <form method="post" action="<?= base_url('simpan_akun') ?>" enctype="multipart/form-data" class="tm-edit-product-form">
                                <input id="fileInput" name="foto" type="file" style="display:none;" required />
                                <i class="fas fa-5x fa-cloud-upload-alt" onclick="document.getElementById('fileInput').click();"></i>
                        </div>
                    </center>
                </div>
                <br>
                <div class="col-xl-8 col-lg-8 col-md-12">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input id="nama" name="nama" type="text" class="form-control validate">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input id="username" name="username" type="text" class="form-control validate">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" class="form-control validate">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" name="alamat" class="form-control validate"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nomor_telepon">Nomor Telepon</label>
                        <input id="nomor_telepon" name="nomor_telepon" type="tel" class="form-control validate">
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