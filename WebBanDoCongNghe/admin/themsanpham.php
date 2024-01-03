<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript" src="../plugin/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="somedirectory/ckeditor/ckeditor.js"></script>

    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/sanpham.css">
    <title>Sản phẩm</title>
</head>
<?php
require "../connect.php";
$danhmuc = mysqli_query($conn, "select * from danhmuc");
if (isset($_POST['btn-submit'])) {
    $masanpham = $_POST['masanpham'];
    $dongia = $_POST['dongia'];
    $tensanpham = $_POST['tensanpham'];
    $soluong = $_POST['soluong'];
    $thuonghieu = $_POST['thuonghieu'];
    $danhmuc = $_POST['danhmuc'];
    $mota = $_POST['editor1'];
    $thoigiantao = date('Y-m-d');

    $resurt = mysqli_query($conn, "select * from sanpham where MaSanPham = '$masanpham'");
    if (mysqli_num_rows($resurt) == 0) {
        if (isset($_FILES['anh'])) {

            $file = $_FILES['anh'];
            $filename = $file['name'];
            move_uploaded_file($file['tmp_name'], '../image/list-image-product/' . $filename);
        }
        $sql = "INSERT INTO sanpham(MaSanPham,TenSanPham,MoTa, Gia, ThuongHieu, SoLuongTrongKho, ThoiGianTao, AnhCon, MaDanhMuc)
        VALUES ('$masanpham','$tensanpham','$mota','$dongia','$thuonghieu','$soluong','$thoigiantao','$filename','$danhmuc')";
        $query = mysqli_query($conn, $sql);
        if ($query) {

            $thongso1 = isset($_POST['thongso1']) ? $_POST['thongso1'] : "";
            $giatri1 = isset($_POST['giatri1']) ? $_POST['giatri1'] : "";

            $thongso2 = isset($_POST['thongso2']) ? $_POST['thongso2'] : "";
            $giatri2 = isset($_POST['giatri2']) ? $_POST['giatri2'] : "";

            $thongso3 = isset($_POST['thongso3']) ? $_POST['thongso3'] : "";
            $giatri3 = isset($_POST['giatri3']) ? $_POST['giatri3'] : "";

            $thongso4 = isset($_POST['thongso4']) ? $_POST['thongso4'] : "";
            $giatri4 = isset($_POST['giatri4']) ? $_POST['giatri4'] : "";

            $thongso5 = isset($_POST['thongso5']) ? $_POST['thongso5'] : "";
            $giatri5 = isset($_POST['giatri5']) ? $_POST['giatri5'] : "";

            $thongso6 = isset($_POST['thongso6']) ? $_POST['thongso6'] : "";
            $giatri6 = isset($_POST['giatri6']) ? $_POST['giatri6'] : "";

            $thongso7 = isset($_POST['thongso7']) ? $_POST['thongso7'] : "";
            $giatri7 = isset($_POST['giatri7']) ? $_POST['giatri7'] : "";

            $thongso8 = isset($_POST['thongso8']) ? $_POST['thongso8'] : "";
            $giatri8 = isset($_POST['giatri8']) ? $_POST['giatri8'] : "";

            $thongso9 = isset($_POST['thongso9']) ? $_POST['thongso9'] : "";
            $giatri9 = isset($_POST['giatri9']) ? $_POST['giatri9'] : "";

            $thongso10 = isset($_POST['thongso10']) ? $_POST['thongso10'] : "";
            $giatri10 = isset($_POST['giatri10']) ? $_POST['giatri10'] : "";

            $da = mysqli_query($conn, "select * from sanpham where MaSanPham = '$masanpham'");
            $a = mysqli_fetch_array($da);


            $sql2 = "INSERT INTO thongsokithuat(MaSanPham, TenThongSo, GiaTri)
                VALUES 
                ('$a[1]','$thongso1','$giatri1'),
                ('$a[1]','$thongso2','$giatri2'),
                ('$a[1]','$thongso3','$giatri3'),
                ('$a[1]','$thongso4','$giatri4'),
                ('$a[1]','$thongso5','$giatri5'),
                ('$a[1]','$thongso6','$giatri6'),
                ('$a[1]','$thongso7','$giatri7'),
                ('$a[1]','$thongso8','$giatri8'),
                ('$a[1]','$thongso9','$giatri9'),
                ('$a[1]','$thongso10','$giatri10')
                ";
            $query2 = mysqli_query($conn, $sql2);
            if ($query2) {
                header('location: sanpham.php');
            } else {
                echo "Looix";
            }
        }
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
                    <li class="active">
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
                        <h4>Thêm sản phẩm</h4>
                    </div>
                </div>

                <div class="container">
                    <form action="themsanpham.php" method="post" enctype="multipart/form-data">
                        <div class="form-insert-product">

                            <h2>Thông tin sản phẩm</h2>
                            <div class="form-product">
                                <div class="insert-image">
                                    <label for="">Ảnh sản phẩm</label> <br>
                                    <span class="preview">
                                        <img src="/image/qq.jpg" alt="" width="120px">
                                    </span>
                                    <input type="file" required name="anh" id="fileInput" class="a">
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
                                                    `<img src="${url}" alt="${file.name}" class="preview-img" width="120px"/>`
                                                )
                                            }
                                        })
                                    </script>
                                </div>


                                <div>
                                    <div>
                                        <label for="">Mã sản phẩm</label><span>*</span> <br>
                                        <input type="text" name="masanpham" id="masanpham" required placeholder="Mã sản phẩm">
                                    </div>
                                    <div>
                                        <label for="">Đơn giá</label><span>*</span> <br>
                                        <input type="text" name="dongia" id="dongia" required placeholder="Đơn giá">
                                    </div>

                                </div>
                                <div>
                                    <div>
                                        <label for="">Tên sản phẩm</label><span>*</span> <br>
                                        <input type="text" name="tensanpham" id="tensanpham" required placeholder="Tên sản phẩm">
                                    </div>
                                    <div>
                                        <label for="">Số lượng</label> <br>
                                        <input type="text" name="soluong" id="soluong" required placeholder="Số lượng">
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <label for="">Thương hiệu</label><br>
                                        <input type="text" name="thuonghieu" id="thuonghieu" required placeholder="Thương hiệu">
                                    </div>

                                    <div>
                                        <label for="">Danh mục</label><br>
                                        <select name="danhmuc" id="danhmuc">
                                            <?php while ($row = mysqli_fetch_array($danhmuc)) { ?>
                                                <option value="<?php echo $row['MaDanhMuc']; ?>"> <?php echo $row['TenDanhMuc']; ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="form-insert-detail">
                            <h2>Thông số kĩ thuật</h2>
                            <div class="thongso">
                                <div class="thongsokithuat">
                                    <div class="">
                                        <label for="">Thông số</label>
                                        <input type="text" name="thongso1" id="thongso1" placeholder="Thông số">
                                    </div>
                                    <div class="">
                                        <label for="">Giá trị</label>
                                        <input type="text" name="giatri1" id="giatri1" placeholder="Giá trị">
                                    </div>
                                </div>

                            </div>
                            <div>
                                <button type="button" class="button" id="btn-thongso">
                                    <span class="button__text">Add Item</span>
                                    <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg">
                                            <line y2="19" y1="5" x2="12" x1="12"></line>
                                            <line y2="12" y1="12" x2="19" x1="5"></line>
                                        </svg></span>
                                </button>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function() {
                                var count = 1;
                                var thongso = 1;
                                var giatri = 1;
                                $('#btn-thongso').click(function() {
                                    count++;
                                    thongso++;
                                    giatri++;
                                    if (count <= 10) {
                                        $('.thongso').append('<div class="thongsokithuat">' +
                                            '<div class="">' +
                                            '<label for="">Thông số</label>' +
                                            '<input type="text" required name="thongso' + thongso + '" id="thongso' + thongso + '" placeholder="Thông số">' +
                                            '</div>' +
                                            '<div class="">' +
                                            '<label for="">Giá trị</label>' +
                                            '<input type="text" required name="giatri' + giatri + '" id="giatri' + giatri + '" placeholder="Giá trị">' +
                                            '</div>' +
                                            '</div>');
                                    } else {
                                        $('#btn-thongso').hide();
                                    }
                                })
                            })
                        </script>

                        <div class="insert-product-mota">
                            <div>
                                <h2>Mô tả sản phẩm</h2>
                            </div>
                            <div class="ckediter">
                                <textarea class="ckeditor" name="editor1"></textarea>
                            </div>
                        </div>
                        <div>
                            <button type="submit" name="btn-submit">Thêm</button>
                        </div>
                    </form>

                </div>

                <div class="footer">

                    2021 © Ample Admin
                </div>

            </div>

        </main>




        <script>
            CKEDITOR.replace('editor1');
        </script>
    </div>
</body>

</html>