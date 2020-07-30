<?php
class Profile extends \Common\Controller{

    public function __construct(){
        $this->model = $this->loadModel('Perfil');
        //self::dashboard();
    }

    public function edit($id)
    {   
        session_start();
        $s = $_SESSION['user_id'];
        if($this->model->existProfile($id, $s)){
            $this->loadView('app', 'newProfile', 0);
        }else{
            Core::http404();
        }

    }

    public function test()
    {
        $this->loadView('app', 'newProfile', 0);
    }
}
