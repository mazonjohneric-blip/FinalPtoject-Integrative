<?php
include "db.php";

$id = $_POST['id'];
$product_name = $_POST['product_name'];
$price = $_POST['price'];
$description = $_POST['description'];

$sql = "UPDATE products SET 
        product_name='$product_name',
        price='$price',
        description='$description'
        WHERE id=$id";

if ($conn->query($sql)) {
    echo "updated";
} else {
    echo "error";
}
?>