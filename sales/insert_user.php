<?php
 include('../dbcon.php');
dbcon(); 

$query=mysql_query("insert into tb_user (username_user, password_user , nama_user, level_user, hp_user) values ('$_POST[username]' , '$_POST[pass]' , '$_POST[nama]','$_POST[level]', '$_POST[hp]')") or die (mysql_error());

if($query)
header("location:index.php?page=data_user");
?>