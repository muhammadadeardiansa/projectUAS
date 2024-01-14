<?php
require("user_control/koneksi.php");

$AcaraID = $_GET['AcaraID'];
$sql = "SELECT * FROM acara WHERE AcaraID = '$AcaraID'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sqluser = "SELECT * FROM user";
$resultuser = $conn->query($sqluser);
$rowuser = $resultuser->fetch_assoc();

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
  <?php
  include("navbar.php");
  ?>

  <!-- content start-->
  <div class="content container mt-4 mb-4 d-md-flex">
    <!-- gambar pamflet start -->
    <div class="image-pamflet">
      <img src="<?= $row['GambarAcara'] ?>" class="img-fluid img-thumbnail" alt="..." />
    </div>
    <!-- gambar pamflet end -->

    <!-- info-tiket start -->
    <div class="tiket ms-sm-5 mt-3 mt-sm-0">
      <h1><?= $row['NamaAcara'] ?></h1>
      <!-- tanggal start -->
      <div class="tanggal d-flex align-items-center mb-2">
        <img src="../assets/img/icons8-calendar-48.png" alt="" srcset="" width="15" height="15" />
        <div class="ps-2"><?php
                          $format = 'EEEE, d MMMM y';
                          $dateTime = new DateTime($row['Tanggal']);
                          $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::FULL, 'Asia/Jakarta', IntlDateFormatter::GREGORIAN, $format);

                          $convertedDate = $formatter->format($dateTime);
                          echo $convertedDate ?></div>
      </div>
      <!-- tanggal end -->

      <!-- tempat start -->
      <div class="tempat d-flex align-items-center mb-2">
        <img src="../assets/img/icons8-location-30.png" alt="" srcset="" width="15" height="15" />
        <div class="ps-2">
          <?= $row['lokasi'] ?>
        </div>
        <a class="ps-2" href=""><img src="../assets/img/icons8-arrow-20.png" alt="" srcset="" width="15" height="15" /></a>
      </div>
      <!-- tempat end -->

      <!-- harga-tiket start -->
      <div class="harga-tiket mt-3">
        <p>Harga Tiket</p>
        <h1><?php
            $format_rupiah = "Rp " . number_format($row['HargaTiket'], 0, ',', '.');
            echo $format_rupiah; ?></h1>
      </div>
      <!-- harga-tiket end -->

      <!-- isi-data start -->
      <div class="isi-data mt-5">
        <h1>Isi Data</h1>
        <!-- Text input-->

        <div class="form-group">
          <label class="">Nama Lengkap</label>
          <input name="nama_lengkap" placeholder="Nama Lengkap" class="" type="text" required />
        </div>

        <!-- Text input-->

        <div class="form-group">
          <label class="">Email</label>
          <input name="email" placeholder="Email" class="" type="email" required />
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="">No. WA</label>
          <input name="nomer_wa" placeholder="Nomer WA" class="" type="text" required />
        </div>

        <!-- Text input-->
        <form class="well form-horizontal" action="user_control/pembayaran_awal.php?AcaraID=<?= $row['AcaraID'] ?>" method="post" id="contact_form">
          <input type="text" hidden value="<?= $row['AcaraID'] ?>" name="AcaraID">
          <input type="text" hidden value="<?= $rowuser['UserID'] ?>" name="UserID">
          <div class="form-group mb-3">
            <label class="">Pilih Metode Pembayaran</label> <br />
            <select id="metode_pembayaran" name="metode_pembayaran">
              <option value="shopeepay">ShopeePay</option>
              <option value="dana">DANA</option>
              <option value="gopay">GOPAY</option>
            </select>
          </div>

          <!-- Jumlah tiket start -->
          <div class="jumlah-tiket">

            <p>Tiket Yang Dibeli</p>
            <button class="button text-decoration-none" type="button" name="kurang" id="kurang">-</button>
            <span id="jumlahTiket" required>0</span>
            <!-- Hidden input for jumlahTiket -->
            <input type="hidden" id="hiddenJumlahTiket" name="totalTiket" value="0" required />

            <button class="button text-decoration-none" type="button" name="tambah" id="tambah">+</button>

          </div>
          <!-- Jumlah tiket end -->

          <!-- Tombol pesan start -->
          <input type="submit" class="mt-3 beli" style="background-color: rgb(58, 253, 58)" value="Beli" id="btnBeli" />
          <!-- Tombol pesan end -->
        </form>
      </div>
      <!-- isi-data end -->
    </div>
    <!-- info-tiket end -->
  </div>
  <!-- content end -->

  <?php
  include("footer.php");
  ?>

  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script>
    // Ambil elemen yang dibutuhkan
    const btnKurang = document.getElementById('kurang');
    const btnTambah = document.getElementById('tambah');
    const spanJumlahTiket = document.getElementById('jumlahTiket');
    const btnBeli = document.getElementById('btnBeli');

    btnKurang.addEventListener('click', function() {
      let jumlahTiket = parseInt(spanJumlahTiket.textContent);
      if (jumlahTiket > 0) {
        jumlahTiket--;
        spanJumlahTiket.textContent = jumlahTiket;
        // Update the hidden input value
        document.getElementById('hiddenJumlahTiket').value = jumlahTiket;
      }
    });

    // Fungsi untuk menambah jumlah tiket
    btnTambah.addEventListener('click', function() {
      let jumlahTiket = parseInt(spanJumlahTiket.textContent);
      jumlahTiket++;
      spanJumlahTiket.textContent = jumlahTiket;
      // Update the hidden input value
      document.getElementById('hiddenJumlahTiket').value = jumlahTiket;
    });
  </script>
</body>

</html>