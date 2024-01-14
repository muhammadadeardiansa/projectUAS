<?php
require("user_control/koneksi.php");

session_start();

if (isset($_SESSION['Email'])) {
  header("Location: home_user.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="../assets/img/EVENTKUID Logo.png" type="image/x-icon" />
  <link rel="stylesheet" href="../assets/css/login_regis.css" />
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <title>LOGIN</title>
</head>

<body>
  <div class="wrapper">
    <div class="" style="text-align: center">
      <img src="../assets/img/EVENTKUID Logo1.png" width="100" height="30" alt="" srcset="" />
    </div>
    <h2>Login</h2>
    <form action="user_control/login.php" method="POST">
      <div class="input-box">
        <input type="text" placeholder="Masukan Email" name="Email" required />
      </div>
      <div class="input-box">
        <input type="password" placeholder="Masukan Password" name="password" required />
      </div>
      <div class="input-box button">
        <input type="Submit" value="Masuk" />
      </div>
      <div class="text">
        <h3>
          Belum Punya Akun? <a href="register_user.php">Daftar</a>
        </h3>
      </div>
    </form>
  </div>
</body>

</html>