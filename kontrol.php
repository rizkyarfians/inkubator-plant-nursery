<?php
require_once 'koneksi.php';

$data = json_decode(file_get_contents("php://input"),true);

if(isset($_POST['dutyFan']) || isset($_POST['relayFan'])){
    $dutyFan = (int)$_POST['dutyFan'];
    $voutFan = ($dutyFan/100) * 24;
    $pwmFan = (int)(($voutFan/24) * 255);
    $relayFan = $_POST['relayFan'];
    if($relayFan === 'true'){
        mysqli_query($conn,"UPDATE kontrol_aktuator SET relayFan = 1, pwmFan = '$pwmFan', dutyFan = '$dutyFan'");
        echo 'ON';
    }else if($relayFan === 'false'){
        mysqli_query($conn,"UPDATE kontrol_aktuator SET relayFan = 0, pwmFan = 0");
        echo 'OFF';
    }
}
else if(isset($_POST['dutyMist']) || isset($_POST['relayMist'])){
    $dutyMist = (int)$_POST['dutyMist'];
    $voutMist = ($dutyMist/100) * 24;
    $pwmMist = (int)(($voutMist/24) * 255);
    $relayMist = $_POST['relayMist'];
    if($relayMist === 'true'){
        mysqli_query($conn,"UPDATE kontrol_aktuator SET relayMist = 1, pwmMist = '$pwmMist', dutyMist = '$dutyMist'");
        echo 'ON';
    }else if($relayMist === 'false'){
        mysqli_query($conn,"UPDATE kontrol_aktuator SET relayMist = 0, pwmMist = 0");
        echo 'OFF';
    }
}
else if (isset($_POST['relayPump'])){
    $relayPump = $_POST['relayPump'];
    if($relayPump === 'true'){
        mysqli_query($conn,"UPDATE kontrol_aktuator SET relayPump = 1");
        echo 'ON';
    }else if($relayPump === 'false'){
        mysqli_query($conn,"UPDATE kontrol_aktuator SET relayPump = 0");
        echo 'OFF';
    }
}


else if (isset($_POST['relayLed'])){
    $relayLed = $_POST['relayLed'];
    if($relayLed === 'true'){
        mysqli_query($conn,"UPDATE kontrol_aktuator SET relayLed = 1");
        echo 'ON';
    }else if($relayLed === 'false'){
        mysqli_query($conn,"UPDATE kontrol_aktuator SET relayLed = 0");
        echo 'OFF';
    }
}

else if(isset($data['pwmMist']) || isset($data['pwmFan'])){
    $pwmMist = $data['pwmMist'];
    $pwmFan = $data['pwmFan'];
    mysqli_query($conn,"UPDATE kontrol_aktuator SET pwmMist = '$pwmMist', pwmFan = '$pwmFan'");
}

else if(isset($data['relayPump']) || isset($data['relayLed'])){
    $relayPump = $data['relayPump'];
    $relayLed = $data['relayLed'];
    mysqli_query($conn,"UPDATE kontrol_aktuator SET relayPump = '$relayPump', relayLed = '$relayLed'");
}