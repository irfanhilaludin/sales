 <script type="text/javascript" src="js/jquery.min.js"></script>
 <script src="js/moris/raphael-min.js"></script>
  <script src="js/moris/morris.min.js"></script> 
 
 <?php


$tgl_awal = $_POST["tanggal_mulai"];
$tgl_akhir = $_POST["tanggal_akhir"];
 $oras = strtotime("today");
 $now = date("d/m/Y", $oras ); 
  if(($tgl_awal=='') AND ($tgl_akhir=='')){
 $user_query = mysql_query("select * from tb_user where level_user = 'marketing'")or die(mysql_error());
                    while($row_user = mysql_fetch_array($user_query, MYSQL_ASSOC)){

					
					$user_pn = mysql_query("select * ,COUNT( id_user ) AS JUMLAH from tb_penawaran  where id_user = $row_user[id_user] AND status_penawaran ='gagal kirim'  AND DATE_FORMAT(tanggal_penawaran,'%d/%m/%Y') = '$now' ")or die(mysql_error());
							
							while($row_pn = mysql_fetch_array($user_pn, MYSQL_ASSOC)){
					
					
					$output[] = array(
					'nama' => $row_user['nama_user'],
					'jumlah' => $row_pn['JUMLAH'],
					'status' => $row_pn['status_penawaran'],
					
					);
				}			
}


}else{
					 $user_query = mysql_query("select * from tb_user where level_user = 'marketing'")or die(mysql_error());
                    while($row_user = mysql_fetch_array($user_query, MYSQL_ASSOC)){

					$user_pn = mysql_query("select * ,COUNT( id_user ) AS JUMLAH from tb_penawaran  where id_user = $row_user[id_user] AND status_penawaran ='gagal kirim' AND DATE_FORMAT(tanggal_penawaran,'%m/%d/%Y')  BETWEEN '$tgl_awal' AND '$tgl_akhir'  ")or die(mysql_error());
							
							while($row_pn = mysql_fetch_array($user_pn, MYSQL_ASSOC)){
					
					
					$output[] = array(
					'nama' => $row_user['nama_user'],
					'jumlah' => $row_pn['JUMLAH'],
					'status' => $row_pn['status_penawaran'],
					
					);
				}			
}

}
?>
  

<div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Report Penawaran</h2>
                        <div class="clearfix"></div>
                        
                      </div>
                      <div class="x_content">

<form class="form" action="?page=grafik_penawaran" enctype="multipart/form-data" method="post">
Mulai Tanggal:<input id="tanggal_mulai" class="date-picker" required="required" type="text" name="tanggal_mulai">
Sampai Tanggal : <input id="tanggal_akhir" class="date-picker " required="required" type="text" name="tanggal_akhir">
<input name="submit" type="submit" value="Filter"  class="btn btn-success"/>
</form>                     
  <p class="text-muted font-13 m-b-30">
<div class="btn-group">
<a class="btn btn-primary" href="?page=grafik_penawaran"> Penawaran Terkirim </a>
 <a class="btn btn-warning" href="?page=grafik_penawaran_gagal"> Penawaran gagal </a>
  </div>
</p>                    

 
<div class="container" id="container"></div>
</div>
</div>
<script language="javascript">
function container(container)
{
var headstr = "<html><head><title>Data Penawaran Terkirim</title></head><body> <h4> PT Sinar Bacan Khatulistiwa </h4>Data Penawaran Gagal dari Tanggal : <?php echo $tgl_awal ?> Sampai dengan tanggal : <?php echo $tgl_akhir ?>";
var footstr = "</body>";
var newstr = document.all.item(container).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr+footstr;
window.print();
document.body.innerHTML = oldstr;
return false;
}
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
           <script>
 
  Morris.Bar({
        element: 'container',
        data: <?php echo json_encode($output); ?>,
        xkey: 'nama',
        ykeys: ['jumlah'],
		 hideHover: 'auto',
        labels: ['Penawaran Terkirim']
    });
	        </script>

              <input name="print" type="button" value="save" id="print" class="print" onClick="container('container');"/>                

</div>
