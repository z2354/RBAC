<?php
// Includes and permission checks
include '../includes/header.php';
require '../db/connection.php';
require '../includes/auth.php';

if (!isAuthenticated()) {
    header('Location: login.php');
    exit();
}

$requiredPermission = 'view_dashboard';
if (!hasPermission($requiredPermission)) {
    header('Location: access_denied.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <style>
        /* Dashboard container styling */
        .dashboard-container {
            text-align: center;
            margin: 0 auto;
            padding: 50px 20px;
            max-width: 800px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Dashboard heading */
        .dashboard-container h1 {
            color: #5a67d8;
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Dashboard subtitle */
        .dashboard-container p {
            font-size: 1.2em;
            color: #555;
            margin-bottom: 30px;
        }

        /* Dashboard links section */
        .dashboard-links {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        /* Buttons in the dashboard */
        .dashboard-links .btn {
            background-color: #5a67d8;
            color: white;
            font-size: 1em;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
        }

        /* Hover effect for buttons */
        .dashboard-links .btn:hover {
            background-color: #434190;
            transform: translateY(-2px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
        }

        /* Logout button styling */
        .dashboard-links .logout-btn {
            background-color: #e53e3e;
        }

        .dashboard-links .logout-btn:hover {
            background-color: #c53030;
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <h1>Welcome to the Dashboard, <?php echo htmlspecialchars($_SESSION['user']['username']); ?>!</h1>
    <p>You have access to this page. Here you can manage your resources and perform tasks based on your permissions.</p>

    <div class="dashboard-links">
        <a href="profile.php" class="btn">Profile</a>
        <a href="settings.php" class="btn">Settings</a>
        <a href="logout.php" class="btn logout-btn">Logout</a>
    </div>
</div>

<?php include '../includes/footer.php'; ?>

</body>
</html>
