<?php

header("Content-Type: application/json");

require 'config.php';

try {

    $objects = $s3->listObjectsV2([
        'Bucket' => $bucketName
    ]);

    $files = [];

    if (isset($objects['Contents'])) {

        foreach ($objects['Contents'] as $object) {

            $files[] = [
                "name" => $object['Key'],
                "size" => $object['Size'],
                "last_modified" => $object['LastModified']
            ];

        }

    }

    echo json_encode([
        "success" => true,
        "files" => $files
    ]);

} catch (Exception $e) {

    echo json_encode([
        "success" => false,
        "error" => $e->getMessage()
    ]);

}