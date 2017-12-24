    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
     <?php
$tanggal_input_awal = $_POST["tanggal_input_awal"];
$tanggal_input_sampai = $_POST["tanggal_input_sampai"];
    ?> 
    <h2>Data Kontak Belum di Hubungi</h2>
    <div class="clearfix"></div>
    </div>
    <div class="x_content">
<p class="text-muted font-13 m-b-30">
<div class="btn-group">
<a class="btn btn-primary" href="?page=data_kontak"> Tracking </a>
 <a class="btn btn-warning" href="?page=data_kontak_b"> Belum dihubungi </a>
 <a class="btn btn-primary" href="?page=data_kontak_th"> Telah dihubungi </a>
  <a class="btn btn-primary" href="?page=data_kontak_tl"> Telepon Ulang </a>
  <a class="btn btn-primary" href="?page=data_penawaran"> Penawaran Anda</a>
    <a class="btn btn-primary" href="?page=data_po"> PO Anda</a>
      <a class="btn btn-primary" href="?page=data_kirim"> Pengiriman</a>
        <a class="btn btn-primary" href="?page=data_bayar"> Pembayaran</a>
  </div>
</p>
<p class="text-muted font-13 m-b-30">
<div class="btn-group">
<a class="btn btn-success" href="?page=data_kontak_b_it"> Data Dari IT </a>
 <a class="btn btn-default" href="?page=data_kontak_b_m"> Data Mandiri </a>
   </div>
</p>
 
<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
    <tr>
    <th>Nama</th>
    <th>Alamat</th>
    <th>Kota</th>
    <th>Provinsi</th>
    <th>Kontak</th>
    <th>Email</th>
    <th>Purchasing</th>
    <th>Telpon</th>
  
    </tr>
    </thead>
    <tbody>
    <!-----------------------------------Content------------------------------------>
    <?php
	$session_user=$_SESSION['user'];
$user_query = mysql_query("select * from tb_user where id_user = '$session_user'  ")or die(mysql_error());
            $row_user = mysql_fetch_array($user_query);
				
       $kontak_query = mysql_query("select * from tb_kontak_all where id_user = '$row_user[id_user]' and status_kontak = 'belum dihubungi' and pembuat ='admin'")or die(mysql_error());
	
    while($row = mysql_fetch_array($kontak_query)){
    ?>
    <tr>
    <td><?php echo $row['nama_kontak']; ?></td>
    <td><?php echo $row['alamat_kontak']; ?></td>
    <td><?php echo $row['kota_kontak']; ?></td>
    <td><?php echo $row['provinsi_kontak']; ?></td>
    <td><?php echo $row['telepon_kontak']; ?></td>
     <td><?php echo $row['email_kontak']; ?></td>
    <td><?php echo $row['cp_kontak']; ?></td>
  
    <td>
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#telepon<?php echo $row['id_kontak']; ?>" ><i class="fa fa-phone">Telpon</i> </a>
    </td>		
    </tr>
    
  <!--MOdalll awallll  -->   
<div class="modal fade" id="telepon<?php echo $row['id_kontak']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header bg-color-blue">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">1.) Telepon Perusahaan </h4>
</div>
<div class="modal-body">
<h3>Calling <?php echo $row['telepon_kontak']; ?> ( <?php echo $row['nama_kontak']; ?> )</h3>
</div>
<div class="modal-footer">
<input name="Telepon Ulang" type="submit" class="btn btn-warning" data-dismiss="modal" data-toggle="modal" data-target="#telepon_ulang<?php echo $row['id_kontak']; ?>" value="Telepon Ulang"/>

<input name="Tidak Terhubung" type="submit" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#tidak_terhubung<?php echo $row['id_kontak']; ?>" value="Tidak Terhubung"/>

<a href="#" class="btn btn-primary" data-toggle="modal" data-dismiss="modal" data-target="#terhubung<?php echo $row['id_kontak']; ?>" >Terhubung</a>
</div>
</div>
</div>
</div>         

<!--Modal 2 -->
<div class="modal fade" id="terhubung<?php echo $row['id_kontak']; ?>" tabindex="-2" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header bg-color-blue">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">2.) Penawaran </h4>
</div>
<div class="modal-body">
<h3><?php echo $row_user['nama_user']; ?> Selling... <?php echo $row['nama_kontak']; ?></h3>

</div>
<div class="modal-footer">
<a href="#" class="btn btn-danger" data-toggle="modal" data-dismiss="modal" data-target="#penawaran_ditolak<?php echo $row['id_kontak']; ?>" >Penawaran di Tolak</a>

<a href="?page=telpon&id_kontak=<?php echo $row['id_kontak']; ?>" class="btn btn-primary">Penawaran Diterima</a>
</div>
</div>
</div>
</div>         
<!--Akhir Modal 2-->        


 <!--Modal 3    -->
  <div class="modal fade" id="penawaran_ditolak<?php echo $row['id_kontak']; ?>" tabindex="-3" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header bg-color-blue">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">Penawaran ditolak</h4>
</div>
<div class="modal-body">
<div class="panel panel-danger">
<div class="panel-heading">

</div><!-- /.panel-header -->
<div class="panel-body">
<form role="form" action="insert_feedback.php" enctype="multipart/form-data" method="post">
<!-- text input -->
<input name="id_pel" type="hidden" value="<?php echo $row['id_kontak']; ?>" />
<div class="form-group">
<label>Keterangan Feedback</label>
<p>
<label>
<input type="radio" name="respon" value="P" id="res0" checked="checked"/>
Tidak Pakai Solar</label>
<br />
<label>
<input type="radio" name="respon" value="S" id="res1" />
Kontrak PT Lain</label>
<br />
<label>
<input type="radio" name="respon" value="E" id="res2"/>
Pemakaian Minim</label>
<br />
<label>
<input type="radio" name="respon" value="O" id="res3"/>
Harga Kalah</label>
<br />

Keterangan :
<textarea name="ket" cols="50" rows="6"  class="form-control"></textarea>

</p>
</div>                                
    



<div class="panel-footer">
<button type="submit" class="btn btn-success">Submit </button>
</div>


</form>

<script>
						jQuery(document).ready(function(){
						jQuery("#login_form1").submit(function(e){
								e.preventDefault();
								var formData = jQuery(this).serialize();
								$.ajax({
									type: "POST",
									url: "insert_feedback.php",
									data: formData,
									success: function(html){
									if(html=='true_admin')
									{
									$.jGrowl("Sebentar Sabar......", { sticky: true });
									$.jGrowl("Welcome to Sistem Marketing PT.SBK", { header: 'Login Berhasil' });
									var delay = 1000;
										setTimeout(function(){ window.location = 'admin/index.php'  }, delay);  
									}else if (html == 'true'){
										$.jGrowl("Welcome to Sistem Marketing PT.SBK", { header: 'Login Berhasil' });
									var delay = 1000;
										setTimeout(function(){ window.location = 'sales/index.php'  }, delay);  
									}else
									{
									$.jGrowl("Mohon Cek Username dan Password Anda", { header: 'Login Gagal' });
									}
									}
								});
								return false;
							});
						});
						</script>
</div><!-- /.panel-body -->
</div>

</div>
</div>
</div>
</div>  


<!--Modal 4 -->
<div class="modal fade" id="tidak_terhubung<?php echo $row['id_kontak']; ?>" tabindex="-4" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header bg-color-blue">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel"> Keterangan Tidak Terhubung</h4>
</div>
  <form action="insert_tidak_terhubung.php" method="post">
  <input name="pelang" type="hidden" value="<?php echo $row['id_kontak']; ?>" />
<div class="modal-body">
<textarea name="respon" cols="50" rows="6"  class="form-control"></textarea>
</div>
<div class="modal-footer">
<input name="submit" type="submit" value="Submit" class="btn btn-danger" />

</form>
</div>
</div>
</div>
</div>         
<!--Akhir Modal 4-->   
<!--Modal 5 -->
<div class="modal fade" id="telepon_ulang<?php echo $row['id_kontak']; ?>" tabindex="-5" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header bg-color-red">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel"> Keterangan Telepon Ulang</h4>
</div>
  <form action="insert_telepon_ulang.php" method="post">
  <input name="pelang" type="hidden" value="<?php echo $row['id_kontak']; ?>" />
<div class="modal-body">
<textarea name="respon" cols="50" rows="6"  class="form-control"></textarea>
</div>
<div class="modal-footer">
<input name="submit" type="submit" value="Submit" class="btn btn-danger" />

</form>
</div>
</div>
</div>
</div>         
<!--Akhir Modal 5-->   
  
    
    
    
    
    
    
    
    
    
    
    
    
    
    <?php 
    
    }?>  
    </tbody>
    </table>
   
    </div>
         
    </div>
    </div>