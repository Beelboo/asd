<?php
session_start();
include 'db.php';

$sql = "SELECT id, username, created_at FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Registered Users</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Registered Users</h2>

    <table>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Created At</th>
      </tr>
      <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo htmlspecialchars($row["username"]); ?></td>
            <td><?php echo $row["created_at"]; ?></td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="3">No users found.</td></tr>
      <?php endif; ?>
    </table>

    <a class="btn back-btn" href="dashboard.php">Back</a>
  </div>
</body>
</html>
