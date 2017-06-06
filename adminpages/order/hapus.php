<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $idOrder = $_GET['Kd_Order'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM orderan WHERE Kd_Order='$idOrder'");
    if ($queryHapus) {
        echo "<script> alert('Data User Berhasil Dihapus'); window.location = '$admin_url'+'order/main.php';</script>";
    } else {
        echo "<script> alert('Data User Gagal Dihapus'); window.location = '$admin_url'+'order/main.php';</script>";

    }
?>