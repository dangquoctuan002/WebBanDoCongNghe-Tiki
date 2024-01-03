<?php session_start(); ?>

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
function test_password($str)
{
    return (preg_match('/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%&-_])[a-zA-Z0-9!@#$%&-_]{8,}/', $str) ? true : false);
}

$ten = $_SESSION['dangnhap'][0];
$sql = mysqli_query($conn, "select * from nguoidung where TenDangNhap = '$ten'");
$data = mysqli_fetch_array($sql);

if (isset($_POST['btn-insert-user'])) {
    $tendangnhap = $_POST['tendangnhap'];
    $matkhau = $_POST['matkhau'];
    $matkhaumoi = $_POST['matkhaumoi'];
    $nhaplaimatkhau = $_POST['nhaplaimatkhau'];

    if (md5($matkhau) == $data[2]) {
        if (test_password($_POST['matkhaumoi'])) {
            if ($matkhaumoi == $nhaplaimatkhau) {
                $matkhaumoi = md5($matkhaumoi);
                $sql = "update nguoidung set MatKhau = '$matkhaumoi' where TenDangNhap = '$tendangnhap'";
                $query = mysqli_query($conn, $sql);
                if ($query) {
                    header("location:index.php");
                } else {
                    echo "lỗi";
                }
            } else {
                echo "<script> alert('Mật khẩu không trùng khớp');window.history.go(-1);</script>";
            }
        } else {
            echo "<script> alert('Sai định dạng mật khẩu mới');window.history.go(-1);</script>";
        }
    } else {
        echo "<script> alert('Mật khẩu cũ không chính xác');window.history.go(-1);</script>";
    }

}
?>

<body>

    <div class="content">
        <div class="container">
            <form class="form" action="doimatkhau.php" method="post">
                <div class="form-user">
                    <div>
                        <label for="">Tên đăng nhập</label> <br>
                        <input type="text" name="tendangnhap" readonly value="<?php echo $data['TenDangNhap']; ?>" class="username input" id="tendangnhap" placeholder="Tên đăng nhập">
                    </div>

                    <div>
                        <label for="">Mật khẩu cũ</label> <br>
                        <input type="password" name="matkhau" required class="password input" id="matkhau" placeholder="Mật khẩu cũ">
                    </div>
                    <div>
                        <label for="">Mật khẩu mới</label> <br>
                        <input type="password" name="matkhaumoi" required class="password input" id="matkhaumoi" placeholder="Mật khẩu mới">
                    </div>
                    <div>
                        <label for="">Nhập lại mật khẩu</label> <br>
                        <input type="password" name="nhaplaimatkhau" required class="password input" id="nhaplaimatkhau" placeholder="Nhập lại Mật khẩu">
                    </div>

                    <div>
                        <button style="margin-top: 32px;" id="btn-insert-user" class="btn" name="btn-insert-user" type="submit">Đổi mật khẩu</button>
                    </div>
                    <div>
                        <a href="index.php"><button type="text" class="quaylai">Quay lại</button></a> <br>
                    </div>
                </div>
            </form>


        </div>
    </div>

</body>

</html>

<!-- 
<p class="title">Login</p>
                <input placeholder="Username" class="username input" name="Username" type="text">
                <input placeholder="Password" class="password input" name="Password" type="password">
                <a href="">Đăng kí</a>
                <button class="btn" name="submit" type="submit">Login</button>



 -->