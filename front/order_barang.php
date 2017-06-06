<?php 
include 'headeruser.php';

 $value = $_SESSION['user']['Id_Pelanggan'];

?>
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
  $carikode = mysqli_query($koneksi, "select max(Kd_Order) from orderan") or die (mysql_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
   $nilaikode = substr($datakode[0], 1);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   $kode_otomatis = "X".str_pad($kode, 4, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "X0001";
  }

?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  order Barang</h3>
<input type="button" class="btn btn-default" href="" onclick="history.go(-1);" value="Kembali">
<div class="BigContent">
        <div class="LeftContent">
          <div id="navigation">
            <ul class="top-level">
          
            </ul>
          </div>
        </div>
        <div class="RightContent">
          <h1 class="Judul">Shopping Cart</h1>
          <div class="KetProd">
            <table class="TableCart" width="100%" cellspacing="0" cellpadding="0" border="0" style="border-top: 1px dotted #0; border-bottom: 1px dotted #0;">
              <tr><th>No</th>
                <th>Foto Produk</th>
                <th>Nama Produk</th>
                <th>Stock Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Delete</th>
              </th>
            <?php
              //Data mentah yang ditampilkan ke tabel    
              mysql_connect('localhost', 'root', '');
              mysql_select_db('dbapotik');
              $sid = session_id();
              $no = 1;
              $sql = mysql_query("SELECT * FROM keranjang, produk WHERE Id_Session='$sid' AND keranjang.Id_Produk=produk.Id_Produk ORDER BY keranjang.Id_Keranjang");
              $hitung = mysql_num_rows($sql);
              if ($hitung < 1){
                echo"<script>window.alert('Cart is Empty....');
                    window.location=('index.php')</script>";
                }
              else {
                while($tian=mysql_fetch_array($sql)){
                  echo"<tr><td>$no</td>
                    <td><img width=50 src=../assets/file/produk/$tian[Gambar]></td>
                    <td>$tian[Nama_Produk]</td>
                    <td>$tian[Stock]</td>
                    <form method='post' action='do_update_keranjang.php'>
                    <td><input type='hidden' name='id_ker[]' value='$tian[Id_Keranjang]' required>
                    <input type='text' name='jumlah[]' value='$tian[Qty]' required>
                    </td>
                    <td>$tian[Harga_Produk]</td>
                    <td><a href=input.php?input=delete&id=$tian[Id_Keranjang]>Hapus</a></td></tr>";
              $no++;
                }
              }
            ?>
            </table>
            <br> <br>
            <input type='submit' name='simpan' value='Update' class="btn btn-edit">
            <a href="order_konfirmasi.php" class="btn btn-success">Selesai</a>
            <a href="index.php" class="btn btn-info" >Belanja Lagi..</a>
            </form>
            <br>
      
            
          </div>

        </div>

<?php include 'footeruser.php'; ?>