
 <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
        <h2>Searching Data</h2>
    <div class="clearfix"></div>
    </div>
    <div class="x_content">   
         <?php
$pencarian = $_POST["pencarian"];
    ?> 
<p class="text-muted font-13 m-b-30">
<div class="btn-group">
<a class="btn btn-primary" href="?page=data_kontak"> Tracking </a>
<a class="btn btn-warning" href="?page=data_s"> Searching Data </a>
 <a class="btn btn-primary" href="?page=data_kontak_b"> Belum dihubungi </a>
 <a class="btn btn-primary" href="?page=data_kontak_th"> Telah dihubungi </a>
  <a class="btn btn-primary" href="?page=data_kontak_tl"> Telepon Ulang </a>
  <a class="btn btn-primary" href="?page=data_penawaran"> Penawaran Anda</a>
    <a class="btn btn-primary" href="?page=data_po"> PO Anda</a>
      <a class="btn btn-primary" href="?page=data_kirim"> Pengiriman</a>
        <a class="btn btn-primary" href="?page=data_bayar"> Pembayaran</a>
  </div>
</p>
<p class="text-muted font-13 m-b-30">
<div class="btn-group"></div>
</p>
<form action="" class="form-horizontal form" enctype="multipart/form-data" method="post">
<div class="form-group">
<label for="pencarian">Pencarian : </label>
<input type="text" class="input " id="pencarian" name="pencarian"/>
<button type="submit" class="btn btn-xs btn-success" > Cari </button>
</div>
</form>
<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th width="20%">Nama</th>
        <th width="12%">Kota</th>
        <th width="15%">Provinsi</th>
        <th width="16%">Kode</th>
        <th width="16%">Keterangan</th>
        <th width="7%">Tanggal Expired Penawaran</th>
       
    </tr>
    </thead>
    <tbody>
    <!-----------------------------------Content------------------------------------>
    
    <?php
$session_user=$_SESSION['user'];

if(!empty($pencarian)){
$kontak_query = mysql_query("select * from tb_kontak_all Where nama_kontak like '%$pencarian%' order by 'nama_kontak'")or die(mysql_error());
$pencarian = '' ;

}
while($row = mysql_fetch_array($kontak_query)){

$user_query = mysql_query("select id_user , nama_user from tb_user where id_user = '$row[id_user]'")or die(

mysql_error());

$row_user = mysql_fetch_array($user_query);

$penawaran_query = mysql_query("select tempo_penawaran from tb_penawaran  where id_kontak = '$row[id_kontak]'")or die(mysql_error());

$row_penawaran = mysql_fetch_assoc($penawaran_query);




    
    ?> 
<tr>
    <td><?php echo $row['nama_kontak']; ?></td>
    <td><?php echo $row['kota_kontak']; ?></td>
    <td><?php echo $row['provinsi_kontak']; ?></td>
    <td><?php echo $row['report_kontak']; ?></td>
    <td><?php echo $row['ket_kontak']; ?></td>
    <td><?php echo $row_penawaran['tempo_penawaran'] ; ?></td>
   
   
   
</tr>
   <?php } ?>  
    </tbody>
  </table>
</div>
</div>
</div>