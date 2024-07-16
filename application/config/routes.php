<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'LoginController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;

$route['proses_login'] = 'LoginController/prosesLogin';
$route['daftar'] = 'LoginController/daftar';
$route['dasbor'] = 'ProdukController/dasbor';
$route['produk'] = 'ProdukController/produk';
$route['laporan'] = 'ProdukController/laporan';
$route['profil'] = 'ProdukController/profil';
$route['hapus_produk/(:num)'] = 'ProdukController/hapusProduk/$1';
$route['hapus_akun/(:num)'] = 'ProdukController/hapusAkun/$1';
$route['tambah_produk'] = 'ProdukController/tambahProduk';
$route['proses_daftar'] = 'LoginController/prosesDaftar';
$route['simpan_produk'] = 'ProdukController/simpanProduk';
$route['simpan_foto'] = 'ProdukController/simpanFoto';
$route['ubah_produk/(:num)'] = 'ProdukController/ubahProduk/$1';
$route['update_produk'] = 'ProdukController/updateProduk';
$route['update_pengguna'] = 'ProdukController/updatePengguna';
$route['get_produk'] = 'KatalogController/getProduk';
$route['keranjang'] = 'ProdukController/keranjang';
$route['get_keranjang'] = 'ProdukController/getKeranjang';
$route['simpan_keranjang'] = 'ProdukController/simpanKeranjang';
$route['akun'] = 'ProdukController/akun';
$route['cetak'] = 'ProdukController/cetak';
$route['ubah_akun/(:num)'] = 'ProdukController/ubahAkun/$1';
$route['update_akun'] = 'ProdukController/updateAkun';
$route['update_profil'] = 'ProdukController/updateProfil';
$route['upload_foto'] = 'ProdukController/uploadFoto';
$route['get_produk'] = 'ProdukController/getKeranjang';
$route['tambah_akun'] = 'ProdukController/tambahAkun';

$route['katalog'] = 'KatalogController/katalog';
$route['makanan/(:num)'] = 'KatalogController/getKategori/$1';
$route['minuman/(:num)'] = 'KatalogController/getKategori/$1';



$route['simpan_favorite'] = 'FilmController/simpanFavorite';
$route['favorite'] = 'FilmController/favorite';
$route['drama'] = 'FilmController/drama';
$route['fantasi'] = 'FilmController/fantasi';
$route['roman'] = 'FilmController/roman';
$route['animasi'] = 'FilmController/animasi';
$route['komedi'] = 'FilmController/komedi';
$route['fiksi_ilmiah'] = 'FilmController/fiksi_ilmiah';
$route['misteri'] = 'FilmController/misteri';
$route['action'] = 'FilmController/action';
$route['pertama'] = 'FilmController/pertama';
$route['kedua'] = 'FilmController/kedua';
$route['ketiga'] = 'FilmController/ketiga';
$route['owner/(:num)'] = 'ParfumController/owner/$1';

$route['detail/(:num)'] = 'FilmController/detail/$1';
$route['simpan_film'] = 'FilmController/simpanFilm';
$route['simpan_komentar'] = 'FilmController/simpanKomentar';
$route['ubah_film/(:num)'] = 'FilmController/halaman_ubah/$1';
$route['update_film'] = 'FilmController/updateFilm';
$route['hapus_film/(:any)'] = 'FilmController/hapusFilm/$1';
$route['hapus_favorite/(:any)'] = 'FilmController/hapusFavorite/$1';
