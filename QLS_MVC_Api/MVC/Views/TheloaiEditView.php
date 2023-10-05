<div class="container-fluid mt-3">
    <h2 style="text-align: center;color: blue;">Cập nhật thông tin khuyến mãi</h2>
    <h6 style="text-align: center;color: red;">
        <?php
        if (isset($data['result'])) {
            if ($data['result']) echo "Sửa thành công!";
            else echo "Sửa thất bại!";
        }
        ?>
    </h6>
    <?php
    foreach ($data['edit'] as $row) { ?>
        <form method="post" style="height: 350px;    padding-bottom: 20px;" action="http://localhost/QLS_MVC_API/Danhsachtheloai/UpdateTL/<?php echo $row['idtheloai'] ?>">
            <!-- Vertical -->
            <div class="form-group">
                <label for="myidtheloai">Mã khuyến mãi</label>
                <input type="text" id="myidtheloai" name="idtheloai" class="form-control" placeholder="Nhập ID" value="<?php echo $row['idtheloai'] ?>" disabled>
                <label for="mytentheloai">Tên khuyến mãi</label>
                <input type="text" id="mytentheloai" name="tentheloai" class="form-control" placeholder="Nhập tên khuyến mãi" value="<?php echo $row['tentheloai'] ?>">
                <br>
                <button type="submit" name="btn_Luu" class="btn btn-primary"> Lưu </button>
                <button type="submit" name="btn_Thoat" class="btn btn-warning"> Đóng </button>
            </div>
        </form>
    <?php
    }
    ?>
</div>