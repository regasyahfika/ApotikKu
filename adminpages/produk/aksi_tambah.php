<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";
	// untuk menangkap variabel 'nama_kategori' yang dikirim oleh form_tambah.php
	$id_produk= $_POST['id_produk'];
	$namaKategori = $_POST['nama_kategori'];
	$nmSupplier = $_POST['nm_supplier'];
	$namaProduk = $_POST['nama_produk'];
	$harga = $_POST['harga'];
	$fileName = $_FILES['gambar']['name'];
	$stok = $_POST['stock'];
	// query untuk menyimpan ke tabel tbl_kategori
	
	$querySimpan = mysqli_query($koneksi, "INSERT INTO produk (Id_Produk, Id_Kategori, kd_supplier, Nama_Produk, Harga_Produk, Stock, Gambar) VALUES ('$id_produk', '$namaKategori', '$nmSupplier', '$namaProduk', '$harga', '$stok', '$fileName')");
	
	move_uploaded_file($_FILES['gambar']['tmp_name'], "../../assets/file/produk/".$_FILES['gambar']['name']);
	
	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
	if ($querySimpan) {
		echo "<script> alert('Data Produk Berhasil Masuk'); window.location = '$admin_url'+'produk/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
	} else {
		echo "<script> alert('Data Produk Gagal Dimasukkan'); window.location = '$admin_url'+'produk/form_tambah.php';</script>";
	}
?>