<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RBAC System</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <nav>
        <a href="../views/dashboard.php">Dashboard</a>
        <?php if (isset($_SESSION['user'])): ?>
            <a href="../logout.php">Logout</a>
        <?php else: ?>
            <a href="../views/login.php">Login</a>
            <a href="../views/register.php">Register</a>
        <?php endif; ?>
    </nav>
