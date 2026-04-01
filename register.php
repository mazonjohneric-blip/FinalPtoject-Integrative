<?php
include "config.php";

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username,password)
            VALUES ('$username','$password')";

    if($conn->query($sql)){
        header("Location: login.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow p-4" style="width: 400px; border-radius: 15px;">
        
        <h2 class="text-center mb-4">Register</h2>

        <form method="POST">
            <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>

            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

            <div class="d-grid">
                <button name="register" class="btn btn-success">Register</button>
            </div>
        </form>

        <p class="text-center mt-3">
            Already have account? <a href="login.php">Login</a>
        </p>

    </div>

</div>

<style>
body {
    background: linear-gradient(to right, #141e30, #243b55);
    font-family: 'Segoe UI', sans-serif;
}
</style>

</body>
</html>