<?php

class Dashboard extends Controller{
    public function __construct()
    {
        if(!isset($_SESSION['login'])){
            header('Location: login');
            exit;
        }
    }
    public function index(){
        $data['judul'] = 'Dashboard';
        $data['sensor'] = $this->model('Data_model')->averageDataSensor();
        $data['kontrol'] = $this->model('Data_model')->getDataKontrol();
        $data['form'] = $this->model('Data_model')->getDataForm();
        $role = $this->model('User_model')->getRole();
        if($role === 'admin'){
            $this->view('templates/admin_dashboard/header', $data);
        }
        else{
            $this->view('templates/user_dashboard/header', $data);
        }

        if(isset($_POST)){
            $this->model('Data_model')->setDataForm($_POST);
        }
        $this->view('dashboard/index',$data);
        $this->view('templates/admin_dashboard/footer');
    }
    public function newForm(){
        if(isset($_POST)){
            $this->model('Data_model')->setDataForm($_POST);
            if($this->model('Data_model')->setDataForm($_POST)){
                Flasher::setFlash('Data', 'Gagal Ditambahkan', 'error');
                header('Location: '. BASEURL );
                exit;
            }else{
                Flasher::setFlash('Data', 'Berhasil Ditambahkan', 'success');
                header('Location: '. BASEURL );
                exit;
            }
        }
    }



}

?>