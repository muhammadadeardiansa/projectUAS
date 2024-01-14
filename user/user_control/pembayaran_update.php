<?php

require("koneksi.php");

$userQuery = "SELECT * FROM user";
$resultUser = $conn->query($userQuery);
$rowUser = $resultUser->fetch_assoc();

$acaraQuery = "SELECT * FROM acara";
$resultAcara = $conn->query($acaraQuery);
$rowAcara = $resultAcara->fetch_assoc();

$pembelianID = $_GET['pembelianID'];
$AcaraID = $rowAcara['AcaraID'];
$userID = $rowUser['UserID'];
$direktori = 'project UAS1.2/bukti'; // S\esuaikan dengan path penyimpanan gambar
$ektensi = strtolower(pathinfo($_FILES['buktiPembayaran']['name'], PATHINFO_EXTENSION));
$valid_ektensi = array('jpeg', 'jpg', 'png', 'gif');
$gambar = rand(1000, 1000000) . "." . $ektensi;
$targetFile = $direktori . '/' . $gambar; // Tentukan path lengkap untuk menyimpan file
// Sebelum kode move_uploaded_file()


if (in_array($ektensi, $valid_ektensi)) {
    $ukuranGambar = $_FILES["buktiPembayaran"]["size"];
    if ($ukuranGambar <= 2000000) { // Periksa ukuran gambar
        move_uploaded_file($_FILES["buktiPembayaran"]["tmp_name"], $targetFile); // Pindahkan file ke direktori yang ditentukan

        // Lakukan insert data ke database
        $input = "UPDATE pembeliantiketuser SET buktiPembayaran = '$targetFile' WHERE pembelianID = $pembelianID AND AcaraID = $AcaraID AND userID = $userID ORDER BY pembelianID DESC";
        $result = $conn->query($input);

        if (!$result) {
            echo "gagal";
        } else {
            echo "berhasil";
        }
    } else {
        echo "Gambar Terlalu Besar";
    }
} else {
    echo "Data Gagal Ditambah";
}
