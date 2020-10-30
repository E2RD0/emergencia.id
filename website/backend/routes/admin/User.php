<?php
class User extends \Common\Controller
{
    public function __construct(){
        $this->usersModel = $this->loadModel('UsuarioPrivilegiado');
    }

    public function signup()
    {
        $this->loadView('admin', 'registro', -1);
    }

    public function new()
    {
        $this->loadView('admin', 'registerNewUser', -1);
    }

    public function login()
    {
        $this->loadView('admin', 'login', -1);
    }
    public function settings()
    {
        $this->loadView('admin', 'configurarCuenta');
    }

    public function recoverPassword()
    {
        $this->loadView('admin', 'recuperarContrasena', -1);
    }
    public function recoverCode($emailParameter)
    {
        DEFINE('EMAIL', $emailParameter);
        $this->loadView('admin', 'ingresarCodigo', -1);
    }
    public function newPassword()
    {
        if(isset($_COOKIE['email'])) {
            $this->loadView('admin', 'cambiarContrasena', -1);
        }
        else {
            Core::http404();
        }
    }
}
