<?php
// Assuming you're using the object-oriented style for connection creation
require("koneksi.php");

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Start the session
    session_start();

    // Store email in session
    $_SESSION['email'] = $email;

    // Login successful, redirect to dashboard
    header("Location: ../admin/dashboard.php");
} else {
    // Handle invalid login
    header("Location: ../admin/login_admin.php");
}
