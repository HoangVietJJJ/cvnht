<?php

class DonhangApi
{
    public function getData()
    {
        $url = 'http://localhost:3002/donhang';
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            // Xử lý lỗi khi gọi API
            echo "Error: " . $error;
        } else {
            $data = json_decode($response, true);
            // Xử lý dữ liệu từ API
            var_dump($data);
        }

        curl_close($curl);
    }
    function Sach_ListAll()
    {
        $url = 'http://localhost:3002/sach'; // URL API
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
        // Kiểm tra key 'sach' tồn tại trong mảng $data
        if (!empty($data)) {
            $data = json_decode($response, true);

            return $data;
            // Trả về mảng dữ liệu 
        } else {
            echo "Không có dữ liệu";
            return []; // Trả về một mảng rỗng nếu không có dữ liệu
        }
    }
    public function AddDonhang( $idsach,$giatien, $diachigiaohang, $sdt,$trangthai,$thoigian,$soluong)
    {
        $url = 'http://localhost:3002/donhang/Insert';
        $data = array(
            'idsach'=>$idsach,
            'giatien'=>$giatien,
            'diachigiaohang'=> $diachigiaohang,
            'sdt'=> $sdt,
            'trangthai'=>$trangthai,
            'thoigian'=>$thoigian,
            'soluong'=>$soluong
        );

        // Convert dữ liệu thành định dạng JSON
        $json_data = json_encode($data);

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            echo "Error: " . $error;
            return false;
        }

        $result = json_decode($response, true);

        if ($result ) {
            return true; // Trả về true nếu thêm mới thành công
        } else {
            return false; // Trả về false nếu thêm mới thất bại
        }
    }
    public function giamSlsach($idsach,$soluong){
        $url = 'http://localhost:3002/sach/EditSl/' . $idsach;

        $data = array(
            'soluong'=>$soluong
        );

        // Convert data to JSON foridt
        $json_data = json_encode($data);//mã hoã

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT"); // Use PUT request
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));//kiểu dữ liệu js
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);

        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            echo "Error: " . $error;
            return false;
        }

        $result = json_decode($response, true);//giải mã

        return $result; // Return the result of the update operation
    }

    
    public function CheckMadonhang($iddonhang)
    {
        $url = 'http://localhost:3002/donhang/Check?iddonhang=' . $iddonhang;

        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPGET, true);

        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            echo "Error: " . $error;
            return false;
        }

        $data = json_decode($response, true);

        return $data;
    }
}
