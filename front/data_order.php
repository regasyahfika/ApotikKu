<?php 
include 'headeruser.php';
$id_pel = $_SESSION['user']['Id_Pelanggan']; 
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Order </h3>
<input TYPE="button" class="btn btn-success" href="" onclick="history.go(-1);" value="Kembali">
<br>
<br>  
<div class="alert alert-info">
  <strong><span class="glyphicon glyphicon-info-sign">Info!</strong> Di bawah ini adalah data order dari anda.
</div>
     <div class="box">
            <table id="provinsi" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">Nomor</th>
                        <th width="10%">Kode Order</th>
                        <th width="15%">Nama Pelanggan</th>
                        <th width="15%">Nama Produk</th>
                        <th width="15%">Jumlah</th>
                        <th width="15%">Total</th>
                        <th width="10%">Action</th>   
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel    
                    mysql_connect('localhost', 'root', '');
                    mysql_select_db('dbapotik');
                    $sql = mysql_query("SELECT *
                    FROM detail_order A 
                    LEFT JOIN produk B ON A.Id_Produk = B.Id_Produk
                    LEFT JOIN orderan D ON A.Kd_Order = D.Kd_Order
                    LEFT JOIN pelanggan C ON D.Id_Pelanggan = C.Id_Pelanggan
                    WHERE D.Id_Pelanggan = '$id_pel'
                    ORDER BY A.Kd_Order DESC");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    $id = $r['Kd_Order'];
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['Kd_Order']; ?></td>
                        <td><?php echo  $r['Username']; ?></td>
                        <td><?php echo  $r['Nama_Produk']; ?></td>
                        <td><?php echo  $r['Jumlah']; ?></td>
                        <td>Rp. <?php echo  $r['Total_Harga']; ?></td>
                        <td>
                        <a href="data_order_delete.php?Kd_Order=<?php echo $r['Kd_Order']; ?>" class="btn btn-hapus" onclick="return confirm('anda yakin akan menghapus data?');">Hapus</a>
                        </td>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                </tbody>
            </table>  
        </div>
<?php include 'footeruser.php'; ?>