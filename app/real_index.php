<?php
if (isset($_COOKIE['username'])){
	echo 'You are logged as '.$_COOKIE['username'].'<br/>';
	echo '<a href="logout.php"> Log Out </a>';
}else{
	echo 'Hello my guest! Please';
	echo '<a href="login.html"> Login </a>';
	echo ' !';
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Photo Album</title>
	</head>
	<body>
		<?php
			$image_in = new Imagick('test.jpg');

			$image_in->blurImage(10,10);
			$image_in->borderImage('black', 100, 100);

			echo $image_in;
		?>
	</body>
</html>
