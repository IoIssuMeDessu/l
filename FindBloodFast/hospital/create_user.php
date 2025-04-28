<?php
$conn = new mysqli("localhost", "root", "", "findblood");

$username = "admin";
$password = "test123";
$hospital_id = 1;

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO hospital_users (username, password_hash, hospital_id) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $username, $hash, $hospital_id);
$stmt->execute();

echo "User created.";
?>