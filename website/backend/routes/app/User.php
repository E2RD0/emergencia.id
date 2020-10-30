<?php
class User extends \Common\Controller
{
    public function __construct()
    {
        $this->usersModel = $this->loadModel('Perfil');
    }

    public function signup()
    {
        $this->loadView('app', 'registro', -1);
    }
    public function new()
    {
        $this->loadView('app', 'newUser');
    }

    public function login()
    {
        $this->loadView('app', 'login', -1);
    }

    public function profiles(){
        $this->loadView('app', 'dashboardCliente');
    }
    public function settings()
    {
        $this->loadView('app', 'configurarCuenta');
    }

    public function qrcode()
    {
        $this->loadView('app', 'qrCode');
    }


    public function recoverPassword()
    {
        $this->loadView('app', 'recuperarContrasena', -1);
    }
    public function recoverCode($emailParameter)
    {
        DEFINE('EMAIL', $emailParameter);
        $this->loadView('app', 'ingresarCodigo', -1);
    }
    public function newPassword()
    {
        if(isset($_COOKIE['email'])) {
            $this->loadView('app', 'cambiarContrasena', -1);
        }
        else {
            Core::http404();
        }
    }
}
