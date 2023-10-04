<div class="container-fluid mt-3">
    <h2 style="text-align: center;color: blue;">THÔNG TIN TÌM KIẾM</h2>

    <form method="post" action="http://localhost/QLS_MVC_API/Danhsachdonhang/timkiemdonhang">
        <!-- Vertical -->
        <div class="form-group">
            <label>Mã vé</label>
            <input type="text" name="iddonhang" class="form-control" placeholder="Nhập mã vé" value="<?php if (isset($data['iddonhang'])) echo $data['iddonhang']; ?>">
            <br>
            <select name="trangthai" class="form-control">
                <option value="">--Trạng thái--</option>
                <option value="chưa thanh toán">Chưa thanh toán</option>
                <option value="đã thanh toán">Đã thanh toán</option>
            </select>
            <label>Chọn trò chơi</label>
            <select name="masach" class="form-control">
                <option value="">--Chọn trò chơi--</option>
                <?php
                foreach ($data['masach'] as $row) {
                    $selected = ($row['idsach'] == $idsach) ? 'selected' : '';
                    echo "<option value='" . $row['idsach'] . "' " . $selected . ">" . $row['tensach'] . "</option>";
                }
                ?>
            </select>

            <br>
            <div style="text-align: center;">
                <div class="input-group-append" style="display: block;">
                    <button class="btn btn-secondary" type="submit" name="btnSearch" style="    background-color: #ffae68;">
                        <i><img src="http://localhost/QLS_MVC_API/MVC/Public/images/search.png"></i> Tìm kiếm
                    </button> &nbsp;
                </div>

            </div>
        </div>
        <?php

        ?>
        <h2 style="text-align: center;color: blue;">KẾT QUẢ TÌM KIẾM</h2>
        <table class="table table-bordered table-striped">
            <thead style="background-color: darkkhaki">
                <th>STT</th>
                <th>Mã vé</th>
                <th>Tên trò chơi</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>SDT</th>
                <th>Địa chỉ</th>
                <th>Trạng thái</th>
                <th>Thời gian</th>
                <th>Xóa</th>
                <th>Sửa</th>
            </thead>
            <tbody>
                <?php
                $count = 1;
                if (isset($data['result'])) {

                    foreach ($data['result'] as $row) {
                        echo '<tr>
                    <td>' . $count++ . '</td>
                    <td>' . $row["iddonhang"] . '</td>
                    <td>' . $row["tensach"] . '</td>
                    <td>' . $row["soluong"] . '</td>
                    <td>' . $row["giatien"] . '</td>
                    <td>' . $row["sdt"] . '</td>
                    <td>' . $row["diachigiaohang"] . '</td>
                    <td>' . $row["trangthai"] . '</td>
                    <td>' . $row["thoigian"] . '</td>
                     <td style="text-align: center"><a href="http://localhost/QLS_MVC_API/Danhsachdonhang/xoadonhang/' . $row["iddonhang"] . '">
                    <img src="http://localhost/QLS_MVC_API/MVC/Public/images/deleteStand.png">
                    </a></td>
                    <td><a href="http://localhost/QLS_MVC_API/Danhsachdonhang/editdonhang/' . $row["iddonhang"] . '" class="btn btn-outline-priidry">Edit</a></td>
                </tr>'
                        
                ;
                    }
                }
                ?>
            </tbody>


        </table>

    </form>


</div>