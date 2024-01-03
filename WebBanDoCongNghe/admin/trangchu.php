<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/trangchu.css">
    <title>Document</title>
</head>
<?php
require "../connect.php";
$result1 = mysqli_query($conn, 'select count(MaNguoiDung) as total from nguoidung');
$nguoidung = mysqli_fetch_assoc($result1)['total'];

$result2 = mysqli_query($conn, 'select count(MaSanPham) as total from sanpham');
$sanpham = mysqli_fetch_assoc($result2)['total'];

$result3 = mysqli_query($conn, 'select count(MaDonHang) as total from donhang');
$donhang = mysqli_fetch_assoc($result3)['total'];

?>

<body>
    <div>

        <?php include('./header.php'); ?>

        <main class="left-sidebar" data-sidebarbg="skin6">
            <nav class="sidebar-nav">
                <ul>
                    <li class="active">
                        <a href="trangchu.php">
                            <i class="fa-solid fa-house"></i>
                            <span>Trang chủ</span>
                        </a>
                    </li>
                    <li>
                        <a href="danhmuc.php">
                            <i class=""></i>
                            <span>Danh mục</span>
                        </a>
                    </li>
                    <li>
                        <a href="sanpham.php">
                            <i class=""></i>
                            <span>Sản phẩm</span>
                        </a>
                    </li>
                    <li>
                        <a href="donhang.php">
                            <i class=""></i>
                            <span>Đơn hàng</span>
                        </a>
                    </li>
                    <li>
                        <a href="phanhoi.php">
                            <i class=""></i>
                            <span>Phản hồi</span>
                        </a>
                    </li>
                    <li>
                        <a href="nguoidung.php">
                            <i class=""></i>
                            <span>Người dùng</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class=""></i>
                            <span>Error 404</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="content">
                <div class="header">
                    <div class="hd_title">
                        <h4>Trang chủ</h4>
                    </div>
                </div>

                <div class="container">
                    <div class="hd_container">
                        <div class="total_view">
                            <span>Người dùng</span>
                            <div>
                                <div id="sparklinedash">
                                    <canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                </div>
                                <p><?php echo $nguoidung > 0 ? $nguoidung : 0; ?></p>
                            </div>
                        </div>
                        <div class="total_view">
                            <span>Sản phẩm</span>
                            <div>
                                <div id="sparklinedash">
                                    <canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                </div>
                                <p><?php echo $sanpham > 0 ? $sanpham : 0; ?></p>
                            </div>
                        </div>
                        <div class="total_view">
                            <span>Đơn hàng</span>
                            <div>
                                <div id="sparklinedash">
                                    <canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                </div>
                                <p><?php echo $donhang > 0 ? $donhang  : 0; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="table_container">
                        <!-- <div>
                            <span>
                                Đơn hàng
                            </span>
                            <select name="" id="">
                                <option value="">a</option>
                                <option value="">a</option>
                                <option value="">a</option>
                                <option value="">a</option>
                                <option value="">a</option>
                            </select>
                        </div>
                        <div>
                            <table>
                                <tr>
                                    <th>STT</th>
                                    <th>Name</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày đặt</th>
                                    <th>Tổng tiền</th>
                                </tr>
                                <tr>
                                    <td>tháng 2 năm 2023</td>
                                    <td>tháng 3 năm 2023</td>
                                    <td>tháng 4 năm 2023</td>
                                    <td>tháng 5 năm 2023</td>
                                    <td>tháng 6 năm 2023</td>
                            
                                </tr>
                                
                            </table>
                        </div> -->
                    </div>

                </div>

                <div class="footer">

                    2021 © Ample Admin
                </div>

            </div>
        </main>



    </div>
</body>

</html>