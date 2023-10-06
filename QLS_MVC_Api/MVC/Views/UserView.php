<div class="container-fluid mt-3">
    <h2 style="text-align: center;color: blue;">Thêm user</h2>
    <h6 style="text-align: center;color: red;">
        <?php
        if (isset($data['result'])) {
            if ($data['result'] == true) echo "Thêm mới thành công!";
            else echo "Thêm mới thất bại";
        }
        if (isset($data['thongbao'])) {
            echo $data['thongbao'];
        }
        ?>
    </h6>
    <form method="post" action="http://localhost/QLS_MVC_API/User/themuser">
        <!-- Vertical -->
        <div class="form-group" style="height: 400px;">
            <div style="color: red;" id="thongbao"></div>
            <label for="mytaikhoan">Ho ten</label>
            <input type="text" id="mytaikhoan" name="taikhoan" class="form-control" placeholder="Nhập tài khoản">
            <label for="mymatkhau">Mật khẩu</label>
            <input type="password" id="mymatkhau" name="matkhau" class="form-control" placeholder="Nhập mật khẩu">
            <label for="mytenuser">Tên</label>
            <input type="text" id="mytenuser" name="ten" class="form-control" placeholder="Nhập tên user">
            <label for="mytuoi">Tuổi</label>
            <input type="number" id="mytuoi" name="tuoi" class="form-control" placeholder="Nhập tuổi">
            <label for="mygioitinh">Giới tính</label>
            <select id="mygioitinh" name="gioitinh" class="form-control">
                <option value='Nam'>Nam</option>
                <option value='Nữ'>Nữ</option>
            </select>
            <label for="myemail">Email</label>
            <input type="text" id="myemail" name="email" class="form-control" placeholder="Nhập email">
            <label for="mydiachi">Địa chỉ</label>
            <input type="text" id="mydiachi" name="diachi" class="form-control" placeholder="Nhập địa chỉ">
            <label for="mysdt">SDT</label>
            <input type="number" id="mysdt" name="sdt" class="form-control" placeholder="Nhập SDT">
            
            <br>
            <button type="submit" name="btn_Luu" class="btn btn-primary"> Lưu </button>
        </div>
    </form>

</div>