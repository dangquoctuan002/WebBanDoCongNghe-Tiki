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
    <script type="text/javascript" src="./JS/jquery-3.7.1.min.js"></script>

    <link rel="stylesheet" href="./style/sanpham.css">
    <link rel="stylesheet" href="./style/style.css">

</head>
<?php
require "connect.php";
$sql = mysqli_query($conn, "select * from danhmuc");
$sql2 = "";
if (isset($_GET['madanhmuc'])) {
    $sql2 = "select * from sanpham where MaDanhMuc = " . $_GET['madanhmuc'];
} else {
    $sql2 = "select * from sanpham";
}

$sanpham = mysqli_query($conn, $sql2);

//Bước 2: tìm tổng số bản ghi
$total_record = mysqli_num_rows($sanpham);

// $sql1="select count(id) as total from nguoidung";
// $query1=mysqli_query($conn,$sql1);
// $row1=mysqli_fetch_array($query1);
// $total_record=$row1['total'];
//Bước 3: gán số bản ghi trên 1 trang, tìm tổng số trang

$limit = 20;

$total_page = ceil($total_record / $limit);

//Bước 4: xác định trang hiện tại, bản ghi bắt đầu 1 trang

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

if ($current_page > $total_page)
    $current_page = $total_page;
else if ($current_page < 1)
    $current_page = 1;

$start = ($current_page - 1) * $limit;
//Bước 5: Truy vấn lấy danh sách
$sql1 =  $sql2 . "  limit $start,$limit";

$sanpham = mysqli_query($conn, $sql1);
$num = mysqli_num_rows($sanpham);

?>



<script type="text/javascript">
    $(document).ready(function() {
        $('#thuonghieu').change(function() {
            lay_sp()
        })
        $('#thutu').change(function() {
            lay_sp()
        })
    })

    function lay_sp() {
        $.ajax({
            type: "GET",
            url: "xuly_sanpham.php",
            data: "thuonghieu=" + $('#thuonghieu').val() +
                "&thutu=" + $('#thutu').val() +
                "&madanhmuc=" + $('#madanhmuc').val(),
            success: function(abc) {
                $('#product-item').html(abc);
            }
        })
    }
</script>

<body>

    <?php include "header.php"; ?>

    <main>
        <div class="content">

            <?php include "sitebar.php"; ?>

            <div class="container">
                <form action="" method="get">
                    <div class="header-locsp">
                        <div>
                            <input type="hidden" id="madanhmuc" name="madanhmuc" value="<?php echo isset($_GET['madanhmuc']) ? $_GET['madanhmuc'] : ""; ?>">
                            <h3> <?php
                                    if (isset($_GET['madanhmuc'])) {
                                        $q = mysqli_query($conn, "select * from danhmuc where MaDanhMuc = " . $_GET['madanhmuc']);
                                        echo $qq = mysqli_fetch_array($q)['TenDanhMuc'];
                                    } else {
                                        echo "Danh sách sản phẩm";
                                    }
                                    ?>

                            </h3>
                        </div>
                        <div class="thuonghieu">
                            <label for="">Thương hiệu</label>
                            <select name="thuonghieu" id="thuonghieu">
                                <option value=""></option>
                                <option value="Xixa">Xixa</option>
                                <option value="Xiaomi">Xiaomi</option>
                                <option value="Mijia">Mijia</option>
                                <option value="Bear">Bear</option>
                                <option value="Yeelight">Yeelight</option>
                            </select>
                        </div>
                        <div class="sapxep">
                            <label for="">Giá: </label>
                            <select name="thutu" id="thutu">
                                <option value=""></option>
                                <option value="1">Từ cao đến thấp</option>
                                <option value="2">Từ thấp đến cao</option>
                            </select>
                        </div>
                    </div>
                </form>
                <div class="ctn-product-selling">
                    <div class="products-items">
                        <div class="product-item" id="product-item">
                            <?php
                            if($num > 0){
                            while ($row = mysqli_fetch_array($sanpham)) {
                            ?>
                                <a href="chitietsanpham.php?id=<?php echo $row['MaSanPham']; ?> ">
                                    <span>
                                        <div class="product-image">
                                            <img src="./image/list-image-product/<?php echo $row['AnhCon']; ?>" alt="">
                                        </div>
                                        <div>
                                            <div class="product-genuine">
                                                <img src="./image/chinhhang.png" alt="">
                                            </div>
                                            <div class="product-name">
                                                <h3>
                                                    <?php
                                                    echo $row['TenSanPham'];
                                                    ?>
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
                                                    <?php
                                                    echo number_format($row['Gia']);
                                                    ?>
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
                            <?php
                            }
                        }
                            ?>
                        </div>
                    </div>
                </div>
                <div  class="phantrang">
                    <?php
                    if($total_page>1 && $current_page>1)
                    	echo "<a href='sanpham.php?page=".($current_page-1)."' page='".($current_page-1)."'> << </a>";
                    for($i=1; $i<=$total_page; $i++)
                    	if($i==$current_page)
                    		echo "<a> $i </a>";
                    	else
                    		echo "<a href='sanpham.php?page=".($i)."' page='$i'> {$i}</a>";
                    if($total_page>1 && $current_page<$total_page)
                    	echo "<a href='sanpham.php?page=".($current_page+1)."' page='".($current_page+1)."'> >> </a>";
                    ?>
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