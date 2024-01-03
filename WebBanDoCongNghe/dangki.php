<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./style/style.css"> -->
    <link rel="stylesheet" href="./style/dangki.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Người dùng</title>
</head>
<?php
require "./connect.php";
function test_username($str)
{
    return (preg_match('/[a-zA-Z][a-zA-Z0-9_]{4,12}/', $str) ? true : false);
}
function test_password($str)
{
    return (preg_match('/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%&-_])[a-zA-Z0-9!@#$%&-_]{8,}/', $str) ? true : false);
}
function test_phone($str)
{
    return (preg_match('/\d{8,}/', $str) ? true : false);
}

if (isset($_POST['btn-insert-user'])) {
    if (test_username($_POST['tendangnhap'])) {
        $tendangnhap =  addslashes($_POST['tendangnhap']);
        if (test_password($_POST['matkhau'])) {
            $matkhau = addslashes(md5($_POST['matkhau']));
            if (isset($_POST['tennguoidung'])) {
                $tennguoidung = $_POST['tennguoidung'];
                if (test_phone($_POST['sodienthoai'])) {
                    $sodienthoai = addslashes($_POST['sodienthoai']);
                    $nhaplaimatkhau = addslashes(md5($_POST['nhaplaimatkhau']));
                    if ($matkhau == $nhaplaimatkhau) {
                        $resurt = mysqli_query($conn, "select * from nguoidung where TenDangNhap = '$tendangnhap'");
                        if (mysqli_num_rows($resurt) == 0) {
                            $sql = "INSERT INTO nguoidung(TenDangNhap,MatKhau, TenNguoiDung, SoDienThoai) 
                                    VALUES ('$tendangnhap','$matkhau','$tennguoidung','$sodienthoai')";
                            $query = mysqli_query($conn, $sql);
                            if ($query) {
                                header("location:dangnhap.php");
                            } else {
                                echo "lỗi";
                            }
                        } else {
                            echo "<script> alert('Người dùng đã tồn tại');
                            window.history.go(-1);</script>";
                        }
                    } else {
                        echo "Mật khẩu không trùng khớp";
                    }
                } else {
                    echo "Sai định dạng số điện thoại";
                }
            } else {
                echo "Sai định dạng tên người dùng";
            }
        } else {
            echo "Sai định dạng mật khẩu";
        }
    } else {
        echo "Sai định dạng tên đăng nhập";
    }
}
// $tendangnhap = test_username($_POST['tendangnhap']) ? addslashes($_POST['tendangnhap']) : "";
// $matkhau = test_password($_POST['matkhau']) ? addslashes(md5($_POST['matkhau'])) : "";
// $nhaplaimatkhau = addslashes(md5($_POST['nhaplaimatkhau']));
// $tennguoidung = isset($_POST['tennguoidung']) ? $_POST['tennguoidung'] : "";
// $sodienthoai = test_phone($_POST['sodienthoai']) ? addslashes($_POST['sodienthoai']) : "";
// if ($matkhau == $nhaplaimatkhau) {
//     $resurt = mysqli_query($conn, "select * from nguoidung where TenDangNhap = '$tendangnhap'");
//     if (mysqli_num_rows($resurt) == 0) {
//         $sql = "INSERT INTO nguoidung(TenDangNhap,MatKhau, TenNguoiDung, SoDienThoai) 
//                 VALUES ('$tendangnhap','$matkhau','$tennguoidung','$sodienthoai')";
//         $query = mysqli_query($conn, $sql);
//         if ($query) {
//             header("location:index.php");
//         } else {
//             echo "lỗi";
//         }
//     } else {
//         echo "nguoi dung da ton tai";
//     }
// } else {
//     echo "Mật khẩu không trùng khớp";
// }

?>

<body>

    <div class="content">
        <div class="container">
            <div>
                <form class="form" action="dangki.php" method="post">
                    <div class="form-user">
                        <div>
                            <label for="">Tên đăng nhập</label><span>*</span> <br>
                            <input type="text" name="tendangnhap" required class="username input" id="tendangnhap" placeholder="Tên đăng nhập">
                        </div>

                        <div>
                            <label for="">Mật khẩu</label><span>*</span> <br>
                            <input type="password" name="matkhau" required class="password input" id="matkhau" placeholder="Mật khẩu">
                        </div>
                        <div>
                            <label for="">Mật khẩu</label><span>*</span> <br>
                            <input type="password" name="nhaplaimatkhau" required class="password input" id="nhaplaimatkhau" placeholder="Nhập lại Mật khẩu">
                        </div>
                        <div>
                            <label for="">Họ và tên</label><span>*</span> <br>
                            <input type="text" name="tennguoidung" id="tennguoidung" required class="hovaten input" placeholder="Họ và tên">
                        </div>
                        <div>
                            <label for="">Số điện thoại</label> <span>*</span> <br>
                            <input type="text" name="sodienthoai" id="sodienthoai" required class="sodienthoai input" placeholder="Số điện thoại">
                        </div>

                        <div>
                            <button id="btn-insert-user" class="btn" name="btn-insert-user" type="submit">Đăng kí</button>
                        </div>

                    </div>
                </form>
                <div class="dangnhap">
                    <button><a href="dangnhap.php">Đăng nhập</a></button>
                </div>
            </div>


        </div>

    </div>

</body>

</html>
<style>

    .dangnhap button{

    height: 30px;
    background: black;
    /* border-radius: 30px; */
    width: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.dangnhap button a{
margin: 0;
padding: 0;
width: 68px;
    position: unset;

}
</style>
<!-- 
<p class="title">Login</p>
                <input placeholder="Username" class="username input" name="Username" type="text">
                <input placeholder="Password" class="password input" name="Password" type="password">
                <a href="">Đăng kí</a>
                <button class="btn" name="submit" type="submit">Login</button>



 -->