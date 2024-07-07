<?php
session_start();

// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "rrwebsite";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = $_POST['email_add'];
$password = $_POST['password'];

// Query to retrieve user data from database
$sql = "SELECT * FROM login_details WHERE email_add = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User authenticated, redirect to index.html
    header("Location: index.html");
    exit;
} else {
    // Invalid credentials, display error message
    echo "Invalid email or password";
}

$conn->close();
?>