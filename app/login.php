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

	$sql = 'SELECT name FROM MyUsers';
	$result = $pdo->query($sql);
	echo "qwqqdwqdq";
	$result->setFETCHMode(PDO::FETCH_ASSOC);

	while ($row = $result->fetch()){
		echo $row['name'];
	}
}

//if ($flag == 1){
//	setcookie('username', $_POST['username'], time()+3600);
//	header('location: real_index.php');
//}
//else if (isset($_POST['loginasguest'])){
//	header('location: real_index.php');
//}

?>
