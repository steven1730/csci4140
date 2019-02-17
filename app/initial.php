<?php
require('../vendor/autoload.php');
$s3 = Aws\S3\S3Client(['version'=>'2006-03-01','region'=>'ap-northeast-1',]);
//$bucketName = 'csci4140-mybucket1';
//$result111 = $s3->listObjects(array('Bucket' => $bucketName));
//foreach ($result111['Contents'] as $object){
//	$s3->deleteObject(['Bucket' => $bucketName,'Key' => $object['Key']]);
//}

echo 'System was initializated~';
echo '<a href="real_index.php"> Go back to album </a>';

?>