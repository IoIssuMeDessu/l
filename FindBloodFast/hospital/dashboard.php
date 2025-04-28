<?php
session_start();
if (!isset($_SESSION['hospital_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hospital Staff Dashboard</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <header>
        <div class="logo">Hospital Staff Dashboard</div>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="blood_inventory.php" class="admin-btn">Blood Inventory</a></li>
                <li><a href="logout.php" class="admin-btn">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="admin-form">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['hospital_username']); ?></h2>
        <!-- Add your hospital staff specific features here -->
    </div>
</body>
</html>