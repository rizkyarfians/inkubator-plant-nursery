<?php

require_once 'koneksi.php';


$data = json_decode(file_get_contents("php://input"),true);
header("Content-type: application/json");


if(isset($data['suhu']) && isset($data['kelembapan']) && isset($data['device_id']) && isset($data['intensitas_cahaya']) && isset($data['ketinggian_tanaman'])){
    $suhu = $data['suhu'];
    $kelembapan = $data['kelembapan'];
    $device_id = $data['device_id'];
    $ketinggian_tanaman = $data['ketinggian_tanaman'];
    $intensitas_cahaya = $data['intensitas_cahaya'];
    $result = mysqli_query($conn, "INSERT INTO sensor_value (device_id,suhu,kelembapan,intensitas_cahaya,ketinggian_tanaman) VALUES ('$device_id','$suhu','$kelembapan','$intensitas_cahaya','$ketinggian_tanaman')");

    if($result){
        $response = array(
            'device_id' => $data['device_id'],
            'Status' => 1,
            'Message' => 'Insert Success',
            'suhu' => $data['suhu'],
            'kelembapan' => $data['kelembapan'],
            'intensitas_cahaya' => $data['intensitas_cahaya'],
            'ketinggian_tanaman' => $data['ketinggian_tanaman']
        );
    }
    else{
        $response = array(
            'Status' => 0,
            'Message' => 'Insert Failed'
        );
    }
}else{
    $response = array(
        'Status' => 0,
        'Message' => 'Input Salah'
    );
}

header("Content-type: application/json");
echo json_encode($response);

?>