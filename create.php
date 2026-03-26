<?php
include "db.php";

$product_name = $_POST['product_name'];
$price = $_POST['price'];
$description = $_POST['description'];

$sql = "INSERT INTO products (product_name, price, description)
        VALUES ('$product_name', '$price', '$description')";

if ($conn->query($sql)) {
    echo "success";
} else {
    echo "error";
}
?>