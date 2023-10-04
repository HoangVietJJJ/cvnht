<?php

class SachApi
{
    public function getData()
    {
        $url = 'http://localhost:3002/sach';
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
    function Theloai_ListAll()
    {
        $url = 'http://localhost:3002/theloai'; // URL API theloai
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
        // Kiểm tra key 'theloai' tồn tại trong mảng $data
        if (!empty($data)) {
            $data = json_decode($response, true);

            return $data;
            // Trả về mảng dữ liệu 
        } else {
            echo "Không có dữ liệu ";
            return []; // Trả về một mảng rỗng nếu không có dữ liệu
        }
    }
    public function AddSach( $tensach, $theloai,$gia,$soluong)
    {
        $url = 'http://localhost:3002/sach/Insert';
        $data = array(
            'tensach' => $tensach,
            'idtheloai' => $theloai,
            'gia'=>$gia,
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

        if ($result) {
            return true; // Trả về true nếu thêm mới thành công
        } else {
            return false; // Trả về false nếu thêm mới thất bại
        }
    }

    public function CheckMasach($idsach)
    {
        $url = 'http://localhost:3002/sach/Check?idsach=' . $idsach;

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
