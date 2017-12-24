 <script type="text/javascript" src="js/jquery.min.js"></script>
 <script src="js/moris/raphael-min.js"></script>
  <script src="js/moris/morris.min.js"></script> 
 
 <?php
$id_user1 = $_GET["id_user"];
$id_user2 = $_POST["id_user"];
$tgl_awal = $_POST["tanggal_mulai"];
$tgl_akhir = $_POST["tanggal_akhir"];


$oras = strtotime("today");
 $now = date("m/d/Y", $oras );

  if(($tgl_awal=='') AND ($tgl_akhir=='')){
 $user_query = mysql_query("select * from tb_user where level_user = 'marketing' AND id_user = '$id_user1'")or die(mysql_error());
                    while($row_user = mysql_fetch_array($user_query, MYSQL_ASSOC)){

					
$user_kontak_all = mysql_query("select * ,COUNT( id_user ) AS JUMLAH from tb_kontak_all  where id_user = $row_user[id_user] ")or die(mysql_error());
							
					$row_kontak_all = mysql_fetch_array($user_kontak_all, MYSQL_ASSOC);
					
$user_kontak_hari_ini = mysql_query("select * ,COUNT( id_user ) AS JUMLAH from tb_kontak_all  where id_user = $row_user[id_user] AND DATE_FORMAT(tanggal_bagi,'%m/%d/%Y') = '$now' ")or die(mysql_error());
							
					$row_today = mysql_fetch_array($user_kontak_hari_ini, MYSQL_ASSOC);
					
					
$user_telp = mysql_query("select * ,COUNT( id_user ) AS JUMLAH from tb_kontak_all  where id_user = $row_user[id_user] AND DATE_FORMAT(tanggal_telp,'%m/%d/%Y') = '$now' ")or die(mysql_error());
							
					$row_telp = mysql_fetch_array($user_telp, MYSQL_ASSOC);
					
$user_terhubung = mysql_query("select * ,COUNT( id_user ) AS JUMLAH from tb_kontak_all  where id_user = $row_user[id_user] AND DATE_FORMAT(tanggal_telp,'%m/%d/%Y') = '$now' AND status_kontak = 'telah dihubungi' ")or die(mysql_error());
							
					$row_terhubung = mysql_fetch_array($user_terhubung, MYSQL_ASSOC);	
									
$user_tidak_terhubung = mysql_query("select * ,COUNT( id_user ) AS JUMLAH from tb_kontak_all  where id_user = $row_user[id_user] AND DATE_FORMAT(tanggal_telp,'%m/%d/%Y') = '$now' AND status_kontak = 'tidak terhubung' ")or die(mysql_error());
							
					$row_tidak_terhubung = mysql_fetch_array($user_tidak_terhubung, MYSQL_ASSOC);					

$user_o = mysql_query("select * ,COUNT( id_user ) AS JUMLAH from tb_kontak_all  where id_user = $row_user[id_user] AND DATE_FORMAT(tanggal_telp,'%m/%d/%Y') = '$now' AND status_kontak = 'telah dihubungi' AND report_kontak = 'O'")or die(mysql_error());
							
					$row_o = mysql_fetch_array($user_o, MYSQL_ASSOC);	

					$user_s = mysql_query("select * ,COUNT( id_user ) AS JUMLAH from tb_kontak_all  where id_user = $row_user[id_user] AND DATE_FORMAT(tanggal_telp,'%m/%d/%Y') = '$now' AND status_kontak = 'telah dihubungi' AND report_kontak = 'S'")or die(mysql_error());
							
					$row_s = mysql_fetch_array($user_s, MYSQL_ASSOC);	
					$user_e = mysql_query("select * ,COUNT( id_user ) AS JUMLAH from tb_kontak_all  where id_user = $row_user[id_user] AND DATE_FORMAT(tanggal_telp,'%m/%d/%Y') = '$now' AND status_kontak = 'telah dihubungi' AND report_kontak = 'E'")or die(mysql_error());
							
					$row_e = mysql_fetch_array($user_e, MYSQL_ASSOC);	


					$user_p = mysql_query("select * ,COUNT( id_user ) AS JUMLAH from tb_kontak_all  where id_user = $row_user[id_user] AND DATE_FORMAT(tanggal_telp,'%m/%d/%Y') = '$now' AND status_kontak = 'telah dihubungi' AND report_kontak = 'P'")or die(mysql_error());
							
					$row_p = mysql_fetch_array($user_p, MYSQL_ASSOC);						
					
					$output[] = array(
					'nama' => $row_user['nama_user'],
					'jumlah_all' => $row_kontak_all['JUMLAH'],
		'jumlah_today' => $row_today['JUMLAH'],
					'jumlah_telp' => $row_telp['JUMLAH'],
						'jumlah_terhubung' => $row_terhubung['JUMLAH'],
						'jumlah_tidak_terhubung' => $row_tidak_terhubung['JUMLAH'],
					'O' => $row_o['JUMLAH'],
					'S' => $row_s['JUMLAH'],	
					'P' => $row_p['JUMLAH'],
					'E' => $row_e['JUMLAH'],
						
						
					);
							
}
?>

<div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Report Database Marketing (Tanggal <?php echo $now ?> )</h2>
                        <div class="clearfix"></div>
                        
                      </div>
                      <div class="x_content">



<?php
}else{
$id_user1 = $_POST["id_user"];
					 $user_query = mysql_query("select * from tb_user where level_user = 'marketing' AND id_user = '$id_user2' ")or die(mysql_error());
                    while($row_user = mysql_fetch_array($user_query, MYSQL_ASSOC)){

				
					
$user_kontak_all = mysql_query("select * ,COUNT( id_user ) AS JUMLAH from tb_kontak_all  where id_user = '$id_user2' ")or die(mysql_error());
							
					$row_kontak_all = mysql_fetch_array($user_kontak_all, MYSQL_ASSOC);
					
$user_kontak_hari_ini = mysql_query("select * ,COUNT( id_user ) AS JUMLAH from tb_kontak_all  where id_user = '$id_user2' AND DATE_FORMAT(tanggal_bagi,'%m/%d/%Y')  BETWEEN '$tgl_awal' AND '$tgl_akhir' ")or die(mysql_error());
							
					$row_today = mysql_fetch_array($user_kontak_hari_ini, MYSQL_ASSOC);
					
					
$user_telp = mysql_query("select * ,COUNT( id_user ) AS JUMLAH from tb_kontak_all  where id_user = '$id_user2' AND DATE_FORMAT(tanggal_telp,'%m/%d/%Y')  BETWEEN '$tgl_awal' AND '$tgl_akhir' ")or die(mysql_error());
							
					$row_telp = mysql_fetch_array($user_telp, MYSQL_ASSOC);
					
$user_terhubung = mysql_query("select * ,COUNT( id_user ) AS JUMLAH from tb_kontak_all  where id_user = '$id_user2' AND DATE_FORMAT(tanggal_telp,'%m/%d/%Y')  BETWEEN '$tgl_awal' AND '$tgl_akhir' AND status_kontak = 'telah dihubungi' ")or die(mysql_error());
							
					$row_terhubung = mysql_fetch_array($user_terhubung, MYSQL_ASSOC);	
									
$user_tidak_terhubung = mysql_query("select * ,COUNT( id_user ) AS JUMLAH from tb_kontak_all  where id_user = '$id_user2' AND DATE_FORMAT(tanggal_telp,'%m/%d/%Y')  BETWEEN '$tgl_awal' AND '$tgl_akhir' AND status_kontak = 'tidak terhubung' ")or die(mysql_error());
							
					$row_tidak_terhubung = mysql_fetch_array($user_tidak_terhubung, MYSQL_ASSOC);					

$user_o = mysql_query("select * ,COUNT( id_user ) AS JUMLAH from tb_kontak_all  where id_user = '$id_user2' AND DATE_FORMAT(tanggal_telp,'%m/%d/%Y')  BETWEEN '$tgl_awal' AND '$tgl_akhir' AND status_kontak = 'telah dihubungi' AND report_kontak = 'O'")or die(mysql_error());
							
					$row_o = mysql_fetch_array($user_o, MYSQL_ASSOC);	

					$user_s = mysql_query("select * ,COUNT( id_user ) AS JUMLAH from tb_kontak_all  where id_user = '$id_user2' AND DATE_FORMAT(tanggal_telp,'%m/%d/%Y')  BETWEEN '$tgl_awal' AND '$tgl_akhir' AND status_kontak = 'telah dihubungi' AND report_kontak = 'S'")or die(mysql_error());
							
					$row_s = mysql_fetch_array($user_s, MYSQL_ASSOC);	
					$user_e = mysql_query("select * ,COUNT( id_user ) AS JUMLAH from tb_kontak_all  where id_user = '$id_user2' AND DATE_FORMAT(tanggal_telp,'%m/%d/%Y')  BETWEEN '$tgl_awal' AND '$tgl_akhir' AND status_kontak = 'telah dihubungi' AND report_kontak = 'E'")or die(mysql_error());
							
					$row_e = mysql_fetch_array($user_e, MYSQL_ASSOC);	


					$user_p = mysql_query("select * ,COUNT( id_user ) AS JUMLAH from tb_kontak_all  where id_user = '$id_user2' AND DATE_FORMAT(tanggal_telp,'%m/%d/%Y') BETWEEN '$tgl_awal' AND '$tgl_akhir' AND status_kontak = 'telah dihubungi' AND report_kontak = 'P'")or die(mysql_error());
							
					$row_p = mysql_fetch_array($user_p, MYSQL_ASSOC);		
					
					
					$output[] = array(
					'nama' => $row_user['nama_user'],
					'jumlah_all' => $row_kontak_all['JUMLAH'],
		'jumlah_today' => $row_today['JUMLAH'],
					'jumlah_telp' => $row_telp['JUMLAH'],
						'jumlah_terhubung' => $row_terhubung['JUMLAH'],
						'jumlah_tidak_terhubung' => $row_tidak_terhubung['JUMLAH'],
					'O' => $row_o['JUMLAH'],
					'S' => $row_s['JUMLAH'],	
					'P' => $row_p['JUMLAH'],
					'E' => $row_e['JUMLAH'],
				
					
					);
				}			



?>
  

<div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Report Database Marketing (Tanggal <?php echo $tgl_awal ?> Sampai dengan tanggal : <?php echo $tgl_akhir ?> )</h2>
                        <div class="clearfix"></div>
                        
                      </div>
                      <div class="x_content">
<?php } ?>
<form class="form" action="?page=grafik_marketing_hari_ini" enctype="multipart/form-data" method="post">
<input name="id_user" type="hidden" value="<?php echo $id_user1 ; ?>" />
Mulai Tanggal:<input id="tanggal_mulai" class="date-picker" required="required" type="text" name="tanggal_mulai">
Sampai Tanggal : <input id="tanggal_akhir" class="date-picker " required="required" type="text" name="tanggal_akhir">
<input name="submit" type="submit" value="Filter"  class="btn btn-success"/>
</form>                     
  <p class="text-muted font-13 m-b-30">
<div class="btn-group">
<h2> Data Report Marketing </h2>
  </div>
</p>                    
<div class="print_c" id="print_c">
 
<div class="container" id="container"></div>
<div id ="row-content" class="col-md-6 col-sm-6 col-xs-6"></div>
<div id ="row-content2" class="col-md-6 col-sm-6 col-xs-6"></div>

</div>

</div>
</div>
<script language="javascript">
function container(print_c)
{
var headstr = "<html><head><title>Data Base telah di telepon</title></head><body> <h4> PT Sinar Bacan Khatulistiwa </h4>Database yang telah di telepon marketing dari Tanggal : <?php echo $tgl_awal ?> Sampai dengan tanggal : <?php echo $tgl_akhir ?>";
var footstr = "</body>";
var newstr = document.all.item(print_c).innerHTML;
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
 (function() {
  var $, MyMorris;

  MyMorris = window.MyMorris = {};
  $ = jQuery;

  MyMorris = Object.create(Morris);

  MyMorris.Bar.prototype.defaults["labelTop"] = false;

  MyMorris.Bar.prototype.drawLabelTop = function(xPos, yPos, text) {
    var label;
    return label = this.raphael.text(xPos, yPos, text).attr('font-size', this.options.gridTextSize).attr('font-family', this.options.gridTextFamily).attr('font-weight', this.options.gridTextWeight).attr('fill', this.options.gridTextColor);
  };

  MyMorris.Bar.prototype.drawSeries = function() {
    var barWidth, bottom, groupWidth, idx, lastTop, left, leftPadding, numBars, row, sidx, size, spaceLeft, top, ypos, zeroPos;
    groupWidth = this.width / this.options.data.length;
    numBars = this.options.stacked ? 1 : this.options.ykeys.length;
    barWidth = (groupWidth * this.options.barSizeRatio - this.options.barGap * (numBars - 1)) / numBars;
    if (this.options.barSize) {
      barWidth = Math.min(barWidth, this.options.barSize);
    }
    spaceLeft = groupWidth - barWidth * numBars - this.options.barGap * (numBars - 1);
    leftPadding = spaceLeft / 2;
    zeroPos = this.ymin <= 0 && this.ymax >= 0 ? this.transY(0) : null;
    return this.bars = (function() {
      var _i, _len, _ref, _results;
      _ref = this.data;
      _results = [];
      for (idx = _i = 0, _len = _ref.length; _i < _len; idx = ++_i) {
        row = _ref[idx];
        lastTop = 0;
        _results.push((function() {
          var _j, _len1, _ref1, _results1;
          _ref1 = row._y;
          _results1 = [];
          for (sidx = _j = 0, _len1 = _ref1.length; _j < _len1; sidx = ++_j) {
            ypos = _ref1[sidx];
            if (ypos !== null) {
              if (zeroPos) {
                top = Math.min(ypos, zeroPos);
                bottom = Math.max(ypos, zeroPos);
              } else {
                top = ypos;
                bottom = this.bottom;
              }
              left = this.left + idx * groupWidth + leftPadding;
              if (!this.options.stacked) {
                left += sidx * (barWidth + this.options.barGap);
              }
              size = bottom - top;
              if (this.options.verticalGridCondition && this.options.verticalGridCondition(row.x)) {
                this.drawBar(this.left + idx * groupWidth, this.top, groupWidth, Math.abs(this.top - this.bottom), this.options.verticalGridColor, this.options.verticalGridOpacity, this.options.barRadius, row.y[sidx]);
              }
              if (this.options.stacked) {
                top -= lastTop;
              }
              this.drawBar(left, top, barWidth, size, this.colorFor(row, sidx, 'bar'), this.options.barOpacity, this.options.barRadius);
              _results1.push(lastTop += size);

              if (this.options.labelTop && !this.options.stacked) {
                label = this.drawLabelTop((left + (barWidth / 2)), top - 10, row.y[sidx]);
                textBox = label.getBBox();
                _results.push(textBox);
              }
            } else {
              _results1.push(null);
            }
          }
          return _results1;
        }).call(this));
      }
      return _results;
    }).call(this);
  };
}).call(this);
  Morris.Bar({
        element: 'container',
        data: <?php echo json_encode($output); ?>,
		     barRatio: 0.2,
labelTop: true,
		hoverCallback: function(index, options, content) {
        this.xlabelAngle = 30;
        $("#row-content").html("<div>" + "Marketing: <h2>" + options.data[index].nama + "</h2><br />" + options.labels[0] + ": " + options.data[index].jumlah_all + "<br />" + options.labels[1] + ": " + options.data[index].jumlah_today +  "<br />" + options.labels[2] + ": " + options.data[index].jumlah_telp +  "</div>");
		
		 $("#row-content2").html("<div>" +  options.labels[3] + ": " + options.data[index].jumlah_terhubung + "<br />" + options.labels[4] + ": " + options.data[index].jumlah_tidak_terhubung +  "<br />" + options.labels[5] + ": " + options.data[index].O +  "</div>");
    },
		
        xkey: 'nama',
        ykeys: ['jumlah_all', 'jumlah_today', 'jumlah_telp', 'jumlah_terhubung', 'jumlah_tidak_terhubung', 'O','S','E','P'],
		 hideHover: 'false',
  parseTime: false,
  freePosition: true,
        labels: ['Database All', 'Database Harian', 'Jumlah Telepon', 'Jumlah Terhubung', 'Jumlah Tidak Terhubung', 'Kalah Harga','Kontrak PT Lain','Pemakaian Minim','Tidak Pakai' ]
		
    });
	
	        </script>

              <input name="print" type="button" value="save" id="print" class="print btn btn-success" onClick="container('print_c');"/>                

</div>
