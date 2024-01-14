<?php
require("koneksi.php");
session_start();

// ...

$namaKonser = $_POST['NamaKonser'];
$hargaTiket = $_POST['HargaTiket'];
$stokTiket = $_POST['StokTiket'];
$tanggalKonser = $_POST['Tanggal'];
$lokasi = $_POST['lokasi'];

// Tentukan direktori penyimpanan
$direktori = '../Poster'; // S\esuaikan dengan path penyimpanan gambar
$ektensi = strtolower(pathinfo($_FILES['GambarAcara']['name'], PATHINFO_EXTENSION));
$valid_ektensi = array('jpeg', 'jpg', 'png', 'gif');
$gambar = rand(1000, 1000000) . "." . $ektensi;
$targetFile = $direktori . '/' . $gambar; // Tentukan path lengkap untuk menyimpan file
// Sebelum kode move_uploaded_file()


if (in_array($ektensi, $valid_ektensi)) {
    $ukuranGambar = $_FILES["GambarAcara"]["size"];
    if ($ukuranGambar <= 2000000) { // Periksa ukuran gambar
        move_uploaded_file($_FILES["GambarAcara"]["tmp_name"], $targetFile); // Pindahkan file ke direktori yang ditentukan

        // Lakukan insert data ke database
        if ($stokTiket == 0 && $tanggalKonser >= date('Y-m-d')) {
            $input = "INSERT INTO acara (NamaAcara, HargaTiket, StokTiket, GambarAcara, Tanggal, lokasi, StatusAcara) VALUES ('$namaKonser', $hargaTiket, $stokTiket, '$targetFile', '$tanggalKonser', '$lokasi', 'Sold Out')";
            $result = $conn->query($input);
        } else if ($stokTiket > 0 && $tanggalKonser >= date('Y-m-d')) {
            $input = "INSERT INTO acara (NamaAcara, HargaTiket, StokTiket, GambarAcara, Tanggal, lokasi, StatusAcara) VALUES ('$namaKonser', $hargaTiket, $stokTiket, '$targetFile', '$tanggalKonser', '$lokasi', 'Tersedia')";
            $result = $conn->query($input);
        } else if ($tanggalKonser < date('Y-m-d') && $stokTiket > 0) {
            $input = "INSERT INTO acara (NamaAcara, HargaTiket, StokTiket, GambarAcara, Tanggal, lokasi, StatusAcara) VALUES ('$namaKonser', $hargaTiket, $stokTiket, '$targetFile', '$tanggalKonser', '$lokasi', 'Kadaluarsa')";
            $result = $conn->query($input);
        }


        if (!$result) {
            $_SESSION['alert'] = "Data Gagal Ditambah";
            header("location: ../admin/acara.php");
        } else {
            $_SESSION['alert'] = "Data Berhasil Ditambah";
            header("location: ../admin/acara.php");
        }
    } else {
        $_SESSION['alert'] = "Gambar Terlalu Besar";
        header("location: ../admin/acara.php");
    }
} else {
    $_SESSION['alert'] = "Data Gagal Ditambah";
    header("location: ../admin/acara.php");
}
