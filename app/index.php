<?php 
	$con = mysql_connect("localhost","mysql.default_user","mysql.default_password");
	if (!$con){
		die('Could not connect: '. mysql_error());
	}

	mysql_select_db("DATABASE_URL", $con)
	if (mysql_query("INSERT INTO myusers (id,name,passwords) VALUES (3,'Steven','stong1730',$con)){
		echo "Yes";
	}else{
		echo "Error creating database: " . mysql_error();
	}
	header("location: login.html"); 
?>
