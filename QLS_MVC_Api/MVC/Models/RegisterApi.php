<?php

$url = 'http://localhost:3002/register'; // URL API 
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
