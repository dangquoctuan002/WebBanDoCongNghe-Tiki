<?php  
 require "../connect.php";
    $id = $_GET['id'];
    $sql = mysqli_query($conn, "delete from nguoidung where MaNguoiDung='$id'");
    if($sql){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else{
        echo "lỗi";
    }

?>
