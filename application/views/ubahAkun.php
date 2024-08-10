<div class="content">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Ubah Akun Pengguna
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
                            <form method="post" action="<?= base_url('update_akun') ?>" enctype="multipart/form-data">
                                <div class="grid grid-cols-12 gap-x-5">
                                    <div class="col-span-12 2xl:col-span-4">
                                        <div>
                                            <input type="hidden" name="id_pengguna" value="<?= $pengguna['id_pengguna'] ?>">
                                            <label for="update-profile-form-1" class="form-label">Nama Pengguna</label>
                                            <input id="update-profile-form-1" type="text" class="form-control" name="nama" placeholder="Nama pengguna" value="<?= $pengguna['nama_pengguna'] ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="update-profile-form-3" class="form-label">Nomor Telepon</label>
                                            <input id="update-profile-form-1" type="text" class="form-control" name="nomor_telepon" placeholder="089512345678" value="<?= $pengguna['nomor_telepon'] ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="update-profile-form-2" class="form-label">Role Pengguna</label><br>
                                            <input class="form-check-input" type="radio" id="role" name="role" value="1" <?php if ($pengguna['role'] == '1') echo 'checked'; ?>>
                                            <label class="form-check-label" for="role">Admin</label><br>
                                            <input class="form-check-input" type="radio" id="role" name="role" value="2" <?php if ($pengguna['role'] == '2') echo 'checked'; ?>>
                                            <label class="form-check-label" for="role">Pelanggan</label>
                                        </div>
                                    </div>
                                    <div class="col-span-12 2xl:col-span-5">
                                        <div>
                                            <label for="update-profile-form-4" class="form-label">Username</label>
                                            <input id="update-profile-form-4" type="text" class="form-control" name="username" placeholder="Masukkan username" value="<?= $pengguna['username'] ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="update-profile-form-4" class="form-label">Password</label>
                                            <input id="update-profile-form-4" type="password" class="form-control" name="password" placeholder="******" value="<?= $pengguna['password'] ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="update-profile-form-5" class="form-label">Alamat</label>
                                            <textarea id="update-profile-form-5" class="form-control" name="alamat" placeholder="Alamat pengguna"><?= $pengguna['alamat'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-span-12 2xl:col-span-3">
                                        <div class="w-52 mx-auto xl:mr-0 xl:ml-5">
                                            <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                                <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                    <input type="file" id="fileInput" style="display: none" accept="image/*" name="foto" />
                                                    <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                        <?php if ($pengguna['foto'] == null) { ?>
                                                            <img id="image" src="<?= base_url('asset') ?>/user.png" alt="Click to upload image" />
                                                        <?php } else { ?>
                                                            <img id="image" src="<?= base_url('assets/img/produk/' . $pengguna['foto']) ?>" height="200px" alt="Click to upload image" />
                                                        <?php } ?>
                                                        <input type="hidden" name="foto_lama" value="<?= $pengguna['foto'] ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-20 mt-3">Simpan</button>
                                    <a href="<?= base_url('akun') ?>"><button type="button" class="btn btn-danger w-20 mt-3">Kembali
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