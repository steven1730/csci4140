<!DOCTYPE html>
<html>
<body>
	<h1>Photo Album</h1>
	<?php
	if (isset($_COOKIE['username'])){
		echo 'You are logged as '.$_COOKIE['username'].'.';
		echo '<a href="logout.php">                               Log Out </a><br/><br/>';
		echo 'Photo Album<br/>';
	}else{
		echo 'Hello my guest! Please';
		echo '<a href="login.html"> Login </a>';
		echo ' !';
	}

	?>
</body>
</html>


