<?php
if (isset($_POST['submitbutton'])){
	setcookie('username', $_POST['username'], time()+3600);
	//setcookie('submitbutton', $_POST['submitbutton'], time()+3600);
	echo 'here'
	header('location: real_index.php');
?>
