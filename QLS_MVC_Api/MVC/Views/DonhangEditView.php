<div class="container-fluid mt-3">
    <h2 style="text-align: center;color: blue;">nguyen ba huan</h2>
    <h6 style="text-align: center;color: red;">
        <?php
        if (isset($data['result'])) {
            if ($data['result']) echo "Sửa thành công!";
            else echo "Sửa thất bại!";
            
        }
        if (isset($data['thongbao'])) {
            echo $data['thongbao'];
        }
        ?>
    </h6>
    <?php
    foreach ($data['edit'] as $row) { ?>
        <form method="post" style="height: 350px;    padding-bottom: 20px;" action="http://localhost/QLS_MVC_API/Danhsachdonhang/UpdateDH/<?php echo $row['iddonhang'] ?>">
            <!-- Vertical -->
            <div class="form-group">
            <div style="color: red;" id="thongbao"></div>   
            <label>ID</label>
            <input type="text" name="iddonhang" class="form-control"  value="<?php echo $row['iddonhang'] ?>" disabled>
                
            <label for="mymasach">trò chơi</label>
            <select for="mymasach" name="masach" class="form-control">
            <?php
                    foreach ($data['masach'] as $msRow) {
                        if ($msRow['idsach'] == $row['idsach']) {
                            echo "<option value=" . $msRow['idsach'] . " selected>" . $msRow['tensach'] . "</option>";
                        } else {
                            echo "<option value=" . $msRow['idsach'] . ">" . $msRow['tensach'] . "</option>";
                        }
                    }
                    ?>
            </select>
            <input id="mysoluongbd" name="soluongbd" class="form-control" value="<?php echo $row['soluong'] ?>" type="hidden" >
            
            <label for="mysoluong">Sô lượng</label>
            <input type="number" id="mysoluong" name="soluong" class="form-control" value="<?php echo $row['soluong'] ?>" placeholder="Nhập số lượng " >
            <label for="mygia">Giá</label>
            <input type="number" id="mygiatien" name="giatien" class="form-control" value="<?php echo $row['giatien'] ?>" placeholder="Nhập giá">
            <label for="mysdt">SDT</label>
            <input type="number" id="mysdt" name="sdt" class="form-control" value="<?php echo $row['sdt'] ?>" placeholder="Nhập SDT">
            <label for="mydiachi">Địa chỉ</label>
            <input type="text" id="mydiachi" name="diachigiaohang" class="form-control" value="<?php echo $row['diachigiaohang'] ?>" placeholder="Nhập địa chỉ">
            <label for="mytrangthai">Chọn trạng thái</label>
            <select id="mytrangthai" name="trangthai" class="form-control">
                <option value="<?php echo $row['trangthai'] ?>"><?php echo $row['trangthai'] ?></option>
                <option value="Chưa thanh toán">Chưa thanh toán</option>
                <option value="Đã thanh toán">Đã thanh toán</option>
            </select>
            
            <br>
                <br>
                <button type="submit" name="btn_Luu" class="btn btn-primary"> Lưu </button>
                <button type="submit" name="btn_Thoat" class="btn btn-warning"> Đóng </button>
            </div>
        </form>
    <?php
    }
    ?>
</div>