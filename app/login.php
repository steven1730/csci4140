<?php
if (isset($_POST['submitbutton'])){
	setcookie('username', $_POST['username'], time()+3600);
	//setcookie('submitbutton', $_POST['submitbutton'], time()+3600);
	header('location: index.php');
?>