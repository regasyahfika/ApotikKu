<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'nama_kategori' dan 'id_kategori' yang dikirim oleh form_edit.php
	$id_produk = $_POST['id_produk'];
	$namaKategori = $_POST['nama_kategori'];
	$nmSupplier = $_POST['nm_supplier'];
	$namaProduk = $_POST['nama_produk'];
	$fileName = $_FILES['gambar']['name'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	// query untuk mengubah ke tabel tbl_kategori
	if($fileName==""){
		$querySimpan = mysqli_query($koneksi, "UPDATE produk SET Id_Kategori='$namaKategori', kd_supplier='$nmSupplier', Nama_Produk='$namaProduk', Harga_Produk='$harga', Stock='$stok' WHERE Id_Produk='$id_produk'");
	

} else {
	$querySimpan = mysqli_query($koneksi, "UPDATE produk SET Id_Kategori='$namaKategori', kd_supplier='$nmSupplier', Nama_Produk='$namaProduk', Harga_Produk='$harga', Gambar='$fileName', Stock='$stok' WHERE Id_Produk='$id_produk'");
	
	move_uploaded_file($_FILES['gambar']['tmp_name'], "../../assets/file/produk/".$_FILES['gambar']['name']);
}
	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
	if ($querySimpan) {
		echo "<script> alert('Data Produk Berhasil Diubah'); window.location = '$admin_url'+'produk/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form edit kategori
	} else {
		echo "<script> alert('Data Produk Gagal Dimasukkan'); window.location = '$admin_url'+'produk/form_edit.php?id_produk=$id_produk';</script>";
	}
?>