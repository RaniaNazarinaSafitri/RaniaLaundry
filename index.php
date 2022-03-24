<?php
session_start();
if ( !isset($_SESSION['username']) ) {
    header('location:login.php'); 
}
else { 
    $usr = $_SESSION['username']; 
}
require_once('config/koneksi.php');
require_once('config/library.php');
require_once('config/fungsi_indotgl.php');

$iden=mysql_fetch_array(mysql_query("SELECT * FROM identitas"));

$query = mysql_query("SELECT * FROM pengguna WHERE username = '$usr'");
$hasil = mysql_fetch_array($query);
if (empty($hasil['username'])) {
    header('Location: ./login.php');
}

@ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="logintemplate/images/icons/RAN2.png">

        <title>.:: RaniaLaundry ::.</title>

       <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet" />
        <link href="css/waves-effect.css" rel="stylesheet">
        <link href="assets/tagsinput/jquery.tagsinput.css" rel="stylesheet" />
        <link href="assets/toggles/toggles.css" rel="stylesheet" />
        <link href="assets/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" />
        <link href="assets/timepicker/bootstrap-datepicker.min.css" rel="stylesheet" />
        <link href="assets/colorpicker/colorpicker.css" rel="stylesheet" type="text/css" />
        <link href="assets/jquery-multi-select/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="assets/select2/select2.css" rel="stylesheet" type="text/css" />
        <link href="css/helper.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
		<script src="js/modernizr.min.js"></script>
        <link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

     
 </head>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <!-- <a href="index.php" class="logo"><span><?php echo $iden[nama_aplikasi]; ?></span></a> -->
                        <img src="images/RAN2.png" alt="logo" style="width:50px;height:50px;">	
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown">
                                    <a href="index.php?p=ordermasuk" data-target="#" class="dropdown-toggle waves-effect waves-light">
                                     <?php
$jumORDER=mysql_num_rows(mysql_query("SELECT * FROM transaksi WHERE status_order='Baru'"));
echo "<i class='md-add-shopping-cart'></i> <span class='badge badge-xs badge-danger'>$jumORDER</span>";
?>
                                    </a>
                                    
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><i class="ion-android-add-contact"></i></a>
                                    <ul class="dropdown-menu">
                                        <?php if ($hasil['level']=='Karyawan') { ?>
                                        <li><a href="?p=karyawan&aksi=edit&id=<?php echo $hasil[id]; ?>"><i class="md md-face-unlock"></i> Edit Profil</a></li>
										<?php } ?>
                                        <?php if ($hasil['level']=='Administrator') { ?>
                                        <li><a href="?p=administrator&aksi=edit&id=<?php echo $hasil[id]; ?>"><i class="md md-face-unlock"></i> Edit Profil</a></li>
										<?php } ?>
                                        <?php if ($hasil['level']=='Owner') { ?>
                                        <li><a href="?p=owner&aksi=edit&id=<?php echo $hasil[id]; ?>"><i class="md md-face-unlock"></i> Edit Profil</a></li>
                                        <?php } ?>
                                        <li><a href="logout.php"><i class="md md-settings-power"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <i class="ion-android-contact"></i>
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $hasil['nama']; ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <?php if ($hasil['level']=='Karyawan') { ?>
                                    <li><a href="?p=karyawan&aksi=edit&id=<?php echo $hasil[id]; ?>"><i class="md md-face-unlock"></i> Edit Profil<div class="ripple-wrapper"></div></a></li>
                                    <?php } ?>
                                    <?php if ($hasil['level']=='Administrator') { ?>
                                    <li><a href="?p=administrator&aksi=edit&id=<?php echo $hasil[id]; ?>"><i class="md md-face-unlock"></i> Edit Profil<div class="ripple-wrapper"></div></a></li>
                                    <?php } ?>
                                    <?php if ($hasil['level']=='Owner') { ?>
                                    <li><a href="?p=owner&aksi=edit&id=<?php echo $hasil[id]; ?>"><i class="md md-face-unlock"></i> Edit Profil<div class="ripple-wrapper"></div></a></li>
                                    <?php } ?>
                                    <li><a href="logout.php"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>
                            <p class="text-muted m-0"><?php echo $hasil['level']; ?></p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="?p=home" class="waves-effect"><i class="md md-home"></i><span> Dashboard</a>
                            </li>
                            <?php if ($hasil['level']=='Karyawan') { ?>
							
                            <li><a href="?p=transaksi" class="waves-effect"><i class="fa fa-money"></i><span> Transaksi</a></li>
                            <li><a href="?p=customer" class="waves-effect"><i class="fa fa-user"></i><span> Customer</a></li>

                            <?php } ?>
                            
                            <?php if ($hasil['level']=='Owner') { ?>
							
                            <li><a href="?p=laporan_outlet" class="waves-effect"><i class="fa fa-money"></i><span> Laporan</a></li>

                            <?php } ?>

							<?php if ($hasil['level']=='Administrator') { ?>
                              <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-user"></i> <span>Manajemen User</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="?p=karyawan">Karyawan</a></li>
									 <li><a href="?p=administrator">Administrator</a></li>
                                     <li><a href="?p=owner">Owner</a></li>
                                     <li><a href="?p=outlet">Outlet</a></li>
                                </ul>
                            </li>
                            
                            <li><a href="?p=transaksi" class="waves-effect"><i class="fa fa-money"></i><span> Transaksi</a></li>
                            <li><a href="?p=paket" class="waves-effect"><i class="md md-home"></i><span> Paket Laundry</a></li>
                            <li><a href="?p=customer" class="waves-effect"><i class="fa fa-user"></i><span> Customer</a></li>
							<li> <a href="?p=pembayaran"><i class="fa fa-money"></i><span>Tipe Pembayaran </span></a></li>
                            <li><a href="?p=laporan"><i class="fa fa-book"></i><span>Laporan</span></a></li>
                            <?php } ?>
                            
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>                    
            <div class="content-page">
             
                <div class="content">
                    <div class="container">

                             <?php include "konten.php"; ?>

                    </div> 
                               
                </div> 

                <footer class="footer text-left">
                    copyright &copy;
                </footer>

            </div></div>
    
        <script>
            var resizefunc = [];
        </script>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="assets/jquery-detectmobile/detect.js"></script>
        <script src="assets/fastclick/fastclick.js"></script>
        <script src="assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="assets/jquery-blockui/jquery.blockUI.js"></script>
        <script src="js/jquery.app.js"></script>
        <script src="assets/tagsinput/jquery.tagsinput.min.js"></script>
        <script src="assets/toggles/toggles.min.js"></script>
        <script src="assets/timepicker/bootstrap-timepicker.min.js"></script>
        <script src="assets/timepicker/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="assets/colorpicker/bootstrap-colorpicker.js"></script>
        <script type="text/javascript" src="assets/jquery-multi-select/jquery.multi-select.js"></script>
        <script type="text/javascript" src="assets/jquery-multi-select/jquery.quicksearch.js"></script>
        <script src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/spinner/spinner.min.js"></script>
        <script src="assets/select2/select2.min.js" type="text/javascript"></script>

        <script src="assets/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/datatables/dataTables.bootstrap.js"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
			
			// Date Picker
                jQuery('#datepicker').datepicker();
                jQuery('#datepicker-inline').datepicker();
                jQuery('#datepicker-multiple1').datepicker();
                jQuery('#datepicker-multiple2').datepicker();
                jQuery('#datepicker-multiple').datepicker({
                    numberOfMonths: 5,
                    showButtonPanel: true
                });
				 // Select2
                jQuery(".select2").select2({
                    width: '100%'
                });


        </script>
    
	</body>
</html>