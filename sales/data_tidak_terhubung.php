<div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Data Sisa</h2>
                        <div class="clearfix"></div>
                        
                      </div>
                      <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
<div class="btn-group">
                     
                        <a class="btn btn-danger" href="?page=data_sisa_p">(P) Tidak Pakai Solar </a>
                        <a class="btn btn-danger" href="?page=data_sisa_s">(S) Kontrak PT Lain </a>
                        <a class="btn btn-danger" href="?page=data_sisa_e">(E) Pemakaian Minim </a>
                        <a class="btn btn-danger" href="?page=data_sisa_o">(O) Kalah Harga </a>
                         <a class="btn btn-warning" href="?page=data_tidak_terhubung">Tidak Terhubung</a>
                  </div>
                         </p>

                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                           <tr>
                           
                              <th>Nama Perusahaan</th>
                              <th>Alamat</th>
                              <th>Kota</th>
                               <th>Provinsi</th>
                              <th>Tgl telpon</th>
                              <th>Status</th>
                              <th>Keterangan</th>
                         
                             </tr>
                          </thead>
                          <tbody>
                          <!-----------------------------------Content------------------------------------>
                           <?php
 $session_user=$_SESSION['user'];
$kontak_query = mysql_query("select * from tb_kontak_all where id_user = '$session_user'  AND status_kontak ='tidak terhubung'")or die(mysql_error());
while($row = mysql_fetch_array($kontak_query)){
$id = $row['id_kontak'];
$cari =mysql_real_escape_string($row['nama_kontak']);
$user_query = mysql_query("select * from tb_user where id_user = '$row[id_user]' ")or die(mysql_error());
                $row_user = mysql_fetch_array($user_query);
?>
<tr>

<td><?php echo $row['nama_kontak']; ?></td>
<td><?php echo $row['alamat_kontak']; ?></td>
<td><?php echo $row['kota_kontak']; ?></td>
<td><?php echo $row['provinsi_kontak']; ?></td>
<td><?php echo $row['tanggal_telp']; ?></td>
<td><?php 
if($row['status_kontak']=='telah dihubungi')
{
echo '<div class="label label-success"><i class="icon-check"></i><strong>'.$row['status_kontak'].'</strong></div>';
}
else if($row['status_kontak']=='belum dihubungi')
{
echo '<div class="label label-warning"><i class="icon-ok"></i><strong>'.$row['status_kontak'].'</strong></div>';
}
else
{
echo '<div class="danger"><i class="icon-remove-sign"></i><strong>'.$row['status_kontak'].'</strong></div>';
};

?>
</td>


<td><?php echo $row['ket_kontak']; ?></td>
	
</tr>

<?php 
}?>  
                          </tbody>
                        </table>
    
                      </div>
                    </div>
                  </div>
                  