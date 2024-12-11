<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    die("Unauthorized");
}

$user_id = $_SESSION['user_id'];
$house_id = $_POST['house_id'];

$sql = "INSERT INTO wishlists (user_id, house_id) VALUES ($user_id, $house_id)";
if ($conn->query($sql) === TRUE) {
    echo "Added to wishlist!";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>
