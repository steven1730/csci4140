<?php
if (isset($_COOKIE['username'])){
	echo 'You are logged as '.$_COOKIE['username'].'<br/>';
	echo '<a href="logout.php"> Log Out </a>';

	$db = parse_url(getenv("DATABASE_URL"));
	echo "hello, db user:<br/>";
	echo $db["user"] . "<br/>";

	$pdo = new PDO("pgsql:" . sprintf("host=%s;port=%s;user=%s;password=%s;dbname=%s",
		$db["host"],
		$db["port"],
		$db["user"],
		$db["pass"],
		ltrim($db["path"], "/")
	));

	// Just and example, you can also apply it on upload images or other in fos
	$sql = "INSERT INTO MyUsers (id,name,passwords) VALUES(3,'John','zxc123');";

	if($pdo->query($sql) == TRUE)
	{
		echo "Table MyGuests created successfully <br/>";
	} else{
		echo "Error creating table: <br/>";
	}
}else{
	echo 'Hello my guest! Please';
	echo '<a href="login.html"> Login </a>';
	echo ' !';
}


?>
