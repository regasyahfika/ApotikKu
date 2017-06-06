<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $idPelanggan = $_GET['id_pelanggan'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE Id_Pelanggan='$idPelanggan'");
    if ($queryHapus) {
        echo "<script> alert('Data User Berhasil Dihapus'); window.location = '$admin_url'+'user/main.php';</script>";
    } else {
        echo "<script> alert('Data User Gagal Dihapus'); window.location = '$admin_url'+'user/main.php';</script>";

    }
?>