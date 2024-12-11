<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.html');
    exit;
}

$user = $_SESSION['user']; // Get user data from session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="profile-container">
        <h2>Welcome, <?php echo $user['name']; ?></h2>
        <p>Email: <?php echo $user['email']; ?></p>
        <p>Phone: <?php echo $user['phone']; ?></p>
        <p>Role: <?php echo ucfirst($user['role']); ?></p>

        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
