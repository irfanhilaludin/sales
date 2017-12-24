    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
     <?php
$tanggal_input_awal = $_POST["tanggal_input_awal"];
$tanggal_input_sampai = $_POST["tanggal_input_sampai"];
    ?> 
    <h2>Data Kontak Semua</h2>
    <div class="clearfix"></div>
    </div>
    <div class="x_content">
<p class="text-muted font-13 m-b-30">
<div class="btn-group">
<a class="btn btn-warning" href="?page=data_kontak"> Tracking </a>
<a class="btn btn-primary" href="?page=data_s"> Searching Data </a>
 <a class="btn btn-primary" href="?page=data_kontak_b"> Belum dihubungi </a>
 <a class="btn btn-primary" href="?page=data_kontak_th"> Telah dihubungi </a>
  <a class="btn btn-primary" href="?page=data_kontak_tl"> Telepon Ulang </a>
  <a class="btn btn-primary" href="?page=data_penawaran"> Penawaran Anda</a>
    <a class="btn btn-primary" href="?page=data_po"> PO Anda</a>
      <a class="btn btn-primary" href="?page=data_kirim"> Pengiriman</a>
        <a class="btn btn-primary" href="?page=data_bayar"> Pembayaran</a>
  </div>
</p>

    <table id="datatable-buttons"  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
    <tr>
    <th>No</th>
    <th>Perusahaan</th>
    <th>Telepon</th>
    <th>Penawaran</th>
    <th>PO</th>
    <th>Kirim</th>
    <th>Ket</th>
    </tr>
    </thead>
    <tbody>
   
    <!-----------------------------------Content------------------------------------>
    <?php
	 $no = 0;
	 $session_user=$_SESSION['user'];
	 $user_query = mysql_query("select * from tb_user where id_user = '$session_user' ")or die(mysql_error());
                $row_user = mysql_fetch_array($user_query);
	
	
	
	    $kontak_query = mysql_query("select * from tb_kontak_all where id_user = '$session_user' ")or die(mysql_error());

	
    while($row = mysql_fetch_array($kontak_query)){
	
		    $penawaran_query = mysql_query("select * from tb_penawaran where id_user = '$session_user' and id_kontak = '$row[id_kontak]' AND status_penawaran ='terkirim'")or die(mysql_error());
			
		$penawaran = mysql_num_rows($penawaran_query);
	    $po_query = mysql_query("select * from tb_po where id_user = '$session_user' and id_kontak = '$row[id_kontak]' AND status_po ='setuju'")or die(mysql_error());
		$po = mysql_num_rows($po_query);

				 $no++;
    ?>
    <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $row['nama_kontak']; ?><br /><?php echo $row['alamat_kontak']; ?><br /><?php echo $row['kota_kontak']; ?><br />Telp:<?php echo $row['telepon_kontak']; ?></td>
    <td><?php 
    if($row['status_kontak']=='telah dihubungi')
    {
    echo '<div class="label label-success"><i class="icon-check"></i><strong>V</strong></div>';
    }
    else if($row['status_kontak']=='tidak terhubung')
    {
    echo '<div class="label label-danger"><i class="icon-ok"></i><strong>X</strong></div>';
    }
	 else if($row['status_kontak']=='belum dihubungi')
    {
    echo '<div class="label label-warning"><i class="icon-ok"></i><strong>X</strong></div>';
    }
	 else if($row['status_kontak']=='telepon lagi')
    {
    echo '<div class="label label-warning"><i class="icon-ok"></i><strong>Telepon Ulang</strong></div>';
    }
    else
    {
    echo '<div class="label label-warning"><i class="icon-remove-sign"></i><strong>Menunggu</strong></div>';
    };
    
    ?>
    
        
    </td>
    <td>
	<?php 
    if(($row['report_kontak']=='I') OR ($row['report_kontak']=='PO'))
    {
    echo '<div class="label label-success"><i class="icon-check"></i><strong>V </strong>'.$po.' Penawaran</div>';
    }
    else
    {
    echo '<div class="label label-danger"><i class="icon-uncheck"></i><strong>X</strong></div>';
    };
    
    ?>
    
    </td>
    <td><?php 
    if($row['report_kontak']=='PO')
    {
    echo '<div class="label label-success"><i class="icon-check"></i><strong>V</strong> '.$po.' Kali</div>';
    }
    else
    {
    echo '<div class="label label-danger"><i class="icon-uncheck"></i><strong>X</strong></div>';
    };
    
    ?>
        <td><?php 
    if($row['report_kontak']=='sudah kirim')
    {
    echo '<div class="label label-success"><i class="icon-check"></i><strong>V</strong></div>';
    }
    else
    {
    echo '<div class="label label-danger"><i class="icon-uncheck"></i><strong>X</strong></div>';
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
      

         <script>
          var handleDataTableButtons = function() {
              "use strict";
              0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
                dom: "Bfrtip",
                buttons: [{
                  extend: "copy",
                  className: "btn-sm"
                }, {
                  extend: "csv",
                  className: "btn-sm"
                }, {
                  extend: "excel",
                  className: "btn-sm"
                }, {
                  extend: "pdf",
                  className: "btn-sm"
                }, {
                  extend: "print",
                  className: "btn-sm"
                }],
                responsive: !0
              })
            },
            TableManageButtons = function() {
              "use strict";
              return {
                init: function() {
                  handleDataTableButtons()
                }
              }
            }();
        </script>
    </div>
    </div>