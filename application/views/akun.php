<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        Daftar Akun Pengguna
    </h2>
    <?php if ($this->session->flashdata('success')): ?>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="col-span-12 mt-6 -mb-6 intro-y">
                <div class="alert alert-dismissible show box bg-primary text-white flex items-center mb-6" role="alert">
                    <span>Selamat, <b><?php echo $this->session->userdata('nama_pengguna') ?></b>. <?= $this->session->flashdata('success'); ?></span>
                    <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i> </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="col-span-12 mt-6 -mb-6 intro-y">
                <div class="alert alert-dismissible show box bg-danger text-white flex items-center mb-6" role="alert">
                    <span>Mohon maaf, <b><?php echo $this->session->userdata('nama_pengguna') ?></b>. <?= $this->session->flashdata('error'); ?></span>
                    <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i> </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <div class="flex w-full sm:w-auto">
                <div class="w-48 relative text-slate-500">
                    <form action="<?= base_url('akun') ?>" method="post">
                        <div class="w-56 relative text-slate-500">
                            <input type="text" class="form-control w-56 box pr-10" placeholder="Cari..." name="keyword">
                            <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search" type="submit"></i>
                        </div>
                    </form>
                </div>
            </div>
            <div class="hidden xl:block mx-auto text-slate-500"></div>
            <div class="w-full xl:w-auto flex flex-wrap xl:flex-nowrap items-center gap-y-3 mt-3 xl:mt-0">
                <a href="<?= base_url('tambah_akun') ?>" class="btn btn-primary shadow-md mr-2"> <i data-lucide="plus" class="w-4 h-4"></i></a>

            </div>
        </div>
        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">No</th>
                        <th class="whitespace-nowrap">Akun</th>
                        <th class="text-center whitespace-nowrap">Username</th>
                        <th class="text-center whitespace-nowrap">Alamat</th>
                        <th class="text-center whitespace-nowrap">No Telepon</th>
                        <th class="text-center whitespace-nowrap">Role</th>
                        <th class="text-center whitespace-nowrap">Tgl Pembaruan</th>
                        <th class="text-center whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    function tanggal_indo($tanggal)
                    {
                        $bulan = array(
                            1 => 'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember'
                        );
                        $pecahkan = explode('-', $tanggal);
                        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
                    }
                    $no = 1;
                    foreach ($pengguna as $item) { ?>
                        <tr class="intro-x">
                            <td class="w-10">
                                <?= $no++; ?>
                            </td>
                            <td class="!py-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 image-fit zoom-in">
                                        <?php if ($item->foto == null) { ?>
                                            <img alt="Midone - HTML Admin Template" class="rounded-lg border-1 border-white shadow-md tooltip" src="<?= base_url() ?>assets/img/produk/profil.png">
                                        <?php } else { ?>
                                            <img alt="Midone - HTML Admin Template" class="rounded-lg border-1 border-white shadow-md tooltip" src="<?= base_url() ?>assets/img/produk/<?= $item->foto ?>">
                                        <?php } ?>
                                    </div>
                                    <a href="" class="font-medium whitespace-nowrap ml-4"><?= $item->nama_pengguna; ?></a>
                                </div>
                            </td>
                            <td class="whitespace-nowrap"><?= $item->username; ?></td>
                            <td class="whitespace-nowrap"><?= $item->alamat; ?></td>
                            <td class="whitespace-nowrap"><?= $item->nomor_telepon; ?></td>
                            <td class="whitespace-nowrap"><?php if ($item->role == 1) {
                                                                echo 'Admin';
                                                            } else {
                                                                echo 'Pelanggan';
                                                            } ?></td>
                            <td class="text-center whitespace-nowrap"><?= tanggal_indo(date('Y-m-d', strtotime($item->tanggal_update))) ?></td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="<?= base_url() ?>ubah_akun/<?= $item->id_pengguna ?>"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Ubah </a>
                                    <a class="flex items-center text-danger" href="<?= base_url('hapus_akun/' . $item->id_pengguna) ?>" onclick="return confirm('Apakah Anda ingin menghapus data pengguna ini?\nData pengguna tidak dapat dipulihkan setelah dihapus!')"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Hapus </a>
                                </div>
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