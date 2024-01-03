<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/danhmuc.css">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<?php
require "../connect.php";
$result = mysqli_query($conn, 'select count(MaDanhMuc) as total from danhmuc');
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

$result1 = mysqli_query($conn, "select * from danhmuc limit $start, $limit");
if (mysqli_num_rows($result1) == 0) {
    echo "chưa có danh mục nào";
}
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
                    <li class="active">
                        <a>
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
                        <h4>Danh sách danh mục</h4>
                    </div>
                </div>

                <div class="container">
                    <table cellpadding="5px" cellspacing="0" width="100%" bgcolor="#fff">
                        <tr>
                            <th>STT</th>
                            <th>Mã danh mục</th>
                            <th>Tên danh mục</th>
                            <th>Ảnh</th>
                            <th>Tác vụ</th>
                        </tr>

                        <?php while ($row = mysqli_fetch_array($result1)) {
                            $d++; ?>
                            <tr>
                                <?php $tt = $d + ($current_page - 1) * $limit; ?>
                                <td><?php echo $tt; ?></td>
                                <td><?php echo $row['MaDanhMuc']; ?></td>
                                <td><?php echo $row['TenDanhMuc']; ?></td>
                                <td><img src="../image/list-image-category/<?php echo $row['AnhCon']; ?>" width="25px"></td>
                                <td><a href="suadanhmuc.php?id=<?php echo $row['MaDanhMuc']; ?>"><img src="../image/icons8-edit-22.png" alt="" width="22px" height="22px"></a>
                                    <a href="xoadanhmuc.php?id=<?php echo $row['MaDanhMuc']; ?>" onclick="return kt();"><img src="../image/icons8-remove-22.png" alt=""></a>
                                </td>
                            </tr>

                        <?php } ?>
                    </table>
                    <a href="themdanhmuc.php" class="them"><button>Thêm danh mục</button></a>
                    <span class="phantrang">

                        <?php
                        if ($current_page > 1 && $total_page > 1) {
                            echo '<a href="danhmuc.php?page=' . ($current_page - 1) . '"><button>Prev</button></a>';
                        }
                        for ($i = 1; $i <= $total_page; $i++) {
                            if ($i == $current_page) {
                                echo '<a> <button>' . $i . '</button></a>';
                            } else {
                                echo '<a href="danhmuc.php?page=' . $i . '"><button>' . $i . '</button></a>';
                            }
                        }
                        if ($current_page < $total_page && $total_page > 1) {
                            echo '<a href="danhmuc.php?page=' . ($current_page + 1) . '"><button>Next</button></a>';
                        }
                        ?>
                    </span>
                </div>

                <div class="footer">
                    2021 © Ample Admin
                </div>

            </div>
        </main>

        <script>
            function kt() {
                return confirm("bạn có chắc chắn muốn xóa ko ? ");
            }
        </script>

    </div>
</body>

</html>