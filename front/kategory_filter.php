<?php 
require_once("../lib/koneksi.php");

?>



<!DOCTYPE HTML>
<html>
<head>
<title>ApotikKu - Apotik Online Sederhana</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="icon" type="image" href="../assets/images/logo.png">
<link href="../assets/build/css/style.css" rel="stylesheet" type="text/css">
<link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/build/css/slider.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="../assets/js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="../assets/js/move-top.js"></script>
<script type="text/javascript" src="../assets/js/easing.js"></script>
<script type="text/javascript" src="../assets/js/startstop-slider.js"></script>
</head>
<body>
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php" style="color: #ffffff;">ApotikKu</a>
        </div>
        <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
            <li><a class="type hover" href="index.php" style="color: #ffffff;">Home</a></li>
          <li><a href="about.php" style="color: #ffffff;">About</a></li>
          <li><a href="artikel.php" style="color: #ffffff;">Artikel</a></li>
          <li><a href="contact.php" style="color: #ffffff;">Contact</a></li>
    </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="front/register_login.php" style="color: #ffffff;"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="logout.php?logout" style="color: #ffffff; margin-right: 50px;"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
          </ul> 
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

  <div class="wrap">
    <div class="cart">
          <a href="order_barang.php" style="text-decoration: none; color: #00a445;"><span class="glyphicon glyphicon-shopping-cart" style="margin: 50px 10px; "></span> <p>Order</p></a>
        </div>


       <div class="clear"></div>
     </div>

<?php 
$host = "localhost";
$username = "root";
$password = "";
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

 <div class="front">
    <div class="content">
      <div class="content_top">
        <div class="col-md-5">
        <h3 style="margin-left: 20px;">Detail Produk</h3>
        </div>
        <div class="clear"></div>
      </div>
        <div class="section group" style="margin-left: 5%;">

        <?php foreach ($kate as $data_produk) : ?>
          
          <div class="grid_1_of_4 images_1_of_4">
           <img src="../assets/file/produk/<?php echo $data_produk['Gambar'];?>" alt="learn more" /></a>
           <h2><?php echo $data_produk['Nama_Produk'];?> </h2>
          <div class="price-details">
               <div class="price-number">
              <p><span class="rupees">Rp. <?php echo $data_produk['Harga_Produk'];?></span></p>
              </div>
                    <div class="add-cart">                
                  <h4><a href="input.php?input=add&id=<?php echo $data_produk['Id_Produk']; ?>&harga=<?php echo $data_produk['Harga_Produk']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to Cart</a></h4>
                   </div>
               <div class="clear"></div>
          </div>
           
          </div>
      </div>
      
      
    </div>
 </div>
   <div class="footer">
      <div class="wrap">  
       <div class="section group">
        <div class="col_1_of_4 span_1_of_4">
            <h4>Information</h4>
            <ul>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Customer Service</a></li>
            <li><a href="#">Advanced Search</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            </ul>
          </div>
        <div class="col_1_of_4 span_1_of_4">
          <h4>Why buy from us</h4>
            <ul>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Customer Service</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="contact.php">Site Map</a></li>
            <li><a href="#">Search Terms</a></li>
            </ul>
        </div>
        <div class="col_1_of_4 span_1_of_4">
          <h4>My account</h4>
            <ul>
              <li><a href="contact.php">Sign In</a></li>
              <li><a href="index.php">View Cart</a></li>
              <li><a href="#">My Wishlist</a></li>
              <li><a href="#">Track My Order</a></li>
              <li><a href="contact.php">Help</a></li>
            </ul>
        </div>
        <div class="col_1_of_4 span_1_of_4">
          <h4>Contact</h4>
            <ul>
              <li><span>081293396676</span></li>
              <li><span>081293396676</span></li>
            </ul>
            <div class="social-icons">
              <h4>Follow Us</h4>
                  <ul>
                    <li><a href="#" target="_blank"><img src="../assets/images/facebook.png" alt="" /></a></li>
                    <li><a href="#" target="_blank"><img src="../assets/images/twitter.png" alt="" /></a></li>
                    <li><a href="#" target="_blank"><img src="../assets/images/skype.png" alt="" /> </a></li>
                    <li><a href="#" target="_blank"> <img src="../assets/images/dribbble.png" alt="" /></a></li>
                    <li><a href="#" target="_blank"> <img src="../assets/images/linkedin.png" alt="" /></a></li>
                    <div class="clear"></div>
                 </ul>
              </div>
        </div>
      </div>      
        </div>
        <div class="copy_right">
        <p>Copyright &copy; 2016 All rights Reseverd | <a href="#">ApotikKu.com</a> - Apotik Online Sederhana </p>
       </div>
    </div>

    <script src="../assets/build/js/bootstrap.min.js"></script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>

