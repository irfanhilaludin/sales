    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
    <h2>Data Kontak Marketing Berdasarkan Tanggal</h2>
    
    <div class="clearfix"></div>

    </div>
    <div class="x_content">
 <?php
 $mkrt = $_POST["id_user"];
$tgl_awal = $_POST["tanggal_mulai"];
$tgl_akhir = $_POST["tanggal_akhir"];


    ?>
<form class="form" action="?page=data_kontak_per_tanggal" enctype="multipart/form-data" method="post">
Mulai Tanggal:<input id="tanggal_mulai" class="date-picker" required="required" type="text" name="tanggal_mulai">
Sampai Tanggal : <input id="tanggal_akhir" class="date-picker" required="required" type="text" name="tanggal_akhir">


<select name="id_user" required="required" class="select2_single">
<?php
$ca_user = mysql_query("select * from tb_user where level_user = 'marketing'")or die(mysql_error());
                while($cari_user = mysql_fetch_array($ca_user)){
				
				
				?>
                <option value="<?php echo $cari_user['id_user']; ?>"><?php echo $cari_user['nama_user']; ?></option>
                <?php
				}
				?>
                
                </select>
                
<input name="filter_tanggal" type="submit" value="Filter"  class="btn btn-success"/>
</form>
    <form class="form" method="post" action="insert_set_pindah.php">
    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
    <tr>
    <th>No</th>
    <th>Nama Perusahaan</th>
    <th>Alamat</th>
    <th>Kota</th>
    <th>Status</th>
    <th>Sales</th>
    <th>Ket</th>
    <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <!-----------------------------------Content------------------------------------>
    <?php
    
$kontak_query = mysql_query("select * from tb_kontak_all where DATE_FORMAT(tanggal_bagi,'%m/%d/%Y') BETWEEN '$tgl_awal' AND '$tgl_akhir' AND id_user = ' $mkrt '")or die(mysql_error());
while($row = mysql_fetch_array($kontak_query)){
$user_query = mysql_query("select * from tb_user where id_user = '$row[id_user]' ")or die(mysql_error());
                $row_user = mysql_fetch_array($user_query);
    ?>
    <tr>
    <td><?php echo $row['id_kontak']; ?></td>
    <td><?php echo $row['nama_kontak']; ?></td>
    <td><?php echo $row['alamat_kontak']; ?></td>
    <td><?php echo $row['kota_kontak']; ?></td>

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
    <td class="a-center ">
     <input type="checkbox" class="flat" name="id_kon[]" value="<?php echo $row['id_kontak']; ?>">
    </td>		
    </tr>
    
    <?php 
    
    }?>  
    </tbody>
    </table>
     <div class="col-md-8">Pilih Marketing
<select name="user" required="required" class="form-control">     
     <?php
$cb_user = mysql_query("select * from tb_user where level_user = 'marketing'")or die(mysql_error());
                while($cr_user = mysql_fetch_array($cb_user)){
				
				
				?>
                <option value="<?php echo $cr_user['id_user']; ?>"><?php echo $cr_user['nama_user']; ?></option>

                <?php
				}
				?>
                
                </select>
                <input name="id_user" type="hidden" value="<?php echo $cr_user['id_user']; ?>" />

  <?php  echo"  <input name='submit' type='submit' class='btn btn-danger btn-xm' value='Pindah'/> "
  ?>
       </div>

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