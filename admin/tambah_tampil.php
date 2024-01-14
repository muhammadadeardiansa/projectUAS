<?php
require("../control_admin/koneksi.php");
session_start();

// Check if the email is stored in session
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
} else {
  // Redirect to login if the email is not found in session
  header("Location: login_admin.php");
  exit(); // Ensure script stops here
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />

  <link rel="icon" type="image/png" href="../assets/img/EVENTKUID Logo1.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Paper Dashboard 2 by Creative Tim</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- Bootstrap Datepicker CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper">
    <?php
    include("sidebar.php");
    ?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">ACARA</a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content" style="height: 100vh">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">Tambah Data</div>
              <div class="card-body">
                <section class="intro">
                  <div class="bg-image h-100">
                    <div class="mask d-flex align-items-center h-100">
                      <div class="container">
                        <div class="row">
                          <div class="col-8">
                            <form action="../control_admin/tambahData.php" method="post" class="d-flex flex-column" enctype='multipart/form-data'>
                              <label for="" class="form-label">Nama Konser</label>
                              <input type="text" class="form-control mb-3" name="NamaKonser" required />
                              <label for="" class="form-label">Harga Tiket</label>
                              <input type="number" class="form-control mb-3" name="HargaTiket" required />
                              <label for="" class="form-label">Stok Tiket</label>
                              <input type="number" class="form-control mb-3" name="StokTiket" required />
                              <label for="" class="form-label">Masukan Gambar Poster Konser</label>
                              <input type="file" id="" class="mb-3" name="GambarAcara" required />
                              <label for="datepicker" class="form-label">Pilih Tanggal</label>
                              <input type="text" class="form-control mb-3" id="datepicker" name="Tanggal" required />
                              <label for="" class="form-label">Lokasi Acara</label>
                              <input type="text" class="form-control mb-3" name="lokasi" required />
                              <button class="btn btn-primary">Simpan</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer footer-black footer-white">
        <div class="container-fluid">
          <div class="row">
            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear());
                </script>
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Bootstrap Datepicker JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    // Initialize datepicker
    $(document).ready(function() {
      $("#datepicker").datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
      });
    });
  </script>
</body>

</html>