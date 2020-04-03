--Consultas para reporte con rango de fechas:
SELECT
    accion_bitacora.accion,
    bitacora_usuario.descripcion,
    bitacora_usuario.fecha,
    usuario.uid
FROM
    bitacora_usuario
    INNER JOIN usuario ON bitacora_usuario.id_usuario = usuario.id_usuario
    INNER JOIN accion_bitacora ON bitacora_usuario.id_accion_bitacora = accion_bitacora.id_accion_bitacora
WHERE
    bitacora_usuario.fecha BETWEEN '2020-01-01'
    AND '2020-02-01'
GROUP BY
    bitacora_usuario.descripcion,
    bitacora_usuario.fecha,
    usuario.uid,
    accion_bitacora.accion;

SELECT
    enlaces_compartir.enlace,
    enlaces_compartir.fecha_creacion,
    enlaces_compartir.fecha_expiracion,
    usuario.uid
FROM
    enlaces_compartir
    INNER JOIN usuario ON enlaces_compartir.id_usuario = usuario.id_usuario
WHERE
    enlaces_compartir.fecha_creacion BETWEEN '2020-01-01'
    AND '2020-02-01'
GROUP BY
    enlaces_compartir.enlace,
    enlaces_compartir.fecha_creacion,
    enlaces_compartir.fecha_expiracion,
    usuario.uid;

SELECT
    usuario.id_usuario,
    procedimiento_medico.procedimiento,
    procedimiento_medico.fecha
FROM
    procedimiento_medico
    INNER JOIN usuario ON procedimiento_medico.id_usuario = usuario.id_usuario
WHERE
    procedimiento_medico.fecha BETWEEN '2020-01-01'
    AND '2020-02-01'
GROUP BY
    usuario.id_usuario,
    procedimiento_medico.procedimiento,
    procedimiento_medico.fecha;
--Consultas para graficos
SELECT
    COUNT(tipo_sangre) AS Cantidad,
    u.tipo_sangre AS "TIPO"
FROM
    usuario u
GROUP BY
    tipo_sangre;

SELECT
    COUNT(id_enlace)
FROM
    enlaces_compartir e
WHERE
    e.id_usuario = 1;

SELECT
    alergia
FROM
    usuario_alergia
GROUP BY
    alergia
HAVING
    COUNT(*) > 1;

SELECT
    COUNT(*)
FROM
    usuario;

SELECT
    COUNT(*)
FROM
    organizacion;
--Consultas para reportes con datos
SELECT
    id_usuario AS "ID",
    uid AS "Identificador único",
    (nombres || ' ' || apellidos) AS "Nombre",
    (
        date_part('years', AGE(NOW(), fecha_nacimiento)) || ' ' || 'años'
    ) AS "Edad",
    tipo_sangre AS "Tipo de Sangre",
    (
        CASE
            WHEN es_donador = 'f' THEN 'No es donador'
            WHEN es_donador = 't' THEN 'Es donador'
        END
    ) AS "Donador de organos",
    (estado || ', ' || ciudad || ', ' || pais) AS "Localidad",
    foto AS "Fotografía"
FROM
    usuario
WHERE
    di = '76529364-5';

SELECT
    id_contacto AS "ID de contacto",
    nombre AS "Nombre del contacto",
    relacion AS "Relación con el usuario",
    (nombres || ' ' || apellidos) AS "Usuario"
FROM
    contacto_emergencia
    INNER JOIN usuario ON contacto_emergencia.id_usuario = usuario.id_usuario
WHERE
    usuario.di = '76529364-5';

SELECT
    id_seguro AS "No. de seguro",
    compania AS "Compañia",
    num_identificacion AS "No. de identificación personal del seguro médico",
    deducible AS "Valor del seguro médico",
    (nombres || ' ' || apellidos) AS "Nombre del seguro"
FROM
    seguro_medico
    INNER JOIN usuario ON seguro_medico.id_usuario = usuario.id_usuario
WHERE
    usuario.di = '76529364-5';

SELECT
    usuario.id_usuario AS "ID",
    uid AS "Identificador único",
    num_identificacion AS "No. de identificación personal del seguro médico",
    (nombres || ' ' || apellidos) AS "Nombre",
    (
        date_part('years', AGE(NOW(), fecha_nacimiento)) || ' ' || 'años'
    ) AS "Edad",
    tipo_sangre AS "Tipo de Sangre",
    (
        CASE
            WHEN es_donador = 'f' THEN 'No es donador'
            WHEN es_donador = 't' THEN 'Es donador'
        END
    ) AS "Donador de organos",
    (estado || ', ' || ciudad || ', ' || pais) AS "Localidad",
    foto AS "Fotografía"
FROM
    usuario
    INNER JOIN seguro_medico ON seguro_medico.id_usuario = usuario.id_usuario
WHERE
    seguro_medico.compania = 'Seguros Azul';

SELECT
    id_procedimiento AS "No. de procedimiento",
    (nombres || ' ' || apellidos) AS "Nombre",
    procedimiento AS "Procedimiento realizado",
    hospital AS "Hospital",
    (
        date_part(
            'years',
            AGE(
                procedimiento_medico.fecha,
                usuario.fecha_nacimiento
            )
        ) || ' ' || 'años'
    ) AS "Edad en el momento del procedimiento médico",
    procedimiento_medico.fecha AS "Fecha del procedimiento médico"
FROM
    procedimiento_medico
    INNER JOIN usuario ON procedimiento_medico.id_usuario = usuario.id_usuario
WHERE
    usuario.di = '76529364-5';
