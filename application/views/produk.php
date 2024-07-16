<div class="row tm-content-row tm-mt-big">
    <div class="col-xl-12 col-lg-12 tm-md-12 tm-sm-12 tm-col">
        <div class="bg-light tm-block h-100">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <a href="<?= base_url('tambah_produk') ?>" class="btn btn-small btn-primary m-1">Tambah Produk</a>
                </div>
                <div class="col-md-3 col-sm-12 text-right">
                    <form action="<?= base_url('produk') ?>" method="post">
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
                            <th scope="col" width="3%">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col" class="text-center">Gambar</th>
                            <th scope="col" class="text-center">Harga Beli</th>
                            <th scope="col" class="text-center">Harga Jual</th>
                            <th scope="col" class="text-center">Stok</th>
                            <th scope="col" class="text-center" width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($produk as $item) { ?>
                            <tr class="tm-bg-white">
                                <td class="tm-product-name"><?= $no++; ?></td>
                                <td class="tm-product-name"><?= $item->nama_produk; ?></td>
                                <td class="text-center"><img src="<?= base_url() ?>assets/img/produk/<?= $item->gambar ?>" height="100px"></td>
                                <td class="text-center">Rp<?= $item->harga_beli; ?></td>
                                <td class="text-center">Rp<?= $item->harga_jual; ?></td>
                                <td class="text-center"><?= $item->stok; ?></td>
                                <td class="text-center"><i class="fas fa-trash-alt tm-trash-icon m-1" id="btn-hapus" onclick="konfirmHapus(<?= $item->id_produk ?>)" type="button"></i>
                                    <a href="<?= base_url() ?>ubah_produk/<?= $item->id_produk ?>"><i class="fas fa-pencil-alt tm-trash-icon m-1" type="button"></i></a>
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
                title: "Apakah Anda ingin menghapus produk ini?",
                text: "Data tidak dapat dipulihkan setelah dihapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Tidak jadi"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "<?= base_url('hapus_produk/') ?>" + id
                }
            });
        }
    </script>