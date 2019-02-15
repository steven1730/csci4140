<!DOCTYPE html>
<html>
<body>
	<h1>Photo Album</h1>
	<?php
	if (isset($_COOKIE['username'])){
		echo 'You are logged as '.$_COOKIE['username'].'.';
		echo '<a href="logout.php"> Log Out </a><br/><br/>';

	}else{
		echo 'Hello my guest! Please';
		echo '<a href="login.html"> Login </a>';
		echo ' !';
	}

	?>
	<form id="uploadform" name="uploadform" method="post" action="upload.php">
		<p>Upload Photo
			<input type="submit" name="choose" id="choose" value="Choose file" />

			<input type="submit" name="upload" id="upload" value="Upload" />
		</p>
	</form>
</body>
</html>


