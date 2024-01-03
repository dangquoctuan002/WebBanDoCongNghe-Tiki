<?php
require "connect.php";
$sql = "";
if (isset($_GET['thuonghieu']) && isset($_GET['thutu']) && isset($_GET['madanhmuc'])) {
    if ($_GET['madanhmuc'] != "") {
        $madanhmuc = $_GET['madanhmuc'];
        if ($_GET['thuonghieu'] != "") {
            $thuonghieu = $_GET['thuonghieu'];
            if ($_GET['thutu'] == '1') {
                $sql = "select * from sanpham where ThuongHieu like N'%$thuonghieu%' and MadanhMuc = '$madanhmuc' order by Gia desc";
            } else if ($_GET['thutu'] == '2') {
                $sql = "select * from sanpham where ThuongHieu like N'%$thuonghieu%' and MadanhMuc = '$madanhmuc' order by Gia asc";
            } else {
                $sql = "select * from sanpham where ThuongHieu like N'%$thuonghieu%' and MadanhMuc = '$madanhmuc'";
            }
        } else {
            if ($_GET['thutu'] == '1') {
                $sql = "select * from sanpham where MadanhMuc = '$madanhmuc' order by Gia desc";
            } else if ($_GET['thutu'] == '2') {
                $sql = "select * from sanpham where MadanhMuc = '$madanhmuc' order by Gia asc";
            } else {
                $sql = "select * from sanpham where MadanhMuc = '$madanhmuc'";
            }
        }
    } else {
        if ($_GET['thuonghieu'] != "") {
            $thuonghieu = $_GET['thuonghieu'];
            if ($_GET['thutu'] == '1') {
                $sql = "select * from sanpham where ThuongHieu like N'%$thuonghieu%' order by Gia desc";
            } else if ($_GET['thutu'] == '2') {
                $sql = "select * from sanpham where ThuongHieu like N'%$thuonghieu%' order by Gia asc";
            } else {
                $sql = "select * from sanpham where ThuongHieu like N'%$thuonghieu%'";
            }
        } else {
            if ($_GET['thutu'] == '1') {
                $sql = "select * from sanpham order by Gia desc";
            } else if ($_GET['thutu'] == '2') {
                $sql = "select * from sanpham order by Gia asc";
            } else {
                $sql = "select * from sanpham";
            }
        }
    }
    $query = mysqli_query($conn, $sql);
    $total = mysqli_num_rows($query);

?>
    <input type="hidden" value="<?php echo "thuonghieu"; ?>">
    <?php while ($row = mysqli_fetch_array($query)) { ?>
        <a href="chitietsanpham.php?id=<?php echo $row['MaSanPham']; ?>">
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
                            <?php echo $row['TenSanPham']; ?>
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
                            <?php echo number_format($row['Gia']); ?>
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
    <?php } ?>
<?php } ?>
