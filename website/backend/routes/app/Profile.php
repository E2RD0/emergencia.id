<?php
class Product extends \Common\Controller{

  public function __construct(){
      $this->model = $this->loadModel('PerfilUsuario');
  }
  public function view($id)
  {
      /*if ($this->model->existProduct($id)) {
          $data = $this->model->getProduct($id);
          $this->loadView('store', 'producto', false, $data);
      }
      else {
          Core::http404();
      }*/
  }
}
