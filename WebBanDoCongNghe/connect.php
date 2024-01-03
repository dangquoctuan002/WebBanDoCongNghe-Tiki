<?php
    $conn = mysqli_connect("localhost","root","","db_docongnghe");
    if($conn){
        mysqli_query($conn,"SET NAMES 'utf8'");
    }else{
        echo "Kết nối Thất bại";
    }
?>