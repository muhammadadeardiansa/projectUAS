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
  <link rel="" sizes="76x76" href="../assets/img/EVENTKUID Logo1.png" />
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
            <a class="navbar-brand" href="javascript:;">TIKET</a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content" style="height: 100vh">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">Detail Tiket (Nama User)</div>
              <div class="card-body">
                <section class="intro">
                  <div class="bg-image h-100">
                    <div class="mask d-flex align-items-center h-100">
                      <div class="container">
                        <div class="row justify-content-center">
                          <div class="col-12">
                            <table class="table table-borderless">
                              <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>Ade</td>
                              </tr>
                              <tr>
                                <td>No. WA</td>
                                <td>:</td>
                                <td>08855555</td>
                              </tr>
                              <tr>
                                <td>Tiket Yang Dibeli</td>
                                <td>:</td>
                                <td>Konser Nemu HUT RI</td>
                              </tr>
                              <tr>
                                <td>Jumlah Yang Dibeli</td>
                                <td>:</td>
                                <td>5</td>
                              </tr>
                              <tr>
                                <td>Total Harga</td>
                                <td>:</td>
                                <td>Rp 250.000</td>
                              </tr>
                              <tr>
                                <td>Bukti Pembayaran</td>
                                <td>:</td>
                                <td>
                                  <img src="../assets/img/Bukti-pembayaran-semnas-rahayu.jpeg" alt="" srcset="" width="150" height="200" />
                                </td>
                              </tr>
                              <tr>
                                <td>Status Pembelian</td>
                                <td></td>
                                <td>
                                  <div class="btn-group">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                      Belum Konfirmasi
                                    </button>
                                    <ul class="dropdown-menu">
                                      <li>
                                        <a class="dropdown-item" href="#" onclick="changeStatus('Sudah Konfirmasi Bukti Pembayaran')">Sudah Konfirmasi Bukti
                                          Pembayaran</a>
                                      </li>
                                    </ul>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <a href="" class="btn-primary px-4 py-1 rounded">Simpan</a>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <a href="" class="btn-success px-4 py-1 rounded">Kirim</a>
                                </td>
                              </tr>
                            </table>
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
  <script src="../assets/js/core/jquery.min.js"></script>
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
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });

    function changeStatus(newStatus) {
      // Mengubah teks tombol dropdown menjadi teks dari opsi yang dipilih
      document.querySelector(".btn-group button").innerText = newStatus;
    }
  </script>
</body>

</html>