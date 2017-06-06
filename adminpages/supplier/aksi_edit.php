<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'nama_kategori' dan 'id_kategori' yang dikirim oleh form_edit.php
	$kdsupplier  = $_POST['kd_supplier'];
	$nm_supplier = $_POST['nm_supplier'];
	$alamat      = $_POST['alamat'];
	$telp        = $_POST['telp'];
	$email       = $_POST['email'];
	// query untuk mengubah ke tabel tbl_kategori
	
	$querySimpan = mysqli_query($koneksi, "UPDATE supplier SET nm_supplier='$nm_supplier', alamat='$alamat', telp='$telp', email='$email' WHERE kd_supplier='$kdsupplier'");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
	if ($querySimpan) {
		echo "<script> alert('Data Kategori Berhasil Diubah'); window.location = '$admin_url'+'supplier/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form edit kategori
	} else {
		echo "<script> alert('Data Kategori Gagal Dimasukkan'); window.location = '$admin_url'+'supplier/form_edit.php?id_kategori=$id_kategori';</script>";
	}
?>