    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
<?php
				$user_query = mysql_query("select * from tb_user where id_user = '$_GET[id_user]' ")or die(mysql_error());
		$row_user = mysql_fetch_array($user_query);
		?>
        
        
            <div class="x_title">
    <h2>Data Kontak untuk <?php echo $row_user['nama_user']; ?>  </h2>
    <div class="clearfix"></div>
    </div>
    <div class="x_content">
<form action="insert_set_kontak.php" method="post" enctype="multipart/form-data">
            <input name="id_user" type="hidden" value="<?php echo $row_user['id_user']; ?>" />
                  <table id="datatable-responsive" class="table table-striped jambo_table bulk_action" >
                    <thead>
                      <tr>
                  	<th>Kode</th>
					<th>Nama</th>
					<th>Alamat</th>
                    <th>Kota</th>
					<th>CP</th>
					<th>Telp</th>
                    <th>Status</th>	
                    <th>pilih</th>
                      </tr>
                    </thead>
                    <tbody>
                    <!-----------------------------------Content------------------------------------>
                    <?php
	
		$device_query = mysql_query("select * from tb_kontak_all where id_user is Null or id_user ='' and status_kontak = 'belum dihubungi'")or die(mysql_error());
		while($row = mysql_fetch_array($device_query)){
	
		?>
        <tr>
        <td><?php echo $row['kode_kontak']; ?></td>
		<td><?php echo $row['nama_kontak']; ?></td>
			<td><?php echo $row['alamat_kontak']; ?> </td>
			<td><?php echo $row['kota_kontak']; ?></td>
			<td><?php echo $row['cp_kontak']; ?></td>
			<td><?php echo $row['telepon_kontak']; ?></td>
			<td><?php 
			if($row['status_kontak']=='telah dihubungi')
		       {
			   echo '<div class="label label-success"><i class="icon-check"></i><strong>'.$row['status_kontak'].'</strong></div>';
		       }
		       else if($row['status_kontak']=='belum dihubungi')
			   {
			   echo '<div class="label label-danger"><i class="icon-ok"></i><strong>'.$row['status_kontak'].'</strong></div>';
		       }
			  else
			   {
			   echo '<div class="label label-warning"><i class="icon-remove-sign"></i><strong>'.$row['status_kontak'].'</strong></div>';
		       };
			   
			   ?>
			   
			
			
			</td>
			<td><input name="id[]" type="checkbox" value="<?php echo $row['id_kontak']; ?>" class="flat"/></td>		
      </tr>
                     
     
      <?php 
	  }?> 
       </tbody>
                   
                  </table>
                  
                  <div class="form-group">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                       <a href="?page=set_user"class="btn btn-warning">Cancel</a>
                        <button type="submit" class="btn btn-success">Set Kontak</button>
                      </div>
                      </div>
         </form> 






</div>

</div>

</div>