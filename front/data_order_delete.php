<?php

include '../lib/koneksi.php';

$kd_order = $_GET['Kd_Order'];

$query = "DELETE FROM orderan WHERE Kd_Order = '$kd_order'";
$hasil = mysqli_query($koneksi, $query);

if ($hasil == true) {
    header('location: data_order.php');
} else {
    header('location: error.php');
}
