<?php
$timezone = "Asia/Jakarta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$date=date('Y-m-d');
$harga = $_POST['berat'];
$harga2 = $harga*5000;
include "../config/koneksi.php";
$p=isset($_GET['act'])?$_GET['act']:null;
switch($p){
default:

break;
case "input":						
mysql_query("INSERT INTO paket  
VALUES ('','$_POST[paket]','$_POST[harga]')");
header('location:../index.php?p=paket&msg=input');

break;
case "hapus":
mysql_query("DELETE FROM paket WHERE id='$_GET[id]'");
header('location:../index.php?p=paket&msg=hapus');

break;
case "update":
mysql_query("UPDATE paket SET paket = '$_POST[paket]',
harga = '$_POST[harga]' 
WHERE id    = '$_POST[id]'");

header('location:../index.php?p=paket&msg=edit');  
}
?>
      