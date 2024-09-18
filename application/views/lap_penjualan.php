<?php
$pdf = new TCPDF();
$pdf->AddPage('L', 'mm', 'A4');


$nama_bulan = [
    'January'   => 'Januari',
    'February'  => 'Februari',
    'March'     => 'Maret',
    'April'     => 'April',
    'May'       => 'Mei',
    'June'      => 'Juni',
    'July'      => 'Juli',
    'August'    => 'Agustus',
    'September' => 'September',
    'October'   => 'Oktober',
    'November'  => 'November',
    'December'  => 'Desember'
];
date_default_timezone_set('Asia/Jakarta');
$tanggal_ini = date('d');
$bulan_ini = date('F');
$bulan_ini_indo = $nama_bulan[$bulan_ini];
$tahun_ini = date('Y');

//Header page
$pdf->SetFont('', 'B', 14);
$pdf->Cell(280, 10, "Laporan Penjualan Bulan " . $bulan_ini_indo, 0, 1, 'C');
$pdf->SetAutoPageBreak(true, 0);

//Header table
$pdf->Ln(10);
$pdf->SetFont('', 'B', 12);
$pdf->Cell(10, 8, "No", 1, 0, 'C');
$pdf->Cell(45, 8, "Nama Pembeli", 1, 0, 'C');
$pdf->Cell(110, 8, "Produk", 1, 0, 'C');
$pdf->Cell(45, 8, "Tanggal Pembelian", 1, 0, 'C');
$pdf->Cell(30, 8, "Total Harga", 1, 0, 'C');
$pdf->Cell(35, 8, "Status", 1, 1, 'C');


//Table data
$pdf->SetFont('', '', 12);
$no = 0;
function formatRupiah($angka)
{
    return 'Rp' . number_format($angka, 0, ',', '.');
};

foreach ($laporan as $item):
    $tanggal = $item['tanggal_penjualan'];
    $bulan = date('F', strtotime($tanggal));
    $tahun = date('Y', strtotime($tanggal));
    $hari = date('d', strtotime($tanggal));
    $produkStr = '';
    foreach ($item['produk'] as $produk) {
        $produkStr .= $produk->nama_produk . ' x ' . $produk->jumlah . ', ';
    }
    $produkStr = rtrim($produkStr, ', ');
    if ($item['metode_pembayaran'] == 1) {
        $metodePembayaran = 'Lunas Tunai';
    } elseif ($item['metode_pembayaran'] == 2) {
        $metodePembayaran = 'Lunas Non Tunai';
    } else {
        $metodePembayaran = 'Hutang';
    }
    $no++;
    $pdf->Cell(10, 8, $no, 1, 0, 'C');
    $pdf->Cell(45, 8, $item['nama_pengguna'], 1, 0);
    $pdf->Cell(110, 8, $produkStr, 1, 0);
    $pdf->Cell(45, 8, $hari . ' ' . $bulan . ' ' . $tahun, 1, 0);
    $pdf->Cell(30, 8, formatRupiah($item['total_harga']), 1, 0, 'R');
    $pdf->Cell(35, 8, $metodePembayaran, 1, 1);
endforeach;

$pdf->SetFont('', 'B', 12);
$pdf->Cell(165, 8, "", 0, 0, 'R');
$pdf->Cell(45, 8, "Total Pendapatan", 1, 0, 'C');
$pdf->Cell(30, 8, formatRupiah($total['total_harga']), 1, 0, 'R');

$pengguna = $this->session->userdata('nama_pengguna');

$pdf->SetFont('', '', 12);
$pdf->Cell(280, 10, "", 0, 1, 'R');
$pdf->Cell(280, 10, "", 0, 1, 'R');
$pdf->Cell(280, 10, "", 0, 1, 'R');
$pdf->Cell(280, 10, "Yogyakarta, $tanggal_ini $bulan_ini_indo $tahun_ini", 0, 1, 'R');
$pdf->Cell(280, 10, "Disetujui Oleh,", 0, 1, 'R');
$pdf->Cell(280, 10, "", 0, 1, 'R');
$pdf->Cell(280, 10, "", 0, 1, 'R');
$pdf->SetFont('', 'B', 12);
$pdf->Cell(280, 10, "$pengguna", 0, 1, 'R');
$pdf->Output('Laporan Data Akun.pdf');
