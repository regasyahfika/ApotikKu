<?php
session_start();
error_reporting(0);
include "../lib/koneksidua.php";
include "tanggal.php";
$id_pel= $_POST['id_pelanggan'];
$alamat= $_POST['alamat'];
$email= $_POST['email'];
$telephon= $_POST['telephon'];
$input=$_GET[input];
$harga=$_GET['harga'];
$id_order=$_POST['id_order'];
$sid = session_id();
$inputform=$_GET[inputform];

if($input=='add'){
	$sqla = mysql_query("SELECT Stock FROM produk WHERE Id_Produk='$_GET[id]'");
	$rowf = mysql_fetch_array($sqla);
	$stk = $rowf['Stock'];
	if ($stk<=0) {
		header('location:error.php');
	} else {
	$sql = mysql_query("SELECT Id_Produk FROM keranjang WHERE Id_Produk='$_GET[id]' AND Id_Session='$sid'");
	$num = mysql_num_rows($sql);
	if ($num==0){
		mysql_query("INSERT INTO keranjang(Id_Produk,Id_Session,Tanggal_Keranjang,Qty,harga) VALUES	('$_GET[id]','$sid','$tgl_sekarang','1',$harga)");
	}
	else {
		mysql_query("UPDATE keranjang SET Qty = Qty + 1 WHERE Id_Session = '$sid' AND Id_Produk='$_GET[id]'");
	}
	deletecart();
	header('location:order_barang.php');
	}
}
				
elseif ($input=='delete'){
	mysql_query("DELETE FROM keranjang WHERE id_keranjang='$_GET[id]'");
	header('location:order_barang.php');
	}
elseif ($input=='inputform'){
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

	$now = date("Ymd");
	$sql2 = mysql_query("SELECT SUM(harga) as total FROM keranjang WHERE Id_Session = '$sid' ");
	$row = mysql_fetch_array($sql2);
	$sum = $row['total'];
	
	$sql3 = mysql_query("SELECT SUM(Qty) as jumlah FROM keranjang WHERE Id_Session = '$sid' ");
	$row = mysql_fetch_array($sql3);
	$jum = $row['jumlah'];
	
	for($i=0; $i<$jml; $i++){
    $hitato = mysql_query("SELECT Qty FROM keranjang WHERE Id_Produk = '{$ct_content[$i]['Id_Produk']}' AND Id_Session = '$sid' ");
    $row = mysql_fetch_array($hitato);
	$jum1 = $row['Qty'];
	$hitaro = mysql_query("SELECT harga FROM keranjang WHERE Id_Produk = '{$ct_content[$i]['Id_Produk']}' AND Id_Session ='$sid' ");
    $rowl = mysql_fetch_array($hitaro);
	$jum12 = $rowl['harga'];

	$kali = $jum1*$jum12;
	$tambah = $kali+$tambah;
	}	
	
	/*mysql_query("INSERT INTO orderan (Kd_Order, Id_Pelanggan,Id_Produk, Jumlah,Tanggal,Total_Harga)  
    VALUES ('','Y0001','P0002','10',now(),'1000')"); */

    /*mysql_query("INSERT INTO orderan (Kd_Order, Id_Pelanggan,Id_Produk, Jumlah,Tanggal,Total_Harga)  
    VALUES ('','Y0001','P0002',{$ct_content[$i]['Qty']},now(),'1000')"); */
    mysql_query("UPDATE pelanggan 
    SET Alamat='$alamat', Email='$email', Telepon=$telephon
    WHERE Id_Pelanggan = '$id_pel'");
    
    mysql_query("INSERT INTO orderan (Kd_Order, Id_Pelanggan, Jumlah, Tanggal,Total_Harga)  
    VALUES ('$id_order','$_POST[id_pelanggan]', $jum, now(),$tambah)"); 
	
	//To Dia
	//Error Code Aja Di perhatiin apalagi kamu.. :D
	//Cowok Programmer emang idaman ya,, wkwk

	for($i=0; $i<$jml; $i++){
	mysql_query("INSERT INTO detail_order (Kd_Order,Id_Produk,Id_Detail,Harga,Quantity)  
    VALUES ('$id_order','{$ct_content[$i]['Id_Produk']}','',{$ct_content[$i]['harga']},{$ct_content[$i]['Qty']})"); 
		}
	

	for($i=0; $i<$jml; $i++){
	$hasil=$dt_produk[$i]['Stock']-$ct_content[$i]['Qty'];
	mysql_query("UPDATE produk
    SET Stock=$hasil
    WHERE Id_Produk = '{$ct_content[$i]['Id_Produk']}' ");

	}	

	for($i=0; $i<$jml; $i++){
		mysql_query("DELETE FROM keranjang WHERE Id_Keranjang = {$ct_content[$i]['Id_Keranjang']}");
		}
		echo "<script>window.alert('Terima Kasih Pesanan Anda Sedang Kami Proses');
        window.location=('index.php')</script>";
	}								
												

function deletecart(){
	$del = date('Y-m-d', mktime(0,0,0, date('m'), date('d') - 1, date('Y')));
	mysql_query("DELETE FROM keranjang WHERE Tanggal_Keranjang < '$del'");
	}
	

