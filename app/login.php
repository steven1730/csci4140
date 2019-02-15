<?php
if (isset($_POST['button'])){
	$db = parse_url(getenv("DATABASE_URL"));

	$pdo = new PDO("pgsql:" . sprintf("host=%s;port=%s;user=%s;password=%s;dbname=%s",
		$db["host"],
		$db["port"],
		$db["user"],
		$db["pass"],
		ltrim($db["path"], "/")
	));
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = $pdo->prepare("SELECT name FROM MyUsers");
	$sql->execute();

	while($row = $sql->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		echo $name;
	}


	setcookie('username', $_POST['username'], time()+3600);
	header('location: real_index.php');
}else if (isset($_POST['loginasguest'])){
	header('location: real_index.php');
}

?>
