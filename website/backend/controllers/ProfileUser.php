<?php

class ProfileUser extends \Common\Controller
{
    public $r;

    public function __construct()
    {
        $this->usersModel = $this->loadModel('perfilesUsuario');
        $this->r = array('status' => 0, 'message' => null, 'exception' => null, 'errors'=> []);
    }

    public function getShowProfile(){
        $result = $this->r;
        session_start();
        $idSesssion = $_SESSION['user_id'];
        return $this->usersModel->getShowProfile($idSesssion);
    }
}


?>