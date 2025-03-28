<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "user_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Validate inputs
    if (empty($name) || empty($description) || empty($price)) {
        echo "<div class='alert alert-danger text-center'>Please fill in all fields.</div>";
    } else {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO products (name, description, price, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("ssd", $name, $description, $price);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success text-center'>Product added successfully!</div>";
        } else {
            echo "<div class='alert alert-danger text-center'>Error: " . $stmt->error . "</div>";
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card p-4 shadow-sm">
            <h3 class="mb-4">Add Product</h3>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                </div>
                <button type="submit" name="submit" class="btn btn-success w-100">Add Product</button>
            </form>
            <a href="product_list.php" class="btn btn-secondary w-100 mt-2">View Products</a>
        </div>
        <a class="btn back-btn" href="user_login.php">Back</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
