<div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Data PO Belum Kirim</h2>
                        
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>

<tr>


<th>Perusahaan</th>
<th>Alamat kirim</th>
<th>Penerima Barang</th>
<th>Tanggal Kirim</th>	
<th>Vol</th>	
<th>Kelengkapan</th>	
<th>Sales</th>
<th>#</th>
</tr>

</thead>

<tbody>
<!-----------------------------------Content------------------------------------>
<?php

   $oras = strtotime("today");
$ora = date("Y/m/d",$oras);	
$newdate2 = strtotime ( '-4 week' , $ora  ) ; 

$newdate = date("Y/m/d",$newdate2);	

                    $penawaran_query = mysql_query("select * from  tb_po where status_po = 'setuju'")or die(mysql_error());
                    while($row_pn = mysql_fetch_array($penawaran_query)){
                     $tes = strtotime( $row_pn['tempo_penawaran']);
                    
                    $pelanggan_query = mysql_query("select * from tb_kontak_all where id_kontak = $row_pn[id_kontak] ")or die(mysql_error());
                    while($row = mysql_fetch_array($pelanggan_query)){
                    
                    $user_query = mysql_query("select * from tb_user where id_user = $row_pn[id_user]")or die(mysql_error());
                    while($row_user = mysql_fetch_array($user_query)){
                    
                    
                    ?>
                  
<tr class="odd gradeX">
  
<td> <a href="?page=detail_penawaran&id_penawaran=<?php echo $row['id_penawaran']; ?>" class="">

<?php echo $row['nama_kontak']; ?><br /></a></td>
			 <td><?php echo $row_pn['alamat_kirim']; ?></td>
      <td><?php echo $row_pn['penerima_barang']; ?><br />(<?php echo $row_pn['no_telp_penerima']; ?>)</td>
            
            <td><?php echo $row_pn['tanggal_kirim']; ?> /<?php echo $row_pn['pukul_kirim']; ?></td>
            <td><?php echo $row_pn['vol_po']; ?></td>
            <td><?php echo $row_pn['kelengkapan_po']; ?></td>
              <td><?php echo $row_user['nama_user']; ?></td>
                
            <td>
<a href="?page=cetak_surat_jalan&id_kirim=<?php echo $row_pn['id_po']; ?>" class="btn btn-primary btn-xs">Cetak Surat Jalan</a>
            </td>	
          
</tr>
  
<?php 
}
}
}?>  


</tbody>
                        </table>

                      </div>
                    </div>
                  </div>