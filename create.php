<?php

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=UTF-8');

require('db.php');

if ($conn) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $product_name = $_POST['product_name'];
        $product_description = $_POST['product_description'];
        $product_price = $_POST['product_price'];

        $targetDirectory = "images/";
        $targetFile = $targetDirectory . time() . basename($_FILES['image']['name']) ;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            
            $sql = "INSERT INTO products (product_name, product_description, product_price, product_image)
                VALUES ('$product_name', '$product_description', '$product_price', '$targetFile') ";

            $result = $conn->query($sql);
    
            echo json_encode(array('success' => 'File uploaded successfully.'));
        } else {
            echo json_encode(array('error' => 'Error uploading the file.'));
        }
    }
}