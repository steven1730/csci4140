<?php
require '..vendor/autoload.php';
use Aws\S3\S3Client;
$s3 = new S3Client([['version'=>'2006-03-01','region'=>'ap-northeast-1',]);
$bucket = 'csci4140-mybucket1';

$result111 = $s3->listObjects(array('Bucket' => $bucket));

$s3->deleteObjects([
    'Bucket'  => $bucket
]);
echo 'System was initializated~';

?>