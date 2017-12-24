<?php
 include('../dbcon.php');
dbcon(); 

$query=mysql_query("update tb_kontak_all set email_kontak = '$_POST[email]' , tanggal_telp = now(), status_kontak = 'telepon lagi' , report_kontak = 'minta berkas'  , ket_kontak = 'minta berkas : $_POST[berkas]'   where id_kontak = '$_POST[id_pel]'") or die (mysql_error());

if($query)
header("location:index.php?page=data_kontak");


?>