<?php

class PerfilesUsuario
{
    private $id_perfiles_usuario;
    private $id_usuario;
    private $id_perfil_medico;

    public function __construct()
    {
    }

    public function getId_Perfiles_Usuario()
    {
        return $this->id;
    }

    public function setId_Perfiles_Usuario($value)
    {
        $v = new \Valitron\Validator(array('Id_Perfiles_Usuario' => $value));
        $v->rule('required', 'Id_Perfiles_Usuario');
        $v->rule('integer', 'Id_Perfiles_Usuario');
        if($v->validate()) {
            $this->id = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function countProfilesUser($id_usuario)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM perfiles_usuario WHERE id_usuario = :id');
        $db->bind(':id', $id_usuario);
        return $db->rowCount();
    }

    public function getShowProfile($param)
    {
        $db = new \Common\Database;
        $db->query("SELECT perfil_medico.id_perfil_medico ,perfil_medico.nombres, perfil_medico.apellidos, date_part('year',age(perfil_medico.fecha_nacimiento)), pais.nombre, perfil_medico.ciudad, perfil_medico.foto
        FROM perfil_medico FULL JOIN pais ON perfil_medico.id_pais = pais.id_pais WHERE perfil_medico.id_usuario = :id ORDER BY perfil_medico.id_perfil_medico ASC") ;
       $db->bind(':id', $param);
        return $db->resultSet();
    }

    public function getShowProfileShared($param)
    {
        $db = new \Common\Database;
        $db->query("SELECT perfil_medico.id_perfil_medico ,perfil_medico.nombres, perfil_medico.apellidos, date_part('year',age(perfil_medico.fecha_nacimiento)), pais.nombre, perfil_medico.ciudad, perfil_medico.foto FROM perfil_usuarios_compartir
        JOIN perfil_medico ON perfil_usuarios_compartir.id_perfil_medico = perfil_medico.id_perfil_medico
        JOIN usuario ON perfil_usuarios_compartir.id_usuario = usuario.id_usuario
        JOIN pais ON perfil_medico.id_pais = pais.id_pais WHERE perfil_usuarios_compartir.id_usuario = :id ORDER BY perfil_usuarios_compartir.id_usuarios_compartir ASC") ;
       $db->bind(':id', $param);
        return $db->resultSet();
    }

    public function profileExists($param)
    {
        $db = new \Common\Database;
        $db->query("SELECT id_perfil_medico FROM perfil_medico WHERE id_perfil_medico = :id");
        $db->bind(':id', $param);
        return boolval($db->rowCount());
    }

    public function sharedProfileExists($perfil, $iduser)
    {
        $db = new \Common\Database;
        $db->query("SELECT id_usuarios_compartir FROM perfil_usuarios_compartir WHERE id_perfil_medico = :id_perfil AND id_usuario = :id_usuario");
        $db->bind(':id_perfil', $perfil);
        $db->bind(':id_usuario', $iduser);
        return boolval($db->rowCount());
    }

    public function deleteProfile($param)
    {
        $db = new \Common\Database;
        $db->query("DELETE FROM perfil_medico WHERE id_perfil_medico = :id");
        $db->bind(':id', $param);
        return boolval($db->rowCount());
    }

    public function deleteSharedProfile($perfil, $iduser)
    {
        $db = new \Common\Database;
        $db->query("DELETE FROM perfil_usuarios_compartir WHERE id_perfil_medico = :id_perfil AND id_usuario = :id_usuario");
        $db->bind(':id_perfil', $perfil);
        $db->bind(':id_usuario', $iduser);
        return boolval($db->rowCount());
    }

}
?>
