<?php
class DanhsachdonhangModel
{
    public function Sach_ListAll()
    {
        $url = 'http://localhost:3002/sach'; // URL API theloai
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            // Xử lý lỗi khi gọi API
            echo "Error: " . $error;
            return []; // Trả về một mảng rỗng nếu có lỗi
        }

        $data = json_decode($response, true);
        curl_close($curl);;
        // Kiểm tra key 'masach' tồn tại trong mảng $data
        if (!empty($data)) {
            $data = json_decode($response, true);
            return $data;
            // Trả về mảng dữ liệu đơn hàng
        } else {
            echo "Không có dữ liệu đơn hàng";
            return []; // Trả về một mảng rỗng nếu không có dữ liệu
        }
    }
    public function donhangSearch($iddonhang, $trangthai, $idsach)
    {
        $url = 'http://localhost:3002/donhang/Search';
        $data = array(
            'iddonhang' => $iddonhang,
            'trangthai' => $trangthai,
            'idsach' => $idsach // Sửa tên trường 'mas' thành 'theloai'
        );

        // Convert dữ liệu thành định dạng JSON
        $json_data = json_encode($data);

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data); // Gửi dữ liệu JSON

        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            echo "Error: " . $error;
            return false;
        }

        $result = json_decode($response, true);

        return $result; // Trả về kết quả tìm kiếm (danh đơn hàng đơn hàng)
    }

    function donhangDelete($iddonhang)
    {
        $url = 'http://localhost:3002/donhang/Delete/' . $iddonhang;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE'); // cấu hình rq dl
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            echo "Error: " . $error;
            return false;
        }

        $result = json_decode($response, true);

        return $result; 
    }

    public function donhangEdit($iddonhang)
    {
        $url = 'http://localhost:3002/donhang/EditIF/' . $iddonhang; // URL API theloai
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            // Xử lý lỗi khi gọi API
            echo "Error: " . $error;
            return []; // Trả về một mảng rỗng nếu có lỗi
        }

        $data = json_decode($response, true);
        curl_close($curl);
        // Kiểm tra key 'theloai' tồn tại trong mảng $data
        if (!empty($data)) {
            $data = json_decode($response, true);
            return $data;
            // Trả về mảng dữ liệu đơn hàng
        } else {
            echo "Không có dữ liệu đơn hàng";
            return []; // Trả về một mảng rỗng nếu không có dữ liệu
        }
    }

    public function giamSlsach($idsach,$soluongs){
        $url = 'http://localhost:3002/sach/EditSl/' . $idsach;

        $data = array(
            'soluong'=>$soluongs
        );

        // Convert data to JSON foridt
        $json_data = json_encode($data);

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT"); // Use PUT request
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);

        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            echo "Error: " . $error;
            return false;
        }

        $result = json_decode($response, true);

        return $result; // Return the result of the update operation
    }
    
    public function donhangUpdate($idsach, $iddonhang,$giatien, $diachigiaohang, $sdt,$trangthai,$thoigian,$soluong)
    {
        $url = 'http://localhost:3002/donhang/Edit/' . $iddonhang;

        $data = array(
           'idsach'=> $idsach, 
           'giatien'=> $giatien, 
           'diachigiaohang'=> $diachigiaohang, 
           'sdt'=> $sdt,
           'trangthai'=> $trangthai,
           'thoigian'=> $thoigian,
           'soluong'=> $soluong
        );

        // Convert data to JSON foridt
        $json_data = json_encode($data);//mh

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT"); // Use PUT request
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);

        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            echo "Error: " . $error;
            return false;
        }

        $result = json_decode($response, true);//gm

        return $result; // Return the result of the update operation
    }
}
