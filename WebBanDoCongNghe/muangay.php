<?php

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./plugin/Carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./plugin/Carousel/dist/assets/owl.theme.default.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="./style/giohang.css">
    <link rel="stylesheet" href="./style/style.css">

    <title>Document</title>
</head>
<?php
require "./connect.php";
$id = $_GET['id'];
$soluong = $_GET['soluong'];
$sql1 = mysqli_query($conn, "select sanpham.*, danhmuc.TenDanhMuc FROM sanpham, danhmuc WHERE sanpham.MaDanhMuc = danhmuc.MaDanhMuc and MaSanPham ='$id'");
$row = mysqli_fetch_array($sql1);


$tongtien = 0;

// var_dump($_SESSION['giohang']);exit;

// $resuft = mysqli_query($conn, "select * from sanpham");


?>

<body>
    <?php include "header.php"; ?>

    <main>
        <div class="content">
            <div class="header_ct">
                <div>
                    <div>
                        <h3>Mua ngay</h3>
                    </div>
                    <div>
                        <a href="sanpham.php">Tiếp tục mua hàng</a>
                    </div>
                </div>
            </div>
            <form action="xuly_giohang.php" method="post">
                <div class="giohang_ct">
                    <table>
                        <tr>
                            <td class="product-thumbnail">
                                <a href="">
                                    <span>
                                        <img src="./image/list-image-product/<?php echo $row['AnhCon']; ?>" alt="" width="130px" height="130px">
                                    </span>
                                </a>
                            </td>

                            <td class="product-name" data-title="Sản phẩm">
                                <a href=""> <?php echo $row['TenSanPham']; ?> </a>
                                <span class="">
                                    <bdi> <?php echo number_format($row['Gia']); ?> <span>₫</span></bdi></span>
                            </td>

                            <td class="product-quantity" data-title="Số lượng">
                                <div>
                                    <div class="quality-input">
                                        <!-- <input type="button" value="-"> -->
                                        <div>
                                            <input type="number" step="1" min="1" max="<?php echo $row['SoLuongTrongKho']; ?>" value="<?php echo $soluong; ?>" title="SL" size="4" placeholder="" inputmode="numeric" name="soluong">
                                        </div>
                                        <!-- <input type="button" value="+"> -->
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="text" value="<?php echo number_format($soluong * $row['Gia']); ?>đ" name="product-price" class="product-price">
                            </td>
                        </tr>

                    </table>


                </div>
                <div class="thanhtoan">
                    <div>
                        <div class="action1">
                            <h3>Thông tin thanh toán</h3>
                            <?php
                            if (isset($_SESSION['dangnhap'])) {
                                if (isset($_SESSION['dangnhap'][0])) {
                                    $sql = mysqli_query($conn, "select * from nguoidung where TenDangNhap = '" . $_SESSION['dangnhap'][0] . "'");
                                    $ng = mysqli_fetch_array($sql);
                                    echo "<span>Thanh toán với tài khoản: " . $_SESSION['dangnhap'][0] . "</span>";
                                } else {
                                    echo "<span>Bạn đã có tài khoản ? <a href='dangnhap.php'>Ấn vào đây để đăng nhập</a></span>";
                                }
                            } else {
                                echo "<span>Bạn đã có tài khoản ? <a href='dangnhap.php'>Ấn vào đây để đăng nhập</a></span>";
                            }
                            ?>
                        </div>
                        <div class="action2">
                            <div class="form_thanhtoan">
                                <div class="left">
                                    <label for="hovaten">Họ và tên</label> <br>
                                    <input type="text" name="hovaten" id="hovaten" required value="<?php echo isset($_SESSION['dangnhap']) ? $ng['TenNguoiDung'] : ""; ?>" placeholder="Họ và tên">
                                </div>
                                <div class="right">
                                    <label for="diachi">Địa chỉ</label> <br>
                                    <input type="text" name="diachi" id="" required value="<?php echo isset($_SESSION['dangnhap']) ? $ng['DiaChi'] : ""; ?>" placeholder="Địa chỉ">
                                </div>
                            </div>
                            <div class="form_thanhtoan">
                                <div class="left">
                                    <label for="sodienthoai">Số điện thoại</label> <br>
                                    <input type="text" name="sodienthoai" id="sodienthoai" required value="<?php echo isset($_SESSION['dangnhap']) ? $ng['SoDienThoai'] : ""; ?>" placeholder="Số điện thoại">
                                </div>
                                <div class="right">
                                    <label for="email">Email</label> <br>
                                    <input type="text" name="email" id="email" value="<?php echo isset($_SESSION['dangnhap']) ? $ng['Email'] : ""; ?>" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="action3">
                            <div>
                                <span>Ghi chú đơn hàng(tùy chọn)</span>
                                <textarea name="ghichu" id="ghichu" cols="100" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="action4">
                            <div>
                                <span>Phương thức thanh toán</span> <br>
                                <span>Tổng tiền</span>
                            </div>
                            <div>
                                <span>Trả tiền mặt khi thanh toán</span> <br>
                                <input type="text" name="tongtien" id="tongtien" readonly value="<?php echo number_format($soluong * $row['Gia']); ?>" class="tongtien"><sup>đ</sup>
                                <!-- <span style="text-align: right; color:red; display:block"> </span> -->
                            </div>
                        </div>
                        <div class="action5">
                            <button class="Btn" type="submit" name="btn-mua" id="btn-mua">
                            </button>
                        </div>

                    </div>
                </div>
            </form>


        </div>
    </main>

    <?php include "footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="./plugin/Carousel/dist/owl.carousel.min.js"></script>
    <script src="./JS/main.js"></script>


</body>

</html>