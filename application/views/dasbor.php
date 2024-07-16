<div class="row tm-content-row tm-mt-big">
    <div class="tm-col tm-col-big">
        <div class="bg-white tm-block h-100">
            <h2 class="tm-block-title">Diagram Pendapatan</h2>
            <canvas id="lineChart"></canvas>
        </div>
    </div>


    <div class="tm-col tm-col-small">
        <div class="bg-white tm-block h-100">
            <h2 class="tm-block-title">Daftar Produk Teratas</h2>
            <ol class="tm-list-group">
                <?php
                foreach ($produk as $item) { ?>
                    <li class="tm-list-group-item"><?= $item->nama_produk ?></li>
                <?php } ?>
            </ol>
        </div>
    </div>
</div>