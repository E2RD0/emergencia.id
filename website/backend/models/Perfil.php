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

    public function getProfileInformation()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM perfil_medico LIMIT 1');
        return $db->resultSet();
    }

    public function existProfile($parameter, $s)
    {

        $db = new \Common\Database;
        $db->query('SELECT * FROM perfil_medico WHERE id_perfil_medico = :id AND id_usuario = :se');
        $db->bind(':id', $parameter);
        $db->bind(':se', $s);
        return $db->resultSet();
    }

    public function loadBlood()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM tipo_sangre');
        return $db->resultSet();
    }

    public function loadIsssEstatus()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM estado_isss');
        return $db->resultSet();
    }

    public function loadCountry()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM pais');
        return $db->resultSet();
    }

    public function loadCity($param)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM pais_estado WHERE id_pais = :id');
        $db->bind(':id', $param);
        return $db->resultSet();
    }

    public function getRecentProfiles($search)
    {
        $db = new \Common\Database;
        $db->query(
            'SELECT
                uid,
                COALESCE ( nombres || \' \' || apellidos, \'Sin nombre\' ) AS "name",
                foto AS "image",
                COALESCE ( date_part( \'year\', age( perfil_medico.fecha_nacimiento ) ) || \' años\', \'Sin completa\' ) AS "age",
                COALESCE ( documento_identidad, \'Sin documento\' ) AS "doc_id",
                COALESCE ( ciudad, \'Sin ciudad\' ) AS "city",
                COALESCE ( pais.nombre, \'Sin país\' ) AS "country"
            FROM
                perfil_medico
                FULL JOIN pais USING ( id_pais )
            WHERE uid IN (' . $search . ')'
        );
        return $db->resultSet();
    }

    public function newProfile($param)
    {
        $db = new \Common\Database;
        $db->query('INSERT INTO perfil_medico(id_usuario, uid) VALUES (:id, DEFAULT) RETURNING id_perfil_medico;');
        $db->bind(':id', $param);
        return $db->getResult();
    }
    public function getPerfilesUsuario($param)
    {
        $db = new \Common\Database;
        $db->query('SELECT id_perfil_medico, nombres, apellidos FROM perfil_medico WHERE id_usuario = :id');
        $db->bind(':id', $param);
        return $db->resultSet();
    }
    public function updateProfileParam($param, $value, $id)
    {
        $db = new \Common\Database;
        $db->query('UPDATE perfil_medico set $param = :value WHERE id_perfil_medico = :id');
        $db->bind(':value', $value);
        $db->bind(':id', $id);
        return $db->execute();
    }
    public function countProfilesUser($id_usuario)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM perfil_medico WHERE id_usuario = :id');
        $db->bind(':id', $id_usuario);
        return $db->rowCount();
    }

    public function updateProfile($information)
    {
        $db = new \Common\Database;
        $db->query('UPDATE perfil_medico SET nombres= :name, apellidos= :lastName, fecha_nacimiento= :date, documento_identidad= :document,
        es_donador= :donor, listado= :list, direccion= :direction, peso= :weight, estatura= :height, id_pais= :country,
        id_pais_estado= :city, ciudad= :province, id_tipo_sangre= :selectedIdBlood, id_estado_isss= :isssEstatusSelected WHERE id_perfil_medico = :idProfile');
        $db->bind(':idProfile', (int)$information['idProfile']);
        $db->bind(':name', $information['name'] === '' ? null : $information['name']);
        $db->bind(':lastName', $information['lastName'] === '' ? null : $information['lastName']);
        $db->bind(':date', $information['date'] === '' ? null : $information['date']);
        $db->bind(':document', $information['document'] === '' ? null : $information['document']);
        $db->bind(':donor', $information['donor'] === 'true' ? true : false);
        $db->bind(':list', $information['list'] === 'true' ? true : false);
        $db->bind(':direction', $information['direction'] === '' ? null : $information['direction']);
        $db->bind(':weight', $information['weight'] === '' ? null : $information['weight']);
        $db->bind(':height', $information['height'] === '' ? null : $information['height']);
        $db->bind(':country', $information['country'] === 'Seleccionar' ? null : $information['country']);
        $db->bind(':city', $information['city'] === 'Seleccionar' ? null : $information['city']);
        $db->bind(':province', $information['province'] === '' ? null : $information['province']);
        $db->bind(':selectedIdBlood', $information['selectedIdBlood'] === 'Seleccionar' ? null : $information['selectedIdBlood']);
        $db->bind(':isssEstatusSelected', $information['isssEstatusSelected'] === 'Seleccionar' ? null : (int)$information['isssEstatusSelected']);
        return $db->resultSet();
    }

    public function getProfileInformationToUpdate($id)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM perfil_medico WHERE id_perfil_medico = :id');
        $db->bind(':id', (int)$id['idProfileToReceiveUpdates']);
        return $db->resultSet();
    }

    public function searchProfileWithUid($id)
    {
        $db = new \Common\Database;
        $db->query('SELECT * from perfil_medico WHERE perfil_medico.uid = :id');
        $db->bind(':id', $id);
        return $db->resultSet();
    }

    public function getProfileInformationByUser($id)
    {
        $db = new \Common\Database;
        $db->query('SELECT * from perfil_medico p INNER JOIN usuario u ON p.id_perfil_medico = u.id_perfil_medico where u.id_usuario = :id');
        $db->bind(':id', $id);
        return $db->getResult();
    }

    public function createNewContact($inf)
    {
        $db = new \Common\Database;
        $db->query('INSERT INTO perfil_contacto_emergencia
        (nombre, telefono, relacion, direccion, email, id_perfil_medico) VALUES (:nom, :tel, :rel, :dire, :em, :id_p_m)');
        $db->bind(':nom', $inf['name']);
        $db->bind(':tel', $inf['telephone']);
        $db->bind(':rel', $inf['relacion']);
        $db->bind(':dire', $inf['direction']);
        $db->bind(':em', $inf['email']);
        $db->bind(':id_p_m', (int)$inf['id_p_m']);
        return $db->execute();
    }

    public function getProfileContact($id)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM perfil_contacto_emergencia WHERE id_perfil_medico = :id');
        $db->bind(':id', (int)$id['idProfileToReceiveUpdates']);
        return $db->resultSet();
    }

    public function addContactDoctor($id)
    {
        $db = new \Common\Database;
        $db->query('INSERT INTO perfil_contacto_doctor (nombre, telefono, especialidad, id_perfil_medico) VALUES (:nombre, :telefono, :especialidad, :id_perfil_medico);');
        $db->bind(':nombre', $id['nombre']);
        $db->bind(':telefono', $id['telefono']);
        $db->bind(':especialidad', $id['especialidad']);
        $db->bind(':id_perfil_medico', (int)$id['id_perfil_medico']);
        return $db->resultSet();
    }

    public function getContactDoctor($id)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM perfil_contacto_doctor WHERE id_perfil_medico = :id');
        $db->bind(':id', (int)$id['idProfileToReceiveUpdates']);
        return $db->resultSet();
    }

    public function getMed($id)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM perfil_medicacion WHERE id_perfil_medico = :id');
        $db->bind(':id', (int)$id['idProfileToReceiveUpdates']);
        return $db->resultSet();
    }
    public function addMed($id)
    {
        $db = new \Common\Database;
        $db->query('INSERT INTO perfil_medicacion
        (nombre, dosis, frecuencia, notas, id_perfil_medico)
        VALUES (:nombre, :dosis, :frecuencia, :notas, :id_perfil_medico)');
        $db->bind(':nombre', $id['nombre']);
        $db->bind(':dosis', $id['dosis']);
        $db->bind(':frecuencia', $id['frecuencia']);
        $db->bind(':notas', $id['notas']);
        //$db->bind(':adjunto', (int)$id['adjunto']);
        $db->bind(':id_perfil_medico', $id['id_perfil_medico']);
        return $db->resultSet();
    }

    public function addConditionModel($id)
    {
        $db = new \Common\Database;
        $db->query('INSERT INTO perfil_condicion_medica(
            condicion, notas, id_medicacion, id_perfil_medico)
            VALUES (:condicion, :notas, :id_medicacion, :id_perfil_medico);');
        $db->bind(':condicion', $id['condicion']);
        $db->bind(':notas', $id['notas']);
        $db->bind(':id_medicacion', $id['id_medicacion'] === 'Seleccionar' ? null : (int)$id['id_medicacion']);
        $db->bind(':id_perfil_medico', (int)$id['id_perfil_medico']);
        return $db->resultSet();
    }

    public function loadCondition($id)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM perfil_condicion_medica WHERE id_perfil_medico = :id');
        $db->bind(':id', (int)$id['idProfileToReceiveUpdates']);
        return $db->resultSet();
    }

    public function deleteContactModel($id)
    {
        $db = new \Common\Database;
        $db->query('DELETE FROM perfil_contacto_emergencia WHERE id_contacto = :id');
        $db->bind(':id', (int)$id['id']);
        return $db->resultSet();
    }

    public function deleteContactDoctorModel($id)
    {
        $db = new \Common\Database;
        $db->query('DELETE FROM perfil_contacto_doctor WHERE id_contacto_d = :id');
        $db->bind(':id', (int)$id['id']);
        return $db->resultSet();
    }

    public function getProfileUID($id)
    {
        $db = new \Common\Database;
        $db->query('SELECT uid FROM perfil_medico WHERE id_perfil_medico = :id');
        $db->bind(':id', $id);
        return $db->getResult();
    }

    public function generalInformationByUID($uid)
    {
        $db = new \Common\Database;
        $db->query(
            'SELECT email,
                COALESCE ( telefono, \'Sin teléfono\' ) AS "phone",
                COALESCE ( nombres, \'Sin nombres\' ) AS "name",
                COALESCE ( apellidos, \'Sin apellidos\' ) AS "surname",
                COALESCE ( foto, \'sin_foto.png\' ) AS "image",
                COALESCE ( fecha_nacimiento::TEXT, \'0000-00-00\' ) AS "birthDate",
                COALESCE ( documento_identidad, \'Sin documento\' ) AS "doc_id",
                CASE
                    WHEN es_donador = true THEN \'Es donador\'
                    WHEN es_donador = false THEN \'No es donador\'
                END AS "isDonor",
                COALESCE ( direccion, \'Sin dirección\' ) || \', \' || COALESCE ( ciudad, \'Sin ciudad\' ) || \', \' ||
                COALESCE ( pais_estado.nombre, \'Sin estado\' ) || \', \' ||  COALESCE ( pais.nombre, \'Sin país\' ) || \'.\'
                AS "address",
                COALESCE ( peso, \'Sin peso\' ) AS "weight",
                COALESCE ( estatura, \'Sin estatura\' ) AS "height",
                COALESCE ( tipo_sangre.tipo, \'Sin tipo de sangre\' ) AS "bloodType",
                COALESCE ( estado_isss.estado, \'Sin estado\' ) AS "isssState"
            FROM
                perfil_medico
                FULL JOIN pais USING ( id_pais )
                FULL JOIN pais_estado USING ( id_pais_estado )
                FULL JOIN tipo_sangre USING ( id_tipo_sangre )
                FULL JOIN estado_isss USING ( id_estado_isss )
                FULL JOIN usuario USING ( id_usuario )
            WHERE
                perfil_medico.uid = :id'
        );
        $db->bind(':id', $uid);
        return $db->getResult();
    }

    public function emergencyContactsByUID($uid)
    {
        $db = new \Common\Database;
        $db->query(
            'SELECT
                ROW_NUMBER() OVER () AS "id",
                COALESCE(perfil_contacto_emergencia.nombre, \'Sin nombre\') AS "name",
                COALESCE(perfil_contacto_emergencia.telefono, \'Sin teléfono\') AS "phone",
                COALESCE(perfil_contacto_emergencia.relacion, \'Sin relación\') AS "relation",
                COALESCE(perfil_contacto_emergencia.direccion, \'Sin dirección\') AS "address",
                COALESCE(perfil_contacto_emergencia.email, \'Sin correo electrónico\') AS "email"
            FROM
                perfil_contacto_emergencia
                JOIN perfil_medico USING ( id_perfil_medico )
            WHERE perfil_medico.uid = :id'
        );
        $db->bind(':id', $uid);
        return $db->resultSet();
    }

    public function doctorContactsByUID($uid)
    {
        $db = new \Common\Database;
        $db->query(
            'SELECT
                ROW_NUMBER() OVER () AS "id",
                COALESCE(perfil_contacto_doctor.nombre, \'Sin nombre\') AS "name",
                COALESCE(perfil_contacto_doctor.telefono, \'Sin teléfono\') AS "phone",
                COALESCE(perfil_contacto_doctor.especialidad, \'Sin especialidad\') AS "specialty"
            FROM
                perfil_contacto_doctor
                JOIN perfil_medico USING ( id_perfil_medico )
            WHERE
                perfil_medico.uid = :id'
        );
        $db->bind(':id', $uid);
        return $db->resultSet();
    }

    public function medicationByUID($uid)
    {
        $db = new \Common\Database;
        $db->query(
            'SELECT
                ROW_NUMBER() OVER () AS "id",
                COALESCE(perfil_medicacion.nombre, \'Sin nombre\') AS "name",
                COALESCE(perfil_medicacion.dosis, \'Sin dosis\') AS "doses",
                COALESCE(perfil_medicacion.frecuencia, \'Sin frecuencia\') AS "frequency",
                COALESCE(perfil_medicacion.notas, \'Sin notas adicionales\') AS "notes"
            FROM
                perfil_medicacion
                JOIN perfil_medico USING ( id_perfil_medico ) WHERE perfil_medico.uid = :id'
        );
        $db->bind(':id', $uid);
        return $db->resultSet();
    }

    public function medicalConditionsByUID($uid)
    {
        $db = new \Common\Database;
        $db->query(
            'SELECT
                ROW_NUMBER() OVER () AS "id",
                COALESCE(perfil_condicion_medica.condicion, \'Sin completar\') AS "condition",
                COALESCE(perfil_condicion_medica.notas, \'Sin completar\') AS "notes",
                COALESCE(perfil_medicacion.nombre, \'Sin completar\') AS "medication"
            FROM
                perfil_condicion_medica
                JOIN perfil_medico USING ( id_perfil_medico )
                JOIN perfil_medicacion USING ( id_medicacion )
            WHERE perfil_medico.uid = :id'
        );
        $db->bind(':id', $uid);
        return $db->resultSet();
    }
}
