<?php
include "../config/koneksi.php";
$p=isset($_GET['act'])?$_GET['act']:null;
switch($p){
default:

break;

case "hapus":
mysql_query("DELETE FROM outlet WHERE id='$_GET[id]'");
header('location:../index.php?p=outlet&msg=hapus');
break;

case "input":
 mysql_query("INSERT INTO outlet( id_owner,
                                   outlet,
                                   alamat_outlet,
								   telp_outlet) 
						  VALUES('$_POST[id_owner]',
						         '$_POST[outlet]',
                                 '$_POST[alamat_outlet]',
							     '$_POST[telp_outlet]' )");
header('location:../index.php?p=outlet&msg=input');
break;

case "update":
mysql_query("UPDATE outlet SET   id_owner      ='$_POST[id_owner]',
                                 outlet   ='$_POST[outlet]
								 alamat_outlet ='$_POST[alamat_outlet]',
								 telp_outlet   ='$_POST[telp_outlet]' 
						   WHERE id         ='$_POST[id]'");

header('location:../index.php?p=outlet&msg=edit');  
}
?>
      