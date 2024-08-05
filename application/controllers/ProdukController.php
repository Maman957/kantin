<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProdukController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProdukModel');
        $this->load->library('session');
        $id_pengguna = $this->session->userdata('id_pengguna');
        if ($id_pengguna === null) {
            redirect(base_url());
        }
    }
    public function index()
    {
        $this->session->unset_userdata('id_pengguna');
        $this->load->view('login');
    }
    public function dasbor()
    {
        $data['produk'] = $this->ProdukModel->getProdukTeratas()->result();
        $data['statistik'] = $this->ProdukModel->getStatistik()->result();
        $data['halaman'] = 'dasbor';

        $this->load->view('layout', $data);
    }
    public function produk()
    {
        if ($this->input->post('keyword')) {
            $data['keyword'] = $this->input->post('keyword');
        } else {
            $data['keyword'] = null;
        }
        $data['produk'] = $this->ProdukModel->getProduk($data['keyword'])->result();
        $data['halaman'] = 'produk';

        $this->load->view('layout', $data);
    }
    public function profil()
    {
        $data['title'] = 'Katalog Produk';
        $id_pengguna = $this->session->userdata('id_pengguna');
        $data['pengguna'] = $this->ProdukModel->getPenggunaById($id_pengguna)->row_array();
        $data['halaman'] = 'profil';

        $role = $this->ProdukModel->getPenggunaById($id_pengguna)->row('role');;
        if ($role == 1) {
            $this->load->view('layout', $data);
        } else {
            $this->load->view('template', $data);
        }
    }
    public function ubahAkun($id_pengguna)
    {
        $data['pengguna'] = $this->ProdukModel->getPenggunaById($id_pengguna)->row_array();
        $data['halaman'] = 'ubahAkun';

        $this->load->view('layout', $data);
    }
    public function hapusProduk($id_produk)
    {
        $this->ProdukModel->hapusProduk($id_produk);
        redirect(base_url('produk'));
    }
    public function hapusAkun($id_pengguna)
    {
        $this->ProdukModel->hapusAkun($id_pengguna);
        redirect(base_url('akun'));
    }
    public function tambahProduk()
    {
        $data['halaman'] = 'tambahProduk.php';

        $this->load->view('layout', $data);
    }
    public function simpanFoto()
    {
        $data_foto['foto'] = '';
        $foto = $_FILES['foto']['name'];

        $config['upload_path'] = './assets/img/produk';
        $config['allowed_types'] = 'jpg|jpeg|png|svg';
        $config['max_size'] = 1024;
        $config['overwrite'] = true;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto')) {
            $foto = $this->upload->data('file_name');
            $data_foto['foto'] = $foto;

            $data = array(
                'id_pengguna' => $this->input->post('id_pengguna'),
                'foto' => $data_foto['foto'],
            );
        }

        $this->ProdukModel->simpanFoto($data);
        redirect(base_url('profil'));
    }
    public function hapusFoto()
    {
        $data = array(
            'id_pengguna' => $this->input->post('id_pengguna'),
        );
        $this->ProdukModel->simpanFoto($data);
        redirect(base_url('profil'));
    }
    public function uploadFoto()
    {
        $data_foto['foto'] = '';
        $foto = $_FILES['foto']['name'];

        $config['upload_path'] = './assets/img/produk';
        $config['allowed_types'] = 'jpg|jpeg|png|svg';
        $config['max_size'] = 1024;
        $config['overwrite'] = true;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto')) {
            $foto = $this->upload->data('file_name');
            $data_foto['foto'] = $foto;

            $data = array(
                'id_pengguna' => $this->input->post('id_pengguna'),
                'foto' => $data_foto['foto'],
            );
        }

        $this->ProdukModel->simpanFoto($data);
        redirect(base_url('akun'));
    }
    public function simpanProduk()
    {
        $data_foto['gambar'] = '';
        $foto = $_FILES['gambar']['name'];
        $date = date('Y-m-d');

        $config['upload_path'] = './assets/img/produk';
        $config['allowed_types'] = 'jpg|jpeg|png|svg';
        $config['max_size'] = 1024;
        $config['overwrite'] = true;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('gambar')) {
            $foto = $this->upload->data('file_name');
            $data_foto['gambar'] = $foto;

            $data = array(
                'nama' => $this->input->post('nama'),
                'kategori' => $this->input->post('kategori'),
                'harga_beli' => $this->input->post('harga_beli'),
                'harga_jual' => $this->input->post('harga_jual'),
                'stok' => $this->input->post('stok'),
                'gambar' => $data_foto['gambar'],
                'tanggal_update' => $date
            );
        }

        $this->ProdukModel->simpanProduk($data);
        redirect(base_url('produk'));
    }
    public function ubahProduk($id_produk)
    {
        $data['produk'] = $this->ProdukModel->getProdukById($id_produk)->row_array();
        $data['halaman'] = 'ubahProduk';

        $this->load->view('layout', $data);
    }
    public function updatePengguna()
    {
        parse_str(file_get_contents('php://input'), $data);

        $this->ProdukModel->updatePengguna($data);

        redirect(base_url('profil'));
    }
    public function updateAkun()
    {
        parse_str(file_get_contents('php://input'), $data);

        $this->ProdukModel->updatePengguna($data);

        redirect(base_url('akun'));
    }
    public function updateProfil()
    {
        parse_str(file_get_contents('php://input'), $data);

        $this->ProdukModel->updatePengguna($data);

        redirect(base_url('profil'));
    }
    public function updateProduk()
    {
        parse_str(file_get_contents('php://input'), $data);

        $this->ProdukModel->updateProduk($data);
        redirect(base_url('produk'));
    }
    public function getKeranjang()
    {
        $id_pengguna = $this->session->userdata('id_pengguna');
        $produk = $this->ProdukModel->getKeranjang($id_pengguna)->result();

        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($produk, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }
    public function keranjang()
    {
        $data['title'] = 'Keranjang Belanja';
        $data['halaman'] = 'keranjang';

        $this->load->view('template', $data);
    }
    public function simpanKeranjang()
    {
        $data = array(
            'id_produk' => $this->input->post('id_produk'),
            'id_pengguna' => $this->input->post('id_pengguna'),
        );
        $this->ProdukModel->simpanKeranjang($data);

        $response = array(
            'Success' => true,
        );

        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT))
            ->_display();

        exit;
    }
    public function akun()
    {
        if ($this->input->post('keyword')) {
            $data['keyword'] = $this->input->post('keyword');
        } else {
            $data['keyword'] = null;
        }
        $data['pengguna'] = $this->ProdukModel->getAkun($data['keyword'])->result();
        $data['halaman'] = 'akun';

        $this->load->view('layout', $data);
    }
    public function cetak()
    {
        $this->load->library('Pdf');
        $data['produk'] = $this->ProdukModel->getLaporanCetak()->result();
        $data['total'] = $this->ProdukModel->getTotalHargaCetak()->row_array();
        $this->load->view('lap_penjualan', $data);
        /*if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
        } else {
            $data['keyword'] = null;
        }
        $data['produk'] = $this->ProdukModel->getProduk($data['keyword'])->result();

        $html = $this->load->view('laporan_penjualan', $data);
        $file_pdf = 'laporan_penjualan';
        $paper = 'A4';
        $orientation = 'potrait';
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);*/
    }
    public function tambahAkun()
    {
        $data['halaman'] = 'tambahAkun';

        $this->load->view('layout', $data);
    }
    public function laporan()
    {
        $data['total'] = $this->ProdukModel->getTotalHargaCetak()->row_array();
        $data['produk'] = $this->ProdukModel->getLaporanCetak()->result();
        $data['halaman'] = 'laporan';

        $this->load->view('layout', $data);
    }













    public function detail($id_film)
    {
        $data['film'] = $this->FilmModel->getFilmById($id_film)->row_array();
        $data['komentar'] = $this->FilmModel->komentar($id_film)->result();
        $data['halaman'] = 'detail.php';

        $this->load->view('template', $data);
    }
    public function owner()
    {
        $this->load->view('owner');
    }
    public function drama()
    {
        $data['keyword'] = "drama";
        $data['film'] = $this->FilmModel->getGenre($data['keyword'])->result();
        $data['halaman'] = 'film.php';

        $this->load->view('template', $data);
    }
    public function fantasi()
    {
        $data['keyword'] = "fantasi";
        $data['film'] = $this->FilmModel->getGenre($data['keyword'])->result();
        $data['halaman'] = 'film.php';

        $this->load->view('template', $data);
    }
    public function roman()
    {
        $data['keyword'] = "roman";
        $data['film'] = $this->FilmModel->getGenre($data['keyword'])->result();
        $data['halaman'] = 'film.php';

        $this->load->view('template', $data);
    }
    public function misteri()
    {
        $data['keyword'] = "misteri";
        $data['film'] = $this->FilmModel->getGenre($data['keyword'])->result();
        $data['halaman'] = 'film.php';

        $this->load->view('template', $data);
    }
    public function animasi()
    {
        $data['keyword'] = "animasi";
        $data['film'] = $this->FilmModel->getGenre($data['keyword'])->result();
        $data['halaman'] = 'film.php';

        $this->load->view('template', $data);
    }
    public function komedi()
    {
        $data['keyword'] = "komedi";
        $data['film'] = $this->FilmModel->getGenre($data['keyword'])->result();
        $data['halaman'] = 'film.php';

        $this->load->view('template', $data);
    }
    public function fiksi_ilmiah()
    {
        $data['keyword'] = "fiksi ilmiah";
        $data['film'] = $this->FilmModel->getGenre($data['keyword'])->result();
        $data['halaman'] = 'film.php';

        $this->load->view('template', $data);
    }
    public function action()
    {
        $data['keyword'] = "action";
        $data['film'] = $this->FilmModel->getGenre($data['keyword'])->result();
        $data['halaman'] = 'film.php';

        $this->load->view('template', $data);
    }
    public function pertama()
    {
        $data['keyword'] = "200";
        $data['film'] = $this->FilmModel->getTahun($data['keyword'])->result();
        $data['halaman'] = 'film.php';

        $this->load->view('template', $data);
    }
    public function kedua()
    {
        $data['keyword'] = "201";
        $data['film'] = $this->FilmModel->getTahun($data['keyword'])->result();
        $data['halaman'] = 'film.php';

        $this->load->view('template', $data);
    }
    public function ketiga()
    {
        $data['keyword'] = "202";
        $data['film'] = $this->FilmModel->getTahun($data['keyword'])->result();
        $data['halaman'] = 'film.php';

        $this->load->view('template', $data);
    }
    public function favorite()
    {
        $id_pengguna = $this->session->userdata('id_pengguna');
        $data['film'] = $this->FilmModel->favorite($id_pengguna)->result();
        $data['halaman'] = 'favorite.php';

        $this->load->view('template', $data);
    }

    public function simpanFavorite()
    {
        parse_str(file_get_contents('php://input'), $data);
        $this->FilmModel->simpanFavorite($data);

        $id_pengguna = $this->session->userdata('id_pengguna');
        $data['film'] = $this->FilmModel->favorite($id_pengguna)->result();
        $data['halaman'] = 'favorite.php';

        $this->load->view('template', $data);
    }
    public function simpanKomentar()
    {
        parse_str(file_get_contents('php://input'), $data);
        $this->FilmModel->simpanKomentar($data);

        redirect(base_url('detail/' . $data['id_film']));
    }
    public function simpanFilm()
    {
        $data_gambar['gambar'] = '';
        $gambar = $_FILES['gambar']['name'];


        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'jpg|jpeg|png|svg';
        $config['max_size'] = 1024;
        $config['overwrite'] = true;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('gambar')) {
            $gambar = $this->upload->data('file_name');
            $data_gambar['gambar'] = $gambar;
        }
        unset($this->upload);


        $data_foto['foto'] = '';
        $foto = $_FILES['foto']['name'];

        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'jpg|jpeg|png|svg';
        $config['max_size'] = 1024;
        $config['overwrite'] = true;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto')) {
            $foto = $this->upload->data('file_name');
            $data_foto['foto'] = $foto;

            $data = array(
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'tahun_rilis' => $this->input->post('tahun_rilis'),
                'genre' => $this->input->post('genre'),
                'download' => $this->input->post('download'),
                'video' => $this->input->post('video'),
                'gambar' => $data_gambar['gambar'],
                'foto' => $data_foto['foto']
            );
        }

        $this->FilmModel->simpanFilm($data);

        $data['film'] = $this->FilmModel->getFilm()->result();
        $data['halaman'] = 'pengaturan.php';

        $this->load->view('layout', $data);
    }
    public function halaman_ubah($id_film)
    {
        $data['film'] = $this->FilmModel->getFilmById($id_film)->row_array();
        $data['halaman'] = 'ubahFilm.php';

        $this->load->view('layout', $data);
    }
    public function updateFilm()
    {
        parse_str(file_get_contents('php://input'), $data);
        $this->FilmModel->updateFilm($data);

        $data['film'] = $this->FilmModel->getFilm()->result();
        $data['halaman'] = 'pengaturan.php';

        $this->load->view('layout', $data);
    }
    public function hapusFilm($id_film)
    {
        $this->FilmModel->hapusFilm($id_film);


        $data['film'] = $this->FilmModel->getFilm()->result();
        $data['halaman'] = 'pengaturan.php';

        $this->load->view('layout', $data);
    }
    public function hapusFavorite($id_favorite)
    {
        $this->FilmModel->hapusFavorite($id_favorite);

        $id_pengguna = $this->session->userdata('id_pengguna');
        $data['film'] = $this->FilmModel->favorite($id_pengguna)->result();
        $data['halaman'] = 'favorite.php';

        $this->load->view('template', $data);
    }
}
