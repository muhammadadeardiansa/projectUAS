<?php

require("../user_control/koneksi.php");

session_start();

$Email = $_POST['Email'];
$password = $_POST['password'];

$sql = "select * from user where Email = '$Email' and password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['Email'] = $Email;
    header("Location: ../home_user.php");
}
