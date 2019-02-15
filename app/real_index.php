<?php
if (isset($_COOKIE['username'])){
	echo 'You are logged as '.$_COOKIE['username'].'.';
	echo '<a href="logout.php"> Log Out </a><br/><br/>';

}else{
	echo 'Hello my guest! Please';
	echo '<a href="login.html"> Login </a>';
	echo ' !';
}

$db = parse_url(getenv("DATABASE_URL"));

$pdo = new PDO("pgsql:" . sprintf("host=%s;port=%s;user=%s;password=%s;dbname=%s",
	$db["host"],
	$db["port"],
	$db["user"],
	$db["pass"],
	ltrim($db["path"], "/")
));

?>

<?php
if (isset($_COOKIE['username'])){
	require('../vendor/autoload.php');
	$s3 = new Aws\S3\S3Client([
	'version' => '2006-03-01',
	'region' => 'us-east-2'
	]);
	echo "QWERTY"
	$bucket = getenv('S3_BUCKET')?: die('No "S3_BUCKET" config var in found in env!');
}
?>



