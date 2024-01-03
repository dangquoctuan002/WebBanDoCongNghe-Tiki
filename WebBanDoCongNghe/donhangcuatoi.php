<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./plugin/Carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./plugin/Carousel/dist/assets/owl.theme.default.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./JS/jquery-3.7.1.min.js"></script>


    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/donhangcuatoi.css">

    <title>Document</title>
</head>



<body>
    <?php include "header.php"; ?>
    <?php
    if (!isset($_SESSION["dangnhap"])) {
        header('location: index.php');
    }
    require "./connect.php";
    $tendangnhap = $_SESSION['dangnhap'][0];
    $sql1 = mysqli_query($conn, "select * from nguoidung where TenDangNhap='$tendangnhap'");
    $manguoidung = mysqli_fetch_array($sql1)['MaNguoiDung'];

    $sql2 = mysqli_query($conn, "select * from donhang where MaNguoiDung='$manguoidung'");


    ?>
    <main>
        <div class="content">
            <h2>Lịch sử mua hàng</h2>
            <div>
                <div class="list-donhang">
                    <?php while ($dh = mysqli_fetch_array($sql2)) { ?>
                        <div class="donhang">
                            <div class="dh-name">
                                <div>
                                    <h4>Đơn hàng: #<?php echo $dh['MaDonHang']; ?></h4>
                                </div>
                                <div>
                                    <span><b>Ngày đặt: </b> <?php echo date('d-m-Y', strtotime($dh['NgayDatHang'])); ?></span>
                                </div>
                            </div>
                            <div class="list-sanpham">
                                <?php
                                $tongtien = 0;
                                $sql3 = mysqli_query($conn, "select sanpham.*, chitietdonhang.SoLuong, chitietdonhang.GiaSanPham 
                                from sanpham, chitietdonhang, donhang, nguoidung
                                where nguoidung.MaNguoiDung = donhang.MaNguoiDung and sanpham.MaSanPham =  chitietdonhang.MaSanPham and chitietdonhang.MaDonHang = donhang.MaDonHang and donhang.MaNguoiDung= $manguoidung and donhang.MaDonHang = $dh[0]");
                                while ($sp = mysqli_fetch_array($sql3)) {
                                ?>
                                    <div class="sanpham">
                                        <div class="product-thumbnail">
                                            <a href="">
                                                <span>
                                                    <img src="./image/list-image-product/<?php echo $sp['AnhCon']; ?>" alt="" width="80px" height="80px">
                                                </span>
                                            </a>
                                        </div>

                                        <div class="product-name" data-title="Sản phẩm">
                                            <a href=""> <?php echo $sp['TenSanPham']; ?> </a>
                                            <span class="">
                                                <bdi> <?php echo number_format($sp['GiaSanPham']); ?> <sup>₫</sup></bdi></span>
                                        </div>

                                        <div class="product-quantity" data-title="Số lượng">
                                            <span>Số lượng: <?php echo $sp['SoLuong']; ?></span>
                                        </div>

                                     
                                            <?php $tongtien +=  $sp['GiaSanPham'] * $sp['SoLuong']; ?>
                                      

                                    </div>
                                <?php } ?>
                                <div class="tongtien">
                                    <span><b>Tổng tiền: </b> <?php echo number_format($tongtien); ?> <sup>đ</sup></span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>

    <?php include "footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="./plugin/Carousel/dist/owl.carousel.min.js"></script>
    <script src="./JS/main.js"></script>


</body>

</html>