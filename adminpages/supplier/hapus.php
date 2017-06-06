<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $kdsupplier = $_GET['kd_supplier'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM supplier WHERE kd_supplier='$kdsupplier'");
    if ($queryHapus) {
        echo "<script> alert('Data Kategori Berhasil Dihapus'); window.location = '$admin_url'+'supplier/main.php';</script>";
    } else {
        echo "<script> alert('Data Kategori Gagal Dihapus'); window.location = '$admin_url'+'supplier/main.php';</script>";

    }
?>