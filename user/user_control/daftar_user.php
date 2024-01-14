<?php

require("../user_control/koneksi.php");

$NamaLengkap = $_POST['NamaLengkap'];
$Email = $_POST['Email'];
$password = $_POST['password'];
$NoWA = $_POST['NoWA'];

$sql = "insert into user (NamaLengkap, Email, password) values ('$NamaLengkap', '$Email', '$password')";
$result = $conn->query($sql);

if ($result) {
    header("Location: ../home_user.php");
}
