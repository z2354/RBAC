<?php
require 'db/connection.php';
require 'includes/auth.php';

if (!isAuthenticated()) {
    header('Location: ../login.php');
    exit();
}

$requiredPermission = 'view_dashboard';
if (!hasPermission($requiredPermission)) {
    header('Location: views/access_denied.php');
    exit();
}

echo "Welcome to the dashboard!";
?>
