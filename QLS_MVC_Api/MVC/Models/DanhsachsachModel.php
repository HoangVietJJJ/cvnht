<?php
class DanhsachsachModel
{
    public function Theloai_ListAll()
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
            // Trả về mảng dữ liệu sách
        } else {
            echo "Không có dữ liệu sách";
            return []; // Trả về một mảng rỗng nếu không có dữ liệu
        }
    }
    public function sachSearch($idsach, $tensach, $idtheloai)
    {
        $url = 'http://localhost:3002/sach/Search';
        $data = array(
            'idsach' => $idsach,
            'tensach' => $tensach,
            'idtheloai' => $idtheloai 
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

        return $result; // Trả về kết quả tìm kiếm (danh sách sách)
    }

    function sachDelete($idsach)
    {
        $url = 'http://localhost:3002/sach/Delete/' . $idsach;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
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

    public function sachEdit($idsach)
    {
        $url = 'http://localhost:3002/sach/EditIF/' . $idsach; // URL API theloai
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
            // Trả về mảng dữ liệu sách
        } else {
            echo "Không có dữ liệu sách";
            return []; // Trả về một mảng rỗng nếu không có dữ liệu
        }
    }
    public function sachUpdate($idsach, $tensach, $idtheloai,$soluong,$gia)
    {
        $url = 'http://localhost:3002/sach/Edit/' . $idsach;

        $data = array(
            'tensach' => $tensach,
            'idtheloai' => $idtheloai,
            'soluong'=>$soluong,
            'gia'=>$gia
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
}
