--Consultas para reporte con rango de fechas:
SELECT accion_bitacora.accion, bitacora_usuario.descripcion, bitacora_usuario.fecha, usuario.uid
FROM bitacora_usuario INNER JOIN usuario ON bitacora_usuario.id_usuario = usuario.id_usuario INNER JOIN accion_bitacora ON bitacora_usuario.id_accion_bitacora = accion_bitacora.id_accion_bitacora
WHERE bitacora_usuario.fecha BETWEEN '2020-01-01' AND '2020-02-01'
GROUP BY bitacora_usuario.descripcion, bitacora_usuario.fecha, usuario.uid, accion_bitacora.accion

SELECT enlaces_compartir.enlace, enlaces_compartir.fecha_creacion, enlaces_compartir.fecha_expiracion, usuario.uid
FROM enlaces_compartir INNER JOIN usuario ON enlaces_compartir.id_usuario = usuario.id_usuario
WHERE enlaces_compartir.fecha_creacion BETWEEN '2020-01-01' AND '2020-02-01'
GROUP BY enlaces_compartir.enlace, enlaces_compartir.fecha_creacion, enlaces_compartir.fecha_expiracion, usuario.uid

SELECT usuario.id_usuario, procedimiento_medico.procedimiento, procedimiento_medico.fecha
FROM procedimiento_medico INNER JOIN usuario ON procedimiento_medico.id_usuario = usuario.id_usuario
WHERE procedimiento_medico.fecha BETWEEN '2020-01-01' AND '2020-02-01'
GROUP BY usuario.id_usuario, procedimiento_medico.procedimiento, procedimiento_medico.fecha

--Consultas para graficos
SELECT COUNT(tipo_sangre) AS Cantidad, u.tipo_sangre AS "TIPO" FROM usuario u GROUP BY tipo_sangre
SELECT COUNT(id_enlace) FROM enlaces_compartir e WHERE e.id_usuario = 1
SELECT alergia FROM usuario_alergia GROUP BY alergia HAVING COUNT(*)>1
SELECT COUNT(*) FROM usuario
SELECT COUNT(*) FROM organizacion