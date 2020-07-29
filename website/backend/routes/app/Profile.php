<?php
class Profile extends \Common\Controller{

    public function __construct(){
        $this->model = $this->loadModel('Perfil');
        //self::dashboard();
    }

    public function edit($id)
    {
        if($this->model->existProfile($id)){
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
