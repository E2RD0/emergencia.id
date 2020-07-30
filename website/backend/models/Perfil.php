<?php

class Perfil
{
    private $id_perfil_medico;
    private $nombres;
    private $apellidos;
    private $uid;
    private $pin;
    private $foto;
    private $fecha_nacimiento;
    private $documento_identidad;
    private $es_donador;
    private $listado;
    private $direccion;
    private $peso;
    private $estatuta;
    private $id_pais;
    private $id_pais_estado;
    private $ciudad;
    private $id_tipo_sangre;
    private $id_estado_isss;

    public function __construct()
    {
        //session_start();
    }
    public function getNombres()
    {
        return $this->nombres;
    }

    public function setNombres($value)
    {
        $v = new \Valitron\Validator(array('Nombres' => $value));
        $v->rule('required', 'Nombres');
        $v->rule('regex', 'Nombres', '/^[A-Z a-zñáéíóúüÑÁÉÍÓÚ]+$/');
        if ($v->validate()) {
            $this->nombres = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getApellidos()
    {
        return $this->nombres;
    }

    public function setApellidos($value)
    {
        $v = new \Valitron\Validator(array('Apellidos' => $value));
        $v->rule('required', 'Apellidos');
        $v->rule('regex', 'Apellidos', '/^[A-Z a-zñáéíóúüÑÁÉÍÓÚ]+$/');
        if ($v->validate()) {
            $this->apellidos = $value;
            return true;
        } else {
            return $v->errors();
        }
    }


    public function getProfileInformation(){
        $db = new \Common\Database;
        $db->query('SELECT * FROM perfil_medico LIMIT 1');
        return $db->resultSet();
    }

    public function existProfile($parameter, $s){

        $db = new \Common\Database;
        $db->query('SELECT * FROM perfil_medico WHERE id_perfil_medico = :id AND id_usuario = :se');
        $db->bind(':id', $parameter);
        $db->bind(':se', $s);
        return $db->resultSet();
    }

    public function loadBlood(){
        $db = new \Common\Database;
        $db->query('SELECT * FROM tipo_sangre');
        return $db->resultSet();
    }

    public function loadIsssEstatus(){
        $db = new \Common\Database;
        $db->query('SELECT * FROM estado_isss');
        return $db->resultSet();
    }

    public function loadCountry(){
        $db = new \Common\Database;
        $db->query('SELECT * FROM pais');
        return $db->resultSet();
    }

    public function loadCity($param){
        $db = new \Common\Database;
        $db->query('SELECT * FROM pais_estado WHERE id_pais = :id');
        $db->bind(':id', $param);
        return $db->resultSet();
    }

    public function newProfile($param){
        $db = new \Common\Database;
        $db->query('INSERT INTO perfil_medico(id_usuario) VALUES (:id) RETURNING id_perfil_medico;');
        $db->bind(':id', $param);
        return $db->getResult();
    }
    public function updateProfile($param, $value, $id){
        $db = new \Common\Database;
        $db->query("UPDATE perfil_medico set $param = :value WHERE id_perfil_medico = :id");
        $db->bind(':value', $value);
        $db->bind(':id', $id);
        return $db->execute();
    }
    public function countProfilesUser($id_usuario){
        $db = new \Common\Database;
        $db->query('SELECT * FROM perfil_medico WHERE id_usuario = :id');
        $db->bind(':id', $id_usuario);
        return $db->rowCount();
    }

}


?>
