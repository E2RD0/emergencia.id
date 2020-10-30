<?php
class PUsers extends \Common\Controller
{
    public function __construct()
    {
        $this->usersModel = $this->loadModel('UsuarioPrivilegiado');
        $this->r = array('status' => 0, 'message' => null, 'exception' => null, 'errors' => []);
    }

    public function signUp($userData)
    {
        $result = $this->r;
        $userData = \Helpers\Validation::trimForm($userData);
        $email = $userData['email'];
        $password = $userData['password'];

        $user = new UsuarioPrivilegiado;
        $errors = [];
        $errors = $user->setEmail($email) === true ? $errors : array_merge($errors, $user->setEmail($email));
        $errors = $user->setPassword($password) === true ? $errors : array_merge($errors, $user->setPassword($password));

        //If there aren't any errors
        if (!boolval($errors)) {
            if ($this->usersModel->registerUser($user)) {
                $userInfo = $this->usersModel->checkPassword($email);
                $this->loginSession($userInfo->id_usuario, $email);
                $result['status'] = 1;
                $result['message'] = 'Usuario registrado correctamente';
            } else {
                $result['status'] = -1;
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['status'] = 0;
            $result['exception'] = 'Error en uno de los campos';
            $result['errors'] = $errors;
        }
        return $result;
    }

    public function registerNewUser(){
        if ($result['dataset'] = $this->usersModel->getFisrtUser()) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'No se encontraron datos';
        }
        return $result;
    }

    public function regNewUser($us){
        $us = \Helpers\Validation::trimForm($us);
        if ($result['dataset'] = $this->usersModel->addNewUser($us)) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'No se encontraron datos';
        }
        return $result;
    }

    public function login($userData)
    {
        $result = $this->r;
        $userData = \Helpers\Validation::trimForm($userData);
        $email = $userData['email'];
        $password = $userData['password'];
        $app = isset($userData['app']) ? $userData['app'] : false;

        $user = new UsuarioPrivilegiado;
        $errors = [];
        $errors = $user->setEmail($email, true) === true ? $errors : array_merge($errors, $user->setEmail($email, true));
        $errors = $user->setPassword($password, false) === true ? $errors : array_merge($errors, $user->setPassword($password, false));
        //If there aren't any errors
        if (!boolval($errors)) {
            $userHash = $this->usersModel->checkPassword($email, (!$app ? 1 : 3));
            if ($userHash) {
                if (password_verify($password, trim($userHash->clave))) {
                    if ($app == false) {
                        if($userHash->secret2fa==null){
                            $this->loginSession($userHash->id_usuario_p, $email);
                            $result['status'] = 1;
                            $result['message'] = 'Autenticación correcta';
                        }
                        else{
                            $result['status'] = 2;
                            $result['message'] = 'Verificación en 2 pasos.';
                        }
                    } else {
                        $result['session'] = $userHash->id_usuario_p;
                        $result['status'] = 1;
                        $result['message'] = 'Autenticación correcta';
                    }
                } else {
                    $result['status'] = -1;
                    $result['exception'] = 'Credenciales incorrectas';
                }
            } else {
                $result['status'] = -1;
                $result['exception'] = 'Credenciales incorrectas';
            }
        } else {
            $result['exception'] = 'Error en uno de los campos';
            $result['errors'] = $errors;
        }
        return $result;
    }

    private function loginSession($id, $email)
    {
        $_SESSION['p_user_id'] = $id;
        $_SESSION['p_user_email'] = $email;
    }

    public function save2fa($secret, $id)
    {
        $result = $this->r;
        if($this->usersModel->save2fa($secret, $id)){
            $result['status'] = 1;
        }
        else{
            $result['status'] = 0;
            $result['exception'] = 'Error al activar la verificación en 2 pasos.';
        }
        return $result;
    }
    public function twoFactorAuth($data, $isLogin=true)
    {
        $result = $this->r;
        $code = $data['code'];
        if($isLogin){
            $secret = '';
        }
        else{
            $secret = $data['secret'];
        }
        $tfa = new \RobThree\Auth\TwoFactorAuth('Emergencia.ID');

        if($tfa->verifyCode($secret, $code) === true){
            $result['status'] = 1;
        }
        else{
            $result['status'] = 0;
            $result['exception'] = 'El código de autenticación es incorrecto';
        }
        return $result;
    }

    public function twoFactorAuthLogin($data)
    {
        $result = $this->r;
        $code = $data['code'];
        $email = $data['email'];
        $userHash = $this->usersModel->checkPassword($email);
        $secret = $userHash->secret2fa;

        $tfa = new \RobThree\Auth\TwoFactorAuth('Emergencia.ID');

        if($tfa->verifyCode($secret, $code) === true){
            //if ($this->usersModel->setOnline($email, true)) {
            $this->loginSession($userHash->id_usuario_p, $email);
                //$_SESSION['client_pw_exp'] = (new DateTime('now'))->format('Y-m-d') > ((new DateTime($userHash->ultimocambiocontrasena))->add(new DateInterval('P3M')))->format('Y-m-d') ? 1 : 0;
                //if (isset($_SESSION['client_lg_att'])) unset($_SESSION['client_lg_att']);
            $result['status'] = 1;
            $result['message'] = 'Autenticación correcta';
            /*}else {
                $result['status'] = -1;
                $result['exception'] = 'Ocurrió un error al iniciar sesión';
            }*/
        }
        else{
            $result['status'] = 0;
            $result['exception'] = 'El código de autenticación es incorrecto';
        }
        return $result;
    }

    public function getUserInfo()
    {
        if ($result['dataset'] = $this->usersModel->getUser($_SESSION['p_user_id'])) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'Hubo un error al cargar los datos';
        }
        return $result;
    }

    public function getAppProfileInfo($data)
    {
        if ($result['dataset'] = $this->usersModel->getUserParams($data)) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'Hubo un error al cargar los datos.';
        }
        return $result;
    }

    public function create($data, $result)
    {
        return $this->userRegister($data, $result);
    }

    public function delete()
    {
        $id = $_SESSION['user_id'];
        $user = new Usuario;

        if ($user->setId($id) && $user->userExists('id_usuario', $id)) {
            if ($user->deleteUser($id)) {
                session_destroy();
                $result['status'] = 1;
                $result['message'] = 'Usuario eliminado correctamente';
            } else {
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'Usuario inexistente';
        }
        return $result;
    }

    public function userRegister($userData, $result)
    {
        $userData = \Helpers\Validation::trimForm($userData);
        $nombre = $userData['nombre'];
        $apellido = $userData['apellido'];
        $email = $userData['email'];
        $password = $userData['password'];
        $idTipoUsuario = isset($userData['idTipoUsuario']) ? $userData['idTipoUsuario'] : 1;

        $user = new Usuario;
        $errors = [];
        $errors = $user->setNombre($nombre) === true ? $errors : array_merge($errors, $user->setNombre($nombre));
        $errors = $user->setApellido($apellido) === true ? $errors : array_merge($errors, $user->setApellido($apellido));
        $errors = $user->setEmail($email) === true ? $errors : array_merge($errors, $user->setEmail($email));
        $errors = $user->setPassword($password) === true ? $errors : array_merge($errors, $user->setPassword($password));
        $errors = $user->setIdTipo($idTipoUsuario) === true ? $errors : array_merge($errors, $user->setIdTipo($idTipoUsuario));
        //If there aren't any errors
        if (!boolval($errors)) {
            if ($this->usersModel->registerUser($user)) {
                $result['status'] = 1;
                $result['message'] = 'Usuario registrado correctamente';
            } else {
                $result['status'] = -1;
                $result['exception'] = 'Error al ingresar los datos';
            }
        } else {
            $result['exception'] = 'Error en uno de los campos';
            $result['errors'] = $errors;
        }
        return $result;
    }

    public function getSidebarStatus($result)
    {
        if (isset($_SESSION['sidebar_status'])) {
            $result['dataset'] = array('status' => $_SESSION['sidebar_status']);
            $result['status'] = 1;
            $result['message'] = 'Se ha conseguido el estado correctamente';
        } else {
            $result['status'] = -1;
            $result['exception'] = 'Ocurrió un problema al conseguir el estado';
        }
        return $result;
    }

    public function setSidebarStatus($value, $result)
    {
        if (isset($_SESSION['sidebar_status'])) {
            $_SESSION['sidebar_status'] = $value['status'];
            $result['status'] = 1;
            $result['message'] = 'Se ha cambiado el estado correctamente';
        } else {
            $result['status'] = -1;
            $result['exception'] = 'Ocurrió un problema al modificar el estado';
        }
        return $result;
    }

    public function logout()
    {
        $result = $this->r;
        if (session_destroy()) {
            $result['status'] = 1;
            $result['message'] = 'Se ha cerrado la sesión';
        } else {
            $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
        }
        return $result;
    }

    public function updateUser($userData)
    {
        $result = $this->r;
        $userData = \Helpers\Validation::trimForm($userData);
        $idUsuario = $_SESSION['p_user_id'];

        $userInfo = $this->usersModel->getUser($idUsuario);

        $email = $userData['email'];
        $tel = $userData['tel'];

        $user = new UsuarioPrivilegiado;
        $errors = [];
        $errors = $user->setId($idUsuario) === true ? $errors : array_merge($errors, $user->setId($idUsuario));
        if ($email != $userInfo->email) {
            $errors = $user->setEmail($email) === true ? $errors : array_merge($errors, $user->setEmail($email));
        } else {
            $errors = $user->setEmail($email, true) === true ? $errors : array_merge($errors, $user->setEmail($email, true));
        }
        if ($tel != $userInfo->telefono) {
            $errors = $user->setTelefono($tel) === true ? $errors : array_merge($errors, $user->setTelefono($tel));
        } else {
            $errors = $user->setTelefono($tel, true) === true ? $errors : array_merge($errors, $user->setTelefono($tel, true));
        }
        //If there aren't any errors
        if (!boolval($errors)) {
            if ($this->usersModel->updateUser($user)) {
                $result['status'] = 1;
                $result['message'] = 'Usuario actualizado correctamente';
                $_SESSION['p_user_email'] = $user->getEmail();
            } else {
                $result['status'] = -1;
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'Error en uno de los campos';
            $result['errors'] = $errors;
        }
        return $result;
    }

    public function updatePassword($userData)
    {
        $result = $this->r;
        $userData = \Helpers\Validation::trimForm($userData);
        $idUsuario = $_SESSION['p_user_id'];

        $userInfo = $this->usersModel->getUser($idUsuario);

        $currentPassword = $userData['password'];
        $newPassword = $userData['newPassword'];
        $newPasswordR = $userData['newPasswordR'];

        $user = new UsuarioPrivilegiado;
        $errors = [];
        $errors = $user->setId($idUsuario) === true ? $errors : array_merge($errors, $user->setId($idUsuario));

        if (password_verify($currentPassword, trim($userInfo->clave))) {
            $errors = $user->setPassword($newPassword, true, 'Nueva Contraseña') === true ? $errors : array_merge($errors, $user->setPassword($newPassword, true, 'Nueva Contraseña'));
            if ($newPasswordR) {
                if ($newPassword != $newPasswordR) {
                    $errors['NewPasswordR'] = ['Las contraseñas no coinciden'];
                }
            } else {
                $errors['NewPasswordR'] = ['Este campo es obligatorio'];
            }
        } else {
            $errors['Contraseña'] = ['Contraseña incorrecta.'];
            $errors = $user->setPassword($currentPassword, false) === true ? $errors : array_merge($errors, $user->setPassword($currentPassword, false));
        }

        if (!boolval($errors)) {
            if ($this->usersModel->updateUser($user)) {
                $result['status'] = 1;
                $result['message'] = 'Contraseña actualizada correctamente';
            } else {
                $result['status'] = -1;
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'Error en uno de los campos';
            $result['errors'] = $errors;
        }
        return $result;
    }


    public function recoverPassword($userData)
    {
        $result = $this->r;
        $userData = \Helpers\Validation::trimForm($userData);
        $email = $userData['email'];

        $user = new UsuarioPrivilegiado;
        $errors = [];
        $errors = $user->setEmail($email, true) === true ? $errors : array_merge($errors, $user->setEmail($email, true));
        //If there aren't any errors
        if (!boolval($errors)) {
            $userInfo = $this->usersModel->checkPassword($email);
            if ($userInfo) {
                $pin = strtoupper($this->pin());
                if ($this->usersModel->saveRecoveryCode($pin, $userInfo->id_usuario_p)) {
                    if (\Helpers\EmailSender::sendEmail('Código para recuperar contraseña', $email, "El código de recuperación es: $pin.\n")) {
                        $result['status'] = 1;
                        $result['message'] = 'Se ha enviado el pin correctamente';
                    } else {
                        $result['status'] = -1;
                        $result['exception'] = 'Error al enviar correo electrónico';
                    }
                } else {
                    $result['status'] = -1;
                    $result['exception'] = \Common\Database::$exception;
                }
            } else {
                $errors['Email'] = ['No existe ninguna cuenta con este email.'];
            }
        } else {
            $result['exception'] = 'Error en uno de los campos';
        }
        $result['errors'] = $errors;
        return $result;
    }

    public function recoverCode($userData)
    {
        $result = $this->r;
        $userData = \Helpers\Validation::trimForm($userData);
        $pin = strtoupper($userData['pin']);
        $email = $userData['email'];
        $userInfo = $this->usersModel->checkPassword($email);
        $errors[] = '';

        if ($userInfo) {
            if (empty($pin)) {
                $errors['Código'] = ['Este campo es obligatorio.'];
            } else {
                if ($pin == ($this->usersModel->getPasswordPin($userInfo->id_usuario_p))->pin) {
                    $result['status'] = 1;
                    setcookie("email", $email, time() + 420, HOME_PATH . "admin/user/newPassword");
                } else {
                    $errors['Código'] = ['El código es incorrecto.'];
                }
            }
        } else {
            $errors['Código'] = ['El código es incorrecto.'];
        }

        $result['errors'] = $errors;
        return $result;
    }

    public function newPassword($userData)
    {
        $result = $this->r;
        $userData = \Helpers\Validation::trimForm($userData);
        $email = $userData['email'];
        $newPassword = $userData['newPassword'];
        $newPasswordR = $userData['newPasswordR'];
        $idUsuario= ($this->usersModel->checkPassword($email))->id_usuario_p;

        $user = new UsuarioPrivilegiado;
        $errors = [];
        $errors = $user->setId($idUsuario) === true ? $errors : array_merge($errors, $user->setId($idUsuario));
        $errors = $user->setEmail($email, true) === true ? $errors : array_merge($errors, $user->setEmail($email, true));
        $errors = $user->setPassword($newPassword, true, 'Nueva Contraseña') === true ? $errors : array_merge($errors, $user->setPassword($newPassword, true, 'Nueva Contraseña'));
        if ($newPasswordR) {
            if ($newPassword != $newPasswordR) {
                $errors['NewPasswordR'] = ['Las contraseñas no coinciden'];
            }
        } else {
            $errors['NewPasswordR'] = ['Este campo es obligatorio'];
        }
        //If there aren't any errors
        if (!boolval($errors)) {
            if ($this->usersModel->changePassword($user)) {
                $result['status'] = 1;
                $result['message'] = 'Usuario actualizado correctamente';
                if (isset($_COOKIE['email'])) {
                    unset($_COOKIE['email']);
                    setcookie('email', null, -1, HOME_PATH . 'newPassword');
                }
            } else {
                $result['status'] = -1;
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'Error en uno de los campos';
            $result['errors'] = $errors;
        }
        return $result;
    }

    private function pin($lenght = 6)
    {
        // uniqid gives 13 chars, but you could adjust it to your needs.
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, $lenght);
    }
}
