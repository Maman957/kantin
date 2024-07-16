<div class="row tm-content-row tm-mt-big">
    <div class="col-xl-12 col-lg-12 tm-md-12 tm-sm-12 tm-col">
        <div class="bg-light tm-block h-100">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <a href="<?= base_url('tambah_akun') ?>" class="btn btn-small btn-primary m-1">Tambah Pengguna</a>
                </div>
                <div class="col-md-3 col-sm-12 text-right">
                    <form action="<?= base_url('akun') ?>" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Mencari.." name="keyword" autocomplete="off">
                            <button class="btn btn-small btn-white" type="submit" name="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered tm-table-striped-even mt-3">
                    <thead>
                        <tr class="tm-bg-gray">
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col" class="text-center">Gambar</th>
                            <th scope="col" class="text-center">Username</th>
                            <th scope="col" class="text-center">Alamat</th>
                            <th scope="col" class="text-center">No Telepon</th>
                            <th scope="col" class="text-center">Role</th>
                            <th scope="col" class="text-center" width="11%">Update</th>
                            <th scope="col" class="text-center" width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pengguna as $item) { ?>
                            <tr class="tm-bg-white">
                                <td class="tm-product-name"><?= $no++; ?></td>
                                <td class="tm-product-name"><?= $item->nama_pengguna; ?></td>
                                <td class="text-center"><?php if ($item->foto == null) {
                                                        ?> <img src="<?= base_url() ?>assets/img/produk/profil.png" height="100px"> <?php
                                                                                                                                } else {
                                                                                                                                    ?> <img src="<?= base_url() ?>assets/img/produk/<?= $item->foto ?>" height="100px"> <?php
                                                                                                                                                                                                                    } ?></td>
                                <td class="text-center"><?= $item->username; ?></td>
                                <td class="text-center"><?= $item->alamat; ?></td>
                                <td class="text-center"><?= $item->nomor_telepon; ?></td>
                                <td class="text-center"><?php if ($item->role == 1) {
                                                            echo 'Admin';
                                                        } else {
                                                            echo 'Pelanggan';
                                                        } ?>
                                <td class="text-center"><?= $item->tanggal_update; ?></td>
                                <td class="text-center"><i class="fas fa-trash-alt tm-trash-icon m-2" id="btn-hapus" onclick="konfirmHapus(<?= $item->id_pengguna ?>)" type="button"></i>
                                    <a href="<?= base_url() ?>ubah_akun/<?= $item->id_pengguna ?>"><i class="fas fa-pencil-alt tm-trash-icon m-2" type="button"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script>
        function konfirmHapus(id) {
            Swal.fire({
                title: "Apakah Anda ingin menghapus pengguna ini?",
                text: "Data pengguna tidak dapat dipulihkan setelah dihapus!",
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