<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

// Connection
$server = "omishtujoy.com";
$username = "omishtujoyco_flutterapi";
$password = "flutterapi2023";
$db = "omishtujoyco_flutterapi";

// Create a connection
$conn = new mysqli($server, $username, $password, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from Flutter app
$target = "images/";
$targetFile = $target . basename($_FILES['image']['name']);

if(move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)){
    // Insert the data into the database
    $sql = "INSERT INTO products (product_name, product_type) 
    VALUES ('$product_name', '$product_type')";

    if ($conn->query($sql) === TRUE) {
    echo "Data saved successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
}





// Close the connection
$conn->close();
?>