<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'nama_kategori' yang dikirim oleh form_tambah.php
	$kdsupplier  = $_POST['kd_supplier'];
	$nm_supplier = $_POST['nm_supplier'];
	$alamat      = $_POST['alamat'];
	$telp        = $_POST['telp'];
	$email       = $_POST['email'];
	// query untuk menyimpan ke tabel tbl_kategori
	
	$querySimpan = mysqli_query($koneksi, "INSERT INTO supplier (kd_supplier, nm_supplier, alamat, telp, email) VALUES ('$kdsupplier','$nm_supplier', '$alamat', '$telp', '$email')");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
	if ($querySimpan) {
		echo "<script> alert('Data Kategori Berhasil Masuk'); window.location = '$admin_url'+'supplier/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
	} else {
		echo "<script> alert('Data Kategori Gagal Dimasukkan'); window.location = '$admin_url'+'supplier/form_tambah.php';</script>";
	}
?>