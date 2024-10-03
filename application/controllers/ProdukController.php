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
        $data['total_transaksi'] = $this->ProdukModel->totalTransaksi();
        $data['transaksi_lunas'] = $this->ProdukModel->transaksiLunas();
        $data['transaksi_belum_lunas'] = $this->ProdukModel->transaksiBelumLunas();
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
        $data['produk'] = $this->ProdukModel->getProdukByStok($data['keyword'])->result();
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
    public function hapusProdukKeranjang($id_keranjang)
    {
        $this->ProdukModel->hapusProdukKeranjang($id_keranjang);
        redirect(base_url('keranjang'));
    }
    public function hapusKeranjang($id_pengguna)
    {
        $this->ProdukModel->hapusKeranjang($id_pengguna);
        redirect(base_url('keranjang'));
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
    public function hapusFoto($id_pengguna)
    {
        $this->ProdukModel->hapusFoto($id_pengguna);
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

        $this->ProdukModel->uploadFoto($data);
        redirect(base_url('profil'));
    }
    public function simpanProduk()
    {
        $data_foto['gambar'] = '';
        $foto = $_FILES['gambar']['name'];
        $date = date('Y-m-d');
        $nama_produk = $this->input->post('nama');
        $produk_ada = $this->ProdukModel->cekProdukByNama($nama_produk);

        if ($produk_ada) {
            $this->session->set_flashdata('error', 'Produk gagal ditambahkan, nama produk sudah ada di daftar produk.');
            redirect(base_url('produk'));
        } else {

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
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $data_foto['gambar'],
                    'tanggal_update' => $date
                );
            }
            $this->session->set_flashdata('success', 'Produk berhasil ditambahkan!');
            $this->ProdukModel->simpanProduk($data);
            redirect(base_url('produk'));
        }
    }
    public function simpanAkun()
    {
        $data_foto['foto'] = '';
        $foto = $_FILES['foto']['name'];
        $date = date('Y-m-d');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $akun_ada = $this->ProdukModel->cekAkunByUsernamePassword($username, $password);

        if ($akun_ada) {
            $this->session->set_flashdata('error', 'Akun gagal ditambahkan, akun sudah terdaftar di database.');
            redirect(base_url('akun'));
        } else {
            $config['upload_path'] = './assets/img/produk';
            $config['allowed_types'] = 'jpg|jpeg|png|svg';
            $config['max_size'] = 1024;
            $config['overwrite'] = true;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
                $data_foto['foto'] = $foto;

                $data = array(
                    'nama' => $this->input->post('nama'),
                    'nomor_telepon' => $this->input->post('nomor_telepon'),
                    'role' => $this->input->post('role'),
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'alamat' => $this->input->post('alamat'),
                    'foto' => $data_foto['foto'],
                    'tanggal_update' => $date
                );
            }

            $this->session->set_flashdata('success', 'Akun berhasil ditambahkan!');
            $this->ProdukModel->simpanAkun($data);
            redirect(base_url('akun'));
        }
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
        $data_foto['foto'] = '';
        $foto = $_FILES['foto']['name'];
        $date = date('Y-m-d');

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
                'nama' => $this->input->post('nama'),
                'nomor_telepon' => $this->input->post('nomor_telepon'),
                'role' => $this->input->post('role'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'alamat' => $this->input->post('alamat'),
                'foto' => $data_foto['foto'],
                'tanggal_update' => $date
            );
        } else {
            $data = array(
                'id_pengguna' => $this->input->post('id_pengguna'),
                'nama' => $this->input->post('nama'),
                'nomor_telepon' => $this->input->post('nomor_telepon'),
                'role' => $this->input->post('role'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'alamat' => $this->input->post('alamat'),
                'foto' => $this->input->post('foto_lama'),
                'tanggal_update' => $date
            );
        }


        $this->session->set_flashdata('success', 'Akun berhasil diubah!');
        $this->ProdukModel->updateAkun($data);
        redirect(base_url('akun'));
    }
    public function updateProfil()
    {
        parse_str(file_get_contents('php://input'), $data);

        $this->ProdukModel->updatePengguna($data);

        redirect(base_url('profil'));
    }
    public function updateStatus()
    {
        parse_str(file_get_contents('php://input'), $data);

        $this->session->set_flashdata('success', 'Transaksi berhasil dilunasi!');
        $this->ProdukModel->updateStatus($data);

        redirect(base_url('bukti/' . $data['id_penjualan']));
    }
    public function updateProduk()
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
                'id_produk' => $this->input->post('id_produk'),
                'nama' => $this->input->post('nama'),
                'kategori' => $this->input->post('kategori'),
                'harga_beli' => $this->input->post('harga_beli'),
                'harga_jual' => $this->input->post('harga_jual'),
                'stok' => $this->input->post('stok'),
                'deskripsi' => $this->input->post('deskripsi'),
                'gambar' => $data_foto['gambar'],
                'tanggal_update' => $date
            );
        } else {
            $data = array(
                'id_produk' => $this->input->post('id_produk'),
                'nama' => $this->input->post('nama'),
                'kategori' => $this->input->post('kategori'),
                'harga_beli' => $this->input->post('harga_beli'),
                'harga_jual' => $this->input->post('harga_jual'),
                'stok' => $this->input->post('stok'),
                'deskripsi' => $this->input->post('deskripsi'),
                'gambar' => $this->input->post('gambar_lama'),
                'tanggal_update' => $date
            );
        }

        $this->session->set_flashdata('success', 'Produk berhasil diubah!');
        $this->ProdukModel->updateProduk($data);
        redirect(base_url('produk'));
    }
    public function updateKeranjang()
    {
        $id_keranjang = $this->input->post('id_keranjang');
        $jumlah = $this->input->post('jumlah');

        $this->ProdukModel->updateKeranjang($id_keranjang, $jumlah);

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
    public function transaksi()
    {
        $id_pengguna = $this->session->userdata('id_pengguna');
        $data['transaksi_lengkap'] = $this->ProdukModel->getTransaksiLengkap($id_pengguna);
        $data['title'] = 'Daftar Transaksi';
        $data['halaman'] = 'transaksi';
        $this->load->view('template', $data);
    }
    public function simpanKeranjang()
    {
        $data = array(
            'id_produk' => $this->input->post('id_produk'),
            'id_pengguna' => $this->input->post('id_pengguna'),
            'jumlah' => $this->input->post('jumlah'),
        );
        $this->ProdukModel->simpanKeranjang($data);
        redirect(base_url('keranjang'));
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
        if ($this->input->post('keyword')) {
            $data['keyword'] = $this->input->post('keyword');
        } else {
            $data['keyword'] = null;
        }
        $this->load->library('Pdf');
        $data['laporan'] = $this->ProdukModel->getLaporanLengkap();
        $data['total'] = $this->ProdukModel->getTotalHargaCetak($data['keyword'])->row_array();
        $data['laba'] = $this->ProdukModel->getTotalLaba($data['keyword'])->row_array();
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
        if ($this->input->post('keyword')) {
            $keyword = $this->input->post('keyword');
            redirect('laporan?keyword=' . urlencode($keyword));
        } else {
            $keyword = $this->input->get('keyword') ?? null;

            $data['laporan'] = $this->ProdukModel->getLaporanLengkap($keyword);
            $data['total'] = $this->ProdukModel->getTotalHargaCetak($keyword)->row_array();
            $data['laba'] = $this->ProdukModel->getTotalLaba($keyword)->row_array();
            $data['halaman'] = 'laporan';
            $data['keyword'] = $keyword;

            $this->load->view('layout', $data);
        }
    }

    public function getStatus($metode_pembayaran)
    {
        $id_pengguna = $this->session->userdata('id_pengguna');
        $data['transaksi_lengkap'] = $this->ProdukModel->getStatusLengkap($id_pengguna, $metode_pembayaran);
        $data['title'] = 'History Transaksi';
        $data['halaman'] = 'transaksi';
        $this->load->view('template', $data);
    }

    public function checkout()
    {
        $metode_pembayaran = $this->input->post('metode_pembayaran');
        if ($this->input->post('metode_pembayaran') == 2) {
            redirect('qrcode');
        } else {
            $id_pengguna = $this->session->userdata('id_pengguna');
            if ($this->input->post('metode_pembayaran') == 0) {
                $status_penjualan = 0;
            } else {
                $status_penjualan = 1;
            }
            $id_penjualan = $this->ProdukModel->insertPenjualan($id_pengguna, $metode_pembayaran, $status_penjualan);
            $this->session->set_userdata('id_penjualan', $id_penjualan);
            if ($this->ProdukModel->checkout($id_pengguna)) {
                $this->session->set_flashdata('success', 'Checkout berhasil!');
                redirect('bukti/' . $id_penjualan);
            } else {
                $this->session->set_flashdata('error', 'Stok produk yang Anda inginkan saat ini tidak mencukupi.');
                redirect('keranjang');
            }
        }
    }
    public function terbayar()
    {
        $id_pengguna = $this->session->userdata('id_pengguna');
        $id_penjualan = $this->ProdukModel->insertPenjualan($id_pengguna, 2, 1);
        $this->session->set_userdata('id_penjualan', $id_penjualan);
        if ($this->ProdukModel->checkout($id_pengguna)) {
            $this->session->set_flashdata('success', 'Checkout berhasil!');
            redirect('bukti/' . $id_penjualan);
        } else {
            $this->session->set_flashdata('error', 'Stok produk yang Anda inginkan saat ini tidak mencukupi.');
            redirect('keranjang');
        }
    }
    public function bukti($id_penjualan)
    {
        $this->load->library('Pdf');
        $data['produk'] = $this->ProdukModel->getBuktiPenjualan($id_penjualan)->result_array();
        $this->load->view('buktiPenjualan', $data);
    }
    public function qrcode()
    {
        $this->load->view('qrcode');
    }
}
