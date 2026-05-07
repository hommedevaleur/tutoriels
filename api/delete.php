<?php

header("Content-Type: application/json");

require 'config.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['file'])) {

    echo json_encode([
        "success" => false,
        "message" => "Nom fichier manquant"
    ]);

    exit;
}

try {

    $s3->deleteObject([
        'Bucket' => $bucketName,
        'Key' => $data['file']
    ]);

    echo json_encode([
        "success" => true,
        "message" => "Fichier supprimé"
    ]);

} catch (Exception $e) {

    echo json_encode([
        "success" => false,
        "error" => $e->getMessage()
    ]);

}