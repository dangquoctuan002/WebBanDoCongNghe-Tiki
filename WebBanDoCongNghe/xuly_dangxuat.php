<?php 
    if(isset($_SESSION['dangnhap'])){
        unset($_SESSION['dangnhap']);
        header('location: dangnhap.php');
    }
