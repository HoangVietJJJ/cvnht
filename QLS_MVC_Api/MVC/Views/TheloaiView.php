<div class="container-fluid mt-3">
    <h2 style="text-align: center;color: blue;">Thêm dịch vụ</h2>
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
    <form method="post" action="http://localhost/QLS_MVC_API/Theloai/themtheloai">
        <!-- Vertical -->
        <div class="form-group" style="height: 400px;">
            <div style="color: red;" id="thongbao"></div>
            <label for="mytentheloai">Tên dịch vụ</label>
            <input type="text" id="mytentheloai" name="tentheloai" class="form-control" placeholder="Nhập tên dịch vụ">
           
            <br>
            <button type="submit" name="btn_Luu" class="btn btn-primary"> Lưu </button>
        </div>
    </form>

</div>