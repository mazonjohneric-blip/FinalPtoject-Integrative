<?php
session_start();
include "config.php";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();

        if(password_verify($password,$row['password'])){
            $_SESSION['user'] = $username;
            header("Location: dashboard.php");
        }else{
            echo "Wrong password";
        }
    }else{
        echo "User not found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    

<div class="container d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow p-4" style="width: 400px; border-radius: 15px;">
        
        <h2 class="text-center mb-4">Login</h2>

        <form method="POST">
            <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>

            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
            
            <div class="d-grid">
                <button name="login" class="btn btn-success">Login</button>
            </div>
        </form>

        <p class="text-center mt-3">
            No account? <a href="register.php">Register</a>
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