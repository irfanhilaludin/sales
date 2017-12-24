<?php
 include('../dbcon.php');
dbcon(); 


$query0=mysql_query("update tb_set set id_penawaran = '$_GET[id_penawaran]' where id_user  = '$_GET[id_user]' and id_kontak ='$_GET[id_kontak]' ") or die (mysql_error());

$query=mysql_query("update tb_penawaran set status_penawaran  = 'terkirim' where id_penawaran = '$_GET[id_penawaran]'") or die (mysql_error());

if($query)
header("location:index.php?page=penawaran_pending");
?>