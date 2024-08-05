<div class="content">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Dasbor
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 mt-6 -mb-6 intro-y">
            <div class="alert alert-dismissible show box bg-primary text-white flex items-center mb-6" role="alert">
                <span>Hallo selamat datang, <b><?php echo $this->session->userdata('nama_pengguna') ?></b> Silahkan kelola dasbor kantin kejujuran Anda.</span>
                <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i> </button>
            </div>
        </div>
        <!-- BEGIN: Profile Menu -->
        <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Daftar Produk Terlaris
                    </h2>
                </div>
                <div class="p-5">
                    <table class="table table-borderless">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Terjual</th>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($produk as $item) { ?>
                                <tr>
                                    <td><?= $no++ ?> </td>
                                    <td><?= $item->nama_produk ?> </td>
                                    <td><?= $item->jumlah_terjual ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END: Profile Menu -->
        <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
            <!-- BEGIN: Change Password -->
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Diagram Pendapatan
                    </h2>
                </div>
                <div class="p-5">
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>