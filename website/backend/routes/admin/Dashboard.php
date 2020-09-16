<?php
class Dashboard extends \Common\Controller
{
    public function __construct(){
        $this->model = $this->loadModel('UsuarioPrivilegiado');
    }
    public function index(){
        Helpers\Url::redirect('admin/dashboard/analytics');
    }

    public function analytics()
    {
        $this->loadView('admin', 'dashboard', true);
    }
}
