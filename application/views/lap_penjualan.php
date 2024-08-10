<?php
$pdf = new TCPDF();
$pdf->AddPage('P', 'mm', 'A4');

//Header page
$pdf->SetFont('', 'B', 14);
$pdf->Cell(190, 10, "LAPORAN DATA PENJUALAN", 0, 1, 'C');
$pdf->SetAutoPageBreak(true, 0);

//Header table
$pdf->Ln(10);
$pdf->SetFont('', 'B', 12);
$pdf->Cell(10, 8, "No", 1, 0, 'C');
$pdf->Cell(40, 8, "Pembeli", 1, 0, 'C');
$pdf->Cell(30, 8, "Produk", 1, 0, 'C');
$pdf->Cell(30, 8, "Harga Satuan", 1, 0, 'C');
$pdf->Cell(20, 8, "Jumlah", 1, 0, 'C');
$pdf->Cell(30, 8, "Tanggal", 1, 0, 'C');
$pdf->Cell(30, 8, "Total Harga", 1, 1, 'C');


//Table data
$pdf->SetFont('', '', 12);
$no = 0;
function formatRupiah($angka)
{
    return 'Rp' . number_format($angka, 0, ',', '.');
};
foreach ($produk as $item) {
    $no++;
    $pdf->Cell(10, 8, $no, 1, 0, 'C');
    $pdf->Cell(40, 8, $item->nama_pengguna, 1, 0);
    $pdf->Cell(30, 8, $item->nama_produk, 1, 0, 'C');
    $pdf->Cell(30, 8, formatRupiah($item->harga_jual), 1, 0, 'R');
    $pdf->Cell(20, 8, $item->jumlah, 1, 0, 'C');
    $pdf->Cell(30, 8, $item->tanggal_penjualan, 1, 0, 'C');
    $pdf->Cell(30, 8, formatRupiah($item->harga), 1, 1, 'R');
}
$pdf->SetFont('', 'B', 12);
$pdf->Cell(110, 8, "", 0, 0, 'R');
$pdf->Cell(50, 8, "Total Pendapatan", 1, 0, 'C');
$pdf->Cell(30, 8, formatRupiah($total['total_harga']), 1, 0, 'R');




date_default_timezone_set('Asia/Jakarta');
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
$tanggal_ini = date('d');
$bulan_ini = date('F');
$bulan_ini_indo = $nama_bulan[$bulan_ini];
$tahun_ini = date('Y');
$pengguna = $this->session->userdata('nama_pengguna');

$pdf->SetFont('', '', 12);
$pdf->Cell(190, 10, "", 0, 1, 'R');
$pdf->Cell(190, 10, "", 0, 1, 'R');
$pdf->Cell(190, 10, "", 0, 1, 'R');
$pdf->Cell(190, 10, "Yogyakarta, $tanggal_ini $bulan_ini_indo $tahun_ini", 0, 1, 'R');
$pdf->Cell(190, 10, "Disetujui Oleh,", 0, 1, 'R');
$pdf->Cell(190, 10, "", 0, 1, 'R');
$pdf->Cell(190, 10, "", 0, 1, 'R');
$pdf->SetFont('', 'B', 12);
$pdf->Cell(190, 10, "$pengguna", 0, 1, 'R');
$pdf->Output('Laporan Data Akun.pdf');
