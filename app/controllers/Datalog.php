<?php

class Datalog extends Controller{
    public function __construct()
    {
        if(!isset($_SESSION['login'])){
            header('Location: login');
            exit;
        }
    }
    public function index($halamanAktif){
        $data['judul'] = 'Datalog';
        $data['halaman'] = $halamanAktif;
        $role = $this->model('User_model')->getRole();
        if($role === 'admin'){
            $this->view('templates/admin_dashboard/header',$data);
        }else{
            $this->view('templates/user_dashboard/header',$data);

        }
        $data['sensor'] = $this->model('Data_model')->getAllData($halamanAktif);
        $data['avgSensor'] = $this->model('Data_model')->averageDataSensor();
        $this->view('datalog/index', $data);
        $this->view('templates/datalog/footer');
    }

    public function intensitas(){
        $data['judul'] = 'Intensitas Cahaya';
        $data['sensor'] = $this->model('Data_model')->averageDataSensorAll();
        $role = $this->model('User_model')->getRole();
        if($role === 'admin'){
            $this->view('templates/admin_dashboard/header',$data);
        }else{
            $this->view('templates/user_dashboard/header',$data);

        }
        $data['sensor'] = $this->model('Data_model')->getDataSensor('intensitas_cahaya');
        $this->view('datalog/graph_index', $data);
        $this->view('templates/datalog/footer');
    }
    public function suhu(){
        $data['judul'] = 'Suhu';
        $role = $this->model('User_model')->getRole();
        if($role === 'admin'){
            $this->view('templates/admin_dashboard/header',$data);
        }else{
            $this->view('templates/user_dashboard/header',$data);

        }
        $data['sensor'] = $this->model('Data_model')->getDataSensor('suhu');
        $this->view('datalog/graph_index', $data);
        $this->view('templates/datalog/footer');
    }
    public function kelembapan(){
        $data['judul'] = 'Kelembapan';
        $role = $this->model('User_model')->getRole();
        if($role === 'admin'){
            $this->view('templates/admin_dashboard/header',$data);
        }else{
            $this->view('templates/user_dashboard/header',$data);

        }
        $data['sensor'] = $this->model('Data_model')->getDataSensor('kelembapan');
        $this->view('datalog/graph_index', $data);
        $this->view('templates/datalog/footer');
    }
    public function tinggi(){
        $data['judul'] = 'Level Air';
        $role = $this->model('User_model')->getRole();
        if($role === 'admin'){
            $this->view('templates/admin_dashboard/header',$data);
        }else{
            $this->view('templates/user_dashboard/header',$data);

        }
        $data['sensor'] = $this->model('Data_model')->getDataSensor('level');
        $this->view('datalog/graph_index', $data);
        $this->view('templates/datalog/footer');
    }
}