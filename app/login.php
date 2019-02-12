<?php
if (isset($_POST['button'])){
	setcookie('username', $_POST['username'], time()+3600);
	header('location: real_index.php');
}
?>
