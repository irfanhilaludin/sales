<div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Data Sisa</h2>
                        <div class="clearfix"></div>
                        
                      </div>
                      <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
<div class="btn-group">
                     
                        <a class="btn btn-warning" href="?page=data_sisa_p">(P) Tidak Pakai Solar </a>
                        <a class="btn btn-danger" href="?page=data_sisa_s">(S) Kontrak PT Lain </a>
                        <a class="btn btn-danger" href="?page=data_sisa_e">(E) Pemakaian Minim </a>
                        <a class="btn btn-danger" href="?page=data_sisa_o">(O) Kalah Harga </a>
                         <a class="btn btn-danger" href="?page=data_tidak_terhubung">Tidak Terhubung</a>
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
                              <th>Report</th>
                              <th>Keterangan</th>
                         
                             </tr>
                          </thead>
                          <tbody>
                          <!-----------------------------------Content------------------------------------>
                           <?php
 $session_user=$_SESSION['user'];
$kontak_query = mysql_query("select * from tb_kontak_all where id_user = '$session_user'  AND report_kontak = 'P' and status_kontak ='telah dihubungi'")or die(mysql_error());
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


<td><?php echo $row['report_kontak']; ?></td>
<td><?php echo $row['ket_kontak']; ?></td>

<td>
</td>		
</tr>

<?php 
}?>  
                          </tbody>
                        </table>
    
                      </div>
                    </div>
                  </div>
                  