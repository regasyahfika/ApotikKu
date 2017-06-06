<?php 
include 'headeruser.php';
?>

<div class="col-md-10">
	<h3>Opps, Maaf <?php echo $_SESSION['user']['Username'] ?> Periksa kembali pilihan anda</h3><p>
	<input TYPE="button" class="btn btn-default" href="" onclick="history.go(-1);" value="Kembali">
</div>
<!-- kalender -->
<div class="pull-right">
	<div id="kalender"></div>
</div>

<?php 
include 'footeruser.php';

?>