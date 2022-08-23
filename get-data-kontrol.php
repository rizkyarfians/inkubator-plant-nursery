<?php


require_once 'koneksi.php';
header("Content-type:application/json");
$result = mysqli_query($conn, "SELECT pwmFan,pwmMist,relayPump,relayLed FROM kontrol_aktuator ");
$hari;
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $data = array(
            "relayPump" => (bool)$row['relayPump'],
            'relayLed' => (bool)$row['relayLed'],
            'pwmFan' => (int)$row['pwmFan'],
            'pwmMist' => (int)$row['pwmMist'],

    );
    }
}
echo json_encode($data,JSON_FORCE_OBJECT);