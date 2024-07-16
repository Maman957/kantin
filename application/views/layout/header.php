<div class="" id="home">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="navbar navbar-expand-xl navbar-light bg-biru">
          <a class="navbar-brand" href="#">
            <img src="<?= base_url('assets/img/logo.png') ?>" height="50px">
          </a>
          <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse bg-biru" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dasbor') ?>">Dasbor
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('laporan') ?>">Laporan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('produk') ?>">Produk</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('akun') ?>">Akun</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('profil') ?>">Profil</a>
              </li>
            </ul>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link d-flex" href="<?= base_url() ?>">
                  <i class="far fa-user mr-2 tm-logout-icon"></i>
                  <span>Keluar</span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>