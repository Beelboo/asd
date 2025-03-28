<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
            margin-top: 50px;
            text-align: center;
        }
        .btn-custom {
            background-color: #198754;
            color: white;
            width: 100%;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .btn-custom:hover {
            background-color: #157347;
        }
    </style>
</head>
<body>

<div class="container-box">
    <h3>Add Product</h3>
    <form method="POST" action="">
        <input type="text" name="name" class="form-control mb-2" placeholder="Product Name" required>
        <input type="text" name="description" class="form-control mb-2" placeholder="Description" required>
        <input type="number" name="price" class="form-control mb-2" placeholder="Price" step="0.01" required>
        <button type="submit" name="submit" class="btn btn-custom">Add Product</button>
    </form>
    <a href="product_list.php" class="btn btn-custom">View Products</a>
    <a href="dashboard.php" class="btn btn-custom">Back</a>
</div>

<?php
$conn = new mysqli("localhost", "root", "", "user_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (name, description, price, created_at) VALUES ('$name', '$desc', '$price', NOW())";

    if ($conn->query($sql)) {
        echo "<div class='alert alert-success text-center mt-3'>Product added successfully!</div>";
    } else {
        echo "<div class='alert alert-danger text-center mt-3'>Error: " . $conn->error . "</div>";
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
