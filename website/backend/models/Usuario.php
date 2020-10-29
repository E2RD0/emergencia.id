<?php

class Usuario
{
    private $db;

    private $id;
    private $email;
    private $telefono;
    private $idPerfil;

    public function __construct()
    {
    }
    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $v = new \Valitron\Validator(array('Id' => $value));
        $v->rule('required', 'Id');
        $v->rule('integer', 'Id');
        if ($v->validate()) {
            $this->id = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($value, $isLogin = false)
    {
        $v = new \Valitron\Validator(array('Teléfono' => $value));
        $v->rule('integer', 'Teléfono');
        if ($v->validate()) {
            if ($isLogin) {
                $this->telefono = $value;
                return true;
            } else {
                if (!$this->userExists('telefono', $value)) {
                    $this->telefono = $value;
                    return true;
                } else {
                    $errors = [];
                    $errors['Teléfono'] = ['Ya existe una cuenta con este teléfono'];
                    return $errors;
                }
            }
        } else {
            return $v->errors();
        }
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($value, $isLogin = false)
    {
        $v = new \Valitron\Validator(array('Email' => $value));
        $v->rule('required', 'Email');
        $v->rule('email', 'Email');
        if ($v->validate()) {
            if ($isLogin) {
                $this->email = $value;
                return true;
            } else {
                if (!$this->userExists('email', $value)) {
                    $this->email = $value;
                    return true;
                } else {
                    $errors = [];
                    $errors['Email'] = ['Ya existe una cuenta con este correo'];
                    return $errors;
                }
            }
        } else {
            return $v->errors();
        }
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($value, $checkStrength = true, $name = 'Contraseña')
    {
        $v = new \Valitron\Validator(array($name => $value));
        $v->rule('required', $name);
        if ($checkStrength) {
            $v->rule('lengthMin', $name, 6);
        }
        if ($v->validate()) {
            $this->password = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getIdPerfil()
    {
        return $this->idPerfil;
    }

    public function setIdPerfil($value)
    {
        $v = new \Valitron\Validator(array('Perfil' => $value));
        $v->rule('required', 'Perfil');
        $v->rule('integer', 'Perfil');
        if ($v->validate()) {
            $this->idPerfil = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function userExists($param, $value)
    {
        $db = new \Common\Database;
        $db->query("SELECT * FROM usuario WHERE {$param}=:value");
        //$db->bind(':param', $param);
        $db->bind(':value', $value);
        return boolval($db->rowCount());
    }

    public function getUsers()
    {
        $db = new \Common\Database;
        $db->query('SELECT idUsuario, nombre, apellido, email, contrasena, u.idtipousuario, tipo FROM usuario u INNER JOIN tipoUsuario t ON u.idTipoUsuario = t.idTipoUsuario');
        return $db->resultSet();
    }

    public function getTypes()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM tipoUsuario');
        return $db->resultSet();
    }

    public function deleteUser($value)
    {
        $db = new \Common\Database;
        $db->query('DELETE FROM usuario WHERE id_usuario = :id');
        $db->bind(':id', $value);
        return $db->execute();
    }

    public function userCount()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM usuario');
        return $db->rowCount();
    }
    public function registerUser($user)
    {
        $db = new \Common\Database;
        $db->query('INSERT into usuario (id_usuario, email, clave) VALUES(DEFAULT, :email, :clave)');
        $db->bind(':email', $user->email);
        $db->bind(':clave', password_hash($user->password, PASSWORD_ARGON2ID));
        return $db->execute();
    }
    public function checkPassword($email)
    {
        $db = new \Common\Database;
        $db->query('SELECT * from usuario WHERE email = :email');
        $db->bind(':email', $email);
        return $db->getResult();
    }
    public function modifyUser($user)
    {
        $db = new \Common\Database;
        $db->query('UPDATE usuario SET nombre = :nombre, apellido = :apellido, email = :email, contrasena = :hash, idTipoUsuario = :idTipo WHERE idUsuario = :idUsuario)');
        $db->bind(':nombre', $user->nombre);
        $db->bind(':apellido', $user->apellido);
        $db->bind(':email', $user->email);
        $db->bind(':hash', password_hash($user->password, PASSWORD_ARGON2ID));
        $db->bind(':idTipo', $user->idTipo);
        $db->bind(':idUsuario', $user->idusario);
        return $db->execute();
    }
    public function getUser($id)
    {
        $db = new \Common\Database;
        $db->query("SELECT * FROM usuario WHERE id_usuario=:id");
        $db->bind(':id', $id);
        return $db->getResult();
    }


    public function updateUser($user)
    {
        $db = new \Common\Database;
        if (isset($user->password)) {
            $db->query('UPDATE usuario SET clave = :hash WHERE id_usuario = :idUsuario');
            $db->bind(':idUsuario', $user->id);
            $db->bind(':hash', password_hash($user->password, PASSWORD_ARGON2ID));
        } else {
            $db->query('UPDATE usuario SET telefono = :telefono, email = :email, id_perfil_medico = :idPerfil WHERE id_usuario = :idUsuario;');
            $db->bind(':idUsuario', $user->id);
            $db->bind(':email', $user->email);
            $db->bind(':telefono', $user->telefono);
            $db->bind(':idPerfil', $user->idPerfil);
        }
        return $db->execute();
    }
    public function updateUserParam($param, $value, $id)
    {
        $db = new \Common\Database;
        $db->query("UPDATE usuario SET $param = :value WHERE id_usuario = :idUsuario");
        $db->bind(':idUsuario', $id);
        $db->bind(':value', $value);
        return $db->execute();
    }
    public function saveRecoveryCode($pin, $id)
    {
        $this->deleteRecoveryCode($id);
        $db = new \Common\Database;
        $db->query('INSERT INTO usuario_recuperar_clave values (DEFAULT, NOW(), :pin, :idUsuario)');
        $db->bind(':idUsuario', $id);
        $db->bind(':pin', $pin);
        return $db->execute();
    }
    public function deleteRecoveryCode($id)
    {
        $db = new \Common\Database;
        $db->query('DELETE FROM usuario_recuperar_clave WHERE id_usuario = :idUsuario');
        $db->bind(':idUsuario', $id);
        return $db->execute();
    }
    public function getPasswordPin($id)
    {
        $db = new \Common\Database;
        $db->query('SELECT pin FROM usuario_recuperar_clave WHERE id_usuario = :idUsuario');
        $db->bind(':idUsuario', $id);
        return $db->getResult();
    }
    public function save2fa($secret, $id)
    {
        $db = new \Common\Database;
        if($secret == '')
            $secret = null;
        $db->query('UPDATE usuario SET secret2fa = :value WHERE id_usuario = :id');
        $db->bind(':value', $secret);
        $db->bind(':id', $id);
        return $db->execute();
    }
    public function changePassword($user)
    {
        $db = new \Common\Database;
        $db->query('UPDATE usuario SET clave = :hash WHERE id_usuario = :idUsuario');
        $db->bind(':hash', password_hash($user->password, PASSWORD_ARGON2ID));
        $db->bind(':idUsuario', $user->id);
        return $db->execute();
    }
}
