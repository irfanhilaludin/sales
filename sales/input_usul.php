<link rel="stylesheet" href="js/jquery-ui.css">
  <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.6.4.js"></script>
  <script src="js/jquery-ui.js"></script>

  <?php
   $user_query = mysql_query("select nama_kontak from tb_kontak_all ")or die(mysql_error());
                    while($row_user = mysql_fetch_array($user_query, MYSQL_ASSOC)){

					
					$output[] = $row_user['nama_kontak'];
			
					}
					
					
					
?>					

<script>
var data = <?php echo json_encode($output); ?>;
  $( function() {
    $( "#nama" ).autocomplete({
      source: data
    });
  } );
  </script>
</head>
<body>
  <?php
						$session_user = $_SESSION['user'];

	
		?>  
<div class="ui-widget">
   <form role="form" action="insert_usul.php" enctype="multipart/form-data" method="post">
                  <input name="id_usr" type="hidden" value="<?php echo $session_user; ?>" />
                                   <input name="user" type="hidden" value="<?php echo $user_username; ?>" />

                    <!-- text input -->
                                        <div class="form-group">
                      <label>Nama Perusahaan </label>
                      <input type="text" class="form-control" placeholder="Masukan Nama..." name="nama" value="" required>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" class="form-control" placeholder="Masukan Telp..." name="alamat" value="" required>
                    </div>
					 <div class="form-group">
                      <label>Kota</label>
                      <input type="text" class="form-control" placeholder="Masukan Kota..." name="kota" value="" required>
                      
                      </div>
					 <div class="form-group">
                      <label>Provinsi</label>
                      <input type="text" class="form-control" placeholder="Masukan Provinsi..." name="provinsi" value="" required>
                      
                    </div>
					<div class="form-group">
                      <label>Nama Purchasing</label>
                      <input type="text" class="form-control" placeholder="Masukan Nama Purchasing ..." name="cp" value="" required>
                    </div>
                    <div class="form-group">
                      <label>Telp. Perusahaan</label>
                      <input type="text" class="form-control" placeholder="Masukan Telp..." name="telepon" value="" required>
                    </div>
                     <div class="form-group">
                      <label>Fax</label>
                      <input type="text" class="form-control" placeholder="Masukan Fax ..." name="fax" value="" >
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control " placeholder="Masukan Email ..." name="email" value="" >
                    </div>
                    
                   
                  
<div class="panel-footer">
                    <button type="submit" class="btn btn-success">Usulkan</button>
                  </div>


                  </form>
  </div>