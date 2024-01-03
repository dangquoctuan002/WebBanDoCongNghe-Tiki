<?php  
 require "../connect.php";
    $id = $_GET['id'];
    $sql1 = mysqli_query($conn, "delete from thongsokithuat where MaSanPham='$id'");
    $sql = mysqli_query($conn, "delete from sanpham where MaSanPham='$id'");
    if($sql){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else{
        echo "lỗi";
    }

?>
