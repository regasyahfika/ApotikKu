<?php 
require_once("../lib/koneksi.php");
session_start();

// jika sudah login, alihkan ke halaman list
if (!isset($_SESSION['user'])) {
    header('Location: login_user.php');
    exit();
}
?>

<?php 
require '../lib/koneksi.php';
require '../lib/config_web.php';

?>
<!DOCTYPE HTML>
<html>
<head>
<title>ApotikKu - Apotik Online Sederhana</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="icon" type="image" href="../assets/images/logo.png">
<link href="../assets/build/css/style.css" rel="stylesheet" type="text/css">
<link href="../assets/build/css/slider.css" rel="stylesheet" type="text/css">
<link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

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
            <li><a href="home_user.php" style="color: #ffffff;"><span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $_SESSION['user']['Username'];  ?></a></li>
            <li><a href="logout.php?logout" style="color: #ffffff; margin-right: 50px;"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
          </ul>	
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

 <div class="main" style="margin: 50px 20px;">
    <div class="content">
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Contact Us</h2>
					    <form method="post" action="contact-post.php">
					    	<div>
						    	<span><label>Nama</label></span>
						    	<span><input name="userName" type="text" class="textbox" ></span>
						    </div>
						    <div>
						    	<span><label>E-mail</label></span>
						    	<span><input name="userEmail" type="text" class="textbox"></span>
						    </div>
						    <div>
						     	<span><label>No Telphone</label></span>
						    	<span><input name="userPhone" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>Pesan</label></span>
						    	<span><textarea name="userMsg"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" value="Submit"  class="myButton" ></span>
						  </div>
					    </form>
				  </div>
  				</div>
				<div class="col span_1_of_3">
      			<div class="company_address">
				     	<h3>Info Kontak :</h3>
				   		<p>Phone:+6281293396676</p>
				 	 	<p>Email: <span>rega.syahfika@gmail.com</span></p>
				   		<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
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
						<li><a href="artikel.php">Artikel</a></li>
						<li><a href="#">Advanced Search</a></li>
						<li><a href="contact.php">Contact Us</a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Why buy from us</h4>
						<ul>
						<li><a href="about.php">About Us</a></li>
						<li><a href="artikel.php">Artikel</a></li>
						<li><a href="about">Privacy Policy</a></li>
						<li><a href="#">Site Map</a></li>
						<li><a href="#">Search Terms</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul>
							<li><a href="login_user.php">Sign In</a></li>
							<li><a href="order_barang.php">View Cart</a></li>
							<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Track My Order</a></li>
							<li><a href="#">Help</a></li>
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
    <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<script type="text/javascript">
			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-2').removeClass('active');
				});

			});

		</script>
		<script src="../assets/build/js/bootstrap.min.js"></script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>

