<?php

class ProfileUser extends \Common\Controller
{
    public $r;

    public function __construct()
    {
        $this->usersModel = $this->loadModel('PerfilesUsuario');
        $this->r = array('status' => 0, 'message' => null, 'exception' => null, 'errors'=> []);
    }

    public function getShowProfile(){
        $result = $this->r;
        session_start();
        $idSesssion = $_SESSION['user_id'];
        return $this->usersModel->getShowProfile($idSesssion);
    }

    public function getShowProfileShared(){
        $result = $this->r;
        session_start();
        $idSesssion = $_SESSION['user_id'];
        return $this->usersModel->getShowProfileShared($idSesssion);
    }

    public function deleteProfile($data, $result)
    {
        $id = intval($data['id_perfil_medico']);
        $userProfiles = new PerfilesUsuario;

        if ($userProfiles->setId_Perfiles_Usuario($id) && $userProfiles->profileExists($id)) {
            if ($userProfiles->deleteProfile($id)) {
                $result['status'] = 1;
                $result['message'] = 'Perfil médico eliminado correctamente';
            } else {
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            echo "no existe";
            $result['exception'] = 'Perfil médico inexistente';
        }
        return $result;
    }
}


?>
