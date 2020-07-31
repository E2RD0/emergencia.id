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

    /*public function dashboard()
    {
        $this->loadView('store', 'dashboard');
    }

    public function recoverPassword()
    {
        $this->loadView('dashboard', 'enviar-correo', -1);
    }
    public function recoverCode($emailParameter)
    {
        DEFINE('EMAIL', $emailParameter);
        $this->loadView('dashboard', 'ingresar-codigo', -1);
    }
    public function newPassword()
    {
        $this->loadView('dashboard', 'recuperar-clave', -1);
    }*/
}
