<?php
session_start();
$_SESSION = array();

if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-3600, '/');
}

session_destroy();

// Set a logout success message in the URL
header("Location: ../index.php?logout=success");
exit();
?>