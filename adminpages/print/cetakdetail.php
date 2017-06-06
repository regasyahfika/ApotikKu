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
$pdf->Cell(100, 8, 'Laporan Detail Order', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(15, 8, 'No', 0);
$pdf->Cell(38, 8, 'Kode Order', 0);
$pdf->Cell(30, 8, 'Nama User', 0);
$pdf->Cell(36, 8, 'Jumlah Item Barang', 0);
$pdf->Cell(36, 8, 'Total Nilai Orderan', 0);
$pdf->Cell(25, 8, 'Tanggal', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$detail = mysqli_query($koneksi, "SELECT * FROM orderan A LEFT JOIN pelanggan F ON A.Id_Pelanggan = F.Id_Pelanggan ORDER BY A.Kd_Order DESC");
$no = 0;
// $totaluni = 0;
// $totaldis = 0;
while($detailOrder = mysqli_fetch_array($detail)){
	$no = $no+1;
	// $totaluni = $totaluni + $detailOrder['precio_unit'];
	// $totaldis = $totaldis + $detailOrder['precio_dist'];
	$pdf->Cell(15, 8, $no, 0);
	$pdf->Cell(40, 8, $detailOrder['Kd_Order'], 0);
	$pdf->Cell(40, 8, $detailOrder['Username'], 0);
	$pdf->Cell(25, 8, $detailOrder['Jumlah'], 0);
	$pdf->Cell(36, 8, 'Rp. ' .$detailOrder['Total_Harga'], 0);
	$pdf->Cell(25, 8, $detailOrder['Tanggal'], 0);
	$pdf->Ln(8);
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(114,8,'',0);
// $pdf->Cell(31,8,'Total Unitario: S/. '.$totaluni,0);
// $pdf->Cell(32,8,'Total Dist: S/. '.$totaldis,0);
$pdf->Output();
?>