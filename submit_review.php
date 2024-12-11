<?php
include 'db.php';
session_start();

$user_id = $_SESSION['user_id'];
$house_id = $_POST['house_id'];
$rating = $_POST['rating'];
$review = $_POST['review'];

$sql = "INSERT INTO reviews (user_id, house_id, rating, review) VALUES ($user_id, $house_id, $rating, '$review')";
if ($conn->query($sql) === TRUE) {
    echo "Review submitted successfully!";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>
