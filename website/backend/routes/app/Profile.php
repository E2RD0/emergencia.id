<?php
class Profile extends \Common\Controller{

    public function __construct(){
        #$this->model = $this->loadModel('PerfilUsuario');
        //self::dashboard();
    }

    public function test()
    {
        $this->loadView('app', 'newProfile', -1);
    }

    public function edit()
    {
        $this->loadView('app', 'configurarCuenta', -1);
    }
}
