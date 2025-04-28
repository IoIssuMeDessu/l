<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, password_hash, hospital_id FROM hospital_users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($id, $hash, $hospital_id);

    if ($stmt->fetch() && password_verify($password, $hash)) {
        $_SESSION["user_id"] = $id;
        $_SESSION["hospital_id"] = $hospital_id;
        $_SESSION["username"] = $username;
        header("Location: blood_availability.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }

    $stmt->close();
}
session_start();
$conn = new mysqli("localhost", "root", "", "findblood");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
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
        <h2>Staff Login</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST"> action="/backend/hospital_login.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>