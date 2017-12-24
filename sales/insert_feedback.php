<?php
 include('../dbcon.php');
dbcon(); 


$query=mysql_query("update tb_kontak_all set tanggal_telp = now(), status_kontak = 'telah dihubungi' , report_kontak = '$_POST[respon]'  , ket_kontak = '$_POST[ket]'   where id_kontak = '$_POST[id_pel]'") or die (mysql_error());

if($query)
header("location:index.php?page=data_kontak");
?>