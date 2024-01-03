<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/dangnhap.css">
</head>
<?php
require "./connect.php";
if (isset($_SESSION["dangnhap"])) {
    unset($_SESSION["dangnhap"]);
}
if (isset($_SESSION["admin"])) {
    unset($_SESSION["admin"]);
}
if (isset($_POST['submit'])) {
    $user = isset($_POST['Username']) ? $_POST['Username'] : "";
    $pass = isset($_POST['Password']) ? $_POST['Password'] : "";

    if ($user == "admin" && $pass == "admin") {
        $_SESSION["admin"] = [];
        $_SESSION["admin"][0] = 'admin';

        header("location:admin/trangchu.php");
    } else {

        $pass = md5($pass);
        $sql = "select TenDangNhap, MatKhau from nguoidung where TenDangNhap='$user' and MatKhau = '$pass'";

        if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) {

            $_SESSION["dangnhap"] = [];
            $_SESSION["dangnhap"][0] = $user;
            $_SESSION["dangnhap"][1] = $pass;
            header("location:index.php");
        } else {
            echo "Tên đăng nhập hoặc mật khẩu không chính xác";
        }
    }
}
?>

<body>
    <div class="content">
        <div class="container">
            <form class="form" action="dangnhap.php" method="post">
                <p class="title">Login</p>
                <input placeholder="Username" class="username input" name="Username" type="text">
                <input placeholder="Password" class="password input" name="Password" type="password">
                <button class="btn" name="submit" type="submit">Login</button>
                <div class="link">
                    <a href="index.php">Trang chủ</a>
                    <a href="dangki.php">Đăng kí</a>

                </div>
            </form>
        </div>
    </div>
    <style>
        .link{
            width: 100%;
            height: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .link a{
            margin: 0;
            padding: 0;
            width: 6rem;
            position: unset;
            text-align: center;
        }
    </style>
</body>

</html>