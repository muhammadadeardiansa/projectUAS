<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="../assets/img/EVENTKUID Logo1.png" type="image/x-icon" />
  <link rel="stylesheet" href="../assets/demo/login.css" />
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <title>LOGIN ADMIN</title>
</head>

<body>
  <div class="wrapper">
    <div class="" style="text-align: center">ADMIN</div>
    <h2>Login</h2>
    <form action="../control_admin/login_adminControl.php" method="post">
      <div class="input-box">
        <input type="text" placeholder="Masukan Email" name="email" required />
      </div>
      <div class="input-box">
        <input type="password" placeholder="Masukan Password" name="password" required />
      </div>
      <div class="input-box button">
        <input type="Submit" value="Masuk" />
      </div>
    </form>
  </div>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
</body>

</html>