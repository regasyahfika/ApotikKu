<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
include "../../lib/config_web.php";
include "../../lib/koneksi.php";
include "../templates/header.php";
?>
<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Order</h3>
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
						<h2><small>Data Order</small></h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th style="width: 20px;">No</th>
									<th style="width: 80px;">Kd Order</th>
									<th style="width: 80px;">Nama User</th>
									<th style="width: 80px;">Jumlah Item Barang</th>
									<th style="width: 100px;">Total Nilai Orderan</th>
									<!-- <th style="width: 100px;">Status</th> -->
									<th style="width: 100px;">Tanggal</th>
									<th style="width: 100px;">Tanggal Kirim</th>
									<th style="width: 100px;">Aksi</th>

								</tr>
							</thead>
							<tbody>
								<?php

			                    //Data mentah yang ditampilkan ke tabel    
			                    $sql = mysqli_query($koneksi, "SELECT *
			                    FROM orderan A 
			                  	JOIN pelanggan F ON A.Id_Pelanggan = F.Id_Pelanggan
			                  	-- JOIN statustransaksi B ON A.id_status = B.id_status 
			                    ORDER BY A.Kd_Order DESC ");
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
								<?php echo $r['Jumlah'];?></td>
								<td>
								<?php echo $r['Total_Harga'];?></td>
								<!-- <td>
								<?php echo $r['nm_status'];?></td> -->

								<td>
								<?php echo $r['Tanggal'];?></td>
								<td>
								<?php echo $r['Tanggal_Kirim'];?></td>
								<td><a href="<?php echo $admin_url; ?>order/detail_order.php?kd_order=<?php echo $r['Kd_Order'];?>">
								<button class="btn btn-info btn-sm">
									<i class="fa fa-check"></i>
								</button></a>

								<a href="<?php echo $admin_url; ?>order/aksi_edit.php?kd_order=<?php echo $r['Kd_Order'];?>">
								<button class="btn btn-primary btn-sm">
									<i class="fa fa-send"></i>
								</button></a>
								
								<a href="<?php echo $admin_url; ?>order/hapus.php?kd_order=<?php echo $r['Kd_Order'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')">
								
								<button class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i>
								</button></a></td>

								</tr>

								<?php $no++;} ?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
			<div class="col-xs-8">
				<!-- <a href="<?php echo $admin_url; ?>order/cetakpdf.php">
				<button class="btn btn-primary">
					<i class="fa fa-print"></i> Print
				</button></a> -->
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