var countries = {
	<?php 
	  $kontak_query = mysql_query("select * from tb_kontak_all")or die(mysql_error());
    while($row = mysql_fetch_array($kontak_query)){
		
		?>
    "<?php echo $row['kode_kontak']; ?>": "<?php echo $row['nama_kontak']; ?>",
  <?php
	}
?>
}