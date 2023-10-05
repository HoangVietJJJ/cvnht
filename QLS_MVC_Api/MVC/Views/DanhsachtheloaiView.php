<div class="container-fluid mt-3">
    <h2 style="text-align: center;color: blue;">THÔNG TIN TÌM KIẾM</h2>

    <form method="post" action="http://localhost/QLS_MVC_API/Danhsachtheloai/timkiemtheloai">
        <!-- Vertical -->
        <div class="form-group">
            <label>ID khuyến mãi</label>
            <input type="text" name="idtheloai" class="form-control" placeholder="Nhập id" value="<?php if (isset($data['idtheloai'])) echo $data['idtheloai']; ?>">
            <label>Tên khuyến mãi</label>
            <input type="text" name="tentheloai" class="form-control" placeholder="Nhập tên" value="<?php if (isset($data['tentheloai'])) echo $data['tentheloai']; ?>">
            <br>
            <div style="text-align: center;">
                <div class="input-group-append" style="display: block;">
                    <button class="btn btn-secondary" type="submit" name="btnSearch" style="    background-color: #ffae68;">
                        <i><img src="http://localhost/QLS_MVC_API/MVC/Public/images/search.png"></i> Tìm kiếm
                    </button> &nbsp;
                    <!-- <button class="btn btn-success" type="submit" name="btnXuatfile">
                        <i><img src="http://localhost/QLS_MVC_API/Public/iidges/xls.gif"></i> Xuất Excel
                    </button> -->
                </div>

            </div>
        </div>
        <?php

        ?>
        <h2 style="text-align: center;color: blue;">KẾT QUẢ TÌM KIẾM</h2>
        <table class="table table-bordered table-striped">
            <thead style="background-color: darkkhaki">
                <th>STT</th>
                <th>ID khuyến mãi</th>
                <th>Tên khuyến mãi</th>
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
                    <td>' . $row["idtheloai"] . '</td>
                    <td>' . $row["tentheloai"] . '</td>
                    
                     <td style="text-align: center"><a href="http://localhost/QLS_MVC_API/Danhsachtheloai/xoatheloai/' . $row["idtheloai"] . '">
                    <img src="http://localhost/QLS_MVC_API/MVC/Public/images/deleteStand.png">
                    </a></td>
                    <td><a href="http://localhost/QLS_MVC_API/Danhsachtheloai/edittheloai/' . $row["idtheloai"] . '" class="btn btn-outline-priidry">Edit</a></td>
                </tr>'
                        
                ;
                    }
                }
                ?>
            </tbody>


        </table>

    </form>


</div>