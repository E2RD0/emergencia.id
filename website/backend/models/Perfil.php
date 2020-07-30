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
    public function updateProfileParam($param, $value, $id){
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

    public function updateProfile($information){
        $db = new \Common\Database;
        $db->query('UPDATE perfil_medico SET nombres= :name, apellidos= :lastName, fecha_nacimiento= :date, documento_identidad= :document,
        es_donador= :donor, listado= :list, direccion= :direction, peso= :weight, estatura= :height, id_pais= :country,
        id_pais_estado= :city, ciudad= :province, id_tipo_sangre= :selectedIdBlood, id_estado_isss= :isssEstatusSelected WHERE id_perfil_medico = :idProfile');
        $db->bind(':idProfile', (int)$information["idProfile"]);
        $db->bind(':name', $information["name"] === '' ? null : $information["name"] );
        $db->bind(':lastName', $information["lastName"] === '' ? null : $information["lastName"]);
        $db->bind(':date', $information["date"] === '' ? null: $information["date"]);
        $db->bind(':document', $information["document"] === '' ? null : $information["document"]);
        $db->bind(':donor', $information["donor"] === 'true'? true : false);
        $db->bind(':list', $information["list"] === 'true'? true : false);
        $db->bind(':direction', $information["direction"] === '' ? null: $information["direction"]);
        $db->bind(':weight', $information["weight"] === '' ? null : $information["weight"]);
        $db->bind(':height', $information["height"] === '' ? null : $information["height"]);
        $db->bind(':country', $information["country"] === 'Seleccionar' ? null : $information["country"]);
        $db->bind(':city', $information["city"] === 'Seleccionar' ? null : $information["city"]);
        $db->bind(':province', $information["province"] === '' ? null: $information["province"]);
        $db->bind(':selectedIdBlood', $information["selectedIdBlood"] === 'Seleccionar' ? null: $information["selectedIdBlood"]);
        $db->bind(':isssEstatusSelected', $information["isssEstatusSelected"] === 'Seleccionar' ? null: (int)$information["isssEstatusSelected"]);
        return $db->resultSet();
    }

    public function getProfileInformationToUpdate($id){
        $db = new \Common\Database;
        $db->query('SELECT * FROM perfil_medico WHERE id_perfil_medico = :id');
        $db->bind(':id', (int)$id["idProfileToReceiveUpdates"]);
        return $db->resultSet();
    }
    public function getProfileInformationByUser($id){
        $db = new \Common\Database;
        $db->query('SELECT * from perfil_medico p INNER JOIN usuario u ON p.id_perfil_medico = u.id_perfil_medico where u.id_usuario = :id');
        $db->bind(':id', $id);
        return $db->getResult();
    }

    public function createNewContact($inf){
        $db = new \Common\Database;
        $db->query('INSERT INTO perfil_contacto_emergencia
        (nombre, telefono, relacion, direccion, email, id_perfil_medico) VALUES (:nom, :tel, :rel, :dire, :em, :id_p_m)');
        $db->bind(':nom', $inf["name"]);
        $db->bind(':tel', $inf["telephone"]);
        $db->bind(':rel', $inf["relacion"]);
        $db->bind(':dire', $inf["direction"]);
        $db->bind(':em', $inf["email"]);
        $db->bind(':id_p_m', (int)$inf["id_p_m"]);
        return $db->execute();
    }

    public function getProfileContact($id){
        $db = new \Common\Database;
        $db->query('SELECT * FROM perfil_contacto_emergencia WHERE id_perfil_medico = :id');
        $db->bind(':id', (int)$id["idProfileToReceiveUpdates"]);
        return $db->resultSet();
    }

}


?>
