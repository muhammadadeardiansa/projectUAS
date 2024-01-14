<?php
require("koneksi.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['AcaraID'])) {
    $acaraID = $_POST['AcaraID'];
    $namaKonser = $_POST['NamaKonser'];
    $hargaTiket = $_POST['HargaTiket'];
    $stokTiket = $_POST['StokTiket'];
    $tanggalKonser = $_POST['Tanggal'];
    $lokasi = $_POST['lokasi'];

    // Cek apakah ada gambar baru yang diunggah
    if (!empty($_FILES['GambarAcaraBaru']['name'])) {
        // Tangani pengunggahan gambar
        $direktori = '../Poster';
        $ekstensi = strtolower(pathinfo($_FILES['GambarAcaraBaru']['name'], PATHINFO_EXTENSION));
        $valid_ekstensi = array('jpeg', 'jpg', 'png', 'gif');
        $gambar = rand(1000, 1000000) . "." . $ekstensi;
        $targetFile = $direktori . '/' . $gambar;

        if (in_array($ekstensi, $valid_ekstensi)) {
            $ukuranGambar = $_FILES["GambarAcaraBaru"]["size"];
            if ($ukuranGambar <= 2000000) {
                if (move_uploaded_file($_FILES["GambarAcaraBaru"]["tmp_name"], $targetFile)) {
                    // Jika berhasil diunggah, perbarui status acara
                    if ($stokTiket == 0 && $tanggalKonser >= date('Y-m-d')) {
                        $status = 'Sold Out';
                    } else if ($stokTiket > 0 && $tanggalKonser >= date('Y-m-d')) {
                        $status = 'Tersedia';
                    } else if ($tanggalKonser < date('Y-m-d') && $stokTiket > 0) {
                        $status = 'Kadaluarsa';
                    }

                    // Lakukan query UPDATE hanya jika semua input terisi
                    if (!empty($namaKonser) && !empty($hargaTiket) && !empty($stokTiket) && !empty($tanggalKonser) && !empty($lokasi)) {
                        $query = "UPDATE acara SET NamaAcara='$namaKonser', HargaTiket=$hargaTiket, StokTiket=$stokTiket, GambarAcara='$targetFile', Tanggal='$tanggalKonser', lokasi='$lokasi', StatusAcara='$status' WHERE AcaraID=$acaraID";

                        if ($conn->query($query) === TRUE) {
                            $_SESSION['alert'] = "Data Berhasil Diedit";
                            header("Location: ../admin/acara.php");
                            exit();
                        } else {
                            $_SESSION['alert'] = "Gagal dalam mengedit data: " . $conn->error;
                            header("Location: ../admin/acara.php");
                            exit();
                        }
                    } else {
                        $_SESSION['alert'] = "Semua input harus diisi";
                        header("Location: ../admin/acara.php");
                        exit();
                    }
                } else {
                    $_SESSION['alert'] = "Gagal mengunggah gambar";
                    header("Location: ../admin/acara.php");
                    exit();
                }
            } else {
                $_SESSION['alert'] = "Ukuran gambar terlalu besar";
                header("Location: ../admin/acara.php");
                exit();
            }
        } else {
            $_SESSION['alert'] = "Format gambar tidak didukung";
            header("Location: ../admin/acara.php");
            exit();
        }
    } else {
        // Tangani jika tidak ada gambar yang diunggah
        // Lakukan query UPDATE hanya jika semua input terisi
        if (!empty($namaKonser) && !empty($hargaTiket) && !empty($stokTiket) && !empty($tanggalKonser) && !empty($lokasi)) {
            if ($stokTiket == 0 && $tanggalKonser >= date('Y-m-d')) {
                $status = 'Sold Out';
            } else if ($stokTiket > 0 && $tanggalKonser >= date('Y-m-d')) {
                $status = 'Tersedia';
            } else if ($tanggalKonser < date('Y-m-d') && $stokTiket > 0) {
                $status = 'Kadaluarsa';
            }
            $query = "UPDATE acara SET NamaAcara='$namaKonser', HargaTiket=$hargaTiket, StokTiket=$stokTiket, Tanggal='$tanggalKonser', lokasi='$lokasi', StatusAcara='$status' WHERE AcaraID=$acaraID";

            if ($conn->query($query) === TRUE) {
                $_SESSION['alert'] = "Data Berhasil Diedit";
                header("Location: ../admin/acara.php");
                exit();
            } else {
                $_SESSION['alert'] = "Gagal dalam mengedit data: " . $conn->error;
                header("Location: ../admin/acara.php");
                exit();
            }
        } else {
            $_SESSION['alert'] = "Semua input harus diisi";
            header("Location: ../admin/acara.php");
            exit();
        }
    }
} else {
    $_SESSION['alert'] = "Permintaan tidak valid";
    header("Location: ../admin/acara.php");
    exit();
}
