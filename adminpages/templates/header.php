
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <title>ApotikKu - Admin</title>

    <!-- Bootstrap -->
    <link href="../../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../../assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../../assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../../assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../assets/build/css/custom.min.css" rel="stylesheet">
    <link rel="icon" href="../../assets/images/logo.png" type="image/x-icon">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Admin Pages</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="../../assets/images/regaaja.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <?php if($_SESSION['level']=="O"){ ?>
                <?php
                    $query = mysqli_query($koneksi, "SELECT nama FROM admin WHERE level='O';");
                    while ($data = mysqli_fetch_array($query))
                    {
                    ?>
                    <h2 value="<?php echo $data['id_user'];?>"><?php echo $data['nama'];?></h2>
                   <?php } ?>

                <?php } else { ?>
                      <?php
                    $query = mysqli_query($koneksi, "SELECT nama FROM admin WHERE level='A';");
                    while ($data = mysqli_fetch_array($query))
                    {
                    ?>
                    <h2 value="<?php echo $data['id_user'];?>"><?php echo $data['nama'];?></h2>
                   <?php } ?>
                <?php } ?>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
              <?php if($_SESSION['level']=="O"){ ?>
                <h3>Owner</h3>
                <?php } else { ?>
                <h3>Admin</h3>
                <?php } ?>


                <ul class="nav side-menu">
				          <?php if($_SESSION['level']=="O"){ ?>
				          <li>
                    <a href="<?php echo $admin_url; ?>home/main.php"><i class="fa fa-home"></i> Home </a>
                  </li>
                  <li>
                    <a href="<?php echo $admin_url; ?>print/main.php"><i class="fa fa-print"></i> Report </a>
                  </li>
                  <li>
                    <a href="../logout.php"><i class="fa fa-sign-out"></i> LogOut </a>
                  </li>
				
                  <?php } else { ?>
                  <li>
                    <a href="<?php echo $admin_url; ?>home/main.php"><i class="fa fa-home"></i> Home </a>
                  </li>
                  <li>
                    <a href="../../index.php"><i class="fa fa-globe"></i> Preview Website </a>
                  </li>
                  <li>
                    <a href="<?php echo $admin_url; ?>kategori/main.php"><i class="fa fa-th"></i> Kategori </a>
                  </li>
                  <li>
                    <a href="<?php echo $admin_url; ?>produk/main.php"><i class="fa fa-camera"></i> Produk </a>
                  </li>
                  <li>
                    <a href="<?php echo $admin_url; ?>order/main.php"><i class="fa fa-cc"></i> Order </a>
                  </li>
                  <li>
                    <a href="<?php echo $admin_url; ?>print/main.php"><i class="fa fa-print"></i> Report </a>
                  </li>
                  <!-- <li>
                    <a href="#"><i class="fa fa-money"></i> Penjualan</a>
                  </li> -->
                  <li>
                    <a href="<?php echo $admin_url; ?>user/main.php"><i class="fa fa-user"></i> User </a>
                  </li>
                  <li>
                    <a href="<?php echo $admin_url; ?>supplier/main.php"><i class="fa fa-user"></i> Supplier </a>
                  </li>
                  <li>
                    <a href="../logout.php"><i class="fa fa-sign-out"></i> LogOut </a>
                  </li>
				<?php } ?>
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a href="../logout.php" data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Account
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <!-- <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li> -->
                    <li><a href="../logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->