<div class="container-fluid mt-3">
    <h2 style="text-align: center;color: blue;">THÔNG TIN TÌM KIẾM</h2>

    <form method="post" action="http://localhost/QLS_MVC_API/Danhsachuser/timkiemuser">
        <!-- Vertical -->
        <div class="form-group">
            <label>Tài khoản</label>
            <input type="text" name="taikhoan" class="form-control" placeholder="Nhập tài khoản" value="<?php if (isset($data['taikhoan'])) echo $data['taikhoan']; ?>">
            <label>Tên user</label>
            <input type="text" name="ten" class="form-control" placeholder="Nhập tên user" value="<?php if (isset($data['ten'])) echo $data['ten']; ?>">
        
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
                <th>Tài khoản</th>
                <th>Tên</th>
                <th>Tuổi</th>
                <th>Giới tính</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>SDT</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                <?php
                $count = 1;
                if (isset($data['result'])) {

                    foreach ($data['result'] as $row) {
                        echo '<tr>
                    <td>' . $count++ . '</td>
                    <td>' . $row["taikhoan"] . '</td>
                    <td>' . $row["ten"] . '</td>
                    <td>' . $row["tuoi"] . '</td>
                    <td>' . $row["gioitinh"] . '</td>
                    <td>' . $row["email"] . '</td>
                    <td>' . $row["diachi"] . '</td>
                    <td>' . $row["sdt"] . '</td>
                     <td style="text-align: center"><a href="http://localhost/QLS_MVC_API/Danhsachuser/xoauser/' . $row["taikhoan"] . '">
                    <img src="http://localhost/QLS_MVC_API/MVC/Public/images/deleteStand.png">
                    </a></td>
                    <td><a href="http://localhost/QLS_MVC_API/Danhsachuser/edituser/' . $row["taikhoan"] . '" class="btn btn-outline-priidry">Edit</a></td>
                </tr>'
                        
                ;
                    }
                }
                ?>
            </tbody>


        </table>

    </form>


</div>