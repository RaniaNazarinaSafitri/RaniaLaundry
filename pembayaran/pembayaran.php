<?php
$aksi="pembayaran/aksi_pembayaran.php";
                    $p=isset($_GET['aksi'])?$_GET['aksi']:null;
                    switch($p){
default:
echo "<div class='row'>
<div class='col-sm-12'>
    <h4 class='pull-left page-title'>Tipe Pembayaran</h4>
    <ol class='breadcrumb pull-right'>
        <li><a href='#'>Beranda</a></li>
        <li class='active'>Tipe Pembayaran</li>
    </ol>
</div>
</div>

<div class='panel panel-border panel-primary'>
	<div class='panel-heading'> 
	<h3 class='panel-title'><i class='fa fa-list'></i> Tipe Pembayaran</h3> 
	</div>  <div class='panel-body'> 
	<p align='left'><a class='btn btn-primary' href='?p=pembayaran&aksi=tambah'><i class='icon-plus'></i>Tambah Tipe Pembayaran</a></p>
	<hr>";

switch($_GET['msg']){
case "input":
	echo "<div class='alert alert-success alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><b>Paket Laundy Berhasil Ditambahkan!</b></h4>
		  </div>";
break;
case "edit":
	echo "<div class='alert alert-success alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><b>Paket Laundy Berhasil Diupdate!</b></h4>
		  </div>";
break;
case "hapus":
	echo "<div class='alert alert-success alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><b>Paket Laundy Berhasil Dihapus!</b></h4>
		  </div>";
break;
}

echo "
	<table id='datatable' class='table table-hover'>
	<thead>
	<tr>
		<th><i class='icon-time'></i> No.</th>
		<th><i class='icon-signal'></i> Tipe Pembayaran</th>
	<th><i class='icon-chevron-right'></i> Aksi</th>
	</tr>
	</thead>
	<tbody>";
	$i=1;
	$tp=mysql_query("SELECT * FROM pembayaran ORDER BY id DESC");
	while($r=mysql_fetch_array($tp)){
	//$hargaa = $r['harga'];
	echo"<tr>
	<td>$r[id]</td>
	<td>$r[t_pembayaran]</td>
	<td><a class='btn btn-primary' href='?p=pembayaran&aksi=edit&id=$r[id]'><i class='icon-edit'></i>Edit</a>
	<a class='btn btn-danger' href='$aksi?act=hapus&id=$r[id]' onClick=\"return confirm('Anda yakin ingin menghapus ini?');\"><i class='icon-trash'></i>Hapus</td>
	
	</tr>";
	$i=$i+1;
	}
	
	
	echo"</tbody>
	</table>
	</div><!-- /.box-body -->
	</div><!-- /.box -->   ";    

break;
case "edit":
	$edit = mysql_query("SELECT * FROM pembayaran WHERE id='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
echo "<div class='row'>
<div class='col-sm-12'>
    <h4 class='pull-left page-title'>Edit Tipe Pembayaran</h4>
    <ol class='breadcrumb pull-right'>
        <li><a href='#'>Beranda</a></li>
        <li class='active'>Edit Tipe Pembayaran</li>
    </ol>
</div>
</div>


<form method='post' action='pembayaran/aksi_pembayaran.php?act=update' enctype='multipart/form-data'>";
echo "<div class='panel panel-border panel-primary'>
	<div class='panel-heading'> 
	<h3 class='panel-title'><i class='fa fa-list'></i> Edit Tipe Pembayaran</h3> 
	</div>  <div class='panel-body'> 
	<input type='hidden' name='id' value='$r[id]'>
	<div class='control-group'>
	<div class='form-group'>
	<label>Tipe Pembayaran</label>
	<div class='span9'><input class='form-control' value='$r[t_pembayaran]'  type='text' name='t_pembayaran' /></div>
	</div>		
	<Br>
	
	<input type='submit' class='btn btn-primary' value='Update'> <a class='btn btn-danger' href='?p=harga'>Batal</a>
	</form>
	</div> 
	
	
	</div></div>";
break;

case "tambah":
echo "<div class='row'>
<div class='col-sm-12'>
    <h4 class='pull-left page-title'>Tambah Tipe Pembayaran</h4>
    <ol class='breadcrumb pull-right'>
        <li><a href='#'>Beranda</a></li>
        <li class='active'>Tipe Pembayaran</li>
    </ol>
</div>
</div>

<form method='post' action='pembayaran/aksi_pembayaran.php?act=input' enctype='multipart/form-data'>";
echo '<div class="panel panel-border panel-primary">
	<div class="panel-heading"> 
	<h3 class="panel-title"><i class="fa fa-list"></i> Tambah Tipe Pembayaran</h3> 
	</div>  <div class="panel-body"> 
	<div class="control-group">
	<div class="form-group">
	<label>Tipe Pembayaran</label>
	<div class="span9"><input class="form-control" placeholder="Masukan Tipe Pembayaran"  type="text" name="t_pembayaran" /></div>
	</div>					 
	<Br>
	
	<input type="submit" class="btn btn-primary" value="Tambah"> <a class="btn btn-danger" href="?p=pembayaran">Batal</a>
	</form>
	<br>
	
	</div> 
	
	</div></div> ';
	echo "";
	break;
	}//penutup switch
?>    
</body>

</html>