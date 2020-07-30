<?php

class PerfilesUsuario
{
    private $id_perfiles_usuario;
    private $id_usuario;
    private $id_perfil_medico;

    public function __construct()
    {
    }

    public function countProfilesUser($id_usuario){
        $db = new \Common\Database;
        $db->query('SELECT * FROM perfiles_usuario WHERE id_usuario = :id');
        $db->bind(':id', $id_usuario);
        return $db->rowCount();
    }

    public function getShowProfile($param){
        $db = new \Common\Database;
        $db->query("SELECT perfil_medico.id_perfil_medico ,perfil_medico.nombres, perfil_medico.apellidos, pais.nombre, perfil_medico.ciudad, perfil_medico.foto FROM perfil_medico INNER JOIN pais ON perfil_medico.id_pais = pais.id_pais WHERE perfil_medico.id_usuario = :id") ;
       $db->bind(':id', $param);
        return $db->resultSet();
    }
}


?>
