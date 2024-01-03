<?php session_start(); ?>
<!--  -->

<header>
    <div class="header">
        <div class="header-logo">
            <div>
                <a href="index.php"><img src="./image/tiki.png" alt=""></a>
            </div>
        </div>

        <div class="header-main">
            <div class="midder-hd">
                <div class="search_hd">
                    <img src="./image/icons8-search-25.png" alt="" width="20px" height="20px">
                    <form action="" method="get">
                        <input type="text" placeholder="Tìm kiếm">
                        <input type="submit" value="Tìm kiếm">
                    </form>
                </div>

                <div class="items_hd">
                    <div class="trangchu">
                        <a href="index.php">
                            <img src="./image/trangchu.png" alt="" height="25px" width="25px">
                            <span>Trang Chủ</span>
                        </a>
                    </div>
                    <div class="taikhoan">
                        <div class="a">
                            <img src="./image/icons8-user-25.png" alt="" height="25px" width="25px">
                            <span style="color: rgb(128, 128, 137);">
                                <?php
                                if (isset($_SESSION['dangnhap'])) {
                                    if (isset($_SESSION['dangnhap'][0])) {
                                        echo "<div class='JGODF'> " . $_SESSION['dangnhap'][0] . "";
                                        echo "<ul class='submenu'>
                                            <li><a href='taikhoancuatoi.php'>Tài khoản của tôi</a> </li>
                                            <li><a href='donhangcuatoi.php'> Đơn mua </a> </li>
                                            <li><a href='doimatkhau.php'> Đổi mật khẩu </a> </li>
                                            <li><a id='dangxuat' href='dangnhap.php'> Đăng xuất </a> </li>
                                        </ul></div>";
                                    } else {
                                        echo "<a href='dangnhap.php'> Đăng nhập </a>";
                                    }
                                } else {
                                    echo "<a href='dangnhap.php'> Đăng nhập </a>";
                                }
                                ?>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('#dangxuat').click(function() {
                                           
                                            $.ajax({
                                                type: "POST",
                                                url: "xuly_dangxuat.php",
                                                data: "id=a",
                                                success: function() {

                                                }
                                            })
                                        })
                                    })
                                </script>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="cart_hd">
                    <div class="giohang">
                        <a href="giohang.php">
                            <img src="./image/giohang.png" alt="" height="25px" width="25px">
                        </a>
                        <span class="chungdin">
                            <?php
                            echo isset($_SESSION['giohang']) ? count($_SESSION['giohang']) : "0";
                            ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="buttom-hd">
                <div class="submenu">
                    <span><a href="sanpham.php"> Sản phẩm </a></span>
                    <span><a href=""> Giới thiệu </a></span>
                </div>
            </div>
        </div>
    </div>
</header>