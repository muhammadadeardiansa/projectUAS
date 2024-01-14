<?php
require("../control_admin/koneksi.php");

session_start();

// Check if the email is stored in session
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
  $query = "SELECT * FROM acara";
  $result = $conn->query($query);
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
            <a class="navbar-brand" href="javascript:;">ACARA</a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content" style="height: 100vh">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <a class="btn-primary" style="
                      font-size: 10px;
                      text-decoration: none;
                      padding: 7px 15px;
                      border-radius: 5px;
                    " href="tambah_tampil.php">Tambah Data</a>
              </div>
              <div class="card-body">
                <section class="intro">
                  <div class="bg-image h-100">
                    <div class="mask d-flex align-items-center h-100">
                      <div class="container">
                        <div class="row justify-content-center">
                          <div class="col-12">
                            <div class="card">
                              <div class="card-body p-0">
                                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; overflow: hidden">
                                  <table class="table mb-0">
                                    <thead style="background-color: #002d72">
                                      <tr>
                                        <th scope="col" style="font-size: 10px">
                                          No.
                                        </th>
                                        <th scope="col" style="font-size: 10px">
                                          Nama Acara
                                        </th>
                                        <th scope="col" style="font-size: 10px">
                                          Tanggal Acara
                                        </th>
                                        <th scope="col" style="font-size: 10px">
                                          Lokasi Acara
                                        </th>
                                        <th scope="col" style="font-size: 10px">
                                          Stok
                                        </th>
                                        <th scope="col" style="font-size: 10px">
                                          Status
                                        </th>
                                        <th scope="col" style="font-size: 10px">
                                          Aksi
                                        </th>
                                      </tr>
                                    </thead>

                                    <?php
                                    $no = 1;
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                      <tr>
                                        <td style="font-size: 10px"><?php echo $no++ ?></td>
                                        <td style="font-size: 10px">
                                          <?php echo $row['NamaAcara'] ?>
                                        </td>
                                        <td style="font-size: 10px">
                                          <?php
                                          $format = "EEEE, d MMMM y"; // Format yang diinginkan (Hari, Tanggal Bulan Tahun)
                                          $dateTime = new DateTime($row['Tanggal']);
                                          $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::FULL, 'Asia/Jakarta', IntlDateFormatter::GREGORIAN, $format);

                                          $convertedDate = $formatter->format($dateTime);
                                          echo $convertedDate;
                                          ?>
                                        </td>
                                        <td style="font-size: 10px">
                                          <?php echo $row['lokasi'] ?>
                                        </td>
                                        <td style="font-size: 10px"><?php echo $row['StokTiket'] ?></td>
                                        <td style="font-size: 10px">
                                          <?php
                                          if ($row['StokTiket'] == 0 && $row['Tanggal'] > date('Y-m-d')) {
                                            echo "Tidak Tersedia";
                                          } else if ($row['StokTiket'] > 0 && $row['Tanggal'] > date('Y-m-d')) {
                                            echo "Tersedia";
                                          } else if ($row['Tanggal'] < date('Y-m-d') && $row['StokTiket'] > 0) {
                                            echo "Kadaluarsa";
                                          }
                                          ?>
                                        </td>
                                        <td class="aksi" style="font-size: 10px">
                                          <a class="btn-warning text-decoration-none" style="
                                              margin-right: 8px;
                                              padding: 5px 12px;
                                            " href="edit_tampil.php?AcaraID=<?php echo $row['AcaraID'] ?>">Edit</a>
                                          <a class="btn-danger text-decoration-none" style="padding: 5px 12px" href="../control_admin/hapus_acara.php?AcaraID=<?php echo $row['AcaraID'] ?>">Hapus</a>
                                        </td>
                                      </tr>
                                    <?php
                                    }
                                    ?>
                                  </table>
                                </div>
                              </div>
                            </div>
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
  </script>
  <?php if (isset($_SESSION['alert'])) : ?>
    <script>
      alert("<?php echo $_SESSION['alert']; ?>");
    </script>
  <?php
    unset($_SESSION['alert']); // Hapus pesan setelah ditampilkan
  endif;
  ?>
</body>

</html>