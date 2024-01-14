<?php
require("user_control/koneksi.php");

// Ambil data user
$user = "SELECT * FROM user";
$resultUser = $conn->query($user);
$rowUser = $resultUser->fetch_assoc();

// Ambil AcaraID dari parameter URL
$AcaraID = $_GET['AcaraID'];

// Periksa apakah acara ada di database
$cekAcara = mysqli_query($conn, "SELECT * FROM acara WHERE AcaraID = '$AcaraID'");
if (mysqli_num_rows($cekAcara) == 0) {
  // Tampilkan pesan kesalahan jika acara tidak ditemukan
  echo "Acara tidak ditemukan.";
  exit;
}

// Ambil data acara
$acara = "SELECT * FROM acara WHERE AcaraID = '$AcaraID'";
$resultAcara = $conn->query($acara);
$rowAcara = $resultAcara->fetch_assoc();

// Ambil data pembayaran
$result = $conn->query("SELECT * FROM pembeliantiketuser WHERE AcaraID = '$AcaraID' AND UserID = '$rowUser[UserID]' ORDER BY PembelianID DESC");

$row = $result->fetch_assoc();



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../assets/css/style.css" />
  <link rel="shortcut icon" href="../assets/img/Logo.png" type="image/x-icon" />
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts. googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&family=Signika:wght@300;500;600&display=swap" rel="stylesheet" />
  <title>EVENTKU.ID</title>
</head>

<body>
  <!-- navbar start -->
  <?php
  include("navbar.php");
  ?>
  <!-- navbar end -->

  <!-- content start -->
  <form method="post" class="container mb-lg-0" action="user_control/pembayaran_update.php?pembelianID=<?= $row['pembelianID'] ?>" enctype='multipart/form-data'>
    <div class="tagline mt-4 mb-4">
      <h1>Pembayaran</h1>
      <input type="" name="" value="<?php echo $row['pembelianID'] ?>">
      <input type="text" value="<?= $rowUser['UserID'] ?>" ">
        <input type=" text" value="<?= $rowAcara['AcaraID'] ?>">

    </div>
    <div class=" card card-pay mb-3" style="max-width: 400px">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="<?php echo $rowAcara['GambarAcara'] ?>" class="rounded-start" alt="..." width="100" height="100" />
        </div>
        <div class="col-md-8 d-flex align-items-center">
          <div class="card-text mt-lg-0 mt-3 mb-lg-0 mb-3 ms-lg-0 ms-3">
            <h1><?php echo $rowAcara['NamaAcara'] ?></h1>
            <p>Total Pembayaran : <?php
                                  $format_rupiah = "Rp " . number_format($rowAcara['HargaTiket'], 0, ',', '.');
                                  echo $format_rupiah; ?> x <?= $row['totalTiket'] ?></p>
            <span><?php
                  $format_rupiahTotal = "Rp " . number_format($row['totalHarga'], 0, ',', '.');
                  echo $format_rupiahTotal; ?></span>
          </div>
        </div>

      </div>
    </div>
    <div class="scan-qr mb-5">
      <p>Scan code QR untuk membayar</p>
      <img src="../assets/img/qr.png" alt="" srcset="" width="150" height="150" />
      <p>Input Bukti Pembayaran</p>
      <input type="file" name="buktiPembayaran" id="" class="input-file" />
      <button class="">Kirim</button>
    </div>
  </form>
  <!-- content end -->

  <!-- footer start -->
  <?php
  include("footer.php");
  ?>
  <!-- footer end -->

  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
</body>

</html>