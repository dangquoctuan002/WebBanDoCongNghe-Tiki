<?php
// Connect Database
require "./connect.php";


$result = mysqli_query($conn, 'select COUNT(MaSanPham) AS total from sanpham');
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];

$current_page = $_GET['page'];
$limit = $_GET['limit'];

$total_page = ceil($total_records / $limit);
if ($current_page > $total_page) {
     $current_page = $total_page;
} else if ($current_page < 1) {
     $current_page = 1;
}
$start = ($current_page - 1) * $limit;

$result1 = mysqli_query($conn, "select * from sanpham limit $start, $limit");
$num = mysqli_num_rows($result1);
// Biến result
$json = array();
$d = 0;
if ($num > 0 && $d < $num) {
     while ($row = mysqli_fetch_array($result1)) {
          $d++;
          $json[] = array(
               'masanpham' => $row['MaSanPham'],
               'tensanpham' => $row['TenSanPham'],
               'danhgia' => $row['DanhGia'],
               'gia' => $row['Gia'],
               'anh' => $row['AnhCon'],
          );
     }
}


die(json_encode($json));
?>




























































<div class="product-button"><img src="./image/new.png" alt=""><span>Giao siêu tốc 2h</span></div></span></a>