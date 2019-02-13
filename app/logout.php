<?php
if (isset($_COOKIE['username'])){
	setcookie('username', '', time()-3600);
	setcookie('password', '', time()-3600);
}
//mysql_close($con);
header('location: login.html');
?>
