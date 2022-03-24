<?php
session_start();
require_once ('config/koneksi.php');
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

$user = antiinjection($_POST['username']);
$pass     = antiinjection(md5($_POST['password']));
$cekuser = mysql_query("SELECT * FROM pengguna WHERE username = '$user' AND password='$pass'");
$jumlah = mysql_num_rows($cekuser);
$hasil = mysql_fetch_array($cekuser);

if ( $jumlah == 0 ) {
  session_start();
  $_SESSION[namauser]     = $r[username];
  $_SESSION[passuser]     = $r[password];
  $_SESSION[level]        = $r[level];
header('location:login.php?userfail');
} else {
    if ( $pass <> $hasil['password'] ) {
header('location:login.php?passwordfail');
    } else {
        $_SESSION['username'] = $user;
        header('location:index.php');
    }
}
?>