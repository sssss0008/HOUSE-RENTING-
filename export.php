<?php
include 'db.php';

$type = $_GET['type'];
$filename = "$type.csv";

header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=$filename");

$output = fopen("php://output", "w");

if ($type == "users") {
    $sql = "SELECT id, name, email, phone FROM users";
    $fields = ["ID", "Name", "Email", "Phone"];
} elseif ($type == "houses") {
    $sql = "SELECT id, title, description, price FROM houses";
    $fields = ["ID", "Title", "Description", "Price"];
}

fputcsv($output, $fields);

$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

fclose($output);
$conn->close();
?>
