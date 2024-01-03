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
                        <h3>Thanh Toán</h3>
                    </div>
                    <div>
                        <a href="sanpham.php">Tiếp tục mua hàng</a>
                    </div>
                </div>
            </div>
            <form action="xuly_giohang.php" method="post">
                <div class="giohang_ct">
                    <?php $d = 0; ?>
                    <?php if (isset($_SESSION['giohang'])) { ?>
                        <table>
                            <?php foreach ($_SESSION['giohang'] as $row) { ?>
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="">
                                            <span>
                                                <img src="./image/list-image-product/<?php echo $row['anh']; ?>" alt="" width="130px" height="130px">
                                            </span>
                                        </a>
                                    </td>

                                    <td class="product-name" data-title="Sản phẩm">
                                        <a href=""> <?php echo $row['tensp']; ?> </a>
                                        <span class="">
                                            <bdi> <?php echo number_format($row['gia']); ?> <span>₫</span></bdi></span>
                                    </td>

                                    <td class="product-quantity" data-title="Số lượng">
                                        <a href="xuly_giohang.php?id=<?php echo $d; ?>">
                                            <input type="button" value="X" name="product_remove" class="product_remove">

                                        </a>
                                        <div>
                                            <div class="quality-input">
                                                <!-- <input type="button" value="-"> -->
                                                <div>
                                                    <input type="number" step="1" min="1" max="<?php echo $row['soluongtrongkho']; ?>" value="<?php echo $row['soluong']; ?>" title="SL" size="4" placeholder="" inputmode="numeric" name="soluong[<?php echo $row['id']; ?>]">
                                                </div>
                                                <!-- <input type="button" value="+"> -->
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <input type="text" value="<?php echo number_format($row['soluong'] * $row['gia']); ?>đ" name="product-price" class="product-price">
                                    </td>
                                </tr>
                                <?php $tongtien +=  $row['soluong'] * $row['gia'];
                                $d++; ?>
                            <?php } ?>

                            <tr class="price_num">
                                <td>
                                    <span>Tổng tiền</span>
                                </td>
                                <td>
                                    <span>
                                        <?php
                                        echo number_format($tongtien);

                                        ?>đ</span>
                                </td>

                            </tr>
                        </table>
                        <span class="update-button">
                            <input type="submit" value="Cập nhật" name="btn-update">
                        </span>

                    <?php  } else { ?>
                        <div style="height: 200px;">
                            <span>Chưa có sản phẩm</span>
                        </div>

                    <?php }


                    ?>

                </div>
            </form>
            <form action="xuly_giohang.php" method="post">

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
                                <input type="text" name="tongtien" id="tongtien" readonly value="<?php echo number_format($tongtien); ?>" class="tongtien"><sup>đ</sup>
                                <!-- <span style="text-align: right; color:red; display:block"> </span> -->
                            </div>
                        </div>
                        <div class="action5">
                            <button class="Btn" type="submit" name="btn-submit" id="btn-submit">
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