<div class="container-fluid mt-3">
    <h2 style="text-align: center;color: blue;">Cập nhật thông tin sách</h2>
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
        <form method="post" style="height: 350px;    padding-bottom: 20px;" action="http://localhost/QLS_MVC_API/Danhsachuser/UpdateU/<?php echo $row['taikhoan'] ?>">
            <!-- Vertical -->
            <div class="form-group">
            <div style="color: red;" id="thongbao"></div>
            <label for="mytaikhoan">Tài khoản</label>
            <input type="text" id="mytaikhoan" name="taikhoan" class="form-control" placeholder="<?php echo $row['taikhoan'] ?>" disabled>
            <label for="mymatkhau">Mật khẩu</label>
            <input type="password" id="mymatkhau" name="matkhau" class="form-control" value="<?php echo $row['matkhau'] ?>">
            <label for="mytenuser">Tên</label>
            <input type="text" id="mytenuser" name="ten" class="form-control" value="<?php echo $row['ten'] ?>">
            <label for="mytuoi">Tuổi</label>
            <input type="number" id="mytuoi" name="tuoi" class="form-control" value="<?php echo $row['tuoi'] ?>">
            <label for="mygioitinh">Giới tính</label>
            <select id="mygioitinh" name="gioitinh" class="form-control" >
                <option value='Nam'>Nam</option>
                <option value='Nữ'>Nữ</option>
            </select>
            <label for="myemail">Email</label>
            <input type="text" id="myemail" name="email" class="form-control" value="<?php echo $row['email'] ?>">
            <label for="mydiachi">Địa chỉ</label>
            <input type="text" id="mydiachi" name="diachi" class="form-control" value="<?php echo $row['diachi'] ?>">
            <label for="mysdt">SDT</label>
            <input type="number" id="mysdt" name="sdt" class="form-control" value="<?php echo $row['sdt'] ?>">

                <br>
                <button type="submit" name="btn_Luu" class="btn btn-primary"> Lưu </button>
                <button type="submit" name="btn_Thoat" class="btn btn-warning"> Đóng </button>
            </div>
        </form>
    <?php
    }
    ?>
</div>