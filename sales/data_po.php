    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
     <?php
$tanggal_input_awal = $_POST["tanggal_input_awal"];
$tanggal_input_sampai = $_POST["tanggal_input_sampai"];
    ?> 
    <h2>Data Penjualan Anda</h2>
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
    <a class="btn btn-warning" href="?page=data_po"> PO Anda</a>
      <a class="btn btn-primary" href="?page=data_kirim"> Pengiriman</a>
        <a class="btn btn-primary" href="?page=data_bayar"> Pembayaran</a>
  </div>
</p>
 <p class="text-muted font-13 m-b-30">
<div class="btn-group">
 <a class="btn btn-warning" href="?page=po_pending"> PO Pending  </a>
<a class="btn btn-success" href="?page=po_setuju"> PO Approve</a>
 <a class="btn btn-danger" href="?page=po_tidak_setuju"> PO Hold</a>
   </div>
</p>

 <form class="form" action="?page=data_po" enctype="multipart/form-data" method="post">
Filter Tanggal:<input id="tanggal_input_awal" class="date-picker" required="required" type="text" name="tanggal_input_awal">
Sampai:<input id="tanggal_input_sampai" class="date-picker" required="required" type="text" name="tanggal_input_sampai">
<input name="input" type="submit" value="Filter Tanggal Penjualan"  class="btn btn-default"/>
</form>



    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
    <tr>
    <th>Tanggal PO</th>
   <th>Tanggal Kirim</th>
    <th>Perusahan</th>
    <th>Kota</th>
    <th>Provinsi</th>
    <th>Oat</th>
    <th>Harga</th>
    <th>Vol</th>
    	 <th>Fee</th>
	 <th>Status</th>
    </tr>
    </thead>
    <tbody>
    <!-----------------------------------Content------------------------------------>
    <?php
		$session_user=$_SESSION['user'];
    if(($tanggal_input_awal=='') AND ($tanggal_input_sampai=='')){

    $penawaran_query = mysql_query("select * from tb_po  where id_user = '$session_user'")or die(mysql_error());
	}else{
	$penawaran_query = mysql_query("select * from tb_po where id_user = '$session_user'  AND DATE_FORMAT(tanggal_po,'%m/%d/%Y')  BETWEEN '$tanggal_input_awal' AND '$tanggal_input_sampai'")or die(mysql_error());
	}
    while($row = mysql_fetch_array($penawaran_query)){
	
	$kontak_query = mysql_query("select * from tb_kontak_all where id_kontak = '$row[id_kontak]' ")or die(mysql_error());
                $row_kontak = mysql_fetch_array($kontak_query);
				
				
$user_query = mysql_query("select * from tb_user where id_user = '$session_user' ")or die(mysql_error());
                $row_user = mysql_fetch_array($user_query);
    ?>
    <tr>

    <td><?php echo $row['tanggal_po']; ?></td>
        <td><?php echo $row['tanggal_kirim']; ?></td>
    <td><?php echo $row_kontak['nama_kontak']; ?><br /><?php echo $row_kontak['kota_kontak']; ?></td>
        <td><?php echo $row_kontak['kota_kontak']; ?></td>
        <td><?php echo $row_kontak['provinsi_kontak']; ?></td>
    <td><?php echo $row['grup_oat']; ?></td>
    <td><?php echo $row['harga_po']; ?></td>
    <td><?php echo $row['vol_po']; ?></td>
         <td><?php echo $row['fee_po']; ?></a></td>
     <td><?php 
    if($row['status_po']=='pending')
    {
    echo '<div class="label label-warning"><i class="icon-check"></i><strong>Pending</strong></div>';
    }
    
	else if($row['status_po']=='setuju')
    {
    echo '<div class="label label-success"><i class="icon-ok"></i><strong>Setujui</strong></div>';
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