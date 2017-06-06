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
$password = "";
$database = "dbapotik";
$koneksi = new mysqli( $host, $username, $password, $database );
if ($koneksi->connect_error){
echo 'Gagal koneksi ke database';
} else {
//koneksi berhsil
}
// membuat query max
  $carikode = mysqli_query($koneksi, "select max(Id_Kategori) from kategori") or die (mysql_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
   $nilaikode = substr($datakode[0], 1);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   $kode_otomatis = "K".str_pad($kode, 4, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "K0001";
  }

?>

      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tambah <small>Data Kategori</small></h3>
              </div>

            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Tambah </h2>
  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                  <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="aksi_tambah.php">

                  <input type="hidden" class="form-control" name="id_kategori" required value="<?php echo $kode_otomatis ?>">
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama Kategori <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="first-name" name="nama_kategori" required="required" class="form-control col-md-7 col-xs-12">
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
		<?php include "../templates/footer.php";

}		?>