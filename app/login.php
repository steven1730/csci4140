<?php
if (isset($_POST['button'])){
	setcookie('username', $_POST['username'], time()+3600);
	header('location: real_index.php');
}else if (isset($_POST['loginasguest'])){
	header('location: real_index.php');
}
?>
