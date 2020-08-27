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
                $result['message'] = 'Medical profile successfully deleted';
            } else {
                $result['exception'] = \Common\Database::$exception;
                $result['status'] = -1;
            }
        } else {
            $result['exception'] = 'Inexistent medical profile';
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
                $result['message'] = 'The profile is no longer shared with you';
            } else {
                $result['exception'] = \Common\Database::$exception;
                $result['status'] = -1;
            }
        } else {
            $result['exception'] = 'Inexistent medical profile';
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
                $result['message'] = 'The users have been loaded successfully';
            } else {
                $result['message'] = 'You don\'t share you profile with no one';
                $result['status'] = 0;
            }
        } else {
            $result['exception'] = 'Inexistent medical profile';
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
            if ($id_usuario->id_usuario != $id_usuario_propio){
                if ($userProfiles->profileExists($id_usuario_propio, $id_perfil)) {
                    if (!$userProfiles->alreadySharingWith($id_perfil, $id_usuario->id_usuario)){
                        if ($userProfiles->shareProfileWith($id_perfil, $id_usuario->id_usuario)) {
                            $result['status'] = 1;
                            $result['message'] = 'The profile has been shared successfully';
                        } else {
                            $result['exception'] = 'Error while sharing your profile';
                            $result['status'] = -1;
                        }
                    } else {
                        $result['exception'] = 'Already sharing with this user';
                        $result['status'] = 0;
                    }
                } else {
                    $result['exception'] = 'Inexistent medical profile';
                    $result['status'] = -1;
                }
            } else {
                $result['exception'] = 'You can\'t share your profile with yourself';
                $result['status'] = -1;
            }
        } else {
            $result['exception'] = 'The email does\' exists';
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
                $result['message'] = 'The profile is no longer shared with the user';
            } else {
                $result['exception'] = 'There was an error stopping sharing the profile with the user';
                $result['status'] = -1;
            }
        } else {
            $result['exception'] = 'You don\'t share the profile with this user.';
            $result['status'] = 0;
        }

        return $result;
    }
}


?>
