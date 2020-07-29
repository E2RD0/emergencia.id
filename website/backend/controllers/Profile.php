<?php

class Profile extends \Common\Controller
{
    public $r;

    public function __construct()
    {
        $this->usersModel = $this->loadModel('Perfil');
        $this->r = array('status' => 0, 'message' => null, 'exception' => null, 'errors'=> []);
    }

    public function getProfile(){
        $result = $this->r;
        $result = $this->usersModel->getProfileInformation();
        return $result;
    }
    
    public function getBlood(){
        $result = $this->r;
        $result = $this->usersModel->loadBlood();
        return $result;
    }

    public function getIssEstatus(){
        $result = $this->r;
        $result = $this->usersModel->loadIsssEstatus();
        return $result;
    }

    public function getCountry(){
        $result = $this->r;
        $result = $this->usersModel->loadCountry();
        return $result;
    }

    public function getCity($param){
        $result = $this->r;
        $result = $this->usersModel->loadCity($param);
        return $result;
    }
}


?>