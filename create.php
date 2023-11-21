<?php 

    // Connection
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "flutter_database";

    $conn = mysqli_connect($server, $username, $password, $db);
    if($conn){
        echo "Successfully Connected";
    }else{
        echo "Error Connecting";
    }

    // Command

    $sql = "INSERT INTO products(product_name, product_type, product_quantity, product_price)
                VALUES ('Sport Shoes', 'Nike', 10, 2500)";

    $result = mysqli_query($conn, $sql);

    if($result){
        echo " Data Submitted Successfully";
    }else{
        echo " Error Submitting Data";
    }


?>