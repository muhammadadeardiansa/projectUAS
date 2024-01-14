<!-- navbar start -->
<nav class="border-bottom">
    <div class="container navbar navbar-expand-lg">
        <a class="navbar-brand" href="#"><img src="../assets/img/EVENTKUID Logo1.png" width="120" height="30" srcset="" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto menu-user">
                <li class="nav-item">
                    <a class="nav-link mx-2" href="#">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="#">Tiket</a>
                </li>

                <?php
                session_start();
                if (isset($_SESSION['Email'])) {
                    echo '
                        <li class="nav-item">
                            <a class="nav-link mx-2 px-4 text-left rounded bg-primary text-white" href="../user/user_control/logout.php">Logout</a>
                        </li>';
                } else {
                    echo '<li class="nav-item">
                    <a class="nav-link mx-2 px-4 text-left rounded bg-primary text-white login" href="../user/login_user.php">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 px-4 text-left rounded bg-primary text-white" href="../user/register_user.php">Daftar</a>
                    </li>';
                }
                ?>

            </ul>
        </div>
    </div>
</nav>
<!-- navbar end -->