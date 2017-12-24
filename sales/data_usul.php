    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
      <h2>Data Mandiri / Usul Data</h2>
    <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <a href="?page=input_usul" class="btn btn-success" />usul data </a>
    <form action=""method="post">
    <table id="datatable-responsive" class="table table-striped jambo_table bulk_action" cellspacing="0" width="100%">
    <thead>
    <tr>
    <th>Nama</th>
    <th>Kota</th>
    <th>Provinsi</th>
    <th>Kontak</th>
    <th>Email</th>
    <th>Status</th>
    <th>Ket</th>
    </tr>
    </thead>
    <tbody>
    <!-----------------------------------Content------------------------------------>
    <?php
   $session_user=$_SESSION['user'];
	$kontak_query = mysql_query("select * from tb_kontak_usul where pembuat= '$user_username'")or die(mysql_error());
    while($row = mysql_fetch_array($kontak_query)){
	
$user_query = mysql_query("select * from tb_user where id_user = '$row[id_user]' ")or die(mysql_error());
                $row_user = mysql_fetch_array($user_query);
    ?>
    <tr>

    <td><?php echo $row['nama_kontak']; ?></td>
    <td><?php echo $row['kota_kontak']; ?></td>
    <td><?php echo $row['provinsi_kontak']; ?></td>
    <td><?php echo $row['telepon_kontak']; ?></td>
    <td><?php echo $row['email_kontak']; ?></td>
   
    </td>
    <td><?php echo $row['status_kontak']; ?></td>
    <td><?php echo $row['report_kontak']; ?></td>  

    </tr>
    
    <?php 
    
    }?>  
    </tbody>
    </table>
     </form>

    </div>
    
    </div>
    