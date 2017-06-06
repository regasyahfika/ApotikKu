<?php
	//Lanjutkan session yang sudah dibuat sebelumnya
  session_start();

  //hapus session yang sudah dibuat
  session_destroy();

  //alert agar dapat berinteraktif
  //windows.location redirect ke halaman index
  echo "<script>alert('Anda telah keluar dari halaman pelanggan'); window.location = '../index.php'</script>";

?>