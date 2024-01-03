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
$id = $_GET['id'];
$sql1 = mysqli_query($conn, "select * from danhmuc where MaDanhMuc = '$id'");
$data = mysqli_fetch_array($sql1);
$err = "";
if (isset($_POST['btn-insert'])) {
    $id = $_POST['madanhmuc'];
    $danhmuc = $_POST['tendanhmuc'];


        if (isset($_FILES['anh'])) {
            $file = $_FILES['anh'];
            $filename = $file['name'];
            move_uploaded_file($file['tmp_name'], '../image/list-image-category/' . $filename);
        }
        $sql = "update danhmuc set TenDanhMuc = '$danhmuc', AnhCon = '$filename' where danhmuc.MaDanhMuc = '$id'";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            header("location:danhmuc.php");
        } else {
            echo "<script> alert('them dữ liệu thất bại'); </script>";
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
                    <li class="active">
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
                        <h4>Sửa danh mục</h4>
                    </div>
                </div>

                <div class="container">
                    <div class="form-insert">
                        <form action="suadanhmuc.php" method="post" enctype="multipart/form-data">
                            <div class="insert-image">
                                <label for="">Ảnh sản phẩm (*)</label> <br>
                                <span class="preview">
                                    <img src="../image/list-image-category/<?php echo $data['AnhCon']; ?>" alt="" width="120px" height="120px">
                                </span>
                                <input type="file" name="anh" id="fileInput" class="a">
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
                                                `<img src="${url}" alt="${file.name}" class="preview-img" width="200px"/>`
                                            )
                                        }
                                    })
                                </script>

                            </div>
                            <div class="insert-title">
                                <input type="hidden" name="madanhmuc" value="<?php echo $data['MaDanhMuc']; ?>">
                                <label for="">Tên danh mục (*)</label> <br>
                                <input type="text" name="tendanhmuc" required id="tendanhmuc" class="input-title" placeholder="Tên danh mục" value="<?php echo $data["TenDanhMuc"]; ?>">
                                <span><?php echo isset($err) ? $err : ""; ?></span>
                                <br>
                                <button id="btn-insert" type="submit" name="btn-insert">Sửa</button>
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