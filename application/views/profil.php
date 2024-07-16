<div class="content">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Profile Layout
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
                    <div class="truncate sm:whitespace-normal flex items-center"> <i data-lucide="mail" class="w-4 h-4 mr-2"></i> <?= $pengguna['username'] ?> </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="slack" class="w-4 h-4 mr-2"></i> <?= $pengguna['nomor_telepon'] ?> </div>
                </div>
            </div>
        </div>
        <ul class="nav nav-link-tabs flex-col sm:flex-row justify-center lg:justify-start text-center" role="tablist">
            <li id="dashboard-tab" class="nav-item" role="presentation"> <a href="javascript:;" class="nav-link py-4 active" data-tw-target="#dashboard" aria-controls="dashboard" aria-selected="true" role="tab"> Dashboard </a> </li>
            <li id="account-and-profile-tab" class="nav-item" role="presentation"> <a href="javascript:;" class="nav-link py-4" data-tw-target="#account-and-profile" aria-selected="false" role="tab"> Update Profile </a> </li>
        </ul>
    </div>
    <!-- END: Profile Info -->
    <div class="intro-y tab-content mt-5">

        <div id="account-and-profile" class="tab-pane" role="tabpanel" aria-labelledby="account-and-profile-tab">
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
                                        </form>
                                    </div>
                                    <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                                        <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                            <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                <?php if ($pengguna['foto'] == null) {
                                                ?> <i class="rounded-full fas fa-5x fa-cloud-upload-alt" onclick="document.getElementById('fileInput').click();"><img src="<?= base_url('asset') ?>/user.png"></i> <?php
                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                    ?> <i class="rounded-full fas fa-5x" onclick="document.getElementById('fileInput').click();"><img src="<?= base_url('assets/img/produk/' . $pengguna['foto']) ?>" height="200px"></i> <?php
                                                                                                                                                                                                                                                                                                                                                                                                        } ?>

                                                <div class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-primary right-0 top-0 -mr-2 -mt-2"> <i data-lucide="alert-circle" class="w-4 h-4"></i> </div>
                                            </div>
                                            <div class="mx-auto cursor-pointer relative mt-5">
                                                <button type="button" class="btn btn-primary w-full">Profile Anda</button>
                                            </div>
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