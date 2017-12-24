 <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
     <?php
$session_user=$_SESSION['user'];

		$device_query = mysql_query("select * from tb_kontak_all where id_kontak = '$_GET[id_kontak]'")or die(mysql_error());
		while($row = mysql_fetch_array($device_query)){
	
       
    ?> 
    <h2>Data Penawaran <?php echo $row['nama_kontak']; ?></h2>
    <div class="clearfix"></div>
    </div>
          <form role="form" action="insert_penawaran.php" enctype="multipart/form-data" method="post">
                  <input name="id_usr" type="hidden" value="<?php echo $session_user; ?>" />
                  <input name="id_pel" type="hidden" value="<?php echo $row['id_kontak']; ?>" />
                    <!-- text input -->
                                        <div class="form-group">
                      <label>Nama Pelanggan</label>
                      <input type="text" class="form-control" placeholder="Masukan Telp..." name="nama" value="<?php echo $row['nama_kontak']; ?>" required>
                    </div>
                                        <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" class="form-control" placeholder="Masukan Telp..." name="alamat" value="<?php echo $row['alamat_kontak']; ?>" required>
                    </div>
                    
                    
                    
                                                            <div class="form-group">
                      <label>Kota</label>
                      <input type="text" class="form-control" placeholder="Masukan Kota..." name="kota" value="<?php echo $row['kota_kontak']; ?>" required>
                    </div>
                    
                    
                    
                                                            <div class="form-group">
                      <label>Provinsi</label>
                      <input type="text" class="form-control" placeholder="Masukan provinsi..." name="provinsi" value="<?php echo $row['provinsi_kontak']; ?>" required>
                    </div>
                    
                    
                    
                    
                    <div class="form-group">
                      <label>Telp</label>
                      <input type="text" class="form-control" placeholder="Masukan Telp..." name="telepon" value="<?php echo $row['telepon_kontak']; ?>">
                    </div>
                     <div class="form-group">
                      <label>Fax</label>
                      <input type="text" class="form-control" placeholder="Masukan Fax ..." name="fax" value="<?php echo $row['fax_kontak']; ?>" >
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control " placeholder="Masukan Email ..." name="email" value="<?php echo $row['email_kontak']; ?>" >
                    </div>
                    <div class="form-group">
                      <label>CP</label>
                      <input type="text" class="form-control" placeholder="Masukan CP PIC ..." name="cp" value="<?php echo $row['cp_kontak']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Harga</label>
                      <input type="number" class="form-control" placeholder="Masukan harga ..." name="harga" min=4 required>
                    </div>
                    <div class="form-group">
                      <label>Pembayaran :</label>
 					  <label class="flat"><input type="radio" name="pembayaran" value = "Cash On Delivery" checked >COD</label>
<label class="flat"><input type="radio" name="pembayaran" value = "Cash Before Delivery">CBD</label>
<label class="flat"><input type="radio" name="pembayaran" value = "1 Minggu">1 Minggu</label>
<label class="flat"><input type="radio" name="pembayaran" value = "2 Minggu">2 Minggu</label>
<label class="flat"><input type="radio" name="pembayaran" value = "3 Minggu">3 Minggu</label>
<label class="flat"><input type="radio" name="pembayaran" value = "4 Minggu">4 Minggu</label>
					  
                    </div>
					<div>
					  <label>Keterangan :</label>
					  </div>
					  <div>
					<textarea name="respon" cols="100" rows="6"  class="form-control"></textarea>
					</div
><div class="panel-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>


                  </form>
                  <?php } ?>
				  
                                </div>
              </div>
              
              
                    
              </div>