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

	$sql = $pdo->prepare("SELECT name FROM myusers");
	$sql->execute();

	$result = $sql->setFetchMode(PDO::FETCH_ASSOC);
	foreach (new TableRows(new RecursiveArrayIterator($sql->fetchAll())) as $k=>$v) {
		echo $v;
	}

	setcookie('username', $_POST['username'], time()+3600);
	header('location: real_index.php');
}else if (isset($_POST['loginasguest'])){
	header('location: real_index.php');
}

?>
