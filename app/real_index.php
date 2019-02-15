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

<?php
	echo "HERE";
	require('vendor/autoload.php');
	$s3 = new Aws\S3\S3Client([
		'version' => '2006-03-01',
		'region' => 'us-east-1',
	]);
	echo "QWERTY"
	$bucket = getenv('S3_BUCKET')?: die('No "S3_BUCKET" config var in found in env!');
?>

<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h1>S3 upload example</h1>

		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['userfile']) && $_FILES['userfile']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['userfile']['tmp_name'])) {

				try {
					$upload = $s3->upload($bucket, $_FILES['userfile']['name'], fopen($_FILES['userfile']['tmp_name'], 'rb'), 'public-read');
		?>
					<p>Upload <a href="<?=htmlspecialchars($upload->get('ObjectURL'))?>"> successful </a> :)</p>
		<?php   } catch (Exception $e) { ?>
				  <p>Upload error :(</p>
		<?php	}}?>

					<h2>Upload a file</h2>
					<form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="POST">
						<input type="file" name="userfile"><input type="submit" name="Upload">
					</form>


	</body>
</html>

