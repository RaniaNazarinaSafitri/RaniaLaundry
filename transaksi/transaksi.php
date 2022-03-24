<?php
$aksi="transaksi/proses.php";
$p=isset($_GET['aksi'])?$_GET['aksi']:null;
switch($p){
default:
?>
<div class="row">
    <div class="col-sm-12">
        <h4 class="pull-left page-title">Transaksi</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Beranda</a></li>
            <li class="active">Transaksi</li>
        </ol>
    </div>
</div>
<div class='panel panel-border panel-primary'>
        <div class='panel-heading'> 
            <h3 class='panel-title'><i class='fa fa-clock-o'></i> Transaksi</h3> 
        </div>  <div class='panel-body'> 
    <p align='left'><a class='btn btn-primary' href='?p=transaksi&aksi=tambah'><i class='icon-plus'></i>Tambah Transaksi</a></p>
    <br/>
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
            <th><i class='icon-signal'></i> Pembayaran</th>
            <th><i class='icon-signal'></i> Customer</th>
            <th><i class='icon-terminal'></i> Paket</th>
			<th><i class='icon-signal'></i> Outlet</th>
            <th><i class='icon-signal'></i> Status Order</th>
            <th><i class='icon-signal'></i> Total</th>
            <th><i class='icon-signal'></i> Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
$i=1;
$tp=mysql_query("SELECT * FROM transaksi ORDER BY no_order DESC");
while($r=mysql_fetch_array($tp)){
$tgl  = tgl_indo($r['tgl_transaksi']);
if($r[status_order]=='Baru'){
?>
<tr>
 <td><b><?php echo $i;?></b></td>

<td><b><?php echo $r['tgl_transaksi'];?>-<?php echo $r['jam_order'];?></b></td>
<td><div class="btn btn-success"><b><?php echo $r['status'];?></b></div></td>
<td><b><?php echo $r['customer'];?></b></td>
<td><b><?php echo $r['paket'];?></b></td>
<td><b><?php echo $r['outlet'];?></b></td>
<td><div class="btn btn-info"><b><?php echo $r['status_order'];?></b></div></td>
<td><b><?php echo'Rp. ' . number_format( $r['tarif'], 0 , '' , '.' ) . ',-'?></b></td>
<td><a class='btn btn-primary' href='?p=transaksi&aksi=detailtransaksi&id=<?php echo $r['no_order'];?>'><i class='icon-edit'></i>Detail</a></td>
        
</tr>
<?php } 
	  else { ?>
 <tr>
 <td><?php echo $i;?></b></td>

<td><?php echo $r['tgl_transaksi'];?>-<?php echo $r['jam_order'];?></td>
<td><div class="btn btn-success"><?php echo $r['status'];?></div></td>
<td><?php echo $r['customer'];?></td>
<td><?php echo $r['paket'];?></td>
<td><b><?php echo $r['outlet'];?></b></td>
<td><div class="btn btn-info"><?php echo $r['status_order'];?></div></td>
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
          <?php break;  ?>  
          
          
  <?php
break;
case "tambah":
?> 
<div class="row">
<div class="col-sm-12">
    <h4 class="pull-left page-title">Order Laundry </h4>
    <ol class="breadcrumb pull-right">
        <li><a href="#">Beranda</a></li>
        <li class="active">Order Laundry</li>
    </ol>
</div>
</div>
                        
<div class="col-sm-12">
<div class="panel panel-default">
    <div class="panel-heading"><h3 class="panel-title">Order Laundry</h3></div>
    <div class="panel-body">
        <div class="form">
<?php
//fungsi kode otomatis
function kdauto($tabel, $inisial){
$struktur   = mysql_query("SELECT * FROM $tabel");
$field      = mysql_field_name($struktur,0);
$panjang    = mysql_field_len($struktur,0);
$qry  = mysql_query("SELECT max(".$field.") FROM ".$tabel);
$row  = mysql_fetch_array($qry);
if ($row[0]=="") {
$angka=0;
}
else {
$angka= substr($row[0], strlen($inisial));
}
$angka++;
$angka      =strval($angka);
$tmp  ="";
for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
$tmp=$tmp."0";
}
return $inisial.$tmp.$angka;
}

?>
<form method='post' action='transaksi/proses.php?act=input' enctype='multipart/form-data' class="cmxform form-horizontal tasi-form" id="commentForm" >

<div class="form-group">
<label for="cname" class="control-label col-lg-2">No. Order</label>
<div class="col-lg-10">
<input type="text" name="no_order" class="form-control" value="<?php echo kdauto("transaksi","ORD-"); ?>" disabled="disabled" />
<input type="hidden" name="no_order" value="<?php echo kdauto("transaksi","ORD-"); ?>" />
</div>
</div>

<div class="form-group">
<label for="cname" class="control-label col-lg-2">Nama Customer</label>
<div class="col-lg-10">
<select class="select2 form-control" name="customer" onchange="changeValue(this.value)">
<option value="0">-- Pilih Nama Customer --</option>

<?php
    $result = mysql_query("select * from customer");   
    $jsArray = "var dtCs = new Array();\n";       
    while ($row = mysql_fetch_array($result)) {   
        echo '<option value="' . $row['nama'] . '">' . $row['nama'] . '</option>';   
        $jsArray .= "dtCs['" . $row['nama'] . "'] = {telp:'" . addslashes($row['telp']).
		"',alamat:'".addslashes($row['alamat'])."'};\n";   
    }     
    ?> 
    
</select>
</div>
</div>

<div class="form-group">
<label for="cname" class="control-label col-lg-2">Telepon</label>
<div class="col-lg-10">
<input type="number" class="form-control" name="telp" id="telp" placeholder="Masukan No. Telepon" required>
</div>
</div>

<div class="form-group">
<label for="cname" class="control-label col-lg-2">Alamat Lengkap</label>
<div class="col-lg-10">
<input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukan Alamat Lengkap" required>
</div>
</div>

<div class="form-group">
<label for="cname" class="control-label col-lg-2">Paket Laundry</label>
<div class="col-lg-10">
<select  class="form-control" name="paket" onchange="changeValue(this.value)">
<option value="0">-- Pilih Paket Laundry --</option>

<?php
    $result = mysql_query("select * from paket");   
    while ($row = mysql_fetch_array($result)) {   
        echo '<option value="' . $row['paket'] . '">' . $row['paket'] . '</option>'; 
    }     
    ?> 
</select>
</div>
</div>

<div class="form-group">
<label for="cname" class="control-label col-lg-2">Outlet</label>
<div class="col-lg-10">
<select  class="form-control" name="outlet">
<option value="0">-- Pilih Outlet--</option>
<?php
$tp3=mysql_query("SELECT * FROM outlet ORDER BY id");
while($r3=mysql_fetch_array($tp3)){
?>
<option value="<?php echo $r3['outlet'];?>"><?php echo $r3['outlet'];?></option>
<?php } ?>
</select>
</div>   
</div>  


<div class="form-group">
<label for="cname" class="control-label col-lg-2">Berat (kg)</label>
<div class="col-lg-10">
<input type="number" class="form-control" name="berat" placeholder="Masukan Berat Pakaian" required>
</div>
</div>

<div class="form-group">
<label for="cname" class="control-label col-lg-2">Tanggal Ambil</label>
<div class="col-lg-10">
  <input type="text" class="form-control" name="tgl_ambil" placeholder="dd/mm/yyyy" id="datepicker-multiple">
</div>
</div>

<div class="form-group">
<label for="cname" class="control-label col-lg-2">Tipe Pembayaran</label>
<div class="col-lg-10">
<select  class="form-control" name="pembayaran">
<option value="0">-- Pilih Tipe Pembayaran--</option>
<?php
$tp3=mysql_query("SELECT * FROM pembayaran ORDER BY id");
while($r3=mysql_fetch_array($tp3)){
?>
<option value="<?php echo $r3['t_pembayaran'];?>"><?php echo $r3['t_pembayaran'];?></option>
<?php } ?>
</select>
</div>   
</div>  

<div class="form-group">
<label for="cname" class="control-label col-lg-2">Status Pembayaran</label>
<div class="col-lg-10">
<select  class="form-control" name="status">
<option value="0">-- Pilih Status Pembayaran--</option>
<option value="Belum Lunas">Belum Lunas</option>
<option value="Lunas">Lunas</option>
</select>
</div>      
</div>    
<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
        <button class="btn btn-primary waves-effect waves-light" type="submit">Proses Order</button>
    </div>
</div>
                                                
</form>
</div>
									 
          </div>					 
          </div>					 
          </div>
		 
          <script type="text/javascript">   
    <?php echo $jsArray; ?> 
    function changeValue(nama){ 
    document.getElementById('telp').value = dtCs[nama].telp; 
    document.getElementById('alamat').value = dtCs[nama].alamat; 
    }; 
    </script> 
    
    <?php break;  ?>  
        
          <?php
	  case "detailtransaksi":
	  $edit = mysql_query("SELECT * FROM transaksi WHERE no_order='$_GET[id]'");
      $r    = mysql_fetch_array($edit);
	  
	  
      $tgl    = date("d/m/Y");
	  $harga = number_format($r[harga],0,",",".");
	  $tarif = number_format($r[tarif],0,",",".");
	  $status	= $_POST[status];
	  
	  if ($r[status]=='Lunas'){
      $pilih_status = array('Lunas');    
      }
	  elseif ($r[status]=='Belum Lunas'){
      $pilih_status = array('Lunas', 'Belum Lunas');    
      }
	  else{
      $pilih_status = array('Lunas', 'Belum Lunas');    
      }
      $pilih_order = '';
      foreach ($pilih_status as $status) {
	  $pilih_order .= "<option value=$status";
	  if ($status == $r[status]) {
	  $pilih_order .= " selected";
	   }
	  $pilih_order .= ">$status</option>\r\n";
      }
	  
	  if ($r[status_order]=='Baru'){
        $pilihan_status = array('Baru', 'Proses', 'Selesai', 'Diambil', 'Batal');
      }
      elseif ($r[status_order]=='Selesai'){
      $pilihan_status = array('Selesai', 'Diambil');    
      }
	  elseif ($r[status_order]=='Diambil'){
      $pilihan_status = array('Diambil');    
      }
	  elseif ($r[status_order]=='Proses'){
      $pilihan_status = array('Selesai', 'Diambil');    
      }
	  else{
      $pilihan_status = array('Baru', 'Proses', 'Selesai', 'Diambil', 'Batal');    
      }
      $pilihan_order = '';
      foreach ($pilihan_status as $status) {
	  $pilihan_order .= "<option value=$status";
	  if ($status == $r[status_order]) {
	  $pilihan_order .= " selected";
	   }
	  $pilihan_order .= ">$status</option>\r\n";
      }
	  
	  
echo "<div class='row'>
		<div class='col-sm-12'>
			<h4 class='pull-left page-title'>Detail Transaksi </h4>
			<ol class='breadcrumb pull-right'>
				<li><a href='#'>Beranda</a></li>
				<li>Transaksi</li>
				<li class='active'>Detail Transaksi</li>
			</ol>
		</div>
	</div>
	<div class='panel panel-border panel-primary'>
<div class='panel-heading'> 
    <h3 class='panel-title'><i class='fa fa-user-plus'></i> Detail Transaksi</h3> 
</div>  <div class='panel-body'> 
<div class='col-md-12 '>


<form method='POST' action='transaksi/proses.php?act=update' enctype='multipart/form-data'>
 <input type=hidden name=id value=$r[no_order]>
<table class='table table-bordered'>
	<tbody>
		<tr>
			<td class='btn-primary' width='30%'>No. Order</td>
			<td>$r[no_order]</td>
		</tr>
		<tr>
			<td class='btn-primary' width='30%'>Nama Lengkap</td>
			<td>$r[customer]</td>
		</tr>
		<tr>
			<td class='btn-primary' width='30%'>Alamat Lengkap</td>
			<td>$r[alamat]</td>
		</tr>
		<tr>
			<td class='btn-primary' width='30%'>Telepon</td>
			<td>$r[telp] </td>
		</tr>
		
		<tr> 
			<td class='btn-primary' width='30%'>Tipe Pembayaran</td>
			<td>$r[pembayaran]</td>
		</tr>

		<tr> 
			<td class='btn-primary' width='30%'>Outlet</td>
			<td>$r[outlet]</td>
		</tr>
		
		<tr> 
			<td class='btn-primary' width='30%'>Status Pembayaran</td>
			<td>
			 <select name='status' class='form-control'>$pilih_order</select>
			</td>
		</tr>
		<tr>
			<td class='btn-primary' width='30%'>Status Order</td>
			<td>
				<select name='status_order' class='form-control'>$pilihan_order</select>
			</td>
		</tr>
		
		<tr>
			<td class='btn-primary' width='30%'>Tanggal Ambil</td>
			<td>$r[tgl_ambil] </td>
		</tr>
									
	</tbody>
</table>
			
</div> 
<div class='col-md-4 pull-right' style='margin-bottom:15px; z-index:1;'></div>
  <div class='col-md-12'>
	<div class='scroll_div'>
		<table class='table table-bordered '>
			<thead>
				<tr>
					<th>No</th>
					<th>Tgl. Order</th>
					<th>Paket Laundry</th>
					<th width='20%'>Berat Cucian</th>
					<th width='20%'>Harga/Kg</th>
					<th width='20%'>Subtotal</th>
				</tr>
			</thead>
			
			<tbody>
				<tr>
					<td>1</td>
					<td>$tgl</td>
					<td>$r[paket]</td>
					<td>$r[berat] kg</td>
					<td>Rp. $harga</td>
					<td>Rp. $tarif</td>
				</tr>
			</tbody>
			
			<tbody>
				<tr>
					<td colspan='4' class='btn-primary'><center><strong>TOTAL PESANAN</strong></center></td>
					<td></td>
					<td><strong id='label_total_pesanan'>Rp. $tarif</strong></td>
				</tr>
			</tbody>
		</table>
		<input value='Proses Order' class='btn btn-primary' type='submit' name='update'>
	<a href='transaksi/kwitansi.php?id=$r[no_order]' target='_blank' class='btn btn-default'>Cetak Invoice</a><br/><br/>
	 </form> 
   </div>
 </div>    			 
</div>   			 
</div>";
?>
         
<?php
	  break;
			}//penutup switch
?>    