<?php
session_start();
if ( !isset($_SESSION['username']) ) {
    header('location:login.php'); 
}
else { 
    $usr = $_SESSION['username']; 
}

$timezone = "Asia/Jakarta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$harga = $_POST['berat'];
include "../config/koneksi.php";
$p=isset($_GET['act'])?$_GET['act']:null;
switch($p){
default:

break;
case "input":				

$order		 = $_POST['no_order'];		
if(isset($_POST['pembayaran'])){
$pembayarann = $_POST['pembayaran'];
$sql         = mysql_query("SELECT * FROM pembayaran WHERE t_pembayaran = '$pembayarann'");
$hasill      = mysql_fetch_array($sql);

$statuss	 = $_POST['status'];
if(isset($_POST['paket'])){
$pakett     = $_POST['paket'];
$query       = mysql_query("SELECT * FROM paket WHERE paket = '$pakett'");
$hasil       = mysql_fetch_array($query);
$harga       = $hasil['harga'];

$berat		 = $_POST['berat'];
$customer    = $_POST['customer'];
$alamat      = $_POST['alamat'];
$telp        = $_POST['telp'];
$outlet      = $_POST['outlet'];
$status_order= $_POST['status_order'];
$tarif       = $berat*$harga;
}

$tgl_ambil		= $_POST['tgl_ambil'];
$timezone = "Asia/Jakarta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$tgl_transaksi = date("m/d/Y");
$jam_skrg = date("H:i:s");

	
$input = mysql_query("INSERT INTO transaksi VALUES('$order',
												   '$pakett',
												   '$pembayarann',
												   '$statuss',
												   '$tarif', 
												   '$harga', 
												   '$tgl_transaksi',
												   '$jam_skrg',
												   '$tgl_ambil', 
												   '$berat',
												   '$usr',
												   '$customer',
												   '$alamat',
												   '$telp',
												   '$outlet', 
												   'Baru')");										    
header('location:../index.php?p=transaksi&msg=input');
	 }
break;
 case "update":
 if ($_POST[status_order]=='Selesai'){ 
    mysql_query("UPDATE transaksi SET status_order='$_POST[status_order]' WHERE no_order='$_POST[id]'");
		header('location:../index.php?p=transaksi');
	 }	
elseif ($_POST[status_order]=='Diambil'){ 
    mysql_query("UPDATE transaksi SET status_order='$_POST[status_order]' WHERE no_order='$_POST[id]'");
		header('location:../index.php?p=transaksi');
	 }	
elseif ($_POST[status_order]=='Proses'){ 
    mysql_query("UPDATE transaksi SET status_order='$_POST[status_order]' WHERE no_order='$_POST[id]'");
		header('location:../index.php?p=transaksi');
	 }	
elseif ($_POST[status_order]=='Batal'){ 
    mysql_query("UPDATE transaksi SET status_order='$_POST[status_order]' WHERE no_order='$_POST[id]'");
		header('location:../index.php?p=transaksi');
	 }
	 
	 
if ($_POST[status]=='Lunas'){ 
    mysql_query("UPDATE transaksi SET status='$_POST[status]' WHERE no_order='$_POST[id]'");
		header('location:../index.php?p=transaksi');
	 }	
	 }					 
?>
      