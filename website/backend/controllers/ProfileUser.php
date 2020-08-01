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
        $id_perfil = intval($data['id_perfil_medico']);
        $id_usuario = intval($data['id_usuario']);
        $userProfiles = new PerfilesUsuario;

        if ($userProfiles->setId_Perfiles_Usuario($id_perfil) && $userProfiles->profileExists($id_usuario, $id_perfil)) {
            if ($userProfiles->deleteProfile($id_perfil)) {
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

        if ($userProfiles->sharedProfileExists($id_perfil, $id_usuario)) {
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

    public function getUsersSharedWith($data, $result)
    {
        $id_perfil = intval($data['id_perfil_medico']);
        $id_usuario = intval($data['id_usuario']);
        $userProfiles = new PerfilesUsuario;

        if ($userProfiles->profileExists($id_usuario, $id_perfil)) {
            if ($result['dataset'] = $userProfiles->getUsersSharedWith($id_perfil)) {
                $result['status'] = 1;
                $result['message'] = 'Los usuarios se han cargado correctamente';
            } else {
                $result['message'] = 'No compartes tu perfil con nadie';
                $result['status'] = 0;
            }
        } else {
            $result['exception'] = 'Perfil médico inexistente';
        }

        return $result;
    }

    public function shareProfileWith($data, $result)
    {
        $email = $data['email'];
        $id_perfil = intval($data['id_perfil_medico']);
        $id_usuario_propio = intval($data['id_usuario']);
        $userProfiles = new PerfilesUsuario;

        if ($id_usuario = $userProfiles->emailExists($email)){
            if ($userProfiles->profileExists($id_usuario_propio, $id_perfil)) {
                if (!$userProfiles->alreadySharingWith($id_perfil, $id_usuario->id_usuario)){
                    if ($userProfiles->shareProfileWith($id_perfil, $id_usuario->id_usuario)) {
                        $result['status'] = 1;
                        $result['message'] = 'El perfil se ha compartido correctamente.';
                    } else {
                        $result['exception'] = 'Hubo un error al compartir el perfil';
                        $result['status'] = -1;
                    }
                } else {
                    $result['exception'] = 'Ya compartes tu perfil con ese usuario.';
                    $result['status'] = 0;
                }
            } else {
                $result['exception'] = 'Perfil médico inexistente';
                $result['status'] = -1;
            }
        } else {
            $result['exception'] = 'No existe el correo.';
            $result['status'] = -1;
        }

        return $result;
    }

    public function deleteSharedAccess($data, $result)
    {
        $id_perfil = intval($data['id_perfil_medico']);
        $id_usuario = intval($data['id_usuario']);
        $userProfiles = new PerfilesUsuario;

        if ($userProfiles->alreadySharingWith($id_perfil, $id_usuario)){
            if ($userProfiles->deleteSharedProfile($id_perfil, $id_usuario)) {
                $result['status'] = 1;
                $result['message'] = 'Se ha dejado de compartir el perfil con el usuario correctamente.';
            } else {
                $result['exception'] = 'Hubo un error al dejar de compartir el perfil';
                $result['status'] = -1;
            }
        } else {
            $result['exception'] = 'No compartes tu perfil con ese usuario.';
            $result['status'] = 0;
        }

        return $result;
    }
}


?>
