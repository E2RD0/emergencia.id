<?php
class User extends \Common\Controller
{
    public function __construct()
    {
    }

    public function signup()
    {
        $this->loadView('app', 'registro', -1);
    }
    public function new()
    {
        $modeloPUsuario = $this->loadModel('PerfilesUsuario');
        session_start();
        if($modeloPUsuario->countProfilesUser(isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '-1') ==0){
            $this->loadView('app', 'newUser');
        }
        else{
            \Helpers\Url::redirect('app/profile');
        }
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
