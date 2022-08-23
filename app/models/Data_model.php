<?php


class Data_model{
    private $conn;
    private $username;



    public function __construct(){
        $this->conn = mysqli_connect('localhost','root','','pembibitan_indoor');
        if(!isset($this->conn)){
            header('location: '.BASEURL.'/connError');
        }

        if(isset($_COOKIE['username'])){
            $this->username = $_COOKIE['username'];
            $result = mysqli_query($this->conn,"SELECT username FROM users WHERE username = '$this->username'");
            $row = mysqli_fetch_assoc($result);
            if($this->username == $row['username']){
                $_SESSION['login'] = true;
            }
        }
    }

    public function setDataForm($data){
        if(isset($data['jenis']) || isset($data['tanggal'])){
            $username = $this->username;
            $jenis = $data['jenis'];
            $tanggal = $data['tanggal'];
            $result = mysqli_query($this->conn,"INSERT INTO data_form VALUES ('null','$username','$jenis','$tanggal')");
            if(!$result){
                $error = true;
            }
            else{
                $error = false;
            }
            return $error;
        }
    }

    public function getAllData($halamanAktif){
        $dataPerPage = 12;
        $halamanAktif = (int)$halamanAktif;
        if(!isset($halamanAktif)){
            $halamanAktif = 1;
        }
        $awalData = ($halamanAktif*$dataPerPage)- $dataPerPage;
        $result = mysqli_query($this->conn, "SELECT device_id, ROUND(AVG(suhu),2) AS avgSuhu, ROUND(AVG(kelembapan),2) AS avgKelembapan, ROUND(AVG(intensitas_cahaya),2) as avgIntensitasCahaya, HOUR(waktu_input) as hh, DATE(waktu_input) as dd FROM sensor_value  WHERE DATE(waktu_input) = CURDATE() GROUP BY hh LIMIT $awalData,$dataPerPage");
        $rows= [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    public function getRealtimeSensor(){
        $result = mysqli_query($this->conn,"SELECT suhu,kelembapan,ketinggian_tanaman ,intensitas_cahaya FROM sensor_value ORDER BY id DESC LIMIT 1");
        $row = mysqli_fetch_assoc($result);
        $row = array_map('floatval', $row);
        return $row;
    }

    public function averageDataSensor(){
        $result = mysqli_query($this->conn, "SELECT ROUND(AVG(suhu),2) AS avgSuhu, ROUND(AVG(kelembapan),2) AS avgKelembapan, HOUR(waktu_input) as hh, DATE(waktu_input) as dd, ROUND(AVG(intensitas_cahaya),2) as avgIntensitasCahaya, ROUND(AVG(ketinggian_tanaman ),2) as avgketinggian_tanaman  FROM sensor_value WHERE DATE_SUB(waktu_input, INTERVAL 1 HOUR) GROUP BY hh");
        $row = mysqli_fetch_assoc($result);
        $row = array_map('floatval', $row);
        return $row;
    }

    public function averageDataSensorAll(){
        $result = mysqli_query($this->conn, "SELECT ROUND(AVG(suhu),2) AS avgSuhu, ROUND(AVG(kelembapan),2) AS avgKelembapan, HOUR(waktu_input) as hh, ROUND(AVG(intensitas_cahaya),2) as avgIntensitasCahaya, ROUND(AVG(ketinggian_tanaman ),2) as avgketinggian_tanaman  FROM sensor_value WHERE DATE(waktu_input) = CURDATE() GROUP BY hh");
        $rows= [];
        while($row = mysqli_fetch_assoc($result)){
            $row = array_map('floatval', $row);
            $rows[] = $row;
        }
        return $rows;
    }

    public function getDataSensor($sensor_param){
        $result = mysqli_query($this->conn, "SELECT ROUND(AVG($sensor_param),2) AS avgVal,  HOUR(waktu_input) as hh FROM sensor_value WHERE DATE(waktu_input) = CURDATE() GROUP BY hh");
        $rows= [];
        while($row = mysqli_fetch_assoc($result)){
            $row = array_map('floatval', $row);
            $rows[] = $row;
        }
        return $rows;
    }

    public function getDataKontrol(){
        $result = mysqli_query($this->conn,"SELECT * FROM kontrol_aktuator");
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public function getDataForm(){
        $result = mysqli_query($this->conn,"SELECT *, DATE_ADD(tanggal,INTERVAL 7 DAY) as estimate FROM data_form WHERE id = (SELECT MAX(id) FROM data_form)");
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

}