    <div class="col-md-8 col-sm-8 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
    <h2>Detail Pelanggan</h2>
    <div class="clearfix"></div>
    </div>
    <div class="x_content">
    
             <?php
		$detail_q = mysql_query("select * from tb_kontak_all where id_kontak = '$_GET[id_kontak]' ")or die(mysql_error());
		while($row_detail = mysql_fetch_array($detail_q)){
	?>
    <div class="h1"><?php echo $row_detail['nama_kontak']; ?>  </div>
    
    <table id="datatable-responsive" class="table table-striped jambo_table">
  <tr>
    <td>Kode Pelanggan</td>
    <td>:</td>
    <td><?php echo $row_detail['kode_kontak']; ?> </td>
  </tr>
  
  <tr>
    <td>Alamat Pelanggan</td>
       <td>:</td>
    <td><?php echo $row_detail['alamat_kontak']; ?> </td>
  </tr>
  <tr>
    <td>Kota Pelanggan</td>
       <td>:</td>
    <td><?php echo $row_detail['kota_kontak']; ?> </td>
  </tr>
  <tr>
  
  <td>Provinsi Pelanggan</td>
       <td>:</td>
    <td><?php echo $row_detail['provinsi_kontak']; ?> </td>
    </tr>
  <tr>
        <td>CP Pelanggan</td>
       <td>:</td>
    <td><?php echo $row_detail['cp_kontak']; ?> </td>
  </tr>
  <tr>
    <td>Telepon Pelanggan</td>
       <td>:</td>
    <td><?php echo $row_detail['telepon_kontak']; ?> </td>
  </tr>
   
   <tr>
    <td>Fax Pelanggan</td>
       <td>:</td>
    <td><?php echo $row_detail['fax_kontak']; ?> </td>
  </tr>
   <tr>
    <td>Email Pelanggan</td>
       <td>:</td>
    <td><?php echo $row_detail['email_kontak']; ?> </td>
  </tr>
   <tr  class="alert-warning">
    <td>Status Pelanggan</td>
       <td>:</td>
    <td><?php echo $row_detail['status_kontak']; ?> </td>
  </tr>
   <tr>
    <td>Report Pelanggan</td>
       <td>:</td>
    <td><?php echo $row_detail['report_kontak']; ?> </td>
  </tr>
</table>
       
                  
                  <?php
				  }
				  ?>
  







</div>

</div>

</div>