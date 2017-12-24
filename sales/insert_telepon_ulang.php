<?php
 include('../dbcon.php');
dbcon(); 



$query=mysql_query("update tb_kontak_all set tanggal_telp = now(), status_kontak = 'telepon lagi' , ket_kontak = '$_POST[respon]'  where id_kontak = '$_POST[pelang]'") or die (mysql_error());


if($query)
header("location:index.php?page=data_kontak_tl");
?>