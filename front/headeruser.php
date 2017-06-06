<?php 
    session_start(); 

    //jika belum login, alihkan ke login
    if (empty($_SESSION['user'])) {
        header('Location: login_user.php');
        exit();
    }
    $value = $_SESSION['user']['Id_Pelanggan'];

	include "../lib/koneksidua.php";
	error_reporting(0);

?>
<!DOCTYPE html>
<html>
<head>
	
	<title>ApotikKu</title>
	
	<link rel="stylesheet" type="text/css" href="../bootstrap/admin/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="../bootstrap/admin/js/jquery.js"></script>
	<script type="text/javascript" src="../bootstrap/admin/js/jquery.js"></script>
	<script type="text/javascript" src="../bootstrap/admin/js/jquery-ui/jquery-ui.js"></script>	
	<script type="text/javascript" src="./bootstrap/admin/js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="../bootstrap/admin/bootstrap.css">
	<link rel="stylesheet" href="../datatables/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../databables/css/dataTables.bootstrap.css"/>
	
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">ApotikKu</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">				
				<ul class="nav navbar-nav navbar-right">
				
				<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Hy , <?php echo $_SESSION['user']['Username'];  ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- modal input -->
	<div id="modalpesan" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Pesan Notification</h4>
				</div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>						
				</div>
				
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span>  Beranda</a></li>			
			<li><a href="data_order.php?id_pelanggan=<?php echo $value; ?>"><span class="glyphicon glyphicon-shopping-cart"></span> Data Order</a></li>
			 <!-- <li><a href="data_pribadi.php"><span class="glyphicon glyphicon-user"></span> Data Saya</a></li> -->
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>	
					
		</ul>
	</div>
	<div class="col-md-10">
