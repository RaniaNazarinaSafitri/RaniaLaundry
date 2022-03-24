<?php
include "../config/koneksi.php";
$p=isset($_GET['act'])?$_GET['act']:null;
switch($p){
default:

break;

case "hapus":
mysql_query("DELETE FROM customer WHERE id='$_GET[id]'");
header('location:../index.php?p=customer&msg=hapus');
break;

case "input":
 mysql_query("INSERT INTO customer(nama,
                                   alamat,
                                   telp,
								   gender) 
						  VALUES('$_POST[nama]',
						         '$_POST[alamat]',
							     '$_POST[telp]',
							     '$_POST[gender]' )");
header('location:../index.php?p=customer&msg=input');
break;

case "update":
mysql_query("UPDATE customer SET nama       ='$_POST[nama]',
                                 alamat     ='$_POST[alamat]',
								 telp       ='$_POST[telp]',
								 gender     ='$_POST[gender]' 
						   WHERE id         ='$_POST[id]'");

header('location:../index.php?p=customer&msg=edit');  
}
?>
      