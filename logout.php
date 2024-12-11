<?php
session_start();
session_unset(); // Clear session data
session_destroy(); // Destroy the session

// Redirect to login page
header('Location: login.html');
exit;
?>
