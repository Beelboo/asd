<?php
session_start();
$conn = new mysqli("localhost", "root", "", "user_db");

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
} else {
    echo "Invalid credentials. <a href='login.php'>Try again</a>";
}
?>
