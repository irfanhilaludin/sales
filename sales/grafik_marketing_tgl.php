      <?php include('data/marketing.php');
?>
 <script type="text/javascript" src="js/jquery.min.js"></script>
 <script type="text/javascript">
 
 
            $(document).ready(function() {
                var options = {
                    chart: {
                        renderTo: 'container',
                        type: 'column'
                    },
                    title: {
                        text: 'Sales Report',
                        x: -20 //center
                    },
                    subtitle: {
                        text: 'PT Sinar Bacan Khatulistiwa',
                        x: -20
                    },
                    xAxis: {
                        categories: []
                    },
                    yAxis: {
                        title: {
                            text: 'Jumlah Perusahaan'
                        },
                        plotLines: [{
                                value: 0,
                                width: 1,
                                color: '#808080'
                            }]
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}"><b> total {point.y}</b><br/>'
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true,
                                format: '{point.y+}'
                            }
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'top',
                        x: -40,
                        y: 100,
                        floating: false,
                        borderWidth: 1,
                       
                        shadow: true
                    },
                    series: []
                };
				var data = print json_encode($rslt, JSON_NUMERIC_CHECK);
                $.getJSON("data", function(json) {
                    options.xAxis.categories = json[0]['data']; //xAxis: {categories: []}
                    options.series[0] = json[1];
					 options.series[1] = json[2];
					  options.series[2] = json[3];
					  options.series[3] = json[4];
					  options.series[4] = json[5];
                    chart = new Highcharts.Chart(options);
                });
            });
        </script>

<div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Report Marketing</h2>
                        <div class="clearfix"></div>
                        
                      </div>
                      <div class="x_content">

<form class="form" action="data/marketing_tgl.php" enctype="multipart/form-data" method="post">
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
<script src="js/highcharts.js"></script>
<script src="js/exporting.js"></script>
</div>
