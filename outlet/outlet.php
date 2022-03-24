<?php
$aksi="outlet/aksi_outlet.php";
$p=isset($_GET['aksi'])?$_GET['aksi']:null;
switch($p){
default:
?>
<div class="row">
<div class="col-sm-12">
    <h4 class="pull-left page-title">Data Outlet</h4>
    <ol class="breadcrumb pull-right">
        <li><a href="#">Beranda</a></li>
        <li class="active">Outlet</li>
    </ol>
</div>
</div>

<div class='panel panel-border panel-primary'>
    <div class='panel-heading'> 
        <h3 class='panel-title'><i class='md md-home'></i> Data Outlet</h3> 
    </div>  <div class='panel-body'> 
    <p align='left'><a class='btn btn-primary' href='?p=outlet&aksi=tambah'><i class='icon-plus'></i>Tambah Outlet</a></p>
    <br/>
    <?php
switch($_GET['msg']){
case "input":
	echo "<div class='alert alert-success alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><b>Owner Berhasil Ditambahkan!</b></h4>
		  </div>";
break;
case "edit":
	echo "<div class='alert alert-success alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><b>Owner Berhasil Diupdate!</b></h4>
		  </div>";
break;
case "hapus":
	echo "<div class='alert alert-success alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><b>Owner Berhasil Dihapus!</b></h4>
		  </div>";
break;
}
?>
<table id='datatable' class='table table-hover'>
    <thead>
        <tr>
        <th><i class='icon-terminal'></i> No</th>
        <th><i class='icon-signal'></i> Nama Outlet</th>
        <th><i class='icon-signal'></i> Owner</th>
        <th><i class='icon-signal'></i> Alamat</th>
        <th><i class='icon-terminal'></i> Telpon</th>
        <th><i class='icon-signal'></i> Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
$i=1;
$tp=mysql_query("SELECT * FROM outlet ORDER BY id DESC");
while($r=mysql_fetch_array($tp)){
    echo"<tr>
    <td>$i</td>
    <td>$r[outlet]</td>
        <td>$r[id_owner]</td>
        <td>$r[alamat_outlet]</td>
        <td>$r[telp_outlet]</td>
        <td><a class='btn btn-primary' href='?p=outlet&aksi=edit&id=$r[id]'><i class='icon-edit'></i>Edit</a>
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
?> 
<div class="row">
<div class="col-sm-12">
    <h4 class="pull-left page-title">Data Outlet </h4>
    <ol class="breadcrumb pull-right">
        <li><a href="#">Beranda</a></li>
        <li class="active">Data Outlet</li>
    </ol>
</div>
</div>
                        
<div class="col-sm-12">
<div class="panel panel-default">
    <div class="panel-heading"><h3 class="panel-title">Data Outlet</h3></div>
    <div class="panel-body">
        <div class="form">

<form method='post' action='outlet/aksi_outlet.php?act=input' class='cmxform form-horizontal tasi-form' id='commentForm'>


<div class="form-group">
<label for="cname" class="control-label col-lg-2">Nama Owner</label>
<div class="col-lg-10">
<select class="select2 form-control" name="id_owner" onchange="changeValue(this.value)">
<option value="0">-- Pilih Nama Owner --</option>

<?php
    $result = mysql_query("SELECT * FROM pengguna WHERE Level='Owner' ORDER BY id DESC");   
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
<label for="cname" class="control-label col-lg-2">Nama Outlet</label>
<div class="col-lg-10">
<input type="text" class="form-control" name="outlet" id="outlet" placeholder="Masukan Nama Outlet" required>
</div>
</div>

<div class="form-group">
<label for="cname" class="control-label col-lg-2">Alamat Outlet</label>
<div class="col-lg-10">
<input type="text" class="form-control" name="alamat_outlet" id="alamat_outlet" placeholder="Masukan Alamat Outlet" required>
</div>
</div>


<div class="form-group">
<label for="cname" class="control-label col-lg-2">Telpon Outlet</label>
<div class="col-lg-10">
<input type="number" class="form-control" name="telp_outlet" placeholder="Masukan Telpon Outlet" required>
</div>
</div>


<div class='form-group'>
    <div class='col-lg-offset-2 col-lg-10'>
        <button class='btn btn-primary waves-effect waves-light' type='submit'>Tambah</button>
		<a class='btn btn-danger' href='?p=outlet'>Batal</a>
    </div>
                                                
</form>
</div>
									 
          </div>					 
          </div>					 
          </div>
		 
    
          <?php
break;
case "tambah":
echo "<div class='row'>
<div class='col-sm-12'>
    <h4 class='pull-left page-title'>Tambah Data Owner</h4>
    <ol class='breadcrumb pull-right'>
        <li><a href='#'>Beranda</a></li>
        <li class='active'>Tambah Data Owner</li>
    </ol>
</div>
</div>

<div class='col-sm-12'>
<div class='panel panel-default'>
    <div class='panel-heading'><h3 class='panel-title'>Tambah Data Owner</h3></div>
    <div class='panel-body'>
        <div class='form'>";
		 

									
echo "<form method='post' action='owner/aksi_owner.php?act=input' class='cmxform form-horizontal tasi-form' id='commentForm'>
    
    <div class='form-group'>
   <label for='cname' class='control-label col-lg-2'>Nama Lengkap</label>
   <div class='col-lg-10'>
    <input type='text' class='form-control' name='owner' placeholder='Masukan Nama Owner' required>
    </div>
	</div>

    <div class='form-group'>
   <label for='cname' class='control-label col-lg-2'>Nama Outlet</label>
  <div class='col-lg-10'>
  <textarea class='form-control' id='ccomment' name='outlet' required='' aria-required='true' placeholder='Nama Outlet'></textarea>
	</div>
	</div>
	
	<div class='form-group'>
   <label for='cname' class='control-label col-lg-2'>Alamat Outlet</label>
  <div class='col-lg-10'>
  <textarea class='form-control' id='ccomment' name='alamat_outlet' required='' aria-required='true' placeholder='Alamat Outlet'></textarea>
	</div>
	</div>
	
	
	 <div class='form-group'>
   <label for='cname' class='control-label col-lg-2'>Telepon Outlet</label>
  <div class='col-lg-10'>
		<input type='number' class='form-control' name='telp_outlet' placeholder='Masukan No. Telepon' required>
	</div>
	</div>
	
   <div class='form-group'>
    <div class='col-lg-offset-2 col-lg-10'>
        <button class='btn btn-primary waves-effect waves-light' type='submit'>Tambah</button>
		<a class='btn btn-danger' href='?p=outlet'>Batal</a>
    </div>
</div>
</form>
</div>
</div>
</div>

</div>";
	  
	  
break;
    case "edit":
        $edit = mysql_query("SELECT * FROM outlet WHERE id='$_GET[id]'");
        $r    = mysql_fetch_array($edit);
    
    echo "<div class='row'>
    <div class='col-sm-12'>
        <h4 class='pull-left page-title'>Edit Data Outlet</h4>
        <ol class='breadcrumb pull-right'>
            <li><a href='#'>Beranda</a></li>
            <li class='active'>Edit Data Outlet</li>
        </ol>
    </div>
    </div>
    
    
    <div class='col-sm-12'>
    <div class='panel panel-default'>
        <div class='panel-heading'><h3 class='panel-title'>Edit Data Outlet</h3></div>
        <div class='panel-body'>
            <div class='form'>
            
            <form method='post' action='outlet/aksi_outlet.php?act=update' class='cmxform form-horizontal tasi-form' id='commentForm'>
            <input type='hidden' name='id' value='$r[id]'>
            
        
            <div class='form-group'>
            <label for='cname' class='control-label col-lg-2'>Nama Owner</label>
           <div class='col-lg-10'>
                 <input type='text' class='form-control' name='id_owner'  value='$r[id_owner]' placeholder='Nama Owner' required disabled>
             </div>
             </div>
            
         <div class='form-group'>
       <label for='cname' class='control-label col-lg-2'>Nama Outlet</label>
       <div class='col-lg-10'>
            <input type='text' class='form-control' value='$r[outlet]' name='outlet' placeholder='Masukan Nama Outlet Baru' required>
        </div>
        </div>
        
        <div class='form-group'>
       <label for='cname' class='control-label col-lg-2'>Alamat Outlet</label>
      <div class='col-lg-10'>
      <textarea class='form-control' id='ccomment' name='alamat_outlet' required='' aria-required='true' placeholder='Masukan Alamat Outlet Baru'>$r[alamat_outlet]</textarea>
        </div>
        </div>
        
        
         <div class='form-group'>
       <label for='cname' class='control-label col-lg-2'>Telepon</label>
      <div class='col-lg-10'>
            <input type='number' class='form-control' name='telp_outlet' value='$r[telp_outlet]' placeholder='Masukan No. Telepon Baru' required>
        </div>
        </div>
        
        
    <div class='form-group'>
        <div class='col-lg-offset-2 col-lg-10'>
            <button class='btn btn-primary waves-effect waves-light' type='submit'>Update</button>
            <a class='btn btn-danger' href='?p=outlet'>Batal</a>
        </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    
    </div>";
    echo "";
         

	  break;
			}//penutup switch
?>  

