<?php 
$host = "localhost";
$username = "root";
$password = "root";
$database = "dbapotik";
$koneksi = new mysqli( $host, $username, $password, $database );
if ($koneksi->connect_error){
echo 'Gagal koneksi ke database';
} else {
//koneksi berhsil
}
// membuat query max
  $carikode = mysqli_query($koneksi, "select max(Id_Pelanggan) from pelanggan") or die (mysql_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
   $nilaikode = substr($datakode[0], 1);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   $kode_otomatis = "Y".str_pad($kode, 4, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "Y0001";
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login - ApotikKu</title>
<link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/vendors/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/build/css/stylelogin.css" type="text/css" />
</head>
<body>

  <div class="signin-form">

  <div class="container">
     
        
       <form class="form-signin" method="post" action="proses_login_user.php">
      
        <h2 class="form-signin-heading">Sign In.</h2><hr />

        <div class="form-group">
        <input type="text" class="form-control" name="username" placeholder="Username" required="" />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Password" required="" />
        </div>
       
      <hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
        <span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
      </button> 
            
            <a href="register_login.php" class="btn btn-default" style="float:right;">Sign UP Here</a>
            
            <a href="../index.php.php" class="btn btn-default" style="float:right; margin-right: 10px;">Home</a>
        </div>  
      </form>

    </div>
    
</div>

</body>
</html>


