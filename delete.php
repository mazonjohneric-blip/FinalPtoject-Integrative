<?php
include "db.php";

$id = $_POST['id'];

$sql = "DELETE FROM products WHERE id=$id";

if ($conn->query($sql)) {
    echo "deleted";
} else {
    echo "error";
}
?>