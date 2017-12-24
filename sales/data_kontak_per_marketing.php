    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
    <h2>Data Kontak Marketing</h2>
    
    <div class="clearfix"></div>
    
<p class="text-muted font-13 m-b-30">
<div class="btn-group">
<?php
$tgl_awal = $_GET["dr"];
$tgl_akhir = $_GET["sd"];
$kontak_awal = $_GET['id_user'];

if($tgl_awal==''){
echo"<script>alert('Maaf untuk isi tanggal terlebih dahulu')</script>";
	echo"<meta http-equiv='refresh' content='0;url=./?page=data_kontak_marketing'>";
}else{

?>
<a class="btn btn-danger" href="?page=data_kontak_per_marketing&id_user=<?php echo $kontak_awal; ?>&dr=<?php echo $tgl_awal; ?>&sd=<?php echo $tgl_akhir; ?>">Semua</a>
<a class="btn btn-danger" href="?page=data_kontak_per_marketing_b&id_user=<?php echo  $kontak_awal; ?>&dr=<?php echo $tgl_awal; ?>&sd=<?php echo $tgl_akhir; ?>">Belum dihubungi</a>
<a class="btn btn-danger" href="?page=data_kontak_per_marketing_th&id_user=<?php echo  $kontak_awal; ?>&dr=<?php echo $tgl_awal; ?>&sd=<?php echo $tgl_akhir; ?>">Telah dihubungi</a>
<a class="btn btn-danger" href="?page=data_kontak_per_marketing_tl&id_user=<?php echo  $kontak_awal; ?>&dr=<?php echo $tgl_awal; ?>&sd=<?php echo $tgl_akhir; ?>">Telepon Ulang</a>
</div>
</p>

    </div>
    <div class="x_content">
  <form class="form" action="simpan_kontak_marketing.php" enctype="multipart/form-data" method="post">
  <input name="id_user" type="hidden" value="<?php echo $kontak_awal; ?>" />
<input name="tgl_awal" type="hidden" value="<?php echo $tgl_awal; ?>" />
<input name="tgl_akhir" type="hidden" value="<?php echo $tgl_akhir; ?>" />
<input name="filter_tanggal" type="submit" value="Backup"  class="btn btn-success"/>
</form>         
    <form class="" method="post">
    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
    <tr>
    <th>No</th>
    <th>Nama Perusahaan</th>
    <th>Alamat</th>
    <th>Kota</th>
    <th>Provinsi</th>
    <th>Kontak</th>
    <th>Purchasing</th>
    <th>Status</th>
    <th>Sales</th>
    <th>Ket</th>
    </tr>
    </thead>
    <tbody>
    <!-----------------------------------Content------------------------------------>
    <?php
    
    $kontak_query = mysql_query("select * from tb_kontak_all where id_user = '$_GET[id_user]' AND DATE_FORMAT(tanggal_bagi,'%m/%d/%Y') BETWEEN '$tgl_awal' AND '$tgl_akhir' ")or die(mysql_error());
    while($row = mysql_fetch_array($kontak_query)){
	
$user_query = mysql_query("select * from tb_user where id_user = '$row[id_user]' ")or die(mysql_error());
                $row_user = mysql_fetch_array($user_query);
    ?>
    <tr>
    <td><?php echo $row['id_kontak']; ?></td>
    <td><?php echo $row['nama_kontak']; ?></td>
    <td><?php echo $row['alamat_kontak']; ?></td>
    <td><?php echo $row['kota_kontak']; ?></td>
     <td><?php echo $row['provinsi_kontak']; ?></td>
    <td><?php echo $row['telepon_kontak']; ?></td>
    <td><?php echo $row['cp_kontak']; ?></td>
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
    echo '<div class="success"><i class="icon-remove-sign"></i><strong>'.$row['status_kontak'].'</strong></div>';
    };
    
    ?>
    </td>
    <td><?php echo $row_user['nama_user']; ?></td>
    <td><?php echo $row['report_kontak']; ?></td>  
  	
    </tr>
    
    <?php 
    
    }?>  
    </tbody>
    </table>
    </form>
    </div>
  <script type="text/javascript">
            $(document).ready(function() {
              $('#backup_mulai').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_4"
				
              }, 
			 
			  
			  function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
              });
			  
            });
          </script>
          <script type="text/javascript">
            $(document).ready(function() {
              $('#backup_akhir').daterangepicker({
			  language: "id",
                singleDatePicker: true,
                calender_style: "picker_4"
              }, 
			  
			  function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
              });
            });
          </script>
    </div>
    </div>
    <?php
	
	}
	?>