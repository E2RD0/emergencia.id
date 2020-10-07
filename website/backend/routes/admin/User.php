<?php
class User extends \Common\Controller
{
    public function __construct(){}

    public function signup()
    {
        $this->loadView('admin', 'registro', -1);
    }

    public function login()
    {
        $this->loadView('admin', 'login', -1);
    }
    public function settings()
    {
        $this->loadView('admin', 'configurarCuenta');
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
