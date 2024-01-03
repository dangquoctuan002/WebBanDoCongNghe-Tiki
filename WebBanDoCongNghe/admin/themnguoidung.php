<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/nguoidung.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Người dùng</title>
</head>
<?php
require "../connect.php";
if (isset($_POST['btn-insert-user'])) {

    $tendangnhap = $_POST['tendangnhap'];
    $matkhau = $_POST['matkhau'];
    $tennguoidung = $_POST['tennguoidung'];
    $gioitinh = $_POST['gioitinh'];
    $email = $_POST['email'];
    $sodienthoai = $_POST['sodienthoai'];
    $diachi = $_POST['diachi'];
    $thoigiantao = date('Y/m/d');

    $resurt = mysqli_query($conn, "select * from nguoidung where TenDangNhap = '$tendangnhap'");
    if (mysqli_num_rows($resurt) == 0) {
        if (isset($_FILES['anh'])) {
            $file = $_FILES['anh'];
            $filename = $file['name'];
            move_uploaded_file($file['tmp_name'], '../image/list-image-user/' . $filename);
        }
        $matkhau = md5($matkhau);
        $sql = "INSERT INTO nguoidung(TenDangNhap,MatKhau, TenNguoiDung, GioiTinh, Email, SoDienThoai, DiaChi, ThoiGianTao, AnhCon) 
                    VALUES ('$tendangnhap','$matkhau','$tennguoidung','$gioitinh','$email','$sodienthoai','$diachi','$thoigiantao','$filename')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            header("location:nguoidung.php");
        } else {
            echo "lỗi";
        }
    } else {
        echo "nguoi dung da ton tai";
    }
}
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
                    <li>
                        <a href="phanhoi.php">
                            <i class=""></i>
                            <span>Phản hồi</span>
                        </a>
                    </li>
                    <li class="active">
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
                        <h4>Thêm người dùng</h4>
                    </div>
                </div>

                <div class="container ct-is">
                    <div class="form-insert-user">
                        <form action="themnguoidung.php" method="post" enctype="multipart/form-data">
                            <h2>Thông tin người dùng</h2>
                            <div class="form-user">
                                <div>
                                    <div>
                                        <!-- <label for="">Avata</label><span>*</span> <br>
                                        
                                        <input type="file" name="" id=""> -->
                                        <label for="">Avata</label><span>*</span>
                                        <div class="preview">
                                            <img src="/image/qq.jpg" alt="" width="120px" height="120px">
                                        </div>
                                        <input type="file" class="form-control mb-4 a" name="anh" id="fileInput" />
                                        <script>
                                            const ipnFileElement = document.querySelector('.a')
                                            const resultElement = document.querySelector('.preview')
                                            const validImageTypes = ['image/gif', 'image/jpeg', 'image/png']

                                            ipnFileElement.addEventListener('change', function(e) {
                                                const files = e.target.files
                                                const file = files[0]
                                                const fileType = file['type']

                                                if (!validImageTypes.includes(fileType)) {
                                                    resultElement.insertAdjacentHTML(
                                                        'beforeend',
                                                        '<span class="preview-img">Chọn ảnh đi :3</span>'
                                                    )
                                                    return
                                                }
                                                const fileReader = new FileReader()
                                                fileReader.readAsDataURL(file)
                                                resultElement.innerHTML = "";
                                                fileReader.onload = function() {
                                                    const url = fileReader.result
                                                    resultElement.insertAdjacentHTML(
                                                        'beforeend',
                                                        `<img src="${url}" alt="${file.name}" class="preview-img" />`
                                                    )
                                                }
                                            })
                                        </script>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <label for="">Tên đăng nhập</label><span>*</span> <br>
                                        <input type="text" name="tendangnhap" id="tendangnhap" required placeholder="Tên đăng nhập">
                                    </div>

                                    <div>
                                        <label for="">Mật khẩu</label><span>*</span> <br>
                                        <input type="text" name="matkhau" id="matkhau" required placeholder="Mật khẩu">
                                    </div>
                                    <div>
                                        <label for="">Họ và tên</label><br>
                                        <input type="text" name="tennguoidung" id="tennguoidung" placeholder="Họ và tên">
                                    </div>
                                    <div class="form-user-gender">
                                        <label for="">Giới tính</label> <br>
                                        <input type="radio" name="gioitinh" id="" value="Nam" checked> Nam
                                        <input type="radio" name="gioitinh" id="" value="Nữ"> Nữ
                                    </div>
                                    <div>
                                        <label for="">Email</label> <br>
                                        <input type="text" name="email" id="email" placeholder="Email">
                                    </div>
                                    <div>
                                        <label for="">Số điện thoại</label><span>*</span> <br>
                                        <input type="text" name="sodienthoai" id="sodienthoai" required placeholder="Số điện thoại">
                                    </div>


                                    <div>
                                        <label for="">Địa chỉ</label><br>
                                        <textarea name="diachi" id="diachi" cols="70" rows="5"></textarea>
                                    </div>
                                    <div>
                                        <button id="btn-insert-user" name="btn-insert-user" type="submit">Thêm</button>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>


                </div>

                <div class="footer">

                    2021 © Ample Admin
                </div>

            </div>
        </main>


    </div>
</body>

</html>