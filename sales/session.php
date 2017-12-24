<?php
//Start session
session_start();

if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')) {
	header("location:".host()."/index.php");
    exit();
}
$session_id=$_SESSION['user'];

$user_query = mysql_query("select * from tb_user where id_user = '$session_id'")or die(mysql_error());
$user_row = mysql_fetch_array($user_query);
$user_username = $user_row['username_user'];
$user_kota = $user_row['kota'];
?>