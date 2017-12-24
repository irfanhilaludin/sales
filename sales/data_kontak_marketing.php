<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>Data Kontak Marketing</h2>
<div class="clearfix"></div>
<?php
$tgl_awal = $_POST["tanggal_mulai"];
$tgl_akhir = $_POST["tanggal_akhir"];


    ?> 

</div>
<div class="x_content">
<p class="text-muted font-13 m-b-30">
</p>
<form class="form" action="?page=data_kontak_marketing" enctype="multipart/form-data" method="post">
Mulai Tanggal:<input id="tanggal_mulai" class="date-picker" required="required" type="text" name="tanggal_mulai">
Sampai Tanggal : <input id="tanggal_akhir" class="date-picker " required="required" type="text" name="tanggal_akhir">
<input name="filter_tanggal" type="submit" value="Filter"  class="btn btn-success"/>
</form>
<form class="" method="post">
<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
<thead>
<tr>
<th>No</th>
<th>Nama Marketing</th>
<th>Total Kontak</th>
<th>Belum dihubungi</th>
<th>Telah dihubungi</th>
<th>Telepon Ulang</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<!-----------------------------------Content------------------------------------>
<?php

$user_query = mysql_query("select * from tb_user where level_user = 'marketing' ")or die(mysql_error());
while($row_user = mysql_fetch_array($user_query)){

$kontak_query = mysql_query("select * from tb_kontak_all where id_user = '$row_user[id_user]' AND DATE_FORMAT(tanggal_bagi,'%m/%d/%Y') BETWEEN '$tgl_awal' AND '$tgl_akhir'")or die(mysql_error());
$row = mysql_fetch_array($kontak_query);
$count_kon = mysql_num_rows($kontak_query);

$kontak_query_b = mysql_query("select * from tb_kontak_all where id_user = '$row_user[id_user]' and status_kontak='belum dihubungi' AND DATE_FORMAT(tanggal_bagi,'%m/%d/%Y') BETWEEN '$tgl_awal' AND '$tgl_akhir'")or die(mysql_error());
$count_kon_b = mysql_num_rows($kontak_query_b);

$kontak_query_th = mysql_query("select * from tb_kontak_all where id_user = '$row_user[id_user]' and status_kontak='telah dihubungi' AND DATE_FORMAT(tanggal_bagi,'%m/%d/%Y') BETWEEN '$tgl_awal' AND '$tgl_akhir'")or die(mysql_error());
$count_kon_th = mysql_num_rows($kontak_query_th);

$kontak_query_tl = mysql_query("select * from tb_kontak_all where id_user = '$row_user[id_user]' and status_kontak='telepon ulang' AND DATE_FORMAT(tanggal_bagi,'%m/%d/%Y') BETWEEN '$tgl_awal' AND '$tgl_akhir' ")or die(mysql_error());
$count_kon_tl = mysql_num_rows($kontak_query_tl);

?>
<tr>
<td><?php echo $row_user['kode_user']; ?></td>
<td><?php echo $row_user['nama_user']; ?></td>
<td><?php echo $count_kon ; ?></td>
<td><?php echo $count_kon_b ; ?></td>
<td><?php echo $count_kon_th ; ?></td>
<td><?php echo $count_kon_tl ; ?></td>

<td>
<a href="?page=data_kontak_per_marketing&id_user=<?php echo $row_user['id_user']; ?>&dr=<?php echo $tgl_awal; ?>&sd=<?php echo $tgl_akhir; ?>" class="btn btn-danger" > Rincian</a>

</td>		
</tr>

<?php 

}?>  
</tbody>
</table>
</form>

</div>
 <script type="text/javascript">
            $(document).ready(function() {
              $('#tanggal_mulai').daterangepicker({
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
              $('#tanggal_akhir').daterangepicker({
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