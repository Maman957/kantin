<?php
$pdf = new TCPDF();
$pdf->AddPage('P', 'mm', 'A6');

$nama_bulan = [
    'January' => 'Januari',
    'February' => 'Februari',
    'March' => 'Maret',
    'April' => 'April',
    'May' => 'Mei',
    'June' => 'Juni',
    'July' => 'Juli',
    'August' => 'Agustus',
    'September' => 'September',
    'October' => 'Oktober',
    'November' => 'November',
    'December' => 'Desember'
];

foreach ($produk as $item) {
    $tanggal_penjualan = $item['tanggal_penjualan'];
}
$timestamp = strtotime($tanggal_penjualan);
$tanggal = date('d', $timestamp);
$bulan = date('F', $timestamp);
$bulan_indo = $nama_bulan[$bulan];
$tahun = date('Y', $timestamp);

$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(0, 10, "Kantin Kejujuran LP3I College Yogyakarta", 0, 1, 'C');
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(0, 10, "Bukti Transaksi", 0, 1, 'C');
$pdf->Ln(3);


$pengguna = $this->session->userdata('nama_pengguna');
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(0, 6, "Nama: " . $pengguna, 0, 1, 'L');
$pdf->Cell(0, 6, "Tanggal: " . $tanggal . ' ' . $bulan_indo . ' ' . $tahun, 0, 1, 'L');

$pdf->Ln(5);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(10, 8, "No", 1, 0, 'C');
$pdf->Cell(50, 8, "Nama Produk", 1, 0, 'C');
$pdf->Cell(25, 8, "Harga", 1, 0, 'C');
$pdf->Cell(15, 8, "Jumlah", 1, 0, 'C');
$pdf->Cell(30, 8, "Subtotal", 1, 1, 'C');

$pdf->SetFont('helvetica', '', 10);
$no = 1;
$total = 0;

function formatRupiah($angka)
{
    return 'Rp' . number_format($angka, 0, ',', '.');
}

foreach ($produk as $item) {
    $subtotal = $item['jumlah'] * $item['harga_jual'];
    $total += $subtotal;

    $pdf->Cell(10, 8, $no++, 1, 0, 'C');
    $pdf->Cell(50, 8, $item['nama_produk'], 1, 0);
    $pdf->Cell(25, 8, formatRupiah($item['harga_jual']), 1, 0, 'R');
    $pdf->Cell(15, 8, $item['jumlah'], 1, 0, 'C');
    $pdf->Cell(30, 8, formatRupiah($subtotal), 1, 1, 'R');
}

$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(100, 8, "Total Harga", 1, 0);
$pdf->Cell(30, 8, formatRupiah($total), 1, 1, 'R');

$metodePembayaran = '';
$pesanPembayaran = '';

if ($item['metode_pembayaran'] == 1) {
    $metodePembayaran = 'Lunas Tunai';
    $pesanPembayaran = 'Terima kasih telah membayar secara tunai.';
} elseif ($item['metode_pembayaran'] == 2) {
    $metodePembayaran = 'Lunas Non Tunai';
    $pesanPembayaran = 'Pembayaran berhasil secara non tunai.';
} else {
    $metodePembayaran = 'Hutang';
    $pesanPembayaran = 'Harap segera melunasi hutang Anda.';
}

$pdf->Cell(100, 8, "Metode Pembayaran", 1, 0);
$pdf->Cell(30, 8, $metodePembayaran, 1, 1, 'R');

$pdf->Ln(5);
$pdf->SetFont('helvetica', 'I', 9);
$pdf->Cell(0, 10, $pesanPembayaran, 0, 1, 'C');

$pdf->Ln(15);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(0, 10, "Ahmad Lukman", 0, 1, 'R');
$pdf->Cell(0, 10, "Pengelola", 0, 1, 'R');

$pdf->Output('Bukti_Transaksi.pdf', 'I');
