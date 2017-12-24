<?php
        include('dbcon.php');
		dbcon(); 
		session_start();	
		$username = $_POST['username'];
		$password = $_POST['password'];

		/*...................................................user..............................................*/
		$query_user = mysql_query("SELECT * FROM tb_user WHERE username_user='$username' AND password_user='$password'")or die(mysql_error());
		$num_row_user = mysql_num_rows($query_user);
		$row_user = mysql_fetch_array($query_user);
		
	 if ($num_row_user > 0){
		$_SESSION['user']=$row_user['id_user'];
		
		echo 'true';
				
		 }else{ 
				echo 'false';
		}	