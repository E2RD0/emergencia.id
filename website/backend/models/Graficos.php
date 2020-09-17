<?php

class Graficos
{
    private $db;

    public function __construct()
    {
    }

    public function getCountries(){
        $db = new \Common\Database;
        $db->query('SELECT * FROM pais');
        return $db->resultSet();
    }

    public function graficoTipoSangre($value){
        $db = new \Common\Database;
        if($value !==null){
            $db->query('SELECT tipo as "column", COUNT(tipo) as "value" from perfil_medico p INNER JOIN tipo_sangre t ON p.id_tipo_sangre = t.id_tipo_sangre WHERE p.es_donador = :value GROUP BY tipo ORDER BY count(tipo) DESC');
            $db->bind(':value', $value);
        }
        else{
            $db->query('SELECT tipo as "column", COUNT(tipo) as "value" from perfil_medico p INNER JOIN tipo_sangre t ON p.id_tipo_sangre = t.id_tipo_sangre WHERE p.es_donador IS null GROUP BY tipo ORDER BY count(tipo) DESC');
        }
        return $db->resultSet();
    }

    public function graficoPerfilesPais($value){
        $db = new \Common\Database;
        $db->query('SELECT pe.nombre as "column", count(p.id_perfil_medico) as "value" from perfil_medico p INNER JOIN pais_estado pe on p.id_pais_estado = pe.id_pais_estado WHERE p.id_pais= :value GROUP BY p.id_pais_estado, pe.nombre
                    ORDER BY count(p.id_perfil_medico) DESC');
        $db->bind(':value', $value);
        return $db->resultSet();
    }

    public function graficoPerfilesFecha($value1, $value2){
        $db = new \Common\Database;
        $db->query('SELECT to_char(date_trunc(\'month\', fecha_creacion), \'Mon-YYYY\') AS "column", date_trunc(\'month\', fecha_creacion) AS txn_month, count(id_perfil_medico) as "value"
                    FROM perfil_medico WHERE fecha_creacion BETWEEN :fechaInicio AND :fechaFin
                    GROUP BY txn_month ORDER BY txn_month ASC');
        $db->bind(':fechaInicio', $value1);
        $db->bind(':fechaFin', $value2);
        return $db->resultSet();
    }

    public function graficoUsuariosFecha($value1, $value2){
        $db = new \Common\Database;
        $db->query('SELECT to_char(date_trunc(\'month\', fecha_ingreso), \'Mon-YYYY\') AS "column", date_trunc(\'month\', fecha_ingreso) AS txn_month, count(id_usuario) as "value"
        FROM usuario WHERE fecha_ingreso BETWEEN :fechaInicio AND :fechaFin
        GROUP BY txn_month ORDER BY txn_month ASC');
        $db->bind(':fechaInicio', $value1);
        $db->bind(':fechaFin', $value2);
        return $db->resultSet();
    }

    public function graficoUsuariosPrivFecha($value1, $value2){
        $db = new \Common\Database;
        $db->query('SELECT to_char(date_trunc(\'month\', fecha_ingreso), \'Mon-YYYY\') AS "column", date_trunc(\'month\', fecha_ingreso) AS txn_month, count(id_usuario_p) as "value"
        FROM usuario_privilegiado WHERE fecha_ingreso BETWEEN :fechaInicio AND :fechaFin
        GROUP BY txn_month ORDER BY txn_month ASC');
        $db->bind(':fechaInicio', $value1);
        $db->bind(':fechaFin', $value2);
        return $db->resultSet();
    }

}
