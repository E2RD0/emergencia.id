<?php

class Profile extends \Common\Controller
{
    public $r;

    public function __construct()
    {
        $this->usersModel = $this->loadModel('Perfil');
        $this->r = array('status' => 0, 'message' => null, 'exception' => null, 'errors'=> []);
    }
    public function newUser($userData)
    {
        $result = $this->r;
        if($this->usersModel->countProfilesUser($_SESSION['user_id']) == 0) {
            $userData = \Helpers\Validation::trimForm($userData);
            $nombres = $userData['nombres'];
            $apellidos = $userData['apellidos'];
            $tel = isset($userData['tel']) ? $userData['tel'] : '';

            $profile = new Perfil;
            $errors = [];
            $errors = $profile->setNombres($nombres) === true ? $errors : array_merge($errors, $profile->setNombres($nombres));
            $errors = $profile->setApellidos($apellidos) === true ? $errors : array_merge($errors, $profile->setApellidos($apellidos));

            $user = $this->loadModel('Usuario');
            $errors = $user->setTelefono($tel) === true ? $errors : array_merge($errors, $user->setTelefono($tel));

            $idUsuario = $_SESSION['user_id'];
            //If there aren't any errors
            if (!boolval($errors)) {
                if ($idPerfil = ($this->usersModel->newProfile($idUsuario))->id_perfil_medico ){
                    $rUsuario =$user->updateUserParam('id_perfil_medico', $idPerfil, $idUsuario);
                    $rNombres = $this->usersModel->updateProfile('nombres', $nombres, $idPerfil);
                    $rApellidos = $this->usersModel->updateProfile('apellidos', $nombres, $idPerfil);
                    $rTelefono = $tel ? $user->updateUserParam('telefono', $tel, $idUsuario) : true;

                    if ($rUsuario && $rNombres && $rApellidos && $rTelefono) {
                        $result['status'] = 1;
                        $result['message'] = 'Usuario registrado correctamente';
                        $result['id_perfil_medico'] = $idPerfil;
                    }
                } else {
                    $result['status'] = -1;
                    $result['exception'] = \Common\Database::$exception;
                }
            } else {
                $result['status'] = 0;
                $result['exception'] = 'Error en uno de los campos';
                $result['errors'] = $errors;
            }
        }
        else {
            $result['status'] = -2;
            $result['exception'] = 'Ya existe un perfil médico. Redirigiendo a perfiles...';
        }
        return $result;
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

    public function createNewProfile(){
        session_start();
        $idSesssion = $_SESSION['user_id'];
        $result = $this->r;
        $result = $this->usersModel->newProfile($idSesssion);
        return $result;
    }

    public function updatePro($info){
        $result = $this->r;
        $info = \Helpers\Validation::trimForm($info);
        $user = new Perfil;
        return $this->usersModel->updateProfile($info);
    }
}


?>
