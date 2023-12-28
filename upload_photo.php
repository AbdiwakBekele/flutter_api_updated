<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

$targetDirectory = "images/";
$targetFile = $targetDirectory . basename($_FILES['image']['name']);

if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
    echo json_encode(array('success' => 'File uploaded successfully.'));
} else {
    echo json_encode(array('error' => 'Error uploading the file.'));
}
