<?php 
include 'headeruser.php';
include '../lib/koneksi.php';

$id_pelanggan = $value;
$query = "SELECT * FROM pelanggan WHERE Id_Pelanggan = '$id_pelanggan'";
$hasil = mysqli_query($koneksi, $query);
$pelanggan_data = mysqli_fetch_assoc($hasil);

?>
<?php 
$value = $_SESSION['user']['Id_Pelanggan']; 
$query = "SELECT * FROM pelanggan WHERE Id_Pelanggan = '$value'";
$hasil = mysqli_query($koneksi, $query);
$data_pribadi = mysqli_fetch_assoc($hasil);
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
   $kode_otomatis = "F".str_pad($kode, 4, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "F0001";
  }

?>
<?php 
$Host = "localhost";
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
  $carikode = mysqli_query($koneksi, "select max(Id_Detail) from detail_order") or die (mysql_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
   $nilaikode = substr($datakode[0], 1);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   $kode_detail = "B".str_pad($kode, 4, "0", STR_PAD_LEFT);
  } else {
   $kode_detail = "B0001";
  }

?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Kategori Produk </h3>
<input TYPE="button" class="btn btn-default" href="" onclick="history.go(-1);" value="Kembali">
  <form method="post" action="input.php?input=inputform">

  <div>
    <table class="table">
    
      <input type="hidden" class="form-control" name="id_pelanggan" value="<?php echo $value ?>" required>
      <input type="hidden" class="form-control" name="id_order" value="<?php echo $kode_otomatis ?>" required>
      <!-- <input type="hidden" class="form-control" name="id_status" value="<?php echo $kode_otomatis_status ?>" required> -->
      <tr>
        <td>Alamat :</td>
        <td><input type="text" class="form-control" name="alamat" value="<?php echo $data_pribadi['Alamat'] ?>"  required></td>
      </tr>
      <tr>
        <td>Email :</td>
        <td><input type="email" class="form-control" name="email" value="<?php echo $data_pribadi['Email'] ?>"  required></td>
      </tr>
      <tr>
        <td>Telepon :</td>
        <td><input type="number" class="form-control" name="telephon" value="<?php echo $data_pribadi['Telepon'] ?>" required></td>
      </tr>   
      <tr>
        <td></td>
        <td><input type="submit" class="btn btn-info" value="Konfirmasi Order">
          <a href="order_barang.php" class="btn btn-danger"> Batal </a> </td>
      </tr>
    </table>
  </div>
  </form>
<div class="alert alert-info">
  <strong><span class="glyphicon glyphicon-info-sign">Info!</strong> Di bawah ini adalah data order dari anda.
</div>
     <div class="box">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">Nomor</th>
                        <th width="10%">Foto Produk</th>
                        <th width="15%">Nama Produk</th>
                        <th width="15%">Stock Barang</th>
                        <th width="5%">Jumlah</th>
                        <th width="10%">Harga</th>
                        <th width="10%">Total</th>
                        <th width="10%">Action</th>   
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel    
                    // mysql_connect('localhost', 'root', '');
                    // mysql_select_db('dbapotik');
                    mysql_connect('localhost', 'root', '');
                    mysql_select_db('dbapotik');
                    $sid = session_id();
                    $no = 1;
                    $sql = mysql_query("SELECT * FROM keranjang, produk WHERE Id_Session='$sid' AND keranjang.Id_Produk=produk.Id_Produk");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    $id = $r['Id_Keranjang'];
                    ?>
            
                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><img class="buku-cover" width="50px" height="50px" src="../assets/file/produk/<?php echo  $r['Gambar']; ?>"></td>
                        <td><?php echo  $r['Nama_Produk']; ?></td>
                        <td><?php echo  $r['Stock']; ?></td> 
                        <td><?php echo  $r['Qty']; ?></td>
                        <?php $sum=$r['Qty']*$r['Harga_Produk']?>
                        <td>Rp. <?php echo  $r['Harga_Produk']; ?></td>
                        <td>Rp. <?php echo  $sum ?></td>
                        
                        <td>
                        <a href="input.php?input=delete&id=<?php echo $r[Id_Keranjang]?>" class="btn btn-hapus" onclick="return confirm('anda yakin akan menghapus data?');">Hapus</a>
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