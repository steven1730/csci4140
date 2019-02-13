<?php
if (isset($_COOKIE['username'])){
	echo 'You are logged as '.$_COOKIE['username'].'<br/>';
	echo username;
	echo '<a href="logout.php"> Log Out </a>';
}else{
	echo 'Hello my guest! Please';
	echo '<a href="login.html"> Login </a>';
	echo ' !';
}
?>
