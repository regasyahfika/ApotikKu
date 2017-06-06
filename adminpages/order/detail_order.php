<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
include "../../lib/config_web.php";
include "../../lib/koneksi.php";

	$id_pel = $_GET['kd_order']; 
    $column_count = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM detail_order WHERE Kd_Order='$id_pel' "));
include "../templates/header.php";
?>

<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Detail Order</h3>
			</div>

			<div class="title_right">
				<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button">
								Go!
							</button> </span>
					</div>
				</div>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">

			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<strong><span class="glyphicon glyphicon-info-sign">Info!</strong> Di bawah ini adalah Info Details Orderan.</br>
						<p> Jumlah Item Barang adalah  <b> <?php echo $column_count; ?> </b> </p>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th style="width: 50px;">No</th>
									<th style="width: 80px;">Kd Order</th>
									<th style="width: 100px;">Nama User</th>
									<th style="width: 100px;">Nama Produk</th>
									<th style="width: 100px;">Harga</th>
									<th style="width: 80px;">Jumlah</th>
									<th style="width: 100px;">Total</th>

								</tr>
							</thead>
							<tbody>
								<?php
			     	            $sql = mysqli_query($koneksi, "SELECT *
			                    FROM detail_order A 
			                    LEFT JOIN produk B ON A.Id_Produk = B.Id_Produk
			                    LEFT JOIN orderan D ON A.Kd_Order = D.Kd_Order
			                    LEFT JOIN pelanggan C ON D.Id_Pelanggan = C.Id_Pelanggan
			                    WHERE A.Kd_Order = '$id_pel' ORDER BY A.Kd_Order DESC");
			                    $no = 1;
			                    while ($r = mysqli_fetch_array($sql)) {
			                    $id = $r['Kd_Order'];
			                    ?>

								
								<tr>
									<th scope="row"><?php echo $no; ?></th>
									<td>
									<?php echo $r['Kd_Order'];?></td>
									<td>
									<?php echo $r['Username'];?></td>
									<td>
									<?php echo $r['Nama_Produk'];?></td>
									<td>
									<?php echo $r['Harga_Produk'];?></td>
									<td>
									<?php echo $r['Quantity'];?></td>
										<?php $sum=$r['Quantity']*$r['Harga_Produk']?>
			                        <td>Rp. <?php echo  $sum; ?></td>
								</tr>

								<?php $no++;} ?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
			<div class="col-xs-8">
				<a href="main.php" class="btn btn-primary"> Kembali </a>
				<ul class="pagination pull-right">

	<!-- <?php showPagination($koneksi, $table, $dataPerPage); ?> -->
</ul>
			
			</div>
			<div class="clearfix"></div>

		</div>
	</div>
</div>
<!-- /page content -->
<?php
include "../templates/footer.php";
}
?>