<?php
class Users extends \Common\Controller
{
    public function __construct()
    {
        $this->usersModel = $this->loadModel('Usuario');
        $this->r = array('status' => 0, 'message' => null, 'exception' => null, 'errors'=> []);
    }

    public function signUp($userData)
    {
        $result = $this->r;
        $userData = \Helpers\Validation::trimForm($userData);
        $email = $userData['email'];
        $password = $userData['password'];

        $user = new Usuario;
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

    public function login($userData)
    {
        $result = $this->r;
        $userData = \Helpers\Validation::trimForm($userData);
        $email = $userData['email'];
        $password = $userData['password'];

        $user = new Usuario;
        $errors = [];
        $errors = $user->setEmail($email, true) === true ? $errors : array_merge($errors, $user->setEmail($email, true));
        $errors = $user->setPassword($password, false) === true ? $errors : array_merge($errors, $user->setPassword($password, false));
        //If there aren't any errors
        if (!boolval($errors)) {
            $userHash = $this->usersModel->checkPassword($email);
            if ($userHash) {
                if (password_verify($password, trim($userHash->clave))) {
                    $this->loginSession($userHash->id_usuario, $email);
                    $result['status'] = 1;
                    $result['message'] = 'Autenticación correcta';
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

    private function loginSession($id, $email){
        $_SESSION['user_id'] = $id;
        $_SESSION['user_email'] = $email;
    }

    public function getUserInfo()
    {
        if ($result['dataset'] = $this->usersModel-> getUser($_SESSION['user_id'])) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'Hubo un error al cargar los datos';
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
        $idTipoUsuario = isset($userData['idTipoUsuario']) ? $userData['idTipoUsuario']: 1 ;

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

    public function setSidebarStatus($value ,$result)
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
        $idUsuario = $_SESSION['user_id'];

        $userInfo= $this->usersModel->getUser($idUsuario);

        $email = $userData['email'];
        $tel = $userData['tel'];
        $idPerfil = intval($userData['perfil']);

        $user = new Usuario;
        $errors = [];
        $errors = $user->setId($idUsuario) === true ? $errors : array_merge($errors, $user->setId($idUsuario));
        $errors = $user->setIdPerfil($idPerfil) === true ? $errors : array_merge($errors, $user->setIdPerfil($idPerfil));
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
                $_SESSION['user_email'] = $user->getEmail();
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
        $idUsuario = $_SESSION['user_id'];

        $userInfo= $this->usersModel->getUser($idUsuario);

        $currentPassword = $userData['password'];
        $newPassword = $userData['newPassword'];
        $newPasswordR = $userData['newPasswordR'];

        $user = new Usuario;
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


    public function userRecoverPassword($userData, $result)
    {
        $userData = \Helpers\Validation::trimForm($userData);
        $email = $userData['email'];

        $user = new Usuario;
        $errors = [];
        $errors = $user->setEmail($email, true) === true ? $errors : array_merge($errors, $user->setEmail($email, true));
        //If there aren't any errors
        if (!boolval($errors)) {
            $userInfo = $this->usersModel->checkPassword($email);
            if ($userInfo) {
                $pin = strtoupper($this->pin());
                if ($this->usersModel->saveRecoveryCode($pin, $userInfo->idusuario)) {
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

    public function userRecoverCode($userData, $result)
    {
        $userData = \Helpers\Validation::trimForm($userData);
        $pin = strtoupper($userData['pin']);
        $email = $userData['email'];
        $userInfo = $this->usersModel->checkPassword($email);
        $errors[] = '';

        if ($userInfo) {
            if (empty($pin)) {
                $errors['Código'] = ['Este campo es obligatorio.'];
            } else {
                if ($pin==($this->usersModel->getPasswordPin($userInfo->idusuario))->pin) {
                    $result['status'] = 1;
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
