<?php

class ProfileUser extends \Common\Controller
{
    public $r;

    public function __construct()
    {
        $this->usersModel = $this->loadModel('PerfilesUsuario');
    }

    public function getShowProfile($data, $result){

        if ($result['dataset'] = $this->usersModel->getShowProfile($data)){
            $result['status'] = 1;
        } else {
            $result['exception'] = \Common\Database::$exception;
            $result['status'] = -1;
        }
        return $result;
    }

    public function getShowProfileShared($data, $result){

        if ($result['dataset'] = $this->usersModel->getShowProfileShared($data)){
            $result['status'] = 1;
        } else {
            $result['exception'] = \Common\Database::$exception;
            $result['status'] = -1;
        }
        return $result;
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
                $result['status'] = -1;
            }
        } else {
            $result['exception'] = 'Perfil médico inexistente';
        }
        return $result;
    }

    public function deleteSharedProfile($data, $result)
    {
        $id_perfil = intval($data['id_perfil_medico']);
        $id_usuario = intval($data['id_usuario']);
        $userProfiles = new PerfilesUsuario;

        if ($userProfiles->setId_Perfiles_Usuario($id_perfil) && $userProfiles->sharedProfileExists($id_perfil, $id_usuario)) {
            if ($userProfiles->deleteSharedProfile($id_perfil, $id_usuario)) {
                $result['status'] = 1;
                $result['message'] = 'El perfil ya no está compartido contigo';
            } else {
                $result['exception'] = \Common\Database::$exception;
                $result['status'] = -1;
            }
        } else {
            $result['exception'] = 'Perfil médico inexistente';
        }
        return $result;
    }
}


?>
