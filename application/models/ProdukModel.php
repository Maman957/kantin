<?php

class ProdukModel extends CI_Model
{
    public function getProduk($keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_produk', $keyword);
        }
        $this->db->select('produk.*, SUM(detail_penjualan.jumlah) AS jumlah_terjual');
        $this->db->from('produk');
        $this->db->join('detail_penjualan', 'produk.id_produk = detail_penjualan.id_produk', 'left');
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('produk.stok', 'DESC');

        return $this->db->get();
    }

    public function getProdukByStok($keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_produk', $keyword);
        }
        $this->db->order_by('stok', 'ASC');
        return $this->db->get('produk');
    }

    public function getProdukTeratas()
    {
        return $this->db->query('SELECT produk.nama_produk, SUM(detail_penjualan.jumlah) AS jumlah_terjual FROM produk JOIN detail_penjualan ON produk.id_produk = detail_penjualan.id_produk GROUP BY produk.nama_produk ORDER BY jumlah_terjual DESC;');
    }
    public function getLaporanCetak()
    {
        $this->db->select('penjualan.id_penjualan, pengguna.nama_pengguna, penjualan.tanggal_penjualan, penjualan.metode_pembayaran, SUM(detail_penjualan.harga) AS total_harga');
        $this->db->from('detail_penjualan');
        $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
        $this->db->join('produk', 'detail_penjualan.id_produk = produk.id_produk');
        $this->db->join('pengguna', 'penjualan.id_pengguna = pengguna.id_pengguna');
        $this->db->where('MONTH(penjualan.tanggal_penjualan)', date('m'));
        $this->db->where('YEAR(penjualan.tanggal_penjualan)', date('Y'));
        $this->db->group_by('penjualan.id_penjualan, pengguna.nama_pengguna, penjualan.tanggal_penjualan, penjualan.metode_pembayaran');
        return $this->db->get();
    }

    public function getLaporanProduk($id_penjualan)
    {
        $this->db->select('produk.nama_produk, produk.deskripsi, detail_penjualan.jumlah');
        $this->db->from('detail_penjualan');
        $this->db->join('produk', 'detail_penjualan.id_produk = produk.id_produk');
        $this->db->where('detail_penjualan.id_penjualan', $id_penjualan);
        return $this->db->get();
    }
    public function getLaporanLengkap()
    {
        $laporanCetak = $this->getLaporanCetak()->result_array();
        foreach ($laporanCetak as &$laporan) {
            $id_penjualan = $laporan['id_penjualan'];
            $laporan['produk'] = $this->getLaporanProduk($id_penjualan)->result();
        }
        return $laporanCetak;
    }


    public function getTransaksi($id_pengguna)
    {
        $this->db->select('penjualan.id_penjualan, penjualan.tanggal_penjualan, penjualan.metode_pembayaran, SUM(detail_penjualan.harga) AS total_harga');
        $this->db->from('detail_penjualan');
        $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
        $this->db->join('produk', 'detail_penjualan.id_produk = produk.id_produk');
        $this->db->join('pengguna', 'penjualan.id_pengguna = pengguna.id_pengguna');
        $this->db->where('penjualan.id_pengguna', $id_pengguna);
        $this->db->group_by('penjualan.tanggal_penjualan, penjualan.metode_pembayaran');  // Group berdasarkan tanggal_penjualan dan metode_pembayaran
        $this->db->order_by('penjualan.tanggal_penjualan', 'DESC');  // Urutkan berdasarkan tanggal terbaru
        return $this->db->get();
    }

    public function getTransaksiProduk($id_penjualan)
    {
        $this->db->select('produk.nama_produk, produk.deskripsi, detail_penjualan.jumlah');
        $this->db->from('detail_penjualan');
        $this->db->join('produk', 'detail_penjualan.id_produk = produk.id_produk');
        $this->db->where('detail_penjualan.id_penjualan', $id_penjualan);
        return $this->db->get();
    }

    public function getTransaksiLengkap($id_pengguna)
    {
        $laporanTransaksi = $this->getTransaksi($id_pengguna)->result_array();
        foreach ($laporanTransaksi as &$laporan) {
            $this->db->select('penjualan.id_penjualan');
            $this->db->from('penjualan');
            $this->db->where('penjualan.tanggal_penjualan', $laporan['tanggal_penjualan']);
            $this->db->where('penjualan.id_pengguna', $id_pengguna);
            $id_penjualan = $this->db->get()->row()->id_penjualan;

            $laporan['produk'] = $this->getTransaksiProduk($id_penjualan)->result();
        }
        return $laporanTransaksi;
    }



    public function getTotalHargaCetak()
    {
        return $this->db->query('SELECT SUM(detail_penjualan.harga) AS total_harga FROM detail_penjualan JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan WHERE penjualan.status_penjualan = 1;');
    }
    public function getKategori($id_kategori = null, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_produk', $keyword);
        }
        if ($id_kategori) {
            $this->db->where('id_kategori', $id_kategori);
        }
        $this->db->select('produk.*, SUM(detail_penjualan.jumlah) AS jumlah_terjual');
        $this->db->from('produk');
        $this->db->join('detail_penjualan', 'produk.id_produk = detail_penjualan.id_produk', 'left');
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('produk.stok', 'DESC');

        return $this->db->get();
    }
    public function getStatus($id_pengguna, $metode_pembayaran = null)
    {
        if ($metode_pembayaran) {
            $this->db->where('penjualan.metode_pembayaran', $metode_pembayaran);
        } elseif ($metode_pembayaran == 0) {
            $this->db->where('penjualan.metode_pembayaran', $metode_pembayaran);
        }

        $this->db->select('
        penjualan.id_penjualan, 
        penjualan.tanggal_penjualan,
        penjualan.metode_pembayaran,
        SUM(detail_penjualan.harga) AS total_harga
    ');
        $this->db->from('detail_penjualan');
        $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
        $this->db->join('produk', 'detail_penjualan.id_produk = produk.id_produk');
        $this->db->join('pengguna', 'penjualan.id_pengguna = pengguna.id_pengguna');
        $this->db->where('penjualan.id_pengguna', $id_pengguna);
        $this->db->group_by('penjualan.tanggal_penjualan, penjualan.metode_pembayaran');
        $this->db->order_by('penjualan.tanggal_penjualan', 'DESC');

        return $this->db->get();
    }

    public function getStatusProduk($id_penjualan)
    {
        $this->db->select('produk.nama_produk, produk.deskripsi, detail_penjualan.jumlah');
        $this->db->from('detail_penjualan');
        $this->db->join('produk', 'detail_penjualan.id_produk = produk.id_produk');
        $this->db->where('detail_penjualan.id_penjualan', $id_penjualan);
        return $this->db->get();
    }

    public function getStatusLengkap($id_pengguna, $metode_pembayaran = null)
    {
        $laporanStatus = $this->getStatus($id_pengguna, $metode_pembayaran)->result_array();
        foreach ($laporanStatus as &$laporan) {
            $this->db->select('penjualan.id_penjualan');
            $this->db->from('penjualan');
            $this->db->where('penjualan.tanggal_penjualan', $laporan['tanggal_penjualan']);
            $this->db->where('penjualan.id_pengguna', $id_pengguna);
            if ($metode_pembayaran !== null) {
                $this->db->where('penjualan.metode_pembayaran', $metode_pembayaran);
            }
            $id_penjualan = $this->db->get()->row()->id_penjualan;
            $laporan['produk'] = $this->getStatusProduk($id_penjualan)->result();
        }
        return $laporanStatus;
    }



    public function getPenggunaById($id_pengguna)
    {
        return $this->db->get_where('pengguna', ['id_pengguna' => $id_pengguna]);
    }
    public function hapusProduk($id_produk)
    {
        $this->db->where('id_produk', $id_produk)->delete('produk');
    }
    public function hapusProdukKeranjang($id_keranjang)
    {
        $this->db->where('id_keranjang', $id_keranjang)->delete('keranjang');
    }
    public function hapusKeranjang($id_pengguna)
    {
        $this->db->where('id_pengguna', $id_pengguna)->delete('keranjang');
    }
    public function hapusAkun($id_pengguna)
    {
        $this->db->where('id_pengguna', $id_pengguna)->delete('pengguna');
    }
    public function simpanProduk($data)
    {
        $value = array(
            'nama_produk' => $data['nama'],
            'id_kategori' => $data['kategori'],
            'harga_beli' => $data['harga_beli'],
            'harga_jual' => $data['harga_jual'],
            'stok' => $data['stok'],
            'gambar' => $data['gambar'],
            'deskripsi' => $data['deskripsi'],
            'tanggal_update' => $data['tanggal_update'],
        );

        $this->db->insert('produk', $value);
    }
    public function simpanAkun($data)
    {
        $value = array(
            'nama_pengguna' => $data['nama'],
            'role' => $data['role'],
            'username' => $data['username'],
            'password' => $data['password'],
            'alamat' => $data['alamat'],
            'nomor_telepon' => $data['nomor_telepon'],
            'foto' => $data['foto'],
            'tanggal_update' => $data['tanggal_update'],
        );

        $this->db->insert('pengguna', $value);
    }
    public function uploadFoto($data)
    {
        $date = date('Y-m-d');
        $value = array(
            'foto' => $data['foto'],
            'tanggal_update' => $date,
        );

        $this->db->where('id_pengguna', $data['id_pengguna'])->update('pengguna', $value);
    }
    public function hapusFoto($id_pengguna)
    {
        $date = date('Y-m-d');
        $value = array(
            'foto' => null,
            'tanggal_update' => $date,
        );

        $this->db->where('id_pengguna', $id_pengguna)->update('pengguna', $value);
    }
    public function getProdukById($id_produk)
    {
        return $this->db->get_where('produk', ['id_produk' => $id_produk]);
    }
    public function getProdukByKategori($id_kategori)
    {
        return $this->db->get_where('produk', ['id_kategori' => $id_kategori]);
    }
    public function updateProduk($data)
    {

        $date = date('Y-m-d');
        $value = array(
            'nama_produk' => $data['nama'],
            'id_kategori' => $data['kategori'],
            'harga_beli' => $data['harga_beli'],
            'harga_jual' => $data['harga_jual'],
            'stok' => $data['stok'],
            'gambar' => $data['gambar'],
            'deskripsi' => $data['deskripsi'],
            'tanggal_update' => $date,
        );

        $this->db->where('id_produk', $data['id_produk'])->update('produk', $value);
    }
    public function updatePengguna($data)
    {
        $date = date('Y-m-d');
        $value = array(
            'nama_pengguna' => $data['nama'],
            'username' => $data['username'],
            'password' => $data['password'],
            'alamat' => $data['alamat'],
            'nomor_telepon' => $data['nomor_telepon'],
            'tanggal_update' => $date,
        );

        $this->db->where('id_pengguna', $data['id_pengguna'])->update('pengguna', $value);
    }
    public function updateAkun($data)
    {
        $date = date('Y-m-d');
        $value = array(
            'nama_pengguna' => $data['nama'],
            'username' => $data['username'],
            'password' => $data['password'],
            'alamat' => $data['alamat'],
            'nomor_telepon' => $data['nomor_telepon'],
            'foto' => $data['foto'],
            'role' => $data['role'],
            'tanggal_update' => $date,
        );

        $this->db->where('id_pengguna', $data['id_pengguna'])->update('pengguna', $value);
    }
    public function updateStatus($data)
    {
        if ($data['metode'] == 0) {
            $status = 0;
        } else {
            $status = 1;
        }
        $value = array(
            'metode_pembayaran' => $data['metode'],
            'status_penjualan' => $status
        );

        $this->db->where('id_penjualan', $data['id_penjualan'])->update('penjualan', $value);
    }
    public function simpanKeranjang($data)
    {
        $date = date('Y-m-d');
        $value = array(
            'id_produk' => $data['id_produk'],
            'id_pengguna' => $data['id_pengguna'],
            'tanggal_update' => $date,
        );

        $this->db->insert('keranjang', $value);
    }
    public function updateQuantity($id_produk, $quantity)
    {
        $this->db->set('jumlah', $quantity);
        $this->db->where('id_produk', $id_produk);
        return $this->db->update('keranjang');
    }

    public function clearKeranjang()
    {
        return $this->db->empty_table('keranjang');
    }
    public function insertPenjualan()
    {
        $data = array(
            'tanggal_penjualan' => date('Y-m-d'),
            'total_penjualan' => $this->calculateTotalKeranjang()
        );
        $this->db->insert('penjualan', $data);
        return $this->db->insert_id(); // Mengembalikan ID penjualan yang baru
    }

    public function insertDetailPenjualan($id_penjualan, $item)
    {
        $data = array(
            'id_penjualan' => $id_penjualan,
            'id_produk' => $item['id_produk'],
            'harga' => $item['harga_jual'],
            'quantity' => $item['quantity']
        );
        return $this->db->insert('detail_penjualan', $data);
    }

    private function calculateTotalKeranjang()
    {
        $this->db->select('SUM(quantity * harga_jual) as total');
        $this->db->from('keranjang');
        $query = $this->db->get();
        return $query->row()->total;
    }
    public function getKeranjang($id_pengguna)
    {
        return $this->db->query('SELECT keranjang.id_keranjang,produk.id_produk,produk.gambar,produk.nama_produk,produk.harga_jual FROM produk join keranjang on produk.id_produk=keranjang.id_produk WHERE keranjang.id_pengguna=' . $id_pengguna);
    }
    public function getAkun($keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_pengguna', $keyword);
        }
        return $this->db->get('pengguna');
    }
    public function getStatistik()
    {
        return $this->db->query('SELECT MONTHNAME(penjualan.tanggal_penjualan) AS bulan, SUM(detail_penjualan.harga) AS pendapatan FROM penjualan JOIN detail_penjualan ON penjualan.id_penjualan = detail_penjualan.id_penjualan WHERE penjualan.status_penjualan = 1 GROUP BY MONTHNAME(penjualan.tanggal_penjualan);');
    }
    public function totalTransaksi()
    {
        $this->db->from('penjualan');
        return $this->db->count_all_results();
    }
    public function transaksiLunas()
    {
        $this->db->from('penjualan');
        $this->db->where('status_penjualan', 1);
        return $this->db->count_all_results();
    }
    public function transaksiBelumLunas()
    {
        $this->db->from('penjualan');
        $this->db->where('status_penjualan', 0);
        return $this->db->count_all_results();
    }
}
