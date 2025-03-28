<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <a href="view_users.php"><button>View Users</button></a>
    <a href="insert_product.php"><button>Insert Product</button></a>
    <a href="product_list.php"><button>Product List</button></a>
    <a href="logout.php"><button>Logout</button></a>
</div>
</body>
</html>
