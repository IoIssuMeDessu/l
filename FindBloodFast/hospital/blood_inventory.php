<?php
session_start();
if (!isset($_SESSION["hospital_id"])) {
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "findblood");
$hospital_id = $_SESSION["hospital_id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $type => $qty) {
        $stmt = $conn->prepare("REPLACE INTO blood_availability (hospital_id, blood_type, quantity) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $hospital_id, $type, $qty);
        $stmt->execute();
    }
}

$result = $conn->query("SELECT blood_type, quantity FROM blood_availability WHERE hospital_id = $hospital_id");
$availability = [];
while ($row = $result->fetch_assoc()) {
    $availability[$row["blood_type"]] = $row["quantity"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blood Inventory Management</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <header>
        <div class="logo">Blood Inventory Management</div>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="admin-form">
        <h2>Update Blood Inventory</h2>
        <form method="POST">
            <?php foreach (["A+", "A-", "B+", "B-", "AB+", "AB-", "O+", "O-"] as $type): ?>
                <label><?= $type ?>:
                    <input type="number" name="<?= $type ?>" value="<?= $availability[$type] ?? 0 ?>" min="0">
                </label><br>
            <?php endforeach; ?>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>