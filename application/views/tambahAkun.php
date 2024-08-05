<div class="content">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Tambah Akun Pengguna
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
                            <form method="post" action="<?= base_url('simpan_akun') ?>" enctype="multipart/form-data">
                                <div class="grid grid-cols-12 gap-x-5">
                                    <div class="col-span-12 2xl:col-span-6">
                                        <div>
                                            <label for="update-profile-form-1" class="form-label">Nama Pengguna</label>
                                            <input id="update-profile-form-1" type="text" class="form-control" name="nama" placeholder="Nama pengguna" required>
                                        </div>
                                        <div class="mt-3">
                                            <label for="update-profile-form-1" class="form-label">Username</label>
                                            <input id="update-profile-form-1" type="text" class="form-control" name="username" placeholder="Username" required>
                                        </div>
                                        <div class="mt-3">
                                            <label for="update-profile-form-1" class="form-label">Foto Pengguna</label>
                                            <input id="update-profile-form-1" class="form-control" name="foto" type="file" required></input>
                                        </div>
                                    </div>
                                    <div class="col-span-12 2xl:col-span-6">
                                        <div class="mt-3 2xl:mt-0">
                                            <label for="update-profile-form-3" class="form-label">Nomor Telepon</label>
                                            <input id="update-profile-form-1" type="text" class="form-control" name="nomor_telepon" placeholder="Nomor telepon" required>
                                        </div>
                                        <div class="mt-3">
                                            <label for="update-profile-form-3" class="form-label">Password</label>
                                            <input id="update-profile-form-1" type="password" class="form-control" name="password" required>
                                        </div>
                                        <div class="mt-3">
                                            <label for="update-profile-form-2" class="form-label">Role Pengguna</label><br>
                                            <input type="radio" id="role" name="role" value="1">
                                            <label for="kategori">Admin</label>
                                            <input class="ml-3" type="radio" id="role" name="role" value="2">
                                            <label for="kategori">Minuman</label>
                                        </div>
                                    </div>
                                    <div class="col-span-12">
                                        <div class="mt-4">
                                            <label for="update-profile-form-5" class="form-label">Alamat</label>
                                            <textarea id="update-profile-form-5" class="form-control" name="alamat" placeholder="Alamat pengguna" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary w-20 mt-3">Simpan</button>
                                <a href="<?= base_url('akun') ?>"><button type="button" class="btn btn-danger w-20 mt-3">Kembali
                                    </button></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>