<?php
session_start();
require_once '../config/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $pdo->prepare("SELECT * FROM hospital_users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['hospital_id'] = $user['id'];
        $_SESSION['hospital_username'] = $user['username'];
        header("Location: ../hospital/dashboard.php");
        exit();
    } else {
        header("Location: ../hospital/login.php?error=invalid");
        exit();
    }
}
?>