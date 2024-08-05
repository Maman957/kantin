<div class="content">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Profil
        </h2>
    </div>
    <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                    <?php if ($pengguna['foto'] == null) {
                    ?> <i class="rounded-full fas fa-5x fa-cloud-upload-alt" onclick="document.getElementById('fileInput').click();"><img src="<?= base_url('asset') ?>/user.png"></i> <?php
                                                                                                                                                                                    } else {
                                                                                                                                                                                        ?> <i class="rounded-full fas fa-5x" onclick="document.getElementById('fileInput').click();"><img src="<?= base_url('assets/img/produk/' . $pengguna['foto']) ?>" height="200px"></i> <?php
                                                                                                                                                                                                                                                                                                                                                                            } ?>
                </div>
                <div class="ml-5">
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg"><?= $pengguna['nama_pengguna'] ?></div>
                    <div class="text-slate-500"><?php if ($pengguna['role'] == 1) {
                                                    echo 'Admin Kantin';
                                                } else {
                                                    echo 'Pelanggan Kantin';
                                                } ?></div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-3">Kontak</div>
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                    <div class="truncate sm:whitespace-normal flex items-center"> <i data-lucide="at-sign" class="w-4 h-4 mr-2"></i> <?= $pengguna['username'] ?> </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="phone" class="w-4 h-4 mr-2"></i> <?= $pengguna['nomor_telepon'] ?> </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Profile Info -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Ubah Profil
        </h2>
    </div>
    <div class="intro-y tab-content mt-5">

        <div class="grid grid-cols-12 gap-6">

            <!-- BEGIN: Work In Progress -->
            <div class="intro-y box col-span-12 lg:col-span-12 mt-2">

                <div class="p-5">
                    <div class="tab-content">
                        <div id="work-in-progress-new" class="tab-pane active" role="tabpanel" aria-labelledby="work-in-progress-new-tab">
                            <div class="flex flex-col-reverse xl:flex-row flex-col">
                                <div class="flex-1 mt-6 xl:mt-0">
                                    <form action="<?= base_url('update_profil') ?>" method="post">
                                        <div class="grid grid-cols-12 gap-x-5">
                                            <div class="col-span-12 2xl:col-span-6">
                                                <div>
                                                    <label for="update-profile-form-1" class="form-label">Nama</label>
                                                    <input type="hidden" name="id_pengguna" value="<?= $pengguna['id_pengguna'] ?>">
                                                    <input id="update-profile-form-1" type="text" class="form-control" name="nama" placeholder="Input text" value="<?= $pengguna['nama_pengguna'] ?>">
                                                </div>
                                                <div class="mt-3">
                                                    <label for="update-profile-form-2" class="form-label">Username</label>
                                                    <input id="update-profile-form-1" type="text" class="form-control" name="username" placeholder="Input text" value="<?= $pengguna['username'] ?>">
                                                </div>
                                                <div class="mt-3">
                                                    <label for="update-profile-form-2" class="form-label">Password</label>
                                                    <input id="update-profile-form-1" type="password" class="form-control" name="password" placeholder="Input text" value="<?= $pengguna['password'] ?>">
                                                </div>
                                                <div class="mt-3">
                                                    <label for="update-profile-form-2" class="form-label">Nomor Telepon</label>
                                                    <input id="update-profile-form-1" type="text" class="form-control" name="nomor_telepon" placeholder="Input text" value="<?= $pengguna['nomor_telepon'] ?>">
                                                </div>
                                                <div class="mt-3">
                                                    <label for="update-profile-form-2" class="form-label">Alamat</label>
                                                    <textarea id="update-profile-form-1" class="form-control" name="alamat" placeholder="Input text"><?= $pengguna['alamat'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-20 mt-3">Simpan</button>
                                        <a href="<?= base_url('profil') ?>" class="btn btn-danger w-20 mt-3">Batal</a>
                                    </form>
                                </div>
                                <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                                    <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                        <form method="post" action="<?= base_url('simpan_foto') ?>" enctype="multipart/form-data">
                                            <input type="hidden" name="id_pengguna" value="<?= $pengguna['id_pengguna'] ?>">
                                            <input type="file" id="fileInput" style="display: none" accept="image/*" name="foto" />
                                            <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                <?php if ($pengguna['foto'] == null) { ?>
                                                    <img id="image" src="<?= base_url('asset') ?>/user.png" alt="Click to upload image" />
                                                <?php } else { ?>
                                                    <img id="image" src="<?= base_url('assets/img/produk/' . $pengguna['foto']) ?>" height="200px" alt="Click to upload image" />
                                                <?php } ?>
                                            </div>
                                            <div class="mx-auto cursor-pointer relative mt-5">
                                                <button type="submit" class="btn btn-primary w-full">Unggah</button>
                                            </div>
                                            <div class="mx-auto cursor-pointer relative mt-1">
                                                <a class="flex items-center text-danger" href="<?= base_url('hapus_foto/' . $pengguna['id_pengguna']) ?>" onclick="return confirm('Apakah Anda ingin menghapus foto pengguna ini?\nFoto pengguna tidak dapat dipulihkan setelah dihapus!')"> <button type="button" class="btn btn-danger w-full">Hapus</button></a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Work In Progress -->

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
<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script>
    function konfirmHapus(id) {
        Swal.fire({
            title: "Apakah Anda ingin menghapus foto profil ini?",
            text: "Data tidak dapat dipulihkan setelah dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= base_url('hapus_foto/') ?>" + id
            }
        });
    }
</script>