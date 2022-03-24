<?php
$aksi="user/aksi_administrator.php";
$p=isset($_GET['aksi'])?$_GET['aksi']:null;
switch($p){
default:
?>
<div class="row">
<div class="col-sm-12">
    <h4 class="pull-left page-title">Data Administrator</h4>
    <ol class="breadcrumb pull-right">
        <li><a href="#">Beranda</a></li>
        <li class="active">Data Administrator</li>
    </ol>
</div>
</div>

<div class='panel panel-border panel-primary'>
    <div class='panel-heading'> 
        <h3 class='panel-title'><i class='fa fa-user'></i> Data Administrator</h3> 
    </div>  <div class='panel-body'> 
    <br/>
    <?php
switch($_GET['msg']){
case "edit":
	echo "<div class='alert alert-success alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><b>Administrator Berhasil Diupdate!</b></h4>
		  </div>";
break;
}
?>
<table id='datatable' class='table table-hover'>
    <thead>
        <tr>
        <th><i class='icon-terminal'></i> No</th>
            <th><i class='icon-terminal'></i> Nama</th>
            <th><i class='icon-time'></i> Username</th>
            <th><i class='icon-signal'></i> Alamat</th>
            <th><i class='icon-signal'></i> Telp</th>
            <th><i class='icon-signal'></i> Gender</th>
            <th><i class='icon-signal'></i> Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
$i=1;
$tp=mysql_query("SELECT * FROM pengguna WHERE level='Administrator' ORDER BY id ");
while($r=mysql_fetch_array($tp)){
?>
<tr>
<td><?php echo $i;?></td>
    <td><?php echo $r['nama'];?></td>
    <td><?php echo$r['username'];?></td>
    <td><?php echo$r['alamat'];?></td>
    <td><?php echo$r['telp'];?></td>
    <td><?php echo$r['gender'];?></td>
    <td><a class='btn btn-primary' href='?p=administrator&aksi=edit&id=<?php echo $r[id];?>'><i class='icon-edit'></i>Edit</a></td>
    
</tr>
<?php $i=$i+1;?>
<?php } ?>
</tbody>
</table>
     </div><!-- /.box-body -->
</div><!-- /.box -->   

          
<?php

	  
break;
case "edit":
	$edit = mysql_query("SELECT * FROM pengguna WHERE id='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

echo "<div class='row'>
<div class='col-sm-12'>
    <h4 class='pull-left page-title'>Edit Data Administrator</h4>
    <ol class='breadcrumb pull-right'>
        <li><a href='#'>Beranda</a></li>
        <li class='active'>Edit Data Administrator</li>
    </ol>
</div>
</div>


<div class='col-sm-12'>
<div class='panel panel-default'>
    <div class='panel-heading'><h3 class='panel-title'>Edit Data Administrator</h3></div>
    <div class='panel-body'>
        <div class='form'>
		
		<form method='post' action='user/aksi_administrator.php?act=update' class='cmxform form-horizontal tasi-form' id='commentForm'>
		<input type='hidden' name='id' value='$r[id]'>
	
	
     <div class='form-group'>
   <label for='cname' class='control-label col-lg-2'>Nama Lengkap</label>
   <div class='col-lg-10'>
		<input type='text' class='form-control' value='$r[nama]' name='nama' placeholder='Masukan Nama Karyawan' required>
	</div>
	</div>
	
<div class='form-group'>
   <label for='cname' class='control-label col-lg-2'>Username</label>
  <div class='col-lg-10'>
		<input type='text' class='form-control' name='username'  value='$r[username]' placeholder='Masukan Username' required disabled>
	</div>
	</div>
	
	
<div class='form-group'>
   <label for='cname' class='control-label col-lg-2'>Password</label>
  <div class='col-lg-10'>
		<input type='text' class='form-control' name='password' placeholder='Masukan Password'>
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
		<select class='form-control' name='gender'>
		<option value='Laki laki'>Laki laki</option>
		<option value='Perempuan'>Perempuan</option>
		</select>
	</div>
	</div>
	
	
<div class='form-group'>
    <div class='col-lg-offset-2 col-lg-10'>
        <button class='btn btn-primary waves-effect waves-light' type='submit'>Update</button>
		<a class='btn btn-danger' href='?p=administrator'>Batal</a>
    </div>
</div>
</form>
</div>
</div>
</div>

</div>";
echo "";
break;
			}?>