<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "findblood");
$hospital_id = $_SESSION["hospital_id"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    foreach ($_POST as $blood_type => $qty) {
        $stmt = $conn->prepare("REPLACE INTO blood_availability (hospital_id, blood_type, quantity) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $hospital_id, $blood_type, $qty);
        $stmt->execute();
    }
}

$stocks = [];
$result = $conn->query("SELECT blood_type, quantity FROM blood_availability WHERE hospital_id = $hospital_id");
while ($row = $result->fetch_assoc()) {
    $stocks[$row["blood_type"]] = $row["quantity"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blood Stock</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="admin-form">
        <h2><?= htmlspecialchars($_SESSION["username"]) ?></h2>
        <form method="POST">
            <?php
            $types = ["A+", "A-", "B+", "B-", "AB+", "AB-", "O+", "O-"];
            foreach ($types as $type) {
                $value = $stocks[$type] ?? 0;
                echo "<label>$type: <input type='number' name='$type' value='$value' required></label><br>";
            }
            ?>
            <button type="submit">Update Stock</button>
        </form>
        <a href="logout.php">Log Out</a>
    </div>
</body>
</html>