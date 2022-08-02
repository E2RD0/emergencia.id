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

    public function profileExists($id_usuario, $id_perfil)
    {
        $db = new \Common\Database;
        $db->query("SELECT id_perfil_medico FROM perfil_medico WHERE id_perfil_medico = :id_perfil AND id_usuario = :id_usuario");
        $db->bind(':id_perfil', $id_perfil);
        $db->bind(':id_usuario', $id_usuario);
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

    public function getUsersSharedWith($perfil)
    {
        $db = new \Common\Database;
        $db->query("SELECT perfil_usuarios_compartir.id_usuario, split_part(perfil_medico.nombres, ' ', 1) as nombres, split_part(perfil_medico.apellidos, ' ', 1) as apellidos, usuario.email
        FROM perfil_usuarios_compartir
        JOIN usuario ON usuario.id_usuario = perfil_usuarios_compartir.id_usuario
        JOIN perfil_medico ON perfil_medico.id_perfil_medico = usuario.id_perfil_medico
        WHERE perfil_usuarios_compartir.id_perfil_medico = :id_perfil
        ORDER BY perfil_usuarios_compartir.id_usuarios_compartir ASC");
        $db->bind(':id_perfil', $perfil);
        return $db->resultSet();
    }

    public function alreadySharingWith($perfil, $iduser)
    {
        $db = new \Common\Database;
        $db->query("SELECT id_usuarios_compartir FROM perfil_usuarios_compartir WHERE id_perfil_medico = :id_perfil AND id_usuario = :id_usuario");
        $db->bind(':id_perfil', $perfil);
        $db->bind(':id_usuario', $iduser);
        return boolval($db->rowCount());
    }

    public function shareProfileWith($perfil, $iduser)
    {
        $db = new \Common\Database;
        $db->query("INSERT INTO perfil_usuarios_compartir VALUES (DEFAULT, :id_perfil, :id_usuario)");
        $db->bind(':id_perfil', $perfil);
        $db->bind(':id_usuario', $iduser);
        return $db->execute();
    }

    public function emailExists($email)
    {
        $db = new \Common\Database;
        $db->query("SELECT id_usuario FROM usuario WHERE email = :email");
        $db->bind(':email', $email);
        return $db->getResult();
    }
}
?>
