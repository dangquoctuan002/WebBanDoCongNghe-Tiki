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
$id = $_GET['id'];
$aaa = mysqli_query($conn, "select * from sanpham where MaSanPham= '$id'");
$data = mysqli_fetch_array($aaa);

$bbbb = mysqli_query($conn, "select * from thongsokithuat where MaSanPham= '$data[1]'");


$danhmuc = mysqli_query($conn, "select * from danhmuc");



if (isset($_POST['btn-submit'])) {
    $ma = $_POST['ma'];
    $masanpham = $_POST['masanpham'];
    $dongia = $_POST['dongia'];
    $tensanpham = $_POST['tensanpham'];
    $soluong = $_POST['soluong'];
    $thuonghieu = $_POST['thuonghieu'];
    $danhmuc = $_POST['danhmuc'];
    $mota = $_POST['editor1'];

    if ($_FILES['anh']['name'] != '') {
        $file = $_FILES['anh'];
        $filename = $file['name'];
        move_uploaded_file($file['tmp_name'], '../image/list-image-product/' . $filename);
    } else {
        $filename = $_POST['anha'];
    }

    $sql = "UPDATE sanpham SET TenSanPham = '$tensanpham', MoTa = '$mota', Gia = '$dongia', ThuongHieu = '$thuonghieu', SoLuongTrongKho = '$soluong', AnhCon = '$filename', MaDanhMuc  = '$danhmuc' WHERE ID = '$ma'";

    // var_dump($sql);
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $db = mysqli_query($conn, "select * from thongsokithuat where MaSanPham = '$masanpham'");
        for ($i = 1; $i <= 10; $i++) {
            $a = 'thongso' . $i;
            $b = 'giatri' . $i;
            $c = 'mathongso' . $i;

            $thongso = isset($_POST[$a]) ? $_POST[$a] : "";
            $giatri = isset($_POST[$b]) ? $_POST[$b] : "";
            $mathongso = isset($_POST[$c]) ? $_POST[$c] : "";

            $sql = "UPDATE thongsokithuat SET TenThongSo = '$thongso', GiaTri = '$giatri' WHERE MaSanPham = '$masanpham' and MaThongSo = '$mathongso';";
            $querya = mysqli_query($conn, $sql);
        }
        header('location: sanpham.php');
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
                        <h4>Sửa sản phẩm</h4>
                    </div>
                </div>

                <div class="container">
                    <form action="suasanpham.php" method="post" enctype="multipart/form-data">
                        <div class="form-insert-product">

                            <h2>Thông tin sản phẩm</h2>
                            <div class="form-product">
                                <div class="insert-image">
                                    <label for="">Ảnh sản phẩm</label> <br>
                                    <span class="preview">
                                        <input type="hidden" name="anha" value="<?php echo $data['AnhCon']; ?>">
                                        <img src="/image/list-image-product/<?php echo $data['AnhCon']; ?>" alt="" width="120px">
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


                                <div>
                                    <div>
                                        <input type="hidden" name="ma" value="<?php echo $data['ID']; ?>">
                                        <label for="">Mã sản phẩm</label><span>*</span> <br>
                                        <input type="text" name="masanpham" id="masanpham" readonly placeholder="Mã sản phẩm" value="<?php echo $data['MaSanPham']; ?>">
                                    </div>
                                    <div>
                                        <label for="">Đơn giá</label><span>*</span> <br>
                                        <input type="text" name="dongia" id="dongia" required placeholder="Đơn giá" value="<?php echo $data['Gia']; ?>">
                                    </div>

                                </div>
                                <div>
                                    <div>
                                        <label for="">Tên sản phẩm</label><span>*</span> <br>
                                        <input type="text" name="tensanpham" id="tensanpham" required placeholder="Tên sản phẩm" value="<?php echo $data['TenSanPham']; ?>">
                                    </div>
                                    <div>
                                        <label for="">Số lượng</label> <br>
                                        <input type="text" name="soluong" id="soluong" required placeholder="Số lượng" value="<?php echo $data['SoLuongTrongKho']; ?>">
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <label for="">Thương hiệu</label><br>
                                        <input type="text" name="thuonghieu" id="thuonghieu" required placeholder="Thương hiệu" value="<?php echo $data['ThuongHieu']; ?>">
                                    </div>

                                    <div>
                                        <label for="">Danh mục</label><br>
                                        <select name="danhmuc" id="danhmuc">
                                            <?php while ($row = mysqli_fetch_array($danhmuc)) { ?>
                                                <option value="<?php echo $row['MaDanhMuc']; ?>" <?php if ($row['MaDanhMuc'] ==  $data['MaDanhMuc']) {
                                                                                                        echo "selected";
                                                                                                    } ?>> <?php echo $row['TenDanhMuc']; ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="form-insert-detail">
                            <h2>Thông số kĩ thuật</h2>
                            <div class="thongso">

                                <?php
                                $t = 0;
                                while ($row = mysqli_fetch_array($bbbb)) {
                                    $t++;
                                ?>
                                    <div class="thongsokithuat">
                                        <div class="">
                                            <input type="hidden" name="mathongso<?php echo $t; ?>" value="<?php echo $row['MaThongSo']; ?>">
                                            <input type="hidden" name="masanpham" value="<?php echo $row['MaSanPham']; ?>">
                                            <label for="">Thông số</label>
                                            <input type="text" name="thongso<?php echo $t; ?>" id="thongso<?php echo $t; ?>" placeholder="Thông số" value="<?php echo $row['TenThongSo']; ?>">
                                        </div>
                                        <div class="">
                                            <label for="">Giá trị</label>
                                            <input type="text" name="giatri<?php echo $t; ?>" id="giatri<?php echo $t; ?>" placeholder="Giá trị" value="<?php echo $row['GiaTri']; ?>">
                                        </div>
                                    </div>

                                <?php } ?>


                            </div>
                            <!-- <div>
                                <button type="button" class="button" id="btn-thongso">
                                    <span class="button__text">Add Item</span>
                                    <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg">
                                            <line y2="19" y1="5" x2="12" x1="12"></line>
                                            <line y2="12" y1="12" x2="19" x1="5"></line>
                                        </svg></span>
                                </button>
                            </div> -->
                        </div>
                        <!-- <script>
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
                        </script> -->

                        <div class="insert-product-mota">
                            <div>
                                <h2>Mô tả sản phẩm</h2>
                            </div>
                            <div class="ckediter">
                                <textarea class="ckeditor" name="editor1">
                                    <?php echo $data['MoTa']; ?>
                                </textarea>
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