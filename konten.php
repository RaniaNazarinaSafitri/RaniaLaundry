<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Rania Laundry ::.</title>
</head>

<body>
		<?php
		$p=isset($_GET['p'])?$_GET['p']:null;
		switch($p){
		default:
	echo "<div class='row'>
			<div class='col-sm-12'>
			<h4 class='pull-left page-title'>Selamat Datang $hasil[nama]  di Aplikasi Laundry </h4>
			<ol class='breadcrumb pull-right'>
			<li><a href='#'>Beranda</a></li>
			<li class='active'>Dashboard</li>
			</ol>
			</div>
			</div>
			<!-- Start Widget -->
			<!--Widget-4 -->
			<div class='row'>
			<div class='col-sm-6 col-lg-3'>
			<div class='mini-stat clearfix bx-shadow bg-white'>
			<span class='mini-stat-icon bg-info'><i class='ion-android-contacts'></i></span>
			<div class='mini-stat-info text-right text-dark'>";
			$jumCus=mysql_num_rows(mysql_query("SELECT * FROM customer "));
			echo "<span class='counter text-dark'>$jumCus</span>
			Total Customer
			</div>
			</div>
			</div>
			<div class='col-sm-6 col-lg-3'>
			<div class='mini-stat clearfix bx-shadow bg-white'>
			<span class='mini-stat-icon bg-success'><i class='ion-android-contacts'></i></span>
			<div class='mini-stat-info text-right text-dark'>";
			$jumPen=mysql_num_rows(mysql_query("SELECT * FROM pengguna"));
			echo "<span class='counter text-dark'>$jumPen</span>
			Total Pengelola
			</div>
			</div>
			</div>
			<div class='col-sm-6 col-lg-3'>
			<div class='mini-stat clearfix bx-shadow bg-white'>
			<span class='mini-stat-icon bg-success'><i class='ion-android-contacts'></i></span>
			<div class='mini-stat-info text-right text-dark'>";
			$jumOut=mysql_num_rows(mysql_query("SELECT * FROM outlet"));
			echo "<span class='counter text-dark'>$jumOut</span>
			Total Outlet
			</div>
			</div>
			</div>
			<div class='col-sm-6 col-lg-3'>
			<div class='mini-stat clearfix bx-shadow bg-white'>
			<span class='mini-stat-icon bg-primary'><i class='ion-ios7-cart'></i></span>
			<div class='mini-stat-info text-right text-dark'>";
			$jumOrdb=mysql_num_rows(mysql_query("SELECT * FROM transaksi WHERE status_order='Baru'"));
			echo "<span class='counter text-dark'>$jumOrdb</span>
			New Order
			</div>
			</div>
			</div>
			<div class='col-sm-6 col-lg-3'>
			<div class='mini-stat clearfix bx-shadow bg-white'>
			<span class='mini-stat-icon bg-purple'><i class='ion-ios7-cart'></i></span>
			<div class='mini-stat-info text-right text-dark'>";
			$jumOrd=mysql_num_rows(mysql_query("SELECT * FROM transaksi"));
			echo " <span class='counter text-dark'>$jumOrd</span>
			Total Order
			</div>
			</div>
			</div>
			</div> <!-- End row-->";
			?>
             
		<div class='panel panel-border panel-primary'>
        <div class='panel-heading'> 
            <h3 class='panel-title'><i class='fa fa-clock-o'></i> Order Terbaru</h3> 
        </div>  <div class='panel-body'> 
        <?php
switch($_GET['msg']){
case "input":
	echo "<div class='alert alert-success alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><b>Order Masuk Berhasil Ditambahkan!</b></h4>
		  </div>";
break;
}
?>
    <table id='datatable' class='table table-hover'>
        <thead>
            <tr>
            <th><i class='icon-terminal'></i> No</th>
            <th><i class='icon-signal'></i> Tgl. Transaksi</th>
            <th><i class='icon-signal'></i> Customer</th>
            <th><i class='icon-terminal'></i> Paket</th>
			<th><i class='icon-terminal'></i> Outlet</th>
            <th><i class='icon-signal'></i> Pembayaran</th>
            <th><i class='icon-signal'></i> Status Order</th>
            <th><i class='icon-signal'></i> Total</th>
            <th><i class='icon-signal'></i> Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
$i=1;
$tp=mysql_query("SELECT * FROM transaksi WHERE status_order='Baru' ORDER BY no_order DESC");
while($r=mysql_fetch_array($tp)){
$tgl  = tgl_indo($r['tgl_transaksi']);
if($r[status_order]=='Baru'){
?>
<tr>
 <td><b><?php echo $i;?></b></td>

<td><b><?php echo $r['tgl_transaksi'];?></b></td>
<td><b><?php echo $r['customer'];?></b></td>
<td><b><?php echo $r['paket'];?></b></td>
<td><b><?php echo $r['outlet'];?></b></td>
<td><b><?php echo $r['status'];?></b></td>
<td><b><?php echo $r['status_order'];?></b></td>
<td><b><?php echo'Rp. ' . number_format( $r['tarif'], 0 , '' , '.' ) . ',-'?></b></td>
<td><a class='btn btn-primary' href='?p=transaksi&aksi=detailtransaksi&id=<?php echo $r['no_order'];?>'><i class='icon-edit'></i>Detail</a></td>
        
</tr>
<?php } 
	  else { ?>
 <tr>
 <td><?php echo $i;?></b></td>

<td><?php echo $r['tgl_transaksi'];?></td>
<td><?php echo $r['customer'];?></td>
<td><?php echo $r['paket'];?></td>
<td><?php echo $r['outlet'];?></td>
<td><?php echo $r['status'];?></td>
<td><?php echo $r['status_order'];?></td>
<td><?php echo'Rp. ' . number_format( $r['tarif'], 0 , '' , '.' ) . ',-'?></b></td>
<td><a class='btn btn-primary' href='?p=transaksi&aksi=detailtransaksi&id=<?php echo $r['no_order'];?>'><i class='icon-edit'></i>Detail</a></td>
        
</tr>
<?php }  ?>
<?php $i=$i+1;?>
<?php }  ?>
</tbody>
</table>
         </div><!-- /.box-body -->
          </div><!-- /.box --> 
				<?php		
						
		break;
		case "identitas":						
		include "identitas/identitas.php";
		
		break;
		case "transaksi":						
		include "transaksi/transaksi.php";
		
		break;
		case "detailtransaksi":						
		include "transaksi/detailtransaksi.php";
		
		break;
		case "karyawan":						
		include "karyawan/karyawan.php";
		
		break;
		case "aksikaryawan":						
		include "karyawan/aksi_karyawan.php";
		
		break;
		case "administrator":						
		include "user/administrator.php";
		
		break;
		case "administrator":						
		include "user/aksi_administrator.php";

		break;
		case "owner":						
		include "owner/owner.php";

		break;
		case "aksiowner":						
		include "owner/aksi_owner.php";

		break;
		case "outlet":						
		include "outlet/outlet.php";

		break;
		case "outlet":						
		include "outlet/aksi_outlet.php";
		
		break;
		case "customer":						
		include "customer/customer.php";
		
		break;
		case "customer":						
		include "customer/aksi_customer.php";
		
		break;
		case "paket":						
		include "paket/paket.php";
		
		break;
		case "pembayaran":						
		include "pembayaran/pembayaran.php";
		
		break;
		case "laporan":						
		include "laporan/laporan.php";

		break;
		case "laporan_outlet":						
		include "laporan_outlet/laporan_outlet.php";
		
		
		}
		?>
</body>
</html>