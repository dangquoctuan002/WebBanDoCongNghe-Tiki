<?php
session_start();
require "./connect.php";
if (isset($_POST['btn-insert-cart'])) {
    $id =  $_POST['id'];
    $soluong = $_POST['soluong'];
    // var_dump($_POST['id']); exit;
    $sql = mysqli_query($conn, "select * from sanpham where MaSanPham = '$id'");
    $data = mysqli_fetch_array($sql);
    $pro = array(array('id' => $data['MaSanPham'], 'tensp' => $data['TenSanPham'], 'gia' => $data['Gia'], 'soluong' => $soluong, 'anh' => $data['AnhCon'], 'soluongtrongkho' => $data['SoLuongTrongKho']));
    if (isset($_SESSION['giohang'])) {
        $p = false;
        foreach ($_SESSION['giohang'] as $key) {
            if ($key['id'] == $id) {
                $product[] = array('id' => $key['id'], 'tensp' => $key['tensp'], 'gia' => $key['gia'], 'soluong' => $key['soluong'] + $soluong, 'anh' => $key['anh'], 'soluongtrongkho' => $key['soluongtrongkho']);
                $p = true;
            } else {
                $product[] = array('id' => $key['id'], 'tensp' => $key['tensp'], 'gia' => $key['gia'], 'soluong' => $key['soluong'], 'anh' => $key['anh'], 'soluongtrongkho' => $key['soluongtrongkho']);
            }
        }
        if ($p == false) {
            $_SESSION['giohang'] = array_merge($product, $pro);
        } else {
            $_SESSION['giohang'] = $product;
        }
    } else {
        $_SESSION['giohang'] = $pro;
    }
    header('location: giohang.php');
}


if (isset($_POST['btn-update']) && isset($_SESSION['giohang'])) {
    foreach ($_SESSION['giohang'] as $a => $b) {
        foreach ($_POST['soluong'] as $k => $v) {
            if ($k == $b['id']) {
                $_SESSION['giohang'][$a]['soluong'] = $v;
            }
        }
    }
    header('location: giohang.php');
}

if (isset($_GET['id'])) {
    array_splice($_SESSION['giohang'], $_GET['id'], 1);
    if (count($_SESSION['giohang']) == 0) {
        unset($_SESSION['giohang']);
    }
    header('location: giohang.php');
}

if (isset($_POST['btn-submit'])) {
    // kiểm tra nếu đăng nhập rồi mới được đặt hàng
    if (isset($_SESSION['dangnhap'])) {
        // kiểm tra trong giỏ hàng đã có sản phẩm chưa
        if (isset($_SESSION['giohang'])) {
            require './connect.php';
            // Việc 1: Thêm dữ liệu vào bảng đơn hàng
            $sql = mysqli_query($conn, "select * from nguoidung where TenDangNhap = '" . $_SESSION['dangnhap'][0] . "'");
            $ng = mysqli_fetch_array($sql);
            $total = mysqli_query($conn, "SELECT * FROM donhang ORDER BY MaDonHang DESC LIMIT 1");

            $madonhang = mysqli_fetch_array($total)['MaDonHang'] + 1;
            $manguoidung = $ng['MaNguoiDung'];
            $tennguoidung = $_POST['hovaten'];
            $sodienthoai = $_POST['sodienthoai'];
            $ngaydathang = date('Y-m-d');
            $trangthai = 'Chưa xác thực';
            $tongtien = $_POST['tongtien'];
            $diachi = $_POST['diachi'];
            $ghichu = $_POST['ghichu'];

            $resurt = mysqli_query($conn, "insert into donhang(MaDonHang, MaNguoiDung, TenNguoiDung, SoDienThoai, NgayDatHang, TrangThai, TongTien, DiaChiGiaoHang, GhiChu)
             values ('$madonhang','$manguoidung','$tennguoidung','$sodienthoai','$ngaydathang','$trangthai','$tongtien','$diachi','$ghichu')");

            $da = mysqli_query($conn, "select * from sanpham where MaSanPham = '$masanpham'");
            $a = mysqli_fetch_array($da);
            if ($resurt) {
                // Việc 2: Thêm dữ liệu vào bảng chi tiết đơn hàng
                $tongtien = 0;
                foreach ($_SESSION['giohang'] as $key => $value) {
                    $masanpham = $value['id'];
                    $soluong = $value['soluong'];
                    $giasanpham = $value['gia'];
                    $thanhtien = $value['gia'] * $value['soluong'];
                    $tongtien += $thanhtien;

                    $resurt2 = mysqli_query($conn, "insert into chitietdonhang values ('$madonhang','$masanpham','$soluong','$giasanpham','$thanhtien')");

                    // Việc 3:khi đơn hàng được đặt sẽ phải trừ số lượng trong kho cho từng sản phẩm
                    $sql2 = mysqli_query($conn, "select SoLuongTrongKho from sanpham where MaSanPham = '$masanpham'");
                    $query2 = mysqli_fetch_array($sql2)['SoLuongTrongKho'];
                    $sl = $query2 - $soluong;
                    $resurt3 = mysqli_query($conn, "update sanpham set SoLuongTrongKho = '$sl' where MaSanPham = '$masanpham'");
                }

                // Việc 4: Xóa  session của giỏ hàng
                unset($_SESSION['giohang']);

                // Việc 5: hiện form đặt hàng thành công
                header('location: thanhtoan.php');
            } else {
                echo 'Thêm đơn hàng thất bại';
            }
        } else {
            echo "Chưa có sản phẩm";
        }
    } else {
        echo "Đăng nhập để mua hàng";
    }
}

if (isset($_POST['btn-muangay'])) {
    header('location: muangay.php?id=' . $_POST['id'] . '&soluong=' . $_POST['soluong'] . '');
}

if (isset($_POST['btn-mua'])) {
    if (isset($_SESSION['dangnhap'])) {
        // kiểm tra trong giỏ hàng đã có sản phẩm chưa
        require './connect.php';
        // Việc 1: Thêm dữ liệu vào bảng đơn hàng
        $sql = mysqli_query($conn, "select * from nguoidung where TenDangNhap = '" . $_SESSION['dangnhap'][0] . "'");
        $ng = mysqli_fetch_array($sql);
        $total = mysqli_query($conn, "SELECT * FROM donhang ORDER BY MaDonHang DESC LIMIT 1");

        $madonhang = mysqli_fetch_array($total)['MaDonHang'] + 1;
        $manguoidung = $ng['MaNguoiDung'];
        $tennguoidung = $_POST['hovaten'];
        $sodienthoai = $_POST['sodienthoai'];
        $ngaydathang = date('Y-m-d');
        $trangthai = 'Chưa xác thực';
        $tongtien = $_POST['tongtien'];
        $diachi = $_POST['diachi'];
        $ghichu = $_POST['ghichu'];

        $resurt = mysqli_query($conn, "insert into donhang(MaDonHang, MaNguoiDung, TenNguoiDung, SoDienThoai, NgayDatHang, TrangThai, TongTien, DiaChiGiaoHang, GhiChu)
             values ('$madonhang','$manguoidung','$tennguoidung','$sodienthoai','$ngaydathang','$trangthai','$tongtien','$diachi','$ghichu')");

        $da = mysqli_query($conn, "select * from sanpham where MaSanPham = '$masanpham'");
        $a = mysqli_fetch_array($da);
        if ($resurt) {
            // Việc 2: Thêm dữ liệu vào bảng chi tiết đơn hàng
            $masanpham = $_POST['id'];
            $soluong = $_POST['soluong'];
            $giasanpham = $_POST['product-price'];
            $thanhtien = $_POST['product-price'] * $_POST['soluong'];

            $resurt2 = mysqli_query($conn, "insert into chitietdonhang values ('$madonhang','$masanpham','$soluong','$giasanpham','$thanhtien')");

            // Việc 3:khi đơn hàng được đặt sẽ phải trừ số lượng trong kho cho từng sản phẩm
            $sql2 = mysqli_query($conn, "select SoLuongTrongKho from sanpham where MaSanPham = '$masanpham'");
            $query2 = mysqli_fetch_array($sql2)['SoLuongTrongKho'];
            $sl = $query2 - $soluong;
            $resurt3 = mysqli_query($conn, "update sanpham set SoLuongTrongKho = '$sl' where MaSanPham = '$masanpham'");

            // Việc 5: hiện form đặt hàng thành công
            header('location: thanhtoan.php');
        } else {
            echo 'Thêm đơn hàng thất bại';
        }
    } else {
        echo "Đăng nhập để mua hàng";
    }
}
