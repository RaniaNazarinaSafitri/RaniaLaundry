<div class="row">
    <div class="col-sm-12">
        <h4 class="pull-left page-title">Laporan Order Masuk</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Data Laundry</a></li>
            <li class="active">Laporan Order Masuk</li>
        </ol>
    </div>
</div>
<div class='panel panel-border panel-primary'>
        <div class='panel-heading'> 
            <h3 class='panel-title'><i class='fa fa-clock-o'></i> Laporan Order Masuk</h3> 
        </div>  <div class='panel-body'> 
	
    <form method="post" target="_blank" action="laporan/data-laporan.php">
  	<table border="0" class="laporan">
    <tr height="30">
      <td colspan="3">
      	&nbsp;&nbsp;&nbsp;<label>
      	  <input name="berdasar" type="radio" value="Semua Data" /><strong> Semua Data</strong>
        </label>
      </td>
      </tr>
    <tr height="30">
      <td width="150">
      	&nbsp;&nbsp;&nbsp;<label>
        	<input name="berdasar" type="radio" value="Tanggal" /><strong> Tanggal</strong>
        </label>
      </td>
      <td><input name="dari" type="text"  value="Dari Tanggal" class="colorpicker-default form-control" size="12" id="datepicker-multiple1" /></td>
      <td><input name="ke" type="text"  value="sampai Tanggal" class="colorpicker-default form-control" size="12" id="datepicker-multiple2" /></td>
      </tr>

    <tr height="30">
      <td width="150">
      	&nbsp;&nbsp;&nbsp;<label>
        	<input name="berdasar" type="radio" value="Outlet" /><strong> Outlet</strong>
        </label>
      </td>
      <td>
      <div class="form-group">
<div class="col-lg-10">
<select  class="form-control" name="outlet">
<option value="0">Pilih Outlet</option>
<?php
$tp3=mysql_query("SELECT * FROM outlet ORDER BY id");
while($r3=mysql_fetch_array($tp3)){
?>
<option value="<?php echo $r3['outlet'];?>"><?php echo $r3['outlet'];?></option>
<?php } ?>
</select>
</div>   
</div>  
    </td>
      
      </tr>
    
    <tr height="30">
      <td colspan="3">
        <button type="submit" class="btn btn-primary waves-effect waves-light m-b-5">Tampilkan</button>      </td>
      </tr>
  </table>
  	<p>&nbsp;</p>
  <p>&nbsp; </p>
  <p>&nbsp;</p>
</form>


   </div>

   </div>