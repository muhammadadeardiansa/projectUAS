<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../assets/css/login_regis.css" />
  <link rel="shortcut icon" href="../assets/img/EVENTKUID Logo.png" type="image/x-icon" />
  <title>Register</title>
</head>

<body>
  <div class="wrapper" style="margin: 20px 0px">
    <div class="" style="text-align: center">
      <img src="../assets/img/EVENTKUID Logo1.png" width="100" height="30" alt="" srcset="" />
    </div>
    <h2>Register</h2>
    <form action="user_control/daftar_user.php" method="POST">
      <div class="input-box">
        <input type="text" placeholder="Masukan Nama" name="NamaLengkap" required />
      </div>
      <div class="input-box">
        <input type="text" placeholder="Masukan Email" name="Email" required />
      </div>
      <div class="input-box">
        <input type="password" placeholder="Masukan Password" name="password" required />
      </div>
      <div class="input-box">
        <input type="password" placeholder="Konfirmasi Password" name="passwordKonfirmasi" required />
      </div>
      <div class="input-box button">
        <input type="Submit" value="Daftar" />
      </div>
      <div class="text">
        <h3>Sudah Punya Akun? <a href="login_user.php">Masuk</a></h3>
      </div>
    </form>
  </div>
</body>

</html>