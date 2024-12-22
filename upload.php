<?php

require __DIR__ . '/vendor/autoload.php';

use AsyncFileUploader\AsyncFileUploader;

$uploader = new AsyncFileUploader('uploads');
$response = $uploader->upload();
header('Content-Type: application/json');
echo json_encode($response);