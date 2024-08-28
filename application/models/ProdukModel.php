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
        return $this->db->query('SELECT pengguna.nama_pengguna, produk.nama_produk, produk.harga_jual, detail_penjualan.jumlah, detail_penjualan.harga, penjualan.tanggal_penjualan FROM detail_penjualan JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan JOIN produk ON detail_penjualan.id_produk = produk.id_produk JOIN pengguna ON penjualan.id_pengguna = pengguna.id_pengguna;');
    }
    public function getTransaksi($id_pengguna)
    {
        $query = $this->db->select('produk.nama_produk, produk.harga_jual, produk.gambar, detail_penjualan.jumlah, detail_penjualan.harga, penjualan.tanggal_penjualan, penjualan.metode_pembayaran')
            ->from('detail_penjualan')
            ->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan')
            ->join('produk', 'detail_penjualan.id_produk = produk.id_produk')
            ->join('pengguna', 'penjualan.id_pengguna = pengguna.id_pengguna')
            ->where('penjualan.id_pengguna', $id_pengguna)
            ->get();

        return $query->result();
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
        produk.nama_produk,
        produk.harga_jual,
        produk.gambar,
        detail_penjualan.jumlah,
        detail_penjualan.harga,
        penjualan.tanggal_penjualan,
        penjualan.metode_pembayaran
    ');
        $this->db->from('detail_penjualan');
        $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
        $this->db->join('produk', 'detail_penjualan.id_produk = produk.id_produk');
        $this->db->join('pengguna', 'penjualan.id_pengguna = pengguna.id_pengguna');
        $this->db->where('penjualan.id_pengguna', $id_pengguna);
        return $this->db->get();
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
}
