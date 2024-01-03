<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./plugin/Carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./plugin/Carousel/dist/assets/owl.theme.default.min.css">

   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="./style/index.css">
    <link rel="stylesheet" href="./style/style.css">
</head>
<?php
require "connect.php";
$sql = mysqli_query($conn, "select * from danhmuc");

?>

<body>

    <?php include "header.php"; ?>

    <main>
        <div class="content">
            
            <?php include "sitebar.php"; ?>

            <div class="container">
                <div class="ctn-header">
                    <div class="ctn-hd-slide">
                        <div class="sls-carousel">
                            <div class="owl-one owl-carousel owl-theme">
                                <div class="item">
                                    <img src="./image/baner-10-ruby.jpg" alt="" width="722px" height="240px">
                                </div>
                                <div class="item">
                                    <img src="./image/baner-10-ruby.jpg" alt="" width="722px" height="240px">
                                </div>
                                <div class="item">
                                    <img src="./image/baner-10-ruby.jpg" alt="" width="722px" height="240px">
                                </div>
                                <div class="item">
                                    <img src="./image/baner-10-ruby.jpg" alt="" width="722px" height="240px">
                                </div>
                                <div class="item">
                                    <img src="./image/baner-10-ruby.jpg" alt="" width="722px" height="240px">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ctn-hd-image">
                        <img src="./image/9d2a271347f66754c5e8e3d3a706c52c.png.webp" width="380px" height="240px" alt="">
                    </div>
                </div>
                <div class="ctn-aaa">
                    <div class="ctn-aaa-items">
                        <div>
                            <img src="./image/aaa.png" alt="" width="24px" height="24px">
                            <span>100% hàng chính hãng</span>
                        </div>
                        <div>
                            <img src="./image/bbb.png" alt="" width="24px" height="24px">
                            <span>Trợ lý cá nhân</span>
                        </div>
                        <div>
                            <img src="./image/ccc.png" alt="" width="24px" height="24px">
                            <span>Giao hành nhanh & đúng hẹn</span>
                        </div>
                    </div>
                </div>

                <div class="ctn-product-selling">
                    <div class="products-items">
                        <h3>Sản phẩm bán chạy</h3>
                        <div class="product-productTap">
                            <span>Bình giữ nhiệt</span>
                            <span>Sữa cho bé</span>
                            <span>sữa cho bố</span>
                            <span>sản phẩm khác</span>
                        </div>
                        <div class="product-item">
                            <a href="">
                                <span>
                                    <div class="product-image">
                                        <img src="./image/list-image/2.jpg" alt="">
                                    </div>
                                    <div>
                                        <div class="product-genuine">
                                            <img src="./image/chinhhang.png" alt="">
                                        </div>
                                        <div class="product-name">
                                            <h3>
                                                Đai đeo chống gù lưng Xixa
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
                                                190.000
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
                            <a href="">
                                <span>
                                    <div class="product-image">
                                        <img src="./image/list-image/2.jpg" alt="">
                                    </div>
                                    <div>
                                        <div class="product-genuine">
                                            <img src="./image/chinhhang.png" alt="">
                                        </div>
                                        <div class="product-name">
                                            <h3>
                                                Đai đeo chống gù lưng Xixa
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
                                                190.000
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
                            <a href="">
                                <span>
                                    <div class="product-image">
                                        <img src="./image/list-image/2.jpg" alt="">
                                    </div>
                                    <div>
                                        <div class="product-genuine">
                                            <img src="./image/chinhhang.png" alt="">
                                        </div>
                                        <div class="product-name">
                                            <h3>
                                                Đai đeo chống gù lưng Xixa
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
                                                190.000
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
                            <a href="">
                                <span>
                                    <div class="product-image">
                                        <img src="./image/list-image/2.jpg" alt="">
                                    </div>
                                    <div>
                                        <div class="product-genuine">
                                            <img src="./image/chinhhang.png" alt="">
                                        </div>
                                        <div class="product-name">
                                            <h3>
                                                Đai đeo chống gù lưng Xixa
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
                                                190.000
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
                            <a href="">
                                <span>
                                    <div class="product-image">
                                        <img src="./image/list-image/2.jpg" alt="">
                                    </div>
                                    <div>
                                        <div class="product-genuine">
                                            <img src="./image/chinhhang.png" alt="">
                                        </div>
                                        <div class="product-name">
                                            <h3>
                                                Đai đeo chống gù lưng Xixa
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
                                                190.000
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
                            <a href="">
                                <span>
                                    <div class="product-image">
                                        <img src="./image/list-image/2.jpg" alt="">
                                    </div>
                                    <div>
                                        <div class="product-genuine">
                                            <img src="./image/chinhhang.png" alt="">
                                        </div>
                                        <div class="product-name">
                                            <h3>
                                                Đai đeo chống gù lưng Xixa
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
                                                190.000
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
                    </div>
                </div>
                <div class="ctn-product-selling">
                    <div class="products-items">
                        <h3>Sản phẩm bán chạy</h3>
                        <div class="product-productTap">
                            <span>Bình giữ nhiệt</span>
                            <span>Sữa cho bé</span>
                            <span>sữa cho bố</span>
                            <span>sản phẩm khác</span>
                        </div>
                        <div class="product-item">
                            <div class="sls-carousel">
                                <div class="owl-two owl-carousel owl-theme">
                                    <div class="item">
                                        <a href="">
                                            <span>
                                                <div class="product-image">
                                                    <img src="./image/list-image/2.jpg" alt="">
                                                </div>
                                                <div>
                                                    <div class="product-genuine">
                                                        <img src="./image/chinhhang.png" alt="">
                                                    </div>
                                                    <div class="product-name">
                                                        <h3>
                                                            đai đeo chống gù lưng hiệu quả chất lương cao giá không đổi
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
                                                            190.000
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
                                    <div class="item">
                                        <a href="">
                                            <span>
                                                <div class="product-image">
                                                    <img src="./image/list-image/2.jpg" alt="">
                                                </div>
                                                <div>
                                                    <div class="product-genuine">
                                                        <img src="./image/chinhhang.png" alt="">
                                                    </div>
                                                    <div class="product-name">
                                                        <h3>
                                                            Đai đeo chống gù lưng Xixa
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
                                                            190.000
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
                                    <div class="item">
                                        <a href="">
                                            <span>
                                                <div class="product-image">
                                                    <img src="./image/list-image/2.jpg" alt="">
                                                </div>
                                                <div>
                                                    <div class="product-genuine">
                                                        <img src="./image/chinhhang.png" alt="">
                                                    </div>
                                                    <div class="product-name">
                                                        <h3>
                                                            Đai đeo chống gù lưng Xixa
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
                                                            190.000
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
                                    <div class="item">
                                        <a href="">
                                            <span>
                                                <div class="product-image">
                                                    <img src="./image/list-image/2.jpg" alt="">
                                                </div>
                                                <div>
                                                    <div class="product-genuine">
                                                        <img src="./image/chinhhang.png" alt="">
                                                    </div>
                                                    <div class="product-name">
                                                        <h3>
                                                            Đai đeo chống gù lưng Xixa
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
                                                            190.000
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
                                    <div class="item">
                                        <a href="">
                                            <span>
                                                <div class="product-image">
                                                    <img src="./image/list-image/2.jpg" alt="">
                                                </div>
                                                <div>
                                                    <div class="product-genuine">
                                                        <img src="./image/chinhhang.png" alt="">
                                                    </div>
                                                    <div class="product-name">
                                                        <h3>
                                                            Đai đeo chống gù lưng Xixa
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
                                                            190.000
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
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="ctn-product-selling">
                    <div class="products-items">
                        <h3>Sản phẩm bán chạy</h3>
                        <div class="product-productTap">
                            <span>Bình giữ nhiệt</span>
                            <span>Sữa cho bé</span>
                            <span>sữa cho bố</span>
                            <span>sản phẩm khác</span>
                        </div>
                        <div class="product-item">
                            <div class="sls-carousel">
                                <div class="owl-two owl-carousel owl-theme">
                                    <div class="item">
                                        <a href="">
                                            <span>
                                                <div class="product-image">
                                                    <img src="./image/list-image/2.jpg" alt="">
                                                </div>
                                                <div>
                                                    <div class="product-genuine">
                                                        <img src="./image/chinhhang.png" alt="">
                                                    </div>
                                                    <div class="product-name">
                                                        <h3>
                                                            đai đeo chống gù lưng hiệu quả chất lương cao giá không đổi
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
                                                            190.000
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
                                    <div class="item">
                                        <a href="">
                                            <span>
                                                <div class="product-image">
                                                    <img src="./image/list-image/2.jpg" alt="">
                                                </div>
                                                <div>
                                                    <div class="product-genuine">
                                                        <img src="./image/chinhhang.png" alt="">
                                                    </div>
                                                    <div class="product-name">
                                                        <h3>
                                                            Đai đeo chống gù lưng Xixa
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
                                                            190.000
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
                                    <div class="item">
                                        <a href="">
                                            <span>
                                                <div class="product-image">
                                                    <img src="./image/list-image/2.jpg" alt="">
                                                </div>
                                                <div>
                                                    <div class="product-genuine">
                                                        <img src="./image/chinhhang.png" alt="">
                                                    </div>
                                                    <div class="product-name">
                                                        <h3>
                                                            Đai đeo chống gù lưng Xixa
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
                                                            190.000
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
                                    <div class="item">
                                        <a href="">
                                            <span>
                                                <div class="product-image">
                                                    <img src="./image/list-image/2.jpg" alt="">
                                                </div>
                                                <div>
                                                    <div class="product-genuine">
                                                        <img src="./image/chinhhang.png" alt="">
                                                    </div>
                                                    <div class="product-name">
                                                        <h3>
                                                            Đai đeo chống gù lưng Xixa
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
                                                            190.000
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
                                    <div class="item">
                                        <a href="">
                                            <span>
                                                <div class="product-image">
                                                    <img src="./image/list-image/2.jpg" alt="">
                                                </div>
                                                <div>
                                                    <div class="product-genuine">
                                                        <img src="./image/chinhhang.png" alt="">
                                                    </div>
                                                    <div class="product-name">
                                                        <h3>
                                                            Đai đeo chống gù lưng Xixa
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
                                                            190.000
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
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="ctn-product-selling products-all">
                    <div class="products-items">
                        <h3>Danh sách sản phẩm</h3>
                        <div class="product-productTap">
                            <span>Bình giữ nhiệt</span>
                            <span>Sữa cho bé</span>
                            <span>sữa cho bố</span>
                            <span>sản phẩm khác</span>
                        </div>
                        <div class="product-item">
                            <div id="noidung"></div>

                            <script>
                                $(document).ready(function() {
                                    var page = 1;
                                    var limit =5;

                                    function loadproduct() {
                                        $.ajax({
                                            url: 'danhsachsanpham.php',
                                            type: 'GET',
                                            data: 'page=' + page + '&limit=' + limit,
                                            dataType: 'json',
                                            success: function(result) {
                                                var d = 0;
                                                var html = '';

                                                if (result.length > 0) {

                                                    $.each(result, function(key, item) {
                                                        d++;
                                                        html += '<a href="chitietsanpham.php?id='+ item['masanpham'] +'"><span><div class="product-image"> ';
                                                        html += '<img src="./image/list-image-product/'+item['anh']+'" alt="">';
                                                        html += '</div><div><div class="product-genuine"> ';
                                                        html += '<img src="./image/chinhhang.png" alt="">';
                                                        html += '</div><div class="product-name"><h3>';
                                                        html += '' + item['tensanpham'] + '';
                                                        html += '</h3></div><div class="product-rating"><div class="rating">';
                                                        html += '<input value="5" name="rating" id="star5" type="radio"><label for="star5"></label>';
                                                        html += '<input value="4" name="rating" id="star4" type="radio"><label for="star4"></label>';
                                                        html += '<input value="3" name="rating" id="star3" type="radio"><label for="star3"></label>';
                                                        html += '<input value="2" name="rating" id="star2" type="radio"><label for="star2"></label>';
                                                        html += '<input value="1" name="rating" id="star1" type="radio"><label for="star1"></label>';
                                                        html += '</div></div><div class="product-price"><span>';
                                                        html += '' + item['gia'] + '';
                                                        html += '</span><sup>đ</sup></div></div>';
                                                        html += '<div class="product-button"><img src="./image/new.png" alt=""><span>Giao siêu tốc 2h</span></div>';
                                                        html += '</span></a>';
                                                    });
                                                    page++;
                                                } else {
                                                    $('#btn-click').hide();
                                                }

                                                $('#noidung').append(html);
                                            }
                                        });
                                    };
                                    let i=0;
                                    loadproduct();
                                    
                                    $('#btn-click').on('click', function() {
                                        loadproduct();
                                    });
                                })
                            </script>
                        </div>
                        <button id="btn-click">Xem thêm</button>

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