<?php
$flag = 0;
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

	$name = $_POST['username'];
	$sql = 'SELECT name FROM MyUsers';
	$result = $pdo->query($sql);
	$result->setFETCHMode(PDO::FETCH_ASSOC);
	while ($row = $result->fetch()){
		if ($_POST['username'] == $row['name']){
			$flag = 1;
			break;
		}
	}

	if ($flag == 1){
		$sql2 = 'SELECT password FROM MyUsers where name = $name';
		$result2 = $pdo->query($sql2);
		$result->setFETCHMode(PDO::FETCH_ASSOC);
		while ($row = $result->fetch()){
			if ($_POST['password'] == $row['password']){
				setcookie('username', $_POST['username'], time()+3600);
				header('location: real_index.php');
			}else{
				echo "No such user! Please";
				echo '<a href="login.html"> login </a>';
				echo "again!";
			}
		}
	}else{
		echo "No such user! Please";
		echo '<a href="login.html"> login </a>';
		echo "again!";
	}

}

?>
