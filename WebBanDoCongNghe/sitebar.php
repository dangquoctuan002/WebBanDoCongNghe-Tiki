<div class="sitebar">
    <div class="danhmuc">
        <h2>Danh muc</h2>
        <?php while ($row  = mysqli_fetch_array($sql)) { ?>
            <a style="text-decoration: none;" href="sanpham.php?madanhmuc=<?php echo $row['MaDanhMuc']; ?>" class="danhmuc_items">
                <img src="./image/list-image-category/<?php echo $row['AnhCon']; ?>" style="border-radius: 50%;" alt="" width="20px" height="20px">
                <span> <?php echo $row['TenDanhMuc']; ?> </span>
            </a>
        <?php } ?>
    </div>
</div>