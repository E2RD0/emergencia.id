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

}


?>
