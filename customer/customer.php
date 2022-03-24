<?php
$aksi="customer/aksi_customer.php";
$p=isset($_GET['aksi'])?$_GET['aksi']:null;
switch($p){
default:
?>
<div class="row">
<div class="col-sm-12">
    <h4 class="pull-left page-title">Data Customer</h4>
    <ol class="breadcrumb pull-right">
        <li><a href="#">Beranda</a></li>
        <li class="active">Data Customer</li>
    </ol>
</div>
</div>

<div class='panel panel-border panel-primary'>
    <div class='panel-heading'> 
        <h3 class='panel-title'><i class='fa fa-user'></i> Data Customer</h3> 
    </div>  <div class='panel-body'> 
    <p align='left'><a class='btn btn-primary' href='?p=customer&aksi=tambah'><i class='icon-plus'></i>Tambah Customer</a></p>
    <br/>
    <?php
switch($_GET['msg']){
case "input":
	echo "<div class='alert alert-success alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><b>Customer Berhasil Ditambahkan!</b></h4>
		  </div>";
break;
case "edit":
	echo "<div class='alert alert-success alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><b>Customer Berhasil Diupdate!</b></h4>
		  </div>";
break;
case "hapus":
	echo "<div class='alert alert-success alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><b>Customer Berhasil Dihapus!</b></h4>
		  </div>";
break;
}
?>
<table id='datatable' class='table table-hover'>
	<thead>
		<tr>
		<th><i class='icon-terminal'></i> No.</th>
			<th><i class='icon-terminal'></i> Nama</th>
			<th><i class='icon-signal'></i> Alamat</th>
			<th><i class='icon-signal'></i> Telp</th>
		<th><i class='icon-chevron-right'></i> Aksi</th>
		</tr>
	</thead>
	<tbody>
    <?php
$i=1;
$tp=mysql_query("SELECT * FROM customer ORDER BY id DESC");
while($r=mysql_fetch_array($tp)){
//$hargaa = $r['harga'];
echo"<tr>
<td>$i</td>
<td>$r[nama]</td>
	<td>$r[alamat]</td>
	<td>$r[telp]</td>
	<td><a class='btn btn-primary' href='?p=customer&aksi=edit&id=$r[id]'><i class='icon-edit'></i>Edit</a>
	 <a href='$aksi?act=hapus&id=$r[id]' class='btn btn-danger' onClick=\"return confirm('Anda yakin ingin menghapus ini?');\"><i class='icon-trash'></i>Hapus</td>
	
</tr>";
$i=$i+1;
}

		?>
</tbody>
</table>
     </div><!-- /.box-body -->
</div><!-- /.box -->   

          
<?php
break;
case "tambah":
echo "<div class='row'>
<div class='col-sm-12'>
    <h4 class='pull-left page-title'>Tambah Data Customer</h4>
    <ol class='breadcrumb pull-right'>
        <li><a href='#'>Beranda</a></li>
        <li class='active'>Tambah Data Customer</li>
    </ol>
</div>
</div>

<div class='col-sm-12'>
<div class='panel panel-default'>
    <div class='panel-heading'><h3 class='panel-title'>Tambah Data Customer</h3></div>
    <div class='panel-body'>
        <div class='form'>";
		 

									
echo "<form method='post' action='customer/aksi_customer.php?act=input' class='cmxform form-horizontal tasi-form' id='commentForm'>
    
    <div class='form-group'>
   <label for='cname' class='control-label col-lg-2'>Nama Lengkap</label>
   <div class='col-lg-10'>
    <input type='text' class='form-control' name='nama' placeholder='Masukan Nama customer' required>
    </div>
	</div>
	
	<div class='form-group'>
   <label for='cname' class='control-label col-lg-2'>Alamat Lengkap</label>
  <div class='col-lg-10'>
  <textarea class='form-control' id='ccomment' name='alamat' required='' aria-required='true' placeholder='Alamat Customer'></textarea>
	</div>
	</div>
	
	
	 <div class='form-group'>
   <label for='cname' class='control-label col-lg-2'>Telepon</label>
  <div class='col-lg-10'>
		<input type='number' class='form-control' name='telp' placeholder='Masukan No. Telepon' required>
	</div>
	</div>
	
	 <div class='form-group'>
   <label for='cname' class='control-label col-lg-2'>Gender</label>
  <div class='col-lg-10'>
		<select class='form-control' name='gender'>
		<option value='Laki laki'>Laki laki</option>
		<option value='Perempuan'>Perempuan</option>
		</select>
	</div>
	</div>
	
   <div class='form-group'>
    <div class='col-lg-offset-2 col-lg-10'>
        <button class='btn btn-primary waves-effect waves-light' type='submit'>Tambah</button>
		<a class='btn btn-danger' href='?p=customer'>Batal</a>
    </div>
</div>
</form>
</div>
</div>
</div>

</div>";
	  
	  
break;
case "edit":
	$edit = mysql_query("SELECT * FROM customer WHERE id='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

echo "<div class='row'>
<div class='col-sm-12'>
    <h4 class='pull-left page-title'>Edit Data Customer</h4>
    <ol class='breadcrumb pull-right'>
        <li><a href='#'>Beranda</a></li>
        <li class='active'>Edit Data Customer</li>
    </ol>
</div>
</div>


<div class='col-sm-12'>
<div class='panel panel-default'>
    <div class='panel-heading'><h3 class='panel-title'>Edit Data Customer</h3></div>
    <div class='panel-body'>
        <div class='form'>
		
		<form method='post' action='customer/aksi_customer.php?act=update' class='cmxform form-horizontal tasi-form' id='commentForm'>
		<input type='hidden' name='id' value='$r[id]'>
		
	
	
     <div class='form-group'>
   <label for='cname' class='control-label col-lg-2'>Nama Lengkap</label>
   <div class='col-lg-10'>
		<input type='text' class='form-control' value='$r[nama]' name='nama' placeholder='Masukan Nama Karyawan' required>
	</div>
	</div>
	
	
	
	
    <div class='form-group'>
   <label for='cname' class='control-label col-lg-2'>Alamat Lengkap</label>
  <div class='col-lg-10'>
  <textarea class='form-control' id='ccomment' name='alamat' required='' aria-required='true' placeholder='Alamat Karyawan'>$r[alamat]</textarea>
	</div>
	</div>
	
	
	 <div class='form-group'>
   <label for='cname' class='control-label col-lg-2'>Telepon</label>
  <div class='col-lg-10'>
		<input type='number' class='form-control' name='telp' value='$r[telp]' placeholder='Masukan No. Telepon' required>
	</div>
	</div>
	
	
	 <div class='form-group'>
   <label for='cname' class='control-label col-lg-2'>Gender</label>
  <div class='col-lg-10'>
		<input type='text' class='form-control' name='gender' value='$r[gender]' required>
	</div>
	</div>
	
	
<div class='form-group'>
    <div class='col-lg-offset-2 col-lg-10'>
        <button class='btn btn-primary waves-effect waves-light' type='submit'>Update</button>
		<a class='btn btn-danger' href='?p=customer'>Batal</a>
    </div>
</div>
</form>
</div>
</div>
</div>

</div>";
echo "";
break;
			}
	?>