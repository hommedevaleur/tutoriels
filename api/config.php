<?php

require __DIR__.'/../vendor/autoload.php';


use Aws\S3\S3Client;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

$accountId = $_ENV['ACCOUNT_ID'];
$accessKey = $_ENV['ACCESS_KEY'];
$secretKey = $_ENV['SECRET_KEY'];
$bucketName = $_ENV['BUCKET_NAME'];

$s3 = new S3Client([
    'version' => 'latest',
    'region' => 'auto',
    'endpoint' => "https://$accountId.r2.cloudflarestorage.com",
    'credentials' => [
        'key' => $accessKey,
        'secret' => $secretKey
    ]
]);

?>