<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>Bagi Kontak Marketing</h2>
<div class="clearfix"></div>

</div>
<div class="x_content">
<p class="text-muted font-13 m-b-30">
</p>

<form class="" method="post">
<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
<thead>
<tr>
<th>Nama Marketing</th>
<th>Kontak dari Admin</th>
<th>Kontak Mandiri</th>
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

$kontak_query = mysql_query("select * from tb_kontak_all where id_user = '$row_user[id_user]'  and pembuat = 'admin'  ")or die(mysql_error());
$row = mysql_fetch_array($kontak_query);
$count_kon = mysql_num_rows($kontak_query);

$kontak_query_m = mysql_query("select * from tb_kontak_all where id_user = '$row_user[id_user]' and pembuat = 'mandiri' ")or die(mysql_error());
$count_kon_m = mysql_num_rows($kontak_query_m);

$kontak_query_b = mysql_query("select * from tb_kontak_all where id_user = '$row_user[id_user]' and status_kontak='belum dihubungi' ")or die(mysql_error());
$count_kon_b = mysql_num_rows($kontak_query_b);

$kontak_query_th = mysql_query("select * from tb_kontak_all where id_user = '$row_user[id_user]' and status_kontak='telah dihubungi' ")or die(mysql_error());
$count_kon_th = mysql_num_rows($kontak_query_th);

$kontak_query_tl = mysql_query("select * from tb_kontak_all where id_user = '$row_user[id_user]' and status_kontak='telepon ulang'  ")or die(mysql_error());
$count_kon_tl = mysql_num_rows($kontak_query_tl);

?>
<tr>
<td><?php echo $row_user['nama_user']; ?></td>
<td><?php echo $count_kon ; ?></td>
<td><?php echo $count_kon_m ; ?></td>
<td><?php echo $count_kon_b ; ?></td>
<td><?php echo $count_kon_th ; ?></td>
<td><?php echo $count_kon_tl ; ?></td>

<td>
            <a href="?page=set_kontak&id_user= <?php echo $row_user['id_user']; ?>" class="btn btn-default" >Set Kontak</a>

</td>		
</tr>

<?php 

}?>  
</tbody>
</table>
</form>

</div>
                 
</div>
</div>