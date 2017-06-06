<?php
require 'lib/koneksi.php';
require 'lib/config_web.php';

?>
<!DOCTYPE HTML>
<html>
<head>
<title>ApotikKu - Apotik Online Sederhana</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="icon" type="image" href="assets/images/logo.png">
<link href="assets/build/css/style.css" rel="stylesheet" type="text/css">
<link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/build/css/slider.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="assets/js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="assets/js/move-top.js"></script>
<script type="text/javascript" src="assets/js/easing.js"></script>
<script type="text/javascript" src="assets/js/startstop-slider.js"></script>
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
      			<li><a href="" class="dropdown-toggle" data-toggle="dropdown" style="margin-right: 50px; color: #ffffff;"><span class="glyphicon glyphicon-log-in"></span> Login
      				<ul class="dropdown-menu">
                        <li><a href="front/login_user.php">User</a></li>
                        <li><a href="adminpages/index.php" style="margin-top: 10px;">Admin</a></li>
                    </ul>
                    </a>
      			</li>

		</ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

  <div class="wrap">
  	<div class="cart">
  				<a href="front/order_barang.php" style="text-decoration: none; color: #00a445;"><span class="glyphicon glyphicon-shopping-cart" style="margin: 50px 10px; "></span> <p>Order</p></a>
			  </div>

	<div class="header_slide" style="margin-top: 32px;">
			<div class="header_bottom_left">				
				<?php include 'category_products.php'; ?>				
	  	     </div>
					 <div class="header_bottom_right" style="margin-left: 25%; margin-top: -5%;">					 
					 	 <div class="slider">					     
							 <div id="slider">
			                    <div id="mover">
			                    <?php
				      		$q = mysqli_query($koneksi, "select * from produk ORDER BY id_produk ASC LIMIT 3");
				      		while($data= mysqli_fetch_array($q)){
							?>
			                    	<div id="slide-1" class="slide">			                    
									 <div class="slider-img">
									     <a href="#"><img src="assets/file/produk/<?php echo $data['Gambar'];?>" alt="learn more" /></a>									    
									  </div>
						             	<div class="slider-text">
		                                 <h1><?php echo $data['Nama_Produk'];?></h1>
		                                 <h2>Persediaan Terbatas</h2>
							             <a href="#" class="button">Shop Now</a>
					                   </div>			               
									  <div class="clear"></div>				
				                  </div>	
								<?php } ?>	
			                 </div>		
		                </div>
					 <div class="clear"></div>					       
		         </div>
		      </div>
		   <div class="clear"></div>
		 </div>
		 </div>
		 </div>
   </div>
 <div class="front">
    <div class="content">
    	<div class="content_top">
    		<div class="col-md-5">
    		<h3 style="margin-left: 20px;">New Products</h3>
    		</div>
    		<div class="see">
    			<p><a href="#">See all Products</a></p>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group" style="margin-left: 5%;">
			<?php
	      		$q = mysqli_query($koneksi, "select * from produk ORDER BY id_produk ASC LIMIT 4");
	      		while($data= mysqli_fetch_array($q)){
				?>
				<div class="grid_1_of_4 images_1_of_4">
				
					 <a href="#"><img src="assets/file/produk/<?php echo $data['Gambar'];?>" alt="learn more" /></a>
					 <h2><?php echo $data['Nama_Produk'];?> </h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees">Rp. <?php echo $data['Harga_Produk'];?></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="front/input.php?input=add&id=<?php echo $data['Id_Produk']; ?>&harga=<?php echo $data['Harga_Produk']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to Cart</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
					 
				</div>
				<?php } ?>
			</div>
			<div class="content_bottom">
    		<div class="col-md-5">
    		<h3 style="margin-left: 20px;">FEATURE PRODUK</h3>
    		</div>
    		<div class="see">
    			<p><a href="#">See all Products </a></p>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group" style="margin-left: 5%;">
			<?php
	      		$q = mysqli_query($koneksi, "select * from produk ORDER BY id_produk DESC LIMIT 4");
	      		while($data= mysqli_fetch_array($q)){
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="#"><img src="assets/file/produk/<?php echo $data['Gambar'];?>" alt="learn more"/></a>					
					 <h2><?php echo $data['Nama_Produk'];?></h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees">Rp. <?php echo $data['Harga_Produk'];?></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="front/input.php?input=add&id=<?php echo $data['Id_Produk']; ?>&harga=<?php echo $data['Harga_Produk']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to Cart</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
				</div>
				<?php } ?>
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
							<li><a href="front/login_user.php">Sign In</a></li>
							<li><a href="front/order_barang.php">View Cart</a></li>
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
							      <li><a href="#" target="_blank"><img src="assets/images/facebook.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="assets/images/twitter.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="assets/images/skype.png" alt="" /> </a></li>
							      <li><a href="#" target="_blank"> <img src="assets/images/dribbble.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"> <img src="assets/images/linkedin.png" alt="" /></a></li>
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
		<!-- <script src="assets/build/js/jquery.min.js"></script> -->
		<script src="assets/build/js/bootstrap.min.js"></script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>

