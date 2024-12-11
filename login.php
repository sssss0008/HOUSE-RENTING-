<?php
require 'db.php'; // Include the database connection
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if user exists
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Start secure session
            session_regenerate_id(true);
            $_SESSION['user'] = $user; // Store user details in session

            // Redirect based on user role
            if ($user['role'] === 'admin') {
                header('Location: dashboard.php'); // Redirect admin to dashboard
            } else {
                header('Location: profile.php'); // Redirect user to their profile
            }
            exit;
        } else {
            // Invalid password
            header('Location: login.html?error=invalid_password');
            exit;
        }
    } else {
        // No user found
        header('Location: login.html?error=user_not_found');
        exit;
    }
}

// Close connection
$conn->close();
?>
