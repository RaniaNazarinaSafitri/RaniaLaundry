<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Laporan Pemasukan Harian Laundry ::.</title>
<style type="text/css">

#judul {
 width:100%;
 margin-bottom:20px;
 text-align:center;
}

</style>
<link href="../css/style.default.css" rel="stylesheet" type="text/css" />
<?php
error_reporting(0);
include "../config/koneksi.php";
?>
<div id='contentwrapper' class='contentwrapper'>
<div id="judul">
<br />
<br />
<font size="+2">LAPORAN PEMASUKAN HARIAN LAUNDRY </font><br />
JL. Danau Ranau G6B/07 Malang<br />
Hp.  082339053754 Email : rania.lmj001@gmail.com Website : www.ranialaundry.com

<hr color="#eee" />   </div>
	<?php
    

	if($_POST['berdasar'] == "Semua Data"){
	//modus delete Semua Data
	$sql = "SELECT * FROM transaksi ORDER BY no_order";


}
else if ($_POST['berdasar'] == "Tanggal"){
	//modus tanggal
	$dari = $_POST['dari'];
	$ke = $_POST['ke'];
	$sql = "SELECT * FROM transaksi where (transaksi.tgl_transaksi >= '$dari' and
	                                       transaksi.tgl_transaksi >= '$ke')
							ORDER BY no_order DESC";
 }
	else if($_POST['berdasar'] == "Pencarian Kata"){
	//modus berdasarkan kata
	$field = $_POST['field'];
	$kata = $_POST['kata'];
	$sql = "SELECT * FROM transaksi where $field like '%$kata%'
							ORDER BY no_order";
	
	 }
	 else if($_POST['berdasar'] == "Outlet"){
		//modus berdasarkan Outlet
		$outlet = $_POST['outlet'];
		$sql = "SELECT * FROM transaksi where (transaksi.outlet = '$outlet')
								ORDER BY outlet DESC";
	 }
	$query = mysql_query($sql);
    $no = $posisi+1;
	
      echo "  <table cellpadding='0' cellspacing='0' border='0' class='stdtable' id='dyntable2'>
	  <colgroup>
	  <col class='con0' style='width: 4%' />
	  <col class='con1' />
	  <col class='con0' />
	  <col class='con1' />
	  <col class='con0' />
	  </colgroup>
	  <thead>
            <tr>
            <th><i class='icon-terminal'></i> No</th>
                <th><i class='icon-signal'></i> Tgl. Transaksi</th>
            <th><i class='icon-signal'></i> Customer</th>
            <th><i class='icon-terminal'></i> Paket</th>
			<th><i class='icon-signal'></i> Outlet</th>
                <th><i class='icon-signal'></i> Berat</th>
                <th><i class='icon-signal'></i> Harga</th>
                <th><i class='icon-signal'></i> Status Order</th>
                <th><i class='icon-signal'></i> Total</th>
            </tr>
        </thead>
        <tbody>";
		
    while ($r = mysql_fetch_array($query)){
echo "<tr class='gradeX'>
	        <td>$r[no_order]</td>
	        <td>$r[tgl_transaksi]-$r[jam_order]</td>
            <td>$r[customer]</td>
            <td>$r[paket]</td>
			<td>$r[outlet]</td>
            <td>$r[berat] kg</td>
			<td>Rp. $r[harga]</td>
			<td>$r[status_order]</td>
			<td>Rp. $r[tarif]</td>
		    </tr>";
    }
      $no++;
    echo "</tbody></table>
	  </div></div>";
	
?>
   <center>
		<input type="submit" name="button" id="button" class='stdbtn' value="Print Laporan" onclick="print()" />
        <form method="get" class='stdform stdform2' action="../config/laporan_excel.php">
          <input name="tipeLaporan" type="hidden" id="tipeLaporan" value="Laporan Laundry" />
          <input name="sql" type="hidden" id="sql" value="<?php echo $sql; ?>" />
         <input type="submit" name="button2" id="button2" value="Ekspor ke Ms. Excel" />
        </form>
	</center>
</body>
</html>

