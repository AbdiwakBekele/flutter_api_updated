<?php 

require('db.php');

if($conn){

    if($_SERVER['REQUEST_METHOD'] == 'POST' ){
        $product_name = $_POST['product_name'];
        $product_description = $_POST['product_description'];


        $sql = "INSERT INTO products (product_name, product_description)
                VALUES ('$product_name', '$product_description') ";
                
        $result = $conn->query($sql);

        if($result){
            $response["success"] = true;
            $response["message"] = "Product Registered";
        }else{
            $response["success"] = false;
            $response["message"] = "Product failed";
            
        }
    }

}else { 
    $response["success"] = false;
    $response["message"] = "Connections failed";
}


?>