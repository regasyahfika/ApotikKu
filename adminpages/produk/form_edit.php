<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
include "../../lib/config_web.php";
include "../../lib/koneksi.php";

$id_produk = $_GET['Id_Produk'];
$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE Id_Produk='$id_produk'");

$dataProduk = mysqli_fetch_array($query); 

include "../templates/header.php"; ?>

      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manajemen <small>Data Produk</small></h3>
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
          <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="aksi_edit.php" enctype="multipart/form-data">
      <input type="hidden" name="id_produk" value="<?php echo $dataProduk['Id_Produk'];?>">

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
                          <input type="text" id="first-name" name="nama_produk" value="<?php echo $dataProduk['Nama_Produk']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                     <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"> <span class="required"></span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <img src="../../assets/file/produk/<?php echo $dataProduk['Gambar']; ?>" width='180px' height='150px'/>
                        </div>
                      </div>
                             <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Gambar <span class="required"></span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="file" id="first-name" name="gambar">
                        </div>
                      </div>
                             <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Harga <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="first-name" name="harga" value="<?php echo $dataProduk['Harga_Produk']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Stok <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="first-name" name="stok" value="<?php echo $dataProduk['Stock']; ?>" required="required" class="form-control col-md-7 col-xs-12">
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