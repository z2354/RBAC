<?php
session_start();

// Function to check if the user is authenticated (logged in)
function isAuthenticated() {
    return isset($_SESSION['user']);
}

// Function to get the user's role ID from the session
function getUserRoleId() {
    return isset($_SESSION['user']['role_id']) ? $_SESSION['user']['role_id'] : null;
}

// Function to check if the user has a specific permission
function hasPermission($requiredPermission) {
    global $pdo;

    // If the user is not authenticated, deny permission
    if (!isAuthenticated()) {
        return false;
    }

    // Get the role ID of the logged-in user
    $roleId = getUserRoleId();
    if (!$roleId) {
        return false;
    }

    // Check permissions for the user's role
    $stmt = $pdo->prepare("
        SELECT p.permission_name
        FROM role_permissions rp
        JOIN permissions p ON rp.permission_id = p.id
        WHERE rp.role_id = ?
    ");
    $stmt->execute([$roleId]);

    // Fetch all the permissions for the user's role
    $permissions = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Check if the required permission is in the user's permissions
    return in_array($requiredPermission, $permissions);
}

// Function to redirect unauthorized users to the login page
function redirectToLogin() {
    header("Location: login.php");
    exit();
}

// Function to check if the user is authorized for a certain page
function authorizePage($requiredPermission) {
    if (!hasPermission($requiredPermission)) {
        // Redirect the user to the access denied page if they don't have permission
        header("Location: access_denied.php");
        exit();
    }
}
?>
