<?php session_start(); ?>
<header>
    <div class="sitebar_header">
        <div class="logo_img">
            <a href="trangchu.php">
                <img src="../image/logo-icon.png" alt="">
            </a>
        </div>
        <div class="logo_text">
            <a href="trangchu.php">
                <img src="../image/logo-text.png" alt="">
            </a>
        </div>
        <div></div>
    </div>

    <div class="header_main">
        <ul>
            <li>
                <form action="" method="" role="search" class="">
                    <input type="text" autocomplete="off" name="txtsearch" class="input" placeholder="Search...">
                    <a href="">
                        <i class="fa fa-search"></i>
                    </a>
                </form>
            </li>
            <li>
                <div class="header_user" href="#">
                    <img src="../image/varun.jpg" alt="user_img" width="36" class="">
                    <span class=""> <?php echo isset($_SESSION["admin"]) ? $_SESSION["admin"][0] : header('location: ../dangnhap.php'); ?> </span>
                </div>
            </li>
        </ul>
    </div>
</header>