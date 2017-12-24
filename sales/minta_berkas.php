 <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
     <?php
$session_user=$_SESSION['user'];

		$device_query = mysql_query("select * from tb_kontak_all where id_kontak = '$_GET[id_kontak]'")or die(mysql_error());
		while($row = mysql_fetch_array($device_query)){
	
       
    ?> 
    <h2>Kirim Berkas Untuk <?php echo $row['nama_kontak']; ?></h2>
    <div class="clearfix"></div>
    </div>
          <form role="form" action="insert_berkas.php" enctype="multipart/form-data" method="post">
                  <input name="id_usr" type="hidden" value="<?php echo $session_user; ?>" />
                  <input name="id_pel" type="hidden" value="<?php echo $row['id_kontak']; ?>" />
                    <!-- text input -->
                                       
                                        <div class="form-group">
  
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control " placeholder="Masukan Email ..." name="email" value="<?php echo $row['email_kontak']; ?>" >
                    </div>
   
                    <div class="form-group">
                      <label>Kebutuhan Berkas yang dikirim :</label><br />
<textarea name="berkas" cols="50" rows="6"  class="form-control" required></textarea>
					  
                    </div>
					
  <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                  <?php } ?>
				  
                                </div>
              </div>
              
              
                    
              </div>