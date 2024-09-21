<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['login_alert_shown']);
header("Location: index.php"); // Redirect to login page or homepage
exit();
?>