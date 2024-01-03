<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/phanhoi.css">

    <title>Phản hồi</title>
</head>
<?php
require "../connect.php";
$result = mysqli_query($conn, 'select count(MaPhanHoi) as total from phanhoi');
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 5;

$total_page = ceil($total_records / $limit);
if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}
$start = ($current_page - 1) * $limit;

$result1 = mysqli_query($conn, "select phanhoi.*,TenDangNhap, TenNguoiDung from phanhoi, nguoidung where phanhoi.MaNguoiDung = nguoidung.ManguoiDung limit $start, $limit");

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
                    <li>
                        <a href="donhang.php">
                            <i class=""></i>
                            <span>Đơn hàng</span>
                        </a>
                    </li>
                    <li class="active">
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
                        <h4>Phản hồi</h4>
                    </div>
                </div>

                <div class="container">
                    <table cellpadding="5px" cellspacing="0" width="100%" bgcolor="#fff">
                        <tr class="tr">
                            <th>STT</th>
                            <th>Mã phản hồi</th>
                            <th>Tài khoản</th>
                            <th>Tên</th>
                            <th>Tiêu đề</th>
                           
                            <th>Xem</th>
                        </tr>
                        <?php while ($row = mysqli_fetch_array($result1)) {
                            $d++; ?>
                            <tr class="tr">
                                <?php $tt = $d + ($current_page - 1) * $limit; ?>
                                <td><?php echo $tt; ?></td>
                                <td><?php echo $row['MaPhanHoi']; ?></td>
                                <td><?php echo $row['TenDangNhap']; ?></td>
                                <td><?php echo $row['TenNguoiDung']; ?></td>
                                <td><?php echo $row['TieuDe']; ?></td>
                             

                                <td><a href=""><img src="../image/icons8-view-25.png" alt=""></a>
                                    
                                </td>
                            </tr>


                        <?php } ?>

                    </table>
                    <span class="phantrang">
                        <!-- <a href="" class="them"><button>Thêm sản phẩm</button></a> -->
                        <?php
                        if ($current_page > 1 && $total_page > 1) {
                            echo '<a href="sanpham.php?page=' . ($current_page - 1) . '"><button>Prev</button></a>';
                        }
                        for ($i = 1; $i <= $total_page; $i++) {
                            if ($i == $current_page) {
                                echo '<a> <button>' . $i . '</button></a>';
                            } else {
                                echo '<a href="sanpham.php?page=' . $i . '"><button>' . $i . '</button></a>';
                            }
                        }
                        if ($current_page < $total_page && $total_page > 1) {
                            echo '<a href="sanpham.php?page=' . ($current_page + 1) . '"><button>Next</button></a>';
                        }
                        ?>
                    </span>

                </div>
        </main>



    </div>
</body>

</html>