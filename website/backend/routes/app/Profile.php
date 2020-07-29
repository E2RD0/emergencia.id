<?php
class Profile extends \Common\Controller{

    public function __construct(){
        $this->model = $this->loadModel('Perfil');
        //self::dashboard();
    }

    public function test($id)
    {
        if($this->model->existProfile($id)){
            $this->loadView('app', 'newProfile', -1);
        }else{
            Core::http404();
        }

    }
}
