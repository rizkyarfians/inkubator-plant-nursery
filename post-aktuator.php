<?php

require_once 'koneksi.php';


$data = json_decode(file_get_contents("php://input"),true);
header("Content-type: application/json");


if(isset($data['pwmFan']) && isset($data['pwmMist']) && isset($data['relayPump']) && isset($data['relayLed'])){
    $pwmFan = $data['pwmFan'];
    $pwmMist = $data['pwmMist'];
    $relayPump = $data['relayPump'];
    $relayLed = $data['relayLed'];
    $intensitas_cahaya = $data['intensitas_cahaya'];
    $result = mysqli_query($conn, "INSERT INTO sensor_value (pwmFan,pwmMist,relayPump,relayLed) VALUES ('$relayPump','$pwmFan','$pwmMist','$relayPump','$relayLed')");

    if($result){
        $response = array(
            'Status' => 1,
            'Message' => 'Insert Success',
            'pwmFan' => $data['pwmFan'],
            'pwmMist' => $data['pwmMist'],
            'relayPump' => $data['relayPump'],
            'relayLed' => $data['relayLed']
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