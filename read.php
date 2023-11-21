<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=UTF-8');

    // Connection
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "flutter_database";

    $conn = new mysqli($server, $username, $password, $db);

    // Command
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    $response = array();

    if( $result->num_rows > 0 ){
        while( $row = $result->fetch_assoc() ){
            $response[] = $row;
        }
    }

    echo json_encode($response);

?>