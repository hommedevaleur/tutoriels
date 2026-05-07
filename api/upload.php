<?php

header("Content-Type: application/json");

require 'config.php';

if (!isset($_FILES['file'])) {
    echo json_encode([
        "success" => false,
        "message" => "Aucun fichier"
    ]);
    exit;
}

$file = $_FILES['file'];

$tmpName = $file['tmp_name'];
$fileName = time() . "_" . basename($file['name']);

try {

    $result = $s3->putObject([
        'Bucket' => $bucketName,
        'Key' => $fileName,
        'SourceFile' => $tmpName,
        'ACL' => 'public-read'
    ]);

    echo json_encode([
        "success" => true,
        "url" => $result['ObjectURL'],
        "file" => $fileName
    ]);

} catch (Exception $e) {

    echo json_encode([
        "success" => false,
        "error" => $e->getMessage()
    ]);

}