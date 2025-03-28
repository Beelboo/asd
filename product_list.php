<?php
session_start();
include 'db.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Product List</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Product List</h2>

    <table>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Created At</th>
      </tr>
      <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo htmlspecialchars($row["name"]); ?></td>
            <td><?php echo htmlspecialchars($row["description"]); ?></td>
            <td>$<?php echo number_format($row["price"], 2); ?></td>
            <td><?php echo $row["created_at"]; ?></td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="5">No products found.</td></tr>
      <?php endif; ?>
    </table>

    <a class="btn back-btn" href="dashboard.php">Back</a>
  </div>
</body>
</html>
