<?php
class DanhsachtheloaiModel
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
            // Trả về mảng dữ liệu thể loại
        } else {
            echo "Không có dữ liệu thể loại";
            return []; // Trả về một mảng rỗng nếu không có dữ liệu
        }
    }
    public function theloaiSearch($idtheloai, $tentheloai)
    {
        $url = 'http://localhost:3002/theloai/Search';
        $data = array(
            'idtheloai' => $idtheloai,
            'tentheloai' => $tentheloai,
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

        return $result; // Trả về kết quả tìm kiếm (danh thể loại thể loại)
    }

    function theloaiDelete($idtheloai)
    {
        $url = 'http://localhost:3002/theloai/Delete/' . $idtheloai;

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

    public function theloaiEdit($idtheloai)
    {
        $url = 'http://localhost:3002/theloai/EditIF/' . $idtheloai; // URL API theloai
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
            // Trả về mảng dữ liệu thể loại
        } else {
            echo "Không có dữ liệu thể loại";
            return []; // Trả về một mảng rỗng nếu không có dữ liệu
        }
    }
    public function theloaiUpdate($idtheloai, $tentheloai)
    {
        $url = 'http://localhost:3002/theloai/Edit/' . $idtheloai;

        $data = array(
            'tentheloai' => $tentheloai,
            'idtheloai' => $idtheloai,
        );

        // Convert data to JSON foridt
        $json_data = json_encode($data);

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);// óc
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
