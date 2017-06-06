<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
include "../../lib/config_web.php";
include "../../lib/koneksi.php";

include "../templates/header.php"; ?>

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
  $carikode = mysqli_query($koneksi, "select max(Id_Produk) from produk") or die (mysql_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
   $nilaikode = substr($datakode[0], 1);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   $kode_otomatis = "P".str_pad($kode, 4, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "P0001";
  }
?>

      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Produk</h3>
              </div>

            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Tambah <small>data produk</small></h2>
  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
          <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="aksi_tambah.php" enctype="multipart/form-data">

              <input type="hidden" class="form-control col-md-7 col-xs-12" name="id_produk" required value="<?php echo $kode_otomatis ?>">
            <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama Kategori <span class="required"></span>
                  </label>
              <div class="col-md-10 col-sm-10 col-xs-12">

                       
  						  <select class="form-control col-md-7 col-xs-12" name="nama_kategori">
      						  <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM kategori");
                    while ($data = mysqli_fetch_array($query))
      						  {
      						  ?>
                  <option value="<?php echo $data['Id_Kategori'];?>"><?php echo $data['Nama_Kategori'];?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
                <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama Supplier <span class="required"></span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
              <select class="form-control col-md-7 col-xs-12" name="nm_supplier">
              <?php
              $query = mysqli_query($koneksi, "SELECT * FROM supplier");
              while ($data = mysqli_fetch_array($query))
              {
              ?>
              <option value="<?php echo $data['kd_supplier'];?>"><?php echo $data['nm_supplier'];?></option>
              <?php } ?>
              </select>
                        </div>
                      </div>
					             <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama Produk <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="first-name" name="nama_produk" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Harga <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="first-name" name="harga" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Stok <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="first-name" name="stock" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Gambar <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="file" id="first-name" name="gambar" required="required">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-2">
                          <a href="main.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Batal </a>
                          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>







          </div>
        </div>
		<?php include "../templates/footer.php"; } ?>