<?php
session_start();
require_once '../config/db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hospital Staff Login</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="admin-form">
        <h2>Hospital Staff Login</h2>
        <?php if (isset($_GET['error'])): ?>
            <p class="error">Invalid username or password</p>
        <?php endif; ?>
        <form method="POST" action="../backend/hospital_login.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <a href="../index.php" class="btn">Back to Home</a>
    </div>
</body>
</html>