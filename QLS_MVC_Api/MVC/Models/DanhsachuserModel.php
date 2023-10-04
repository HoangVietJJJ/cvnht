<?php
class DanhsachuserModel
{
    
    public function userSearch($taikhoan, $ten)
    {
        $url = 'http://localhost:3002/user/Search';
        $data = array(
            'taikhoan' => $taikhoan,
            'ten' => $ten,
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

        return $result; // Trả về kết quả tìm kiếm (danh sach user)
    }

    function userDelete($taikhoan)
    {
        $url = 'http://localhost:3002/user/Delete/' . $taikhoan;

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

    public function userEdit($taikhoan)
    {
        $url = 'http://localhost:3002/user/EditIF/' . $taikhoan; // URL API theloai
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
            // Trả về mảng dữ liệu user
        } else {
            echo "Không có dữ liệu user";
            return []; // Trả về một mảng rỗng nếu không có dữ liệu
        }
    }
    public function userUpdate($taikhoan,$matkhau, $ten, $tuoi,$gioitinh, $email, $diachi, $sdt)
    {
        $url = 'http://localhost:3002/user/Edit/' . $taikhoan;

        $data = array(
            'taikhoan'=> $taikhoan,
            'matkhau'=> $matkhau, 
            'ten'=> $ten, 
            'tuoi'=> $tuoi,
            'gioitinh'=> $gioitinh, 
            'email'=> $email, 
            'diachi'=> $diachi, 
            'sdt'=> $sdt
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
    public function CheckMauser($taikhoan,$matkhau)
    {
        $url = 'http://localhost:3002/user/Check?idsach=' . $taikhoan.'&& matkhau='.$matkhau;
        

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            echo "Error: " . $error;
            return false;
        }

        $result = json_decode($response);

        return $result;

    }
}
