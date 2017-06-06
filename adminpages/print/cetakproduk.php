<?php
require('../../assets/fpdf/fpdf.php');
require('../../lib/koneksi.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('../../assets/images/keranjang.gif' , 10 ,8, 10 , 13,'GIF');
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(150, 10, 'ApotikKu.com', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Tanggal: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'Laporan Produk', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(15, 8, 'No', 0);
$pdf->Cell(40, 8, 'Id Produk', 0);
$pdf->Cell(40, 8, 'Nama Kategori', 0);
$pdf->Cell(38, 8, 'Nama Produk', 0);
$pdf->Cell(36, 8, 'Harga Produk', 0);
$pdf->Cell(36, 8, 'Stok', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$detail = mysqli_query($koneksi, "SELECT * FROM produk A LEFT JOIN kategori F ON A.Id_Kategori = F.Id_Kategori ORDER BY A.Id_Produk DESC");
$no = 0;

while($detailOrder = mysqli_fetch_array($detail)){
	$no = $no+1;
	$pdf->Cell(15, 8, $no, 0);
	$pdf->Cell(40, 8, $detailOrder['Id_Produk'], 0);
	$pdf->Cell(40, 8, $detailOrder['Nama_Kategori'], 0);
	$pdf->Cell(40, 8, $detailOrder['Nama_Produk'], 0);
	$pdf->Cell(36, 8, 'Rp. '. $detailOrder['Harga_Produk'], 0);
	$pdf->Cell(36, 8, $detailOrder['Stock'], 0);
	$pdf->Ln(8);
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(114,8,'',0);

$pdf->Output();
?>