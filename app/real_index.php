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
// this will simply read AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY from env vars
	$s3 = new Aws\S3\S3Client(['version'=>'2006-03-01','region'=>'ap-northeast-1',]);
	$bucket = getenv('S3_BUCKET')?: die('No "S3_BUCKET" config var in found in env!');
?>


<html>
    <head><meta charset="UTF-8"></head>
    <body>
        <h1>Photo Ablum</h1>
        <p>
        	<img src="https://s3-ap-northeast-1.amazonaws.com/csci4140-mybucket1/test2.jpg" alt="s3-ap-northeast-1.amazonaws.com">
        </p>
        <p>
        	<img src="https://s3-ap-northeast-1.amazonaws.com/csci4140-mybucket1/test.jpg" alt="s3-ap-northeast-1.amazonaws.com" width="500" height="500">
        </p>
        <p>
        	<img src="https://s3-ap-northeast-1.amazonaws.com/csci4140-mybucket1/mad.png" alt="s3-ap-northeast-1.amazonaws.com">
        </p>

<?php
// outputs e.g.  somefile.txt was last modified: December 29 2002 22:16:23.

$filename = 'test2.jpg';
if (file_exists($filename)) {
    echo "$filename was last modified: " . date ("F d Y H:i:s.", filectime($filename));
    echo "<br/>";
}

$filename1 = 'test.jpg';
if (file_exists($filename1)) {
    echo "$filename1 was last modified: " . date ("F d Y H:i:s.", filectime($filename1));
    echo "<br/>";
}

$filename2 = 'mad.png';
if (file_exists($filename2)) {
    echo "$filename2 was last modified: " . date ("F d Y H:i:s.", filectime($filename2));
    echo "<br/>";
}

?>

<?php
$allowed = array('gif', 'png', 'jpg');
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['userfile']) && $_FILES['userfile']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['userfile']['tmp_name'])) {
    // FIXME: add more validation, e.g. using ext/fileinfo
    try {
        // FIXME: do not use 'name' for upload (that's the original filename from the user's computer)
		$filename =  $_FILES['userfile']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext, $allowed)){
        	$upload = $s3->upload($bucket, $_FILES['userfile']['name'], fopen($_FILES['userfile']['tmp_name'], 'rb'), 'public-read');
        
?>
        <p>
        	Upload <a href="<?=htmlspecialchars($upload->get('ObjectURL'))?>">successful</a> :)
        </p>
<?php }else{
	echo "Upload error: Wrong file type!<br/>";
}


} catch(Exception $e) { ?>
        <p>Upload error :(</p>
<?php } } ?>
        <h2>-----------------------------------------------------------</h2>
        <form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="POST">
            <input name="userfile" type="file">
            <input type="submit" value="Upload">
            <input type="radio" name="status" value="Public">Public</input>
            <input type="radio" name="status" value="Private">Private</input>
        </form>
    </body>
</html>

<?php 
} 
?>
