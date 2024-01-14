<?php
// user_control/pembayaran_awal.php

require("koneksi.php");

$user = "SELECT * FROM user";
$resultUser = $conn->query($user);
$rowUser = $resultUser->fetch_assoc();
$userID = $rowUser['UserID'];

$AcaraID = $_GET['AcaraID'];
$metodePembayaran = isset($_POST['metode_pembayaran']) ? $_POST['metode_pembayaran'] : "";
$jumlahTiket = isset($_POST['totalTiket']) ? $_POST['totalTiket'] : 0;

$acara = "SELECT * FROM acara WHERE AcaraID = '$AcaraID'";
$resultAcara = $conn->query($acara);
$rowAcara = $resultAcara->fetch_assoc();

$totalHarga = $rowAcara['HargaTiket'] * $jumlahTiket;

$sql = "INSERT INTO pembeliantiketuser (UserID, AcaraID, metodePembayaran, totalTiket, totalHarga) VALUES ('$userID', '$AcaraID', '$metodePembayaran', '$jumlahTiket','$totalHarga')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../pembayaran_user.php?AcaraID=$AcaraID");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
