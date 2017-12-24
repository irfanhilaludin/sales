<?php
include('../dbcon.php'); 
dbcon(); 
include('session.php');

$oras = strtotime("now");
$ora = date("Y-m-d",$oras);										
//mysql_query("update user_log set
//logout = NOW()											
//where user_id = '$session_id' ")or die(mysql_error());

session_destroy();
header('location:../index.php'); 
?>