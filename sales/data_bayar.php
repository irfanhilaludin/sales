    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
     <?php
$tanggal_input_awal = $_POST["tanggal_input_awal"];
$tanggal_input_sampai = $_POST["tanggal_input_sampai"];
    ?> 
    <h2>Data Pengiriman PO Anda </h2>
    <div class="clearfix"></div>
    </div>
    <div class="x_content">
<p class="text-muted font-13 m-b-30">
<div class="btn-group">
<a class="btn btn-primary" href="?page=data_kontak"> Tracking </a>
<a class="btn btn-primary" href="?page=data_s"> Searching Data </a>
 <a class="btn btn-primary" href="?page=data_kontak_b"> Belum dihubungi </a>
 <a class="btn btn-primary" href="?page=data_kontak_th"> Telah dihubungi </a>
  <a class="btn btn-primary" href="?page=data_kontak_tl"> Telepon Ulang </a>
  <a class="btn btn-primary" href="?page=data_penawaran"> Penawaran Anda</a>
    <a class="btn btn-primary" href="?page=data_po"> PO Anda</a>
      <a class="btn btn-primary" href="?page=data_kirim"> Pengiriman</a>
        <a class="btn btn-warning" href="?page=data_bayar"> Pembayaran</a>
  </div>
</p>

 <form class="form" action="?page=data_bayar" enctype="multipart/form-data" method="post">
Filter Tanggal:<input id="tanggal_input_awal" class="date-picker" required="required" type="text" name="tanggal_input_awal">
Sampai:<input id="tanggal_input_sampai" class="date-picker" required="required" type="text" name="tanggal_input_sampai">
<input name="input" type="submit" value="Filter Tanggal Pembayaran"  class="btn btn-default"/>
</form>



    <table id="datatable-responsive" class="table table-striped jambo_table bulk_action" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Perusahaan</th>
   <th>Tanggal Kirim</th>
    <th>Tanggal Bayar</th>
    <th>Alamat kirim</th>
    <th>Purchasing</th>
    <th>Penerima</th>
    <th>Vol</th>
    	 <th>Kelengkapan</th>
	 <th>Status</th>
    </tr>
    </thead>
    <tbody>
    <!-----------------------------------Content------------------------------------>
    <?php

		$session_user=$_SESSION['user'];
    if(($tanggal_input_awal=='') AND ($tanggal_input_sampai=='')){

    $kirim_query = mysql_query("select *, DATE_FORMAT(tanggal_bayar,'%d/%m/%Y') as tanggal from tb_pembayaran  where id_user = '$session_user' order by tanggal_bayar ASC")or die(mysql_error());
	}else{
	$kirim_query = mysql_query("select * , DATE_FORMAT(tanggal_bayar,'%d/%m/%Y') as tanggal  from tb_pembayaran where id_user = '$session_user'  AND DATE_FORMAT(tanggal_bayar,'%m/%d/%Y')  BETWEEN '$tanggal_input_awal' AND '$tanggal_input_sampai' order by tanggal_bayar ASC")or die(mysql_error());
	}
    while($row = mysql_fetch_array($kirim_query)){
	
		$kontak_query = mysql_query("select * from tb_kontak_all where id_kontak = '$row[id_kontak]' ")or die(mysql_error());
                $row_kontak = mysql_fetch_array($kontak_query);
	
	
		$po = mysql_query("select * from tb_po where id_po = '$row[id_po]' ")or die(mysql_error());
                $row_po = mysql_fetch_array($po);
	
		$kirim_po = mysql_query("select *  from tb_kirim_po where id_kirim = '$row[id_kirim]' ")or die(mysql_error());
                $row_kirim_po = mysql_fetch_array($kirim_po);
				
				
$user_query = mysql_query("select * from tb_user where id_user = '$session_user' ")or die(mysql_error());
                $row_user = mysql_fetch_array($user_query);
    ?>
    <tr>
    <td><?php echo $row_kontak['nama_kontak']; ?><br /><?php echo $row_kontak['kota_kontak']; ?></td>
        <td><?php echo $row_kirim_po['tanggal_kirim']; ?></td>
           <td><?php echo $row['tanggal']; ?></td>

        <td><?php echo $row_kirim_po['alamat_kirim']; ?></td>
    <td><?php echo $row_kontak['cp_kontak']; ?></td>
    <td><?php echo $row_kirim_po['penerima_barang']; ?></td>
    <td><?php echo $row_kirim_po['vol_kirim']; ?></td>
         <td><?php echo $row_kirim_po['kelengkapan_kirim']; ?></a></td>
     <td><?php 
    if($row['status_bayar']=='belum bayar')
    {
    echo '<div class="label label-warning"><i class="icon-check"></i><strong>Belum Bayar</strong></div>';
    }
    
	else if($row['status_bayar']=='sudah bayar')
    {
    echo '<div class="label label-success"><i class="icon-ok"></i><strong>Sudah Bayar</strong></div>';
    }
	
    else 
    {
    echo '<div class="label label-danger"><i class="icon-remove-sign"></i><strong>di Tolak</strong></div>';
    };
    
    ?></td>

   
    </tr>
    
    <?php 
    
    }?>  
    </tbody>
    </table>

  
    </div>
           <script type="text/javascript">
            $(document).ready(function() {
              $('#tanggal_input_awal').daterangepicker({
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
              $('#tanggal_input_sampai').daterangepicker({
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