<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/xemdonhang.css">


    <title>Đơn hàng</title>
</head>

<?php
require "../connect.php";
$id = $_GET['id'];
$sql = mysqli_query($conn, "select dh.TenNguoiDung, dh.SoDienThoai, dh.DiaChiGiaoHang, nd.TenNguoiDung, nd.SoDienThoai, nd.Email, nd.DiaChi, dh.MaDonHang, dh.NgayDatHang, dh.TongTien, dh.GhiChu
from donhang as dh, nguoidung as nd 
where dh.MaNguoiDung = nd.MaNguoiDung and dh.MaDonHang = $id");
$data = mysqli_fetch_array($sql);

$sql1 = mysqli_query($conn, "select sanpham.*, chitietdonhang.SoLuong, chitietdonhang.GiaSanPham from sanpham, chitietdonhang
where sanpham.MaSanPham =  chitietdonhang.MaSanPham and MaDonHang =  $id");

$sql2 =  mysqli_query($conn, "select sum(chitietdonhang.SoLuong * chitietdonhang.GiaSanPham) as total from sanpham, chitietdonhang
where sanpham.MaSanPham =  chitietdonhang.MaSanPham and MaDonHang =  $id");
$tongtien = mysqli_fetch_assoc($sql2)['total'];
$d = 0;
?>

<body>
    <div>

        <?php include('./header.php'); ?>


        <main class="left-sidebar" data-sidebarbg="skin6">
            <nav class="sidebar-nav">
                <ul>
                    <li>
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
                    <li class="active">
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
                        <h4>Đơn hàng: #<?php echo $_GET['id']; ?></h4>
                    </div>
                </div>

                <div class="container">
                    <div class="ttt">

                        <div class="form-thongtin">
                            <div>
                                <p>From:</p> <br>
                                <span><b>Admin: AmpleAdmin</b></span> <br>
                                <span>Phone: 0373632775</span> <br>
                                <span>Email: tuanseverzy@gmail.com</span> <br>
                                <span>Address: Khu3 - Thanh Uyên - Tam Nông - Phú Thọ</span> <br>
                            </div>
                            <div>
                                <p>To:</p> <br>
                                <span><b> <?php echo $data[0]; ?> </b></span> <br>
                                <span>Phone: <?php echo $data[1]; ?> </span> <br>
                                <span>Address: <?php echo $data[2]; ?> </span> <br>
                                <span>Ghi chú: <?php echo $data[10]; ?> </span> <br>
                            </div>
                            <div>
                                <p>Thông tin tài khoản:</p> <br>
                                <span><b><?php echo $data[3]; ?></b></span> <br>
                                <span>Phone: <?php echo $data[4]; ?></span> <br>
                                <span>Email: <?php echo $data[5]; ?></span> <br>
                                <span>Address: <?php echo $data[6]; ?></span> <br>
                            </div>
                            <div>
                                <p>Thông tin đơn hàng:</p> <br>
                                <span><b>Mã đơn hàng: </b> <?php echo $data[7]; ?></span> <br>
                                <span><b>Ngày tạo: </b> <?php echo date('d-m-Y', strtotime($data[8])); ?></span> <br>
                                <span><b>Thanh toán: </b> Thanh toán khi nhận hàng (COD) </span> <br>
                                <span><b>Tổng tiền: </b> <?php echo number_format($tongtien); ?></span> <br>
                            </div>
                        </div>
                        <div class="form-sanpham">
                            <table>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Thành tiền</th>
                                </tr>
                                <?php while ($row = mysqli_fetch_array($sql1)) { $d++;?>
                                    <tr>
                                        <td><?php echo $d; ?></td>
                                        <td> <?php echo $row['MaSanPham']; ?> </td>
                                        <td> <?php echo $row['TenSanPham']; ?> </td>
                                        <td> <?php echo $row['SoLuong']; ?> </td>
                                        <td> <?php echo number_format($row['GiaSanPham']); ?> </td>
                                        <td> <?php echo number_format($row['SoLuong'] * $row['GiaSanPham']); ?> </td>
                      
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <div class="button">
                            <a href="../admin/donhang.php"><button>Quay lại</button></a>
                            <a href=""><button>In hóa đơn</button></a>
                        </div>

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