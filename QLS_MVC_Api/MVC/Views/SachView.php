<div class="container-fluid mt-3">
    <h2 style="text-align: center;color: blue;">Thêm trò chơi</h2>
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
    <form method="post" action="http://localhost/QLS_MVC_API/Sach/themsach">
        <!-- Vertical -->
        <div class="form-group" style="height: 400px;">
            <div style="color: red;" id="thongbao"></div>
            <label for="mytensach">Tên trò chơi</label>
            <input type="text" id="mytensach" name="tensach" class="form-control" placeholder="Nhập tên trò chơi">
            <label for="mytheloai">khuyến mãi</label>
            <select id="mytheloai" name="theloai" class="form-control">
                <?php
                foreach ($data['theloai'] as $theloai) {
                    echo '<option value="' . $theloai['idtheloai'] . '">' . $theloai['tentheloai'] . '</option>';
                }
                ?>
            </select>
            <label for="mysoluong">Số lượng</label>
            <input type="text" id="mysoluong" name="soluong" class="form-control" placeholder="Nhập số lượng">
            <label for="mygia">Giá</label>
            <input type="text" id="mygia" name="gia" class="form-control" placeholder="Nhập giá">
           
            <br>
            <button type="submit" name="btn_Luu" class="btn btn-primary"> Lưu </button>
        </div>
    </form>

</div>