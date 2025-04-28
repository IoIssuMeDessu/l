<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <header>
        <div class="logo">FindBlood Admin</div>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="create_admin.php" class="admin-btn">Create New Admin</a></li>
                <li><a href="logout.php" class="admin-btn">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="admin-form">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['admin_username']); ?></h2>
        <!-- Add your dashboard content here -->
    </div>
</body>
</html>