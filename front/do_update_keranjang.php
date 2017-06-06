<?php
session_start();
error_reporting(0);
include "../lib/koneksidua.php";

include '../lib/koneksi.php';

$jmlh = $_POST['jumlah']; //ke balik ga masalah
$id_ker = $_POST['id_ker'];
//$post = $_POST['nama_produk'];        // get posted value


$list = count($jmlh);           // count separated values

for($i=0;$i<$list;$i++){
    $sql4 = "UPDATE keranjang SET Qty = $jmlh[$i]
    WHERE Id_Keranjang = '$id_ker[$i]' ";
    mysqli_query($koneksi,$sql4);
}

	function cart_content(){
	$ct_content = array();
	$sid = session_id();
	$sql = mysql_query("SELECT * FROM keranjang WHERE Id_Session='$sid'");
	
	while ($r=mysql_fetch_array($sql)) {
		$ct_content[] = $r;
	}
	return $ct_content;
	}	

	$ct_content = cart_content();
	$jml = count($ct_content);

	echo '<pre>';print_r($ct_content);
	echo "$jml";
	echo '</pre>';

	function data_produk(){
		$dt_produk = array();
		$ct_content = cart_content();
		$jml = count($ct_content); //cara lain bikin var global

		for($i=0; $i<$jml; $i++){
			$hit = mysql_query("SELECT * FROM produk WHERE Id_Produk = '{$ct_content[$i]['Id_Produk']}' ");
			while ($r=mysql_fetch_array($hit)) {
				$dt_produk[] = $r;
		}

		}
		
		return $dt_produk;
	}
	$dt_produk = data_produk();


header('location: order_barang.php');
for($i=0; $i<$jml; $i++){
	$hasil[$i] = $dt_produk[$i]['Stock']-$ct_content[$i]['Qty']; 
	if ($hasil[$i]<0) {
		header('location: error.php');
	} else {
		header('location: order_barang.php');
	}
}
?>

