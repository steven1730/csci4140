<?php
if (isset($_COOKIE['username'])){
	echo 'You are logged as '.$_COOKIE['username'].'<br/>';
	echo '<a href="logout.php"> Log Out </a>';

	$db = parse_url(getenv("DATABASE_URL"));
	echo "hello, db user:";
	echo $db["user"];

	$pdo = new PDO("pgsql:") .sprintf("
		host=%s;port=%s;user=%s;password=%s;dbname=%s",
		$db["host"], 
		$db["port"], 
		$db["user"], 
		$db["pass"], 
		ltrim(($db["path"], "/")
	));

	$sql = "INSERT INTO MyUsers (id,name,passwords) VALUES (3,'john','zxc123');";

	if($pdo->query($sql) == TRUE){
		echo "Table Myguests created successfully";
	}else{
		echo "Error creating table: ";
	}
}else{
	echo 'Hello my guest! Please';
	echo '<a href="login.html"> Login </a>';
	echo ' !';
}


?>
