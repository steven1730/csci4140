<?php
require '..vendor/autoload.php';
$bucketName = 'csci4140-mybucket1';
$result111 = $s3->listObjects(array('Bucket' => $bucketName));
foreach ($result111['Contents'] as $object){
	$s3->deleteObject(['Bucket' => $bucketName,'Key'    => $object['Key']]);
}

echo 'System was initializated~';

?>