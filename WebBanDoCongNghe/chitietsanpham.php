

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./plugin/Carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./plugin/Carousel/dist/assets/owl.theme.default.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/chitietsanpham.css">

    <title>Document</title>
</head>
<?php
require "connect.php";
$id = $_GET['id'];
$sql1 = mysqli_query($conn, "select sanpham.*, danhmuc.TenDanhMuc FROM sanpham, danhmuc WHERE sanpham.MaDanhMuc = danhmuc.MaDanhMuc and MaSanPham ='$id'");
$data = mysqli_fetch_array($sql1);

$sanphamtuongtu = mysqli_query($conn, "select * from sanpham where MaDanhMuc = '$data[10]'");





?>

<body>
    <?php include "header.php"; ?>

    <main>
        <div class="content">
            <div class="link-hd">
                <span>
                    <a href="index.php">Trang chủ</a>
                    >>
                    <a href="sanpham.php?madanhmuc=<?php echo $data['MaDanhMuc']; ?>"> <?php echo $data['TenDanhMuc']; ?> </a>
                    >>
                    <a href="#"> <?php echo $data['TenSanPham']; ?> </a>
                </span>
            </div>

            <div class="product-itemt">
                <div class="product-list-image">

                    <div class="list-img">

                    </div>
                    <div class="thumnai">
                        <div>
                            <img src="./image/list-image-product/<?php echo $data['AnhCon']; ?>" alt="">
                        </div>
                    </div>

                </div>

                <div class="product-detail">

                    <div class="thongtin">
                        <form action="xuly_giohang.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $data['MaSanPham']; ?>">
                            <div class="thongtin1">
                                <span> <?php echo $data['TenDanhMuc']; ?> </span>
                            </div>
                            <div class="thongtin2">
                                <span> <?php echo $data['TenSanPham']; ?> </span>
                            </div>
                            <div class="thongtin3">
                                <div>
                                    <span>Thương hiệu: </span>
                                    <span> <?php echo $data['ThuongHieu']; ?> </span>
                                </div>
                                <div>
                                    <span>Đánh giá: </span>
                                    <span> <?php echo $data['DanhGia']; ?> </span>
                                </div>
                                <div>
                                    <span>Số lượng tồn kho: </span>
                                    <span> <?php echo $data['SoLuongTrongKho']; ?> </span>
                                </div>
                            </div>
                            <div class="thongtin4">
                                <i class="fa fa-truck"></i>
                                <!-- <img src="./image/icons8-user-25.png" alt=""> -->
                                <span>Giảm 25k phí giao hàng cho đơn hàng từ 799K</span>
                            </div>
                            <div class="thongtin5">
                                <span> <?php echo number_format($data['Gia']); ?> <u>đ</u> </span>
                                <sup><strike> <?php echo number_format( $data['Gia'] * 100 / 90); ?> đ </strike></sup>

                            </div>
                            <div class="thongtin6">
                                <div class="soluong">
                                    <span>Số lượng: </span>
                                    <div>
                                        <!-- <span class="soluong_giam"> - </span> -->
                                        <input type="button" class="minus is-form" style="cursor: pointer;" value="-">
                                        <input type="number" aria-label="quantity" class="input-qty"  step="1" min="1" max="<?php echo $data['SoLuongTrongKho']; ?>" value="1" title="SL" size="4" placeholder="" inputmode="numeric" name="soluong">
                                        <input type="button" class="plus is-form" style="cursor: pointer;" value="+">
                                        <!-- <input type="text" value="1" name="soluong"> -->
                                        <!-- <span class="soluong_tang"> + </span> -->

                                        <script>
                                            $('input.input-qty').each(function(){
                                                var $this = $(this),
                                                qty = $this.parent().find('.is-form'),
                                                min = Number($this.attr('min')),
                                                max = Number($this.attr('max'));
                                                if(min == 0){
                                                    var d = 0;
                                                } else{
                                                    d = min;
                                                }
                                                $(qty).on('click', function(){
                                                    if($(this).hasClass('minus')){
                                                        if(d > min) d+= -1;
                                                    }else if($(this).hasClass('plus')){
                                                        var x = Number($this.val()) + 1;
                                                        if(x <= max){
                                                            d += 1;
                                                        }
                                                    }
                                                    $this.attr('value', d).val(d);
                                                })
                                            })
                                        </script>
                                    </div>
                                </div>
                                <div>
                                    <span>Tổng giá: </span>
                                    <span>1.365.000đ</span>
                                </div>
                            </div>
                            <div class="thongtin7">

                                <button class="btn-insert-cart" name="btn-insert-cart">
                                    <img src="./image/giohang.png" alt="">
                                    <h4>Thêm vào giỏ hàng</h4>
                                </button>
                                <button name="btn-muangay" class="btn-muangay">
                                    <h4>Mua ngay</h4>
                                </button>

                            </div>

                        </form>
                    </div>


                    <div class="camket">
                        <div class="HDJSKS">
                            <div>
                                <h4>
                                    Cam kết từ RUBY.VN
                                </h4>
                            </div>
                            <div>
                                <span>
                                    <i class="fa fa-shield"></i> <span>Bồi thường 111% nếu sai hàng </span> <br>
                                    <!-- <img src="./image/icons8-remove-22.png" alt=""><br> -->
                                </span>
                                <span>
                                    <i class="fa fa-wrench"></i><span>Thông tin bảo hành 1 năm </span> <br>
                                    <!-- <img src="" alt=""> <br> -->
                                </span>
                                <span>
                                    <i class="fa fa-undo"></i><span>Đổi trả trong vòng 7 ngày</span> <br>
                                    <!-- <img src="" alt="">  <br> -->
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wraper">
                <div class="wp-content">
                    <div class="mota">
                        <div>
                            <?php echo $data['MoTa']; ?>
                        </div>
                    </div>

                    <div class="thongso">
                        <div>
                            <?php
                            $sql2 = mysqli_query($conn, "select * from thongsokithuat where MaSanPham = '" . $data['MaSanPham'] . "' and TenThongSo !='' and GiaTri !=''");
                            $d = 0;
                            ?>
                            <table align="center" cellpadding="10px" cellspacing="0">
                                <caption>Thông số kĩ thuật</caption>
                                <?php while ($row = mysqli_fetch_array($sql2)) {
                                    $d++; ?>
                                    <tr <?php if ($d % 2 == 1) echo "bgcolor='#e3e3e3'"; ?>>
                                        <th><?php echo $row['TenThongSo']; ?>:</th>
                                        <td><?php echo $row['GiaTri']; ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>

                    <!-- <div class="banchaynhat">

                    </div> -->
                </div>
            </div>

            <div class="phanhoi">

            </div>
            <div class="sanphamtuongtu">
                <div class="ctn-product-selling">
                    <div class="products-items">
                        <h3>Sản phẩm tương tự</h3>
                        <div class="product-item">
                            <div class="sls-carousel">
                                <div class="owl-two owl-carousel owl-theme">
                                    <?php
                                    while ($sptt = mysqli_fetch_array($sanphamtuongtu)) {
                                    ?>
                                        <div class="item">
                                            <a href="">
                                                <span>
                                                    <div class="product-image">
                                                        <img src="./image//list-image-product/<?php echo $sptt['AnhCon']; ?>" alt="">
                                                    </div>
                                                    <div>
                                                        <div class="product-genuine">
                                                            <img src="./image/chinhhang.png" alt="">
                                                        </div>
                                                        <div class="product-name">
                                                            <h3>
                                                                <?php echo $sptt['TenSanPham']; ?>
                                                            </h3>
                                                        </div>
                                                        <div class="product-rating">
                                                            <div class="rating">
                                                                <input value="5" name="rating" id="star5" type="radio">
                                                                <label for="star5"></label>
                                                                <input value="4" name="rating" id="star4" type="radio">
                                                                <label for="star4"></label>
                                                                <input value="3" name="rating" id="star3" type="radio">
                                                                <label for="star3"></label>
                                                                <input value="2" name="rating" id="star2" type="radio">
                                                                <label for="star2"></label>
                                                                <input value="1" name="rating" id="star1" type="radio">
                                                                <label for="star1"></label>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">
                                                            <span>
                                                                <?php echo number_format($sptt['Gia']); ?>
                                                            </span>
                                                            <sup>đ</sup>
                                                        </div>
                                                    </div>
                                                    <div class="product-button">
                                                        <img src="./image/new.png" alt="">
                                                        <span>Giao siêu tốc 2h</span>
                                                    </div>
                                                </span>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
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