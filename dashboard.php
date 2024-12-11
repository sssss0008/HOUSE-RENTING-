<?php
session_start();

// Redirect to login if not logged in or not an admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: login.html');
    exit;
}

$user = $_SESSION['user']; // Get the user from session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="admin-dashboard">
        <h2>Welcome, Admin <?php echo $user['name']; ?></h2>
        <p>You have admin privileges.</p>

        <!-- Admin Tasks (can be expanded later) -->
        <ul>
            <li><a href="manage_users.php">Manage Users</a></li>
            <li><a href="view_reports.php">View Reports</a></li>
        </ul>

        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
