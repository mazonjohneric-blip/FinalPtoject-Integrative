<?php
session_start();
include "db.php";

// Initialize cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add to cart
if (isset($_GET['add'])) {
    $id = $_GET['add'];

    if (!isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] = 1;
    } else {
        $_SESSION['cart'][$id]++;
    }

    header("Location: user.php");
}

// Remove from cart
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    unset($_SESSION['cart'][$id]);
    header("Location: user.php");
}

// Buy
if (isset($_GET['buy'])) {
    echo "<script>alert('Product Purchased!');</script>";
}
?>

<div class="navbar">
  <h1 class="logo">MyShop</h1>

  <div class="nav-links">
    <a href="#">Home</a>
    <a href="#">Features</a>
    <a href="#">Pricing</a>
  </div>

  <!-- Cart -->
  <div class="cart-container">

  <!-- Cart Icon -->
  <div class="cart-icon" onclick="toggleCart()">
    🛒
  </div>

  <!-- Dropdown Cart -->
  <div class="cart-dropdown" id="cartDropdown">
    <h3>🛒 Cart</h3>

    <?php
    $total = 0;

    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $id => $qty) {

            $res = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
            $product = mysqli_fetch_assoc($res);

            $subtotal = $product['price'] * $qty;
            $total += $subtotal;
    ?>
            <p>
                <?php echo $product['product_name']; ?> (x<?php echo $qty; ?>)
                <br>
                ₱<?php echo $subtotal; ?>
                <br>
                <a href="?remove=<?php echo $id; ?>">Remove</a>
            </p>
            <hr>
    <?php
        }
    } else {
        echo "<p>Empty Cart</p>";
    }
    ?>

    <strong>Total: ₱<?php echo $total; ?></strong>
  </div>
    </div>
  </div>
</div>
<style>
body {
  font-family: Arial;
  background: #e81010;
  margin: 0;
}

/* NAVBAR */
.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #fffcfc;
  padding: 15px 30px;
}

.logo {
  margin: 0;
}

.nav-links a {
  color: black;
  margin: 0 10px;
  text-decoration: none;
}

/* PRODUCTS GRID */
.products {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
  padding: 30px;
}

/* CARD */
.card {
  background: white;
  padding: 15px;
  border-radius: 15px;
  text-align: center;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.card img {
  width: 100%;
  height: 150px;
  object-fit: cover;
}

/* BUTTONS */
button {
  border: none;
  padding: 8px 12px;
  margin: 5px;
  border-radius: 8px;
  cursor: pointer;
}

.buy {
  background: green;
  color: white;
}

.cart-btn {
  background: orange;
  color: white;
}

/* CART */
.cart-container {
  position: relative;
}

.cart-dropdown {
  display: none;
  position: absolute;
  right: 0;
  top: 40px;
  width: 220px;
  background: white;
  color: black;
  padding: 10px;
  border-radius: 10px;
}
</style>

<script>
function toggleCart() {
  let cart = document.getElementById("cartDropdown");
  cart.style.display =
    cart.style.display === "block" ? "none" : "block";
}
</script>






<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Products</title>

<style>
body {
    font-family: Arial;
    background: #141e30;
    padding: 20px;
}

h2 {
    margin-bottom: 20px;
    color: #eafbff;
    text-align: center;
    font-size: 50px;
}

/* Products */
.container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.card {
    background: white;
    padding: 15px;
    width: 220px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    text-align: center;
}

.card img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 10px;
}

/* Buttons */
button {
    margin-top: 5px;
    padding: 7px 12px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

.buy {
    background: green;
    color: white;
}

.cart-btn {
    background: orange;
    color: white;
}

/* Cart */
.cart {
    position: fixed;
    top: 20px;
    right: 20px;
    background: white;
    padding: 15px;
    width: 250px;
    border-radius: 10px;
    box-shadow: 0 0 10px gray;
}
</style>
</head>

<body>

<h2>Products</h2>


<!-- PRODUCTS -->
<div class="container">
<?php
$result = mysqli_query($conn, "SELECT * FROM products");

while ($row = mysqli_fetch_assoc($result)) {
?>
    <div class="card">
        <?php
$imagePath = "uploads/images/" . $row['image'];

if (!empty($row['image']) && file_exists($imagePath)) {
    echo "<img src='$imagePath' width='150'>";
} else {
    echo "<img src='https://via.placeholder.com/150' width='150'>";
}
?>

        <h3><?php echo $row['product_name']; ?></h3>
        <p>₱<?php echo $row['price']; ?></p>

        <a href="?buy=<?php echo $row['id']; ?>">
            <button class="buy">Buy</button>
        </a>

        <a href="?add=<?php echo $row['id']; ?>">
            <button class="cart-btn">Add to Cart</button>
        </a>
    </div>
<?php } ?>
</div>


<!-- CART -->


</div>
<style>
    .cart-container {
  position: fixed;
  top: 29px;
  right: 20px;
  z-index: 1000;
  display: inline-block;
}

.cart-icon {
  font-size: 26px;
  cursor: pointer;
}

.cart-dropdown {
  display: none;
  position: absolute;
  right: 0;
  top: 40px;
  width: 220px;
  background: skyblue;
  border: 1px solid #000000;
  padding: 10px;
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.15);
  z-index: 100;
}
</style> 

<script>
function toggleCart() {
  let cart = document.getElementById("cartDropdown");
  cart.style.display = (cart.style.display === "block") ? "none" : "block";
}
</script>


</body>
</html>