<?php

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=UTF-8');

require('db.php');

if ($conn) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $product_name = $_POST['product_name'];
        $product_description = $_POST['product_description'];
        $product_price = $_POST['product_price'];

        $sql = "INSERT INTO products (product_name, product_description, product_price)
                VALUES ('$product_name', '$product_description', '$product_price') ";

        $result = $conn->query($sql);

        if ($result) {
            $response["success"] = true;
            $response["message"] = "Product Registered";
        } else {
            $response["success"] = false;
            $response["message"] = "Product failed";
        }
    }
} else {
    $response["success"] = false;
    $response["message"] = "Connections failed";
}

echo json_encode($response);
$conn->close();
