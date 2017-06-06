<?php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	if(isset($_GET['kd_order'])){
	    $sql = mysqli_query($koneksi, "UPDATE orderan SET Tanggal_Kirim=now() WHERE Kd_Order='$_GET[kd_order]'");
	    if($sql){ 
	    	echo "<script> alert('Status telah dikirim'); window.location = '$admin_url'+'order/main.php';</script>";
	    }
	}
?>