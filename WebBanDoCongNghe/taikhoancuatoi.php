<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./plugin/Carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./plugin/Carousel/dist/assets/owl.theme.default.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./JS/jquery-3.7.1.min.js"></script>


    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/taikhoancuatoi.css">

    <title>Document</title>
</head>



<body>
    <?php include "header.php"; ?>
    <?php
    if (!isset($_SESSION["dangnhap"])) {
        header('location: index.php');
    }
    require "./connect.php";
    $tendangnhap = $_SESSION['dangnhap'][0];
    $sql1 = mysqli_query($conn, "select * from nguoidung where TenDangNhap='$tendangnhap'");
    $data = mysqli_fetch_array($sql1);


    if (isset($_POST['btn-insert-user'])) {
        $manguoidung = $_POST['manguoidung'];
        $tendangnhap = $_POST['tendangnhap'];

        $tennguoidung = $_POST['tennguoidung'];
        $gioitinh = $_POST['gioitinh'];
        $email = $_POST['email'];
        $sodienthoai = $_POST['sodienthoai'];
        $diachi = $_POST['diachi'];

        if (isset($_FILES['anh'])) {
            $file = $_FILES['anh'];
            $filename = $file['name'];
            move_uploaded_file($file['tmp_name'], './image/list-image-user/' . $filename);
        }

        $sql = "UPDATE nguoidung SET TenNguoiDung = '$tennguoidung', GioiTinh='$gioitinh',Email='$email',
        SoDienThoai = '$sodienthoai', DiaChi='$diachi', AnhCon = '$filename'
        WHERE TenDangNhap='$tendangnhap'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "<script> alert('cap nhat thanh cong'); </script>";
        } else {
            echo "lỗi";
        }
    }

    ?>
    <main>
        <div class="content">
            <div class="container ct-is">
                <div class="form-insert-user">
                    <form action="taikhoancuatoi.php" method="post" enctype="multipart/form-data">
                        <h2>Tài khoản của tôi</h2>
                        <div class="form-user">
                            <div>
                                <div>
                                    <label for="">Avata</label>
                                    <div class="preview">
                                        <img src="./image/list-image-user/<?php echo $data['AnhCon']; ?>" alt="" width="120px" height="120px">
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
                                                    '<span class="preview-img">Chọn ảnh đi :4`</span>'
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
                                    <label for="tendangnhap">Tên đăng nhập</label> <br>
                                    <input type="text" name="tendangnhap" id="tendangnhap" readonly placeholder="Tên đăng nhập" value="<?php echo $data['TenDangNhap']; ?>">
                                </div>

                                <div>
                                    <label for="matkhau">Mật khẩu</label> <br>
                                    <input type="text" name="matkhau" readonly id="matkhau" placeholder="Mật khẩu" value="*********">
                                </div>
                                <div>
                                    <label for="tennguoidung">Họ và tên</label><br>
                                    <input type="text" name="tennguoidung" id="tennguoidung" placeholder="Họ và tên" value="<?php echo $data['TenNguoiDung']; ?>">
                                </div>
                                <div class="form-user-gender">
                                    <label for="">Giới tính</label> <br>
                                    <input type="radio" name="gioitinh" value="Nam" <?php if ($data['GioiTinh'] == "Nam") echo "checked"; ?>> Nam
                                    <input type="radio" name="gioitinh" value="Nữ" <?php if ($data['GioiTinh'] != "Nam") echo "checked"; ?>> Nữ
                                </div>
                                <div>
                                    <label for="email">Email</label> <br>
                                    <input type="text" name="email" id="email" placeholder="Email" value="<?php echo $data['Email']; ?>">
                                </div>
                                <div>
                                    <label for="sodienthoai">Số điện thoại</label> <br>
                                    <input type="text" name="sodienthoai" id="sodienthoai" placeholder="Số điện thoại" value="<?php echo $data['SoDienThoai']; ?>">
                                </div>


                                <div>
                                    <label for="diachi">Địa chỉ</label><br>
                                    <textarea name="diachi" id="diachi" class="diachi" cols="70" rows="5"> <?php echo $data['DiaChi']; ?> </textarea>
                                </div>
                                <div>
                                    <button id="btn-insert-user" name="btn-insert-user" type="submit">Cập nhật</button>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="manguoidung" value="<?php echo $data['MaNguoiDung']; ?>">
                    </form>
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