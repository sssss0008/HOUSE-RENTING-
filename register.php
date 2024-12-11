<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve user input
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];

    // Check if the email already exists
    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);

    if ($result->num_rows > 0) {
        // Email already exists
        echo "<script>
                alert('Email already exists. Please try with another email!');
                window.location.href = 'register.html';
              </script>";
    } else {
        // Insert user into the database
        $sql = "INSERT INTO users (name, email, password, phone, role) 
                VALUES ('$name', '$email', '$password', '$phone', 'user')";

        if ($conn->query($sql) === TRUE) {
            // Successful registration
            echo "<script>
                    alert('Registration successful! Redirecting to login page.');
                    window.location.href = 'login.html';
                  </script>";
        } else {
            // Handle SQL error
            echo "Error: " . $conn->error;
        }
    }

    $conn->close();
}
?>
