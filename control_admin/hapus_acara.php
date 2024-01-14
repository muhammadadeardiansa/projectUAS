<?php
require("koneksi.php");
session_start();

// Mengecek apakah parameter ID ada di URL
if (isset($_GET['AcaraID'])) {
    $acaraID = $_GET['AcaraID'];

    $sql = "DELETE FROM acara WHERE AcaraID = '$acaraID'";
    $result = $conn->query($sql);

    if (!$result) {
        $_SESSION['alert'] = "Gagal menghapus data";
    } else {
        $_SESSION['alert'] = "Data berhasil dihapus";
    }

    header("location: ../admin/acara.php");
} else {
    // Jika parameter ID tidak ada di URL
    $_SESSION['alert'] = "Tidak ada ID acara yang diberikan";
    header("location: ../admin/acara.php");
}
