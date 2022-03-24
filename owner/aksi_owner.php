<?php
include "../config/koneksi.php";
$p=isset($_GET['act'])?$_GET['act']:null;
switch($p){
default:

break;
case "hapus":
mysql_query("DELETE FROM pengguna WHERE id='$_GET[id]'");
header('location:../index.php?p=owner&msg=hapus');
break;

case "input":
$passasli   = $_POST['password'];
$password   = md5($passasli);
 mysql_query("INSERT INTO pengguna(nama,
                                   username,
								   password,
								   level,
                                   alamat,
                                   telp,
								   gender) 
						  VALUES('$_POST[nama]',
						         '$_POST[username]',
						         '$password',
						         'Owner',
						         '$_POST[alamat]',
							     '$_POST[telp]',
							     '$_POST[gender]' )");
header('location:../index.php?p=owner&msg=input');
break;


case "update":
$pass=md5($_POST[password]);
mysql_query("UPDATE pengguna SET password   = '$pass',
                                 nama       ='$_POST[nama]',
                                 alamat     ='$_POST[alamat]',
								 telp       ='$_POST[telp]',
								 gender     ='$_POST[gender]' 
						   WHERE id         ='$_POST[id]'");

header('location:../index.php?p=owner&msg=edit');  
}
?>
      