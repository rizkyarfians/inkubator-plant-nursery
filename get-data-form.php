<?php


require_once 'koneksi.php';
header("Content-type:application/json");
$result = mysqli_query($conn, "SELECT DAYOFMONTH(tanggal) as dd, jenis_bibit FROM data_form ORDER BY id DESC LIMIT 1");
$hari;
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $data = array(
            "tanggal" => (int)$row['dd'],
            'jenis_bibit' => $row['jenis_bibit']

    );
    }
}
echo json_encode($data,JSON_FORCE_OBJECT);