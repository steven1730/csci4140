<?php 
	$con = mysql_connect("localhost","mysql.default_user","mysql.default_password");
	if (!$con){
		die('Could not connect: '. mysql_error());
	}

	mysql_select_db("DATABASE_URL", $con)
	
	header("location: login.html"); 
?>
