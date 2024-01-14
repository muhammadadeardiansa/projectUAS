<?php
require("user_control/koneksi.php");

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
<style></style>

<body>
  <?php
  include("navbar.php");
  ?>

  <!-- content start-->

  <div class="container mb-lg-0">
    <div class="tagline mt-4 mb-4">
      <h1>Konser</h1>
    </div>
    <div class="row">
      <?php
      $sql = "SELECT * FROM acara ";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) { ?>
        <a href="detail_konser.php?AcaraID=<?= $row['AcaraID'] ?>" class="col-lg-3 col-md-6 col-6 mb-4 mb-lg-3 text-decoration-none">
          <input type="hidden" name="AcaraID" value="<?= $row['AcaraID'] ?>"">
          <div class=" card hover">
          <img class="card-img-top" src="<?= $row['GambarAcara'] ?>" alt="" />
          <div class="card-body d-flex justify-content-between">
            <div class="deskripsi-tiket">
              <h2 class="head-card text-start mb-1">
                <?php echo $row['NamaAcara'] ?>
              </h2>
              <div class="text-start p-card mb-1"><?php
                                                  $format = 'EEEE, d MMMM y';
                                                  $dateTime = new DateTime($row['Tanggal']);
                                                  $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::FULL, 'Asia/Jakarta', IntlDateFormatter::GREGORIAN, $format);

                                                  $convertedDate = $formatter->format($dateTime);
                                                  echo $convertedDate ?></div>
              <div class="text-start p-card mb-2"><?= $row['lokasi'] ?></div>
              <div class="status-tiket"><?= $row['StatusAcara'] ?></div>
            </div>
          </div>
    </div>
    </a>
  <?php
      }
  ?>
  </div>
  </div>

  <!-- content end -->

  <?php
  include("footer.php");
  ?>

  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
</body>

</html>