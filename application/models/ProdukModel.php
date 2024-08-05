<?php

class ProdukModel extends CI_Model
{
    public function getProduk($keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_produk', $keyword);
        }
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
    public function getTotalHargaCetak()
    {
        return $this->db->query('SELECT SUM(detail_penjualan.harga) AS total_harga FROM detail_penjualan JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan WHERE penjualan.status_penjualan = 1;');
    }
    public function getKategori($id_kategori)
    {
        $this->db->like('id_kategori', $id_kategori);
        return $this->db->get('produk');
    }
    public function getPenggunaById($id_pengguna)
    {
        return $this->db->get_where('pengguna', ['id_pengguna' => $id_pengguna]);
    }
    public function hapusProduk($id_produk)
    {
        $this->db->where('id_produk', $id_produk)->delete('produk');
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
            'tanggal_update' => $data['tanggal_update'],
        );

        $this->db->insert('produk', $value);
    }
    public function simpanFoto($data)
    {
        $date = date('Y-m-d');
        $value = array(
            'foto' => null,
            'tanggal_update' => $date,
        );

        $this->db->where('id_pengguna', $data['id_pengguna'])->update('pengguna', $value);
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
        return $this->db->query('SELECT produk.id_produk,produk.gambar,produk.nama_produk,produk.harga_jual FROM produk join keranjang on produk.id_produk=keranjang.id_produk WHERE keranjang.id_pengguna=' . $id_pengguna);
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




    public function getGenre($keyword = null)
    {
        if ($keyword) {
            $this->db->like('genre', $keyword);
        }
        return $this->db->get('table_film');
    }
    public function getTahun($keyword = null)
    {
        if ($keyword) {
            $this->db->like('tahun_rilis', $keyword);
        }
        return $this->db->get('table_film');
    }
    public function simpanAkun($data)
    {
        $value = array(
            'nama' => $data['nama'],
            'email' => $data['email'],
            'password' => $data['password'],
            'tipe' => $data['tipe']
        );

        $this->db->insert('users', $value);
    }
    public function getFilmById($id_film)
    {
        return $this->db->get_where('table_film', ['id_film' => $id_film]);
    }
    public function simpanFavorite($data)
    {
        $value = array(
            'id_film' => $data['id_film'],
            'id_pengguna' => $data['id_pengguna'],
        );

        $this->db->insert('favorite', $value);
    }
    public function simpanKomentar($data)
    {
        $value = array(
            'id_film' => $data['id_film'],
            'id_pengguna' => $data['id_pengguna'],
            'pesan' => $data['pesan'],
        );

        $this->db->insert('komentar', $value);
    }
    public function favorite($id_pengguna)
    {
        return $this->db->query('SELECT table_film.id_film,table_film.judul,table_film.deskripsi,table_film.tahun_rilis,table_film.genre,table_film.download,table_film.gambar,table_film.foto,favorite.id_favorite FROM table_film join favorite on table_film.id_film=favorite.id_film WHERE favorite.id_pengguna=' . $id_pengguna);
    }
    public function komentar($id_film)
    {
        return $this->db->query('SELECT komentar.pesan,users.nama FROM komentar join users on users.id_pengguna=komentar.id_pengguna WHERE komentar.id_film=' . $id_film);
    }
    public function simpanFilm($data)
    {
        $value = array(
            'judul' => $data['judul'],
            'deskripsi' => $data['deskripsi'],
            'tahun_rilis' => $data['tahun_rilis'],
            'genre' => $data['genre'],
            'download' => $data['download'],
            'gambar' => $data['gambar'],
            'foto' => $data['foto'],
            'video' => $data['video'],
        );

        $this->db->insert('table_film', $value);
    }
    public function updateFilm($data)
    {
        $value = array(
            'judul' => $data['judul'],
            'deskripsi' => $data['deskripsi'],
            'tahun_rilis' => $data['tahun_rilis'],
            'genre' => $data['genre'],
            'download' => $data['download'],
            'gambar' => $data['gambar'],
            'foto' => $data['foto'],
            'video' => $data['video'],
        );

        $this->db->where('id_film', $data['id_film'])->update('table_film', $value);
    }
    public function hapusFilm($id_film)
    {
        $this->db->where('id_film', $id_film)->delete('table_film');
    }
    public function hapusFavorite($id_favorite)
    {
        $this->db->where('id_favorite', $id_favorite)->delete('favorite');
    }
}
