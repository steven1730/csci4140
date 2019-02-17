<?php

$bucket = 'csci4140-mybucket1';

$keys = $s3->listObjects(['Bucket' => $bucket]) -> getPath('Contents/*/Key');

$s3->deleteObjects([
    'Bucket'  => $bucket,
    'Delete' => [
        'Objects' => array_map(function ($key) {
            return ['Key' => $key];
        }, $keys)
    ],
]);
echo 'System was initializated~';

?>