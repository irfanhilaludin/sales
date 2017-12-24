<?php
 include('../dbcon.php');
dbcon(); 


$query1=mysql_query("update tb_kontak_all set  tanggal_telp = now(), status_kontak = 'telah dihubungi' where id_kontak = '$_GET[id_pelanggan]'") or die (mysql_error());


if($query)
header("location:index.php?page=data_kontak_b");
?>