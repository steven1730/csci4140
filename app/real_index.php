<?php
if (isset($_COOKIE['username'])){
	echo 'You are logged as '.$_COOKIE['username'].'<br/>';
	echo '<a href="logout.php"> Log Out </a>';
}else{
	echo 'Hi!';
	echo '<a href="login.html"> Login </a>';
}
?>
