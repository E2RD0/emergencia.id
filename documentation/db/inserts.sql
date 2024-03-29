INSERT INTO estado_isss
    (estado)
VALUES
    ('Cotizante'),
    ('No corizante'),
    ('Beneficiario');

INSERT INTO pais
    (nombre)
VALUES
    ('Antigua y Barbuda'),
    ('Aruba'),
    ('Belice'),
    ('Costa Rica'),
    ('El Salvador'),
    ('Guatemala'),
    ('Honduras'),
    ('Nicaragua'),
    ('Panamá'),
    ('Argentina'),

    ('Bolivia'),
    ('Brasil'),
    ('Chile'),
    ('Colombia'),
    ('Ecuador'),
    ('Guyana'),
    ('Guyana Francesa'),
    ('Paraguay'),
    ('Perú'),
    ('Suriname'),

    ('Uruguay'),
    ('Venezuela'),
    ('México'),
    ('Puerto Rico'),
    ('República Dominicana'),
    ('Jamaica'),
    ('Haití'),
    ('Martinica'),
    ('Bahamas'),
    ('Cuba');

INSERT INTO pais_estado
    (nombre, id_pais)
VALUES
    ('Saint John', 1),
    ('Saint George', 1),
    ('Saint Peter', 1),
    ('Orange Walk', 3),
    ('Cayo', 3),
    ('Toledo', 3),
    ('Belize', 3),
    ('Alajuela', 4),
    ('Guanacaste', 4),
    ('San Jose', 4),

    ('San Salvador', 5),
    ('San vicente', 5),
    ('Artigas', 21),
    ('Rivera', 21),
    ('Salto', 21),
    ('Rio negro', 21),
    ('Sonora', 23),
    ('Sinaloa', 23),
    ('Durango', 23),
    ('Chiapas', 23),

    ('Guayas', 15),
    ('Esmeraldas', 15),
    ('Guayas', 15),
    ('Leja', 15),
    ('Napo', 15),
    ('Arica', 13),
    ('Maule', 13),
    ('Biobío', 13),
    ('Los ríos', 13),
    ('Surinam', 20);

INSERT INTO tipo_sangre
    (tipo)
VALUES
    ('A+'),
    ('O+'),
    ('B+'),
    ('AB+'),
    ('A-'),
    ('O-'),
    ('B-'),
    ('AB-');
	
INSERT INTO
    perfil_medico
    (nombres, apellidos, uid, pin, foto, fecha_nacimiento, documento_identidad, es_donador, listado, direccion, peso, estatura, id_pais, id_pais_estado, ciudad, id_tipo_sangre, id_estado_isss)
VALUES
    ('Luis Salvador', 'Alavarez Montañana', '1315L', '5510', 'Escritorio\perfil\users\h234fw.jpg', '1992-2-3', '76529364-5', 'false', 'true', 'Colonia las palmas, casa#25', '150lb', '1.56', 1, 1, 'Mejicanos', 1, 2),
    ('Juan Fernando', 'Alinares Castillo', '97F21', '4120', 'Escritorio\perfil\users\fa42dd.jpg', '1982-3-1', '42183291-3', 'true', 'true', 'Colonia margaritas casa#2', '123lb', '1.58', 1, 1, 'Mejicanos', 2, 1),
    ('Francisco Sales', 'Cartagena Mejia', 'Z5419', '4733', 'Escritorio\perfil\users\43gaw.jpg', '1999-2-8', '04137312-1', 'true', 'true', 'Colonia monteverte, casa#35', '105lb', '1.78', 1, 1, 'Mejicanos', 3, 1),
    ('Isidro Pequeño', 'Alavarez Montañana', '1715L', '5510', 'Escritorio\perfil\users\3dawdaw.jpg', '1999-2-9', '76529364-2', 'true', 'true', 'Colonia travesia azul, casa#5', '114lb', '1.65', 1, 1, 'Ayuxtute', 1, 1),
    ('Antonio Carlos', 'Miguel Miguel', '68F33', '1453', 'Escritorio\perfil\users\453fg.jpg', '1999-8-8', '43627454-4', 'false', 'true', 'Colonia montevideo, casa#5', '132lb', '1.45', 1, 1, 'ayutuxtepeque', 1, 1),
    ('Eduardo Francisco', 'Llana Miguel', '1215L', '5207', 'Escritorio\perfil\users\kunw.jpg', '1993-6-2', '03421234-8', 'true', 'true', 'Colonia plaza verde, casa#2', '125lb', '1.75', 1, 1, 'ayutuxtepeque', 1, 2),
    ('Miguel Pedro', 'Corbalan Montañana', '00R27', '2715', 'Escritorio\perfil\users\45dwa.jpg', '1995-4-7', '09328734-4', 'true', 'true', 'Colonia margaritas casa#43', '154lb', '1.83', 1, 1, 'Mejicanos', 2, 1),
    ('Gregorio Antonio', 'AlavarezLombardia', '4683L', '8504', '\Escritorio\perfil\users\f45f.jpg', '1983-9-5', '56473828-3', 'true', 'true', 'Colonia las palmas, casa#265', '123lb', '1.54', 1, 1, 'ayutuxtepeque', 2, 1),
    ('Fernando Pablo', 'Oteiza Cartagena', '2316U', '1760', 'Escritorio\perfil\users\aw4fa.jpg', '1982-1-1', '01572938-4', 'true', 'true', 'Colonia montevideo, casa#12', '145lb', '1.65', 1, 1, 'Mejicanos', 2, 1),
    ('Pedro Enrique', 'Palanca Montañana', '1415L', '9355', 'Escritorio\perfil\users\4wafaw.jpg', '1989-5-8', '30847123-6', 'true', 'true', 'Colonia plaza verde casa#90', '154lb', '1.64', 1, 1, 'ayutuxtepeque', 2, 1),
    ('Pedro Fermin', 'Castillo Gonzales', '115R4', '5369', 'Escritorio\perfil\users\456d.jpg', '1996-2-3', '42138432-2', 'true', 'true', 'Colonia las palmas, casa#25', '168lb', '1.54', 1, 1, 'ayutuxtepeque', 3, 1),
    ('Carlos Augusto', 'Arcos Miguel', '38W65', '2102', 'Escritorio\perfil\users\234qwf.jpg', '1981-3-1', '01928374-5', 'true', 'true', 'Colonia margaritas casa#2', '132lb', '1.51', 1, 1, 'Mejicanos', 1, 1),
    ('Francisco Sales', 'Cartagena Mejia', '4699H', '1334', 'Escritorio\perfil\users\435f.jpg', '1999-9-8', '02483912-6', 'true', 'true', 'Colonia monteverte, casa#35', '139lb', '1.62', 1, 1, 'Mejicanos', 1, 2),
    ('Manuel Valentin', 'Mantecon Montañana', '9368L', '7249', 'Escritorio\perfil\users\65fwaf.jpg', '1989-1-8', '10293812-2', 'true', 'true', 'Colonia travesia azul, casa#5', '128lb', '1.53', 1, 1, 'ayutuxtepeque', 2, 2),
    ('Felix Jesus', 'Arias Alas', '31C66', '8652', 'Escritorio\perfil\users\345fa.jpg', '1978-3-1', '29381232-1', 'true', 'true', 'Colonia montevideo, casa#5', '132lb', '1.85', 1, 3, 'ayutuxtepeque', 1, 1),
    ('Kevin Jose', 'Robledo Miguel', '31T64', '3720', 'Escritorio\perfil\users\f345v.jpg', '1993-11-3', '13421284-8', 'true', 'true', 'Colonia plaza verde, casa#2', '134lb', '1.65', 1, 2, 'Mejicanos', 3, 1),
    ('Emilio Pedro', 'Cartagena Montañana', '55B12', '9725', 'Escritorio\perfil\users\thtda.jpg', '1992-3-12', '57382912-9', 'true', 'true', 'Colonia margaritas casa#43', '143lb', 156,'1', '1', 'ayutuxtepeque', 2, 1),
    ('Oscar Jose', 'Raso Lombardia', '9X924', '1998', 'Escritorio\perfil\users\asdg4.jpg', '1999-1-11', '20012002-4', 'true', 'true', 'Colonia las palmas, casa#265', '132lb', '1.59', 1, 1, 'ayutuxtepeque', 2, 1),
    ('Alfonso Angelo', 'Oteiza Alfaro', '5536P', '6784', 'Escritorio\perfil\users\345casd.jpg', '1985-4-8', '56500932-9', 'true', 'true', 'Colonia montevideo, casa#12', '143lb', '1.68', 1, 1, 'Mejicanos', 1, 1),
    ('Pedro Enrique', 'Palanca Montañana', '66T10', '2290', 'Escritorio\perfil\users\asd234.jpg', '1989-3-12', '00887133-1', 'true', 'true', 'Colonia plaza verde casa#90', '121lb', '1.57', 1, 1, 'ayutuxtepeque', 1, 1),
    ('Manuel Alvaro', 'Castillo Alfaro', '17T59', '3370', 'Escritorio\perfil\users\328MN.jpg', '1996-11-11', '28324796-2', 'true', 'true', 'Colonia las palmas, casa#25', '102lb', '1.87', 1, 1, 'ayutuxtepeque', 3, 1),
    ('Eugenio Jesus', 'Roque Miguel', '54B44', '9582', 'Escritorio\perfil\users\profil3.jpg', '1988-8-12', '78764457-5', 'true', 'true', 'Colonia margaritas casa#2', '110;b', '1.65', 1, 1, 'Mejicanos', 1, 2),
    ('Angel Rafael', 'Miguel Mejia', 'N8560', '0371', 'Escritorio\perfil\users\img234.jpg', '1996-1-2', '93529938-6', 'true', 'true', 'Colonia monteverte, casa#35', '114lb', '1.49', 1, 1, 'Mejicanos', 1, 1),
    ('Alfonso Eduardo', 'Rauda Mejia', '72R88', '8942', 'Escritorio\perfil\users\pedimg.jpg', '1999-4-11', '84793928-2', 'true', 'true', 'Colonia travesia azul, casa#5', '133lb', '1.78', 1, 1, 'Mejicanos', 2, 1),
    ('Felix Ulloa', 'Alvarenga Alas', '4S460', '2480', 'Escritorio\perfil\users\234duser.jpg', '1988-2-8', '68266499-1', 'true', 'true', 'Colonia montevideo, casa#5', '122lb', '1.65', 1, 1, 'Mejicanos', 2, 1),
    ('Leandro Manuel', 'Roque Miguel', '74G44', '8908', 'Escritorio\perfil\users\perfile4.jpg', '1991-1-12', '54585977-8', 'true', 'true', 'Colonia plaza verde, casa#2', '136lb', '1.76', 1, 1, 'Mejicanos', 1, 2),
    ('Kevin Oswualdo', 'Alvarez Rosales', '34U48', '3564', 'Escritorio\perfil\users\iuaw3.jpg', '1998-3-9', '73748558-9', 'false', 'true', 'Colonia margaritas casa#43', '121lb', '1.78', 1, 1, 'Mejicanos', 1, 1),
    ('Oscar Jose', 'Rosales Miguel', '9X524', '2607', 'Escritorio\perfil\users\img3.jpg', '1998-9-12', '26588644-4', 'false', 'true', 'Colonia las palmas, casa#265', '167lb', '1.54', 1, 1, 'Mejicanos', 3, 1),
    ('Alfonso Angelo', 'Villalobos Mejia', '7219I', '0230', 'Escritorio\perfil\users\prif42.jpg', '1982-3-4', '96828427-9', 'false', 'true', 'Colonia montevideo, casa#12', '132lb', '1.55', 1, 1, 'Mejicanos', 1, 1),
    ('Pedro Enrique', 'Montañana Mejia', '19W86', '4950', 'Escritorio\perfil\users\d32user.jpg', '1991-11-12', '44824565-1', 'false', 'true', 'Colonia plaza verde casa#90', '124lb', '1.66', 1, 1, 'Mejicanos', 2, 2);


INSERT INTO 
	usuario
    (email, telefono, clave, id_perfil_medico)
VALUES
    ('luis2@gmail.com', '9493-3447', 'iNOo4TRcGcPIUvyE', 1),
    ('juan2345@gmial.com', '8072-2054', 'uCAgbVB9BAkbGGp4', 2),
    ('fran234@gmail.com', '3856-5199', 'H3mBwgFgqTyjUPsr', 3),
    ('isidro1992@gmail.com', '8401-0872', 'EQkLArlWbDJBwkEY', 4),
    ('antonio@gmail.com', '9641-0091', 'cc6L2zp9u1hsSHa1', 5),
    ('eduardoF@gmail.com', '4943-2323', '4yvga52LQv7fDHM5', 6),
    ('miguelito@gmail.com', '6686-9991', 'rsZiwiU2QCDvPma5', 7),
    ('gregorio@gmail.com', '4598-7421', 'Ax7PYITcDQNy0kkI', 8),
    ('fernix32@gmail.com', '4975-5137', '0kkFv3odBhP25msE', 9),
    ('pedro32@gmail.com', '9128-3278', '4jRMdA1hXohhaB1v', 10),
    ('pedroFERMIN@gmail.com', '7081-9341', 'EUU8nVbxvRbZIwkQ', 11),
    ('augustocarlos@gmial.com', '8582-1981', 'ydHFnoVWO3UTYWCW', 12),
    ('franciscoS@gmail.com', '0148-7206', '0wTHF7yzOW20IjJj', 13),
    ('ManuelVae@gmail.com', '5340-7451', 'KS0fOoFBJZSOA1KA', 14),
    ('JesusFelix@gmail.com', '3532-4331', 'AoLS4Z3vDV5rltZO', 15),
    ('JoseKevin@gmail.com', '7827-7843', 'c1KiaDhg6xPfm0gI', 16),
    ('EmilioPedr@gmail.com', '7894-3551', 'DOccZjPmIZ4gWB4C', 17),
    ('OscarJous234@gmail.com', '9039-3896', 'C7k9XMYr04XCdeOF', 18),
    ('Angelo235@gmail.com', '1219-4810', 'uDMJzq95XKm2ec5n', 19),
    ('pedrokike@gmail.com', '0029-5257', 'RGoiML6eYrmsBm6V', 20),
    ('manuelalv@gmail.com', '3614-6617', 'DirYHcBy8TuEgvJT', 21),
    ('eugeniojesus@gmial.com', '237-10623', 'xvKqPf41XS0DJZaL', 22),
    ('angelRE@gmail.com', '5061-2819', '2D3ledNfAvljtqPf', 23),
    ('eduardoAl@gmail.com', '1020-9593', '9cOCcuAUGCpvaRLr', 24),
    ('FelixUlloa@gmail.com', '4223-0566', 'qHI88Gxut7BQwrMQ', 25),
    ('LeandroMueelito@gmail.com', '9925-4498', '7lZJUMiOmIM4f2v5', 26),
    ('kevinoswaldo@gmail.com', '9627-3191', 'l6lMzkipathfi91J', 27),
    ('OscarJous2314@gmail.com', '7846-4157', 'jwN21YLA73jQtTBr', 28),
    ('AlfonisAngee@gmail.com', '4184-2852', '401SzWhxIopU5QlK', 29),
    ('pedrixpi@gmail.com', '9681-2234', 'yWrdRRnhjLz9GNrc', 30);

INSERT INTO perfil_alergia(alergia, reaccion, tratamiento, id_perfil_medico)
VALUES
    ('Alergia al polen', 'Dolor de cabeza.', 'medicamentos antihistamínicos.', 1),
    ('Rinitis', 'estornudos; picor, goteo o congestión nasal', 'Descongestionantes', 2),
    ('Rinitis', 'estornudos; picor, goteo o congestión nasal', 'Descongestionantes', 3),
    ('Alergia al polen', 'Asma bronquial relacionada con la exposición a alérgenos', 'medicamentos antihistamínicos.', 4),
    ('Alergia al polen', 'Fatiga y cansancio.', 'medicamentos antihistamínicos.', 5),
    ('Rinitis', 'estornudos; picor, goteo o congestión nasal', 'Descongestionantes', 6),
    ('Ácaros de polvo', 'estornudos; picor, goteo o congestión nasal', 'Los corticoesteroides', 7),
    ('Alergia al polen', 'Dolor de cabeza.', 'medicamentos antihistamínicos.', 8),
    ('Rinitis', 'estornudos; picor, goteo o congestión nasal', 'Descongestionantes', 9),
    ('Cacahuete', 'estornudos; picor, goteo o congestión nasal', 'inyección de epinefrina', 10),
    ('caspa animal', 'problemas respiratorios y también con posibilidad de generar problemas dermatológicos', 'Los descongestionantes', 11),
    ('Rinitis', 'estornudos; picor, goteo o congestión nasal', 'Descongestionantes', 12),
    ('Alergia al huevo', 'ligero picor en la boca y/o la garganta,', 'Vacunas de epinefrina', 13),
    ('Alergia al polen', 'Asma bronquial relacionada con la exposición a alérgenos', 'medicamentos antihistamínicos.', 14),
    ('Alergia al polen', 'Fatiga y cansancio.', 'medicamentos antihistamínicos.', 15),
    ('Rinitis', 'estornudos; picor, goteo o congestión nasal', 'Descongestionantes', 16),
    ('Ácaros de polvo', 'estornudos; picor, goteo o congestión nasal', 'Los corticoesteroides', 17),
    ('Alergia al huevo', 'ligero picor en la boca y/o la garganta,', 'Vacunas de epinefrina', 18),
    ('caspa animal', 'problemas respiratorios y también con posibilidad de generar problemas dermatológicos', 'Los descongestionantes', 19),
    ('Alergia a los frutos secos, legumbres y cereales', 'leve picor en la garganta', 'desensibilizaciones orales o inmunoterapia oral o vacunas antialérgicas', 20),
    ('Alergia al polen', 'Mareos y vomitos', 'medicamentos antihistamínicos.', 21),
    ('Rinitis', 'estornudos; picor, goteo o congestión nasal', 'Atomizadores nasales con esteroides', 22),
    ('Conjuntivitis alérgica', 'contacto con diversos alérgenos inhalantes', 'Antiinflamatorios no esteroideos.', 23),
    ('Alergia al polen', 'Asma bronquial relacionada con la exposición a alérgenos', 'medicamentos antihistamínicos.', 24),
    ('Alergia al polen', 'Fatiga y cansancio.', 'medicamentos antihistamínicos.', 25),
    ('Rinitis', 'estornudos; picor, goteo o congestión nasal', 'Atomizadores nasales con esteroides', 26),
    ('Ácaros de polvo', 'estornudos; picor, goteo o congestión nasal', 'Los corticoesteroides', 27),
    ('Alergia al polen', 'Inchazon en sus brazos', 'medicamentos antihistamínicos.', 28),
    ('Rinitis', 'estornudos; picor, goteo o congestión nasal', 'Atomizadores nasales con esteroides', 29),
    ('Asma bronquial', 'inflamatorio crónico de las vías respiratorias', 'broncodilatadores', 30);

INSERT INTO
    perfil_medicacion
    (nombre, dosis, frecuencia, adjunto, id_perfil_medico)
VALUES
    ('Acetaminofen 500mg', '3 veces', 'Diario', '/documents/awfaw-consultas.txt', 1),
    ('Acetaminofen 500mg', '1 veces', 'Diario', '/documents/dfg-consultas.ext', 2),
    ('Ibuprofeno 200mg', '2 veces', 'Cuando sea necesario', '/documents/uiou-consultas.ext', 3),
    ('Atrnol 50mg', '1 vez', 'Semanal', '/documents/bfga-consultas.ext', 4),
    ('Ibuprofeno 200mg', '2 veces', 'Cuando sea necesario', '/documents/hfghj-consultas.ext', 5),
    ('Acetaminofen 500mg', '2 veces', 'Diario', '/documents/uio-consultas.txt', 6),
    ('Ibuprofeno 200mg', '2 veces', 'Cuando sea necesario', '/documents/asd-consultas.ext', 7),
    ('Atrnol 50mg', '1 vez', 'SemanalSemanal', '/documents/qwe-consultas.ext', 8),
    ('Atrnol 50mg', '1 vez', 'Semanal', '/documents/qwerty-consultas.ext', 9),
    ('Acetaminofen 500mg', '3 veces', 'Diario', '/documents/zxcvb-consultas.txt', 10),
    ('Penicilina', '3 veces', 'Semanal', '/documents/yhgnr-consultas.txt', 11),
    ('Acetaminofen 500mg', '1 veces', 'Diario', '/documents/tgbs-consultas.ext', 12),
    ('Ibuprofeno 200mg', '2 veces', 'Semanal', '/documents/opdx-consultas.ext', 13),
    ('Atrnol 50mg', '1 vez', 'Semanal', '/documents/kiytou-consultas.ext', 14),
    ('Ibuprofeno 200mg', '2 veces', 'Cuando sea necesario', '/documents/yrqet-consultas.ext', 15),
    ('Penicilina', '1 veces', 'Semanal', '/documents/terbbc-consultas.txt', 16),
    ('Ibuprofeno 200mg', '2 veces', 'Cuando sea necesario', '/documents/tepas-consultas.ext', 17),
    ('Atrnol 50mg', '1 vez', 'SemanalSemanal', '/documents/xcovf-consultas.ext', 18),
    ('Atrnol 50mg', '1 vez', 'Semanal', '/documents/tyuufw-consultas.ext', 19),
    ('Penicilina', '3 veces', 'Semanal', '/documents/uoffw-consultas.txt', 20),
    ('Penicilina', '3 veces', 'Semanal', '/documents/yhnr-consultas.txt', 21),
    ('Acetaminofen 500mg', '1 veces', 'Diario', '/documents/tgb-consultas.ext', 22),
    ('Fosinopril 10mg', '1 veces', 'Diario', '/documents/opd-consultas.ext', 23),
    ('Lisinopril 10mg', '1 vez', 'Diario', '/documents/kiytu-consultas.ext', 24),
    ('Ibuprofeno 200mg', '2 veces', 'Cuando sea necesario', '/documents/yret-consultas.ext', 25),
    ('Enalapril 20mg', '2 vez', 'Diario', '/documents/terbc-consultas.txt', 26),
    ('Ibuprofeno 200mg', '2 veces', 'Cuando sea necesario', '/documents/teas-consultas.ext', 27),
    ('Atrnol 50mg', '1 vez', 'SemanalSemanal', '/documents/xcvf-consultas.ext', 28),
    ('Enalapril 20mg', '2 vez', 'Diario', '/documents/tyufw-consultas.ext', 29),
    ('Lisinopril 10mg', '3 veces', 'Diario', '/documents/uofw-consultas.txt', 30);

INSERT INTO
    accion_bitacora
    (accion)
VALUES
    ('Agregar'),
    ('Actualizar'),
    ('Eliminar'),
    ('Inicio de sesión'),
    ('Cambio de contraseña'),
    ('Perfil compartido');

INSERT INTO
    perfil_condicion_medica
    (condicion, notas, adjunto, id_medicacion, id_perfil_medico)
VALUES
    ('Hipertensión', 'Surgio en el 2018', '/documents/9xyeX9MEQA.pdf', 2, 9),
    ('Asma', 'Ya me habian detectado esta enfermedad hace un mes', '/documents/i91dtZzsiP.png', 9, 12),
    ('Dermatitis atópica', 'Siento dolores externos a la enfermedad también', '/documents/DFjNK2gEZY.docx', 12, 25),
    ('Gonorrea', 'Comenze a sentir los sintomas el dia 17 de Junio del 2019', '/documents/WhM4nZpy86.docx', 13, 13),
    ('Insuficiencia cardiaca', 'A finales de este mes (enero 2020) comenze a sentir los malestares de esta enfermedad', '/documents/X0RSHyaMdJ.png', 1, 5),
    ('Gonorrea', 'Me recetaron medicinas pero las perdi', '/documents/rGx6I7ztSZ.png', 14, 14),
    ('Hepatitis A', 'Ya me habian detectado esta enfermedad hace un mes', '/documents/QV8MTxmOg0.pdf', 3, 24),
    ('Lepra', 'Comenze a sentir estos malestares al final del 2019', '/documents/TZvh2JR4hk.txt', 27, 8),
    ('Hipertensión', 'A finales de este mes (enero 2020) comenze a sentir los malestares de esta enfermedad', '/documents/9d4W0nZ92m.txt', 1, 28),
    ('Faringitis', 'Me sentia mal desde hace unos dias, pero no le hice caso a la enfermedad', '/documents/GFyoG0wwRo.txt', 20, 29),
    ('Lepra', 'A finales de este mes (enero 2020) comenze a sentir los malestares de esta enfermedad', '/documents/OPTPgkWaeB.docx', 2, 2),
    ('Malaria', 'Ya me habian detectado esta enfermedad hace un mes', '/documents/vhEhrRtto9.png', 30, 3),
    ('Hipertensión', 'Me recetaron medicinas pero las perdi', '/documents/neIXL1osRy.pdf', 11, 15),
    ('Glaucoma', 'Surgio a inicios de este año (2020)', '/documents/FNgx7sVkbt.png', 11, 27),
    ('Linfoma', 'Siento dolores externos a la enfermedad también', '/documents/E09VStrrBM.png', 3, 26),
    ('Dengue', 'Me sentia mal desde hace unos dias, pero no le hice caso a la enfermedad', '/documents/eRFPOGqIpx.png', 20, 20),
    ('Insuficiencia cardiaca', 'Surgio a finales de esta semana (09 de Jun del 2020)', '/documents/V6xVWr3EUC.txt', 21, 10),
    ('Linfoma', 'Comenze a sentir los sintomas el dia 28 de Junio del 2019', '/documents/vzCC9FVdCu.jpg', 22, 21),
    ('Faringitis', 'Tome todas mis medicinas pero no me hicieron efecto alguno', '/documents/NjK944r2bL.docx', 27, 11),
    ('Hepatitis A', 'Ya me habian detectado esta enfermedad hace un mes', '/documents/BoMBd66uZw.pdf', 15, 22),
    ('Hipertensión', 'Me sentia mal desde hace unos dias, pero no le hice caso a la enfermedad', '/documents/6xsZaMkILH.docx', 15, 4),
    ('Asma', 'Me dio mucho dolor de cuerpo esta madrugada (29 de Jun 2020)', '/documents/CVSQx1Frt0.pdf', 18, 20),
    ('Dengue', 'Un medico me receto una medicina que se me fue dificil tomarmela', '/documents/GC0iGaape0.pdf', 6, 23),
    ('Juanetes', 'Surgio a inicios de este año (2020)', '/documents/KpJgtOHKrY.docx', 23, 19),
    ('Glaucoma', 'Me recetaron medicinas pero las perdi', '/documents/1jyvMxicJ2.docx', 12, 6),
    ('Dermatitis atópica', 'Me dio mucho dolor de cuerpo esta madrugada (29 de Jun 2020)', '/documents/IN48LW6I6H.pdf', 15, 16),
    ('Asma', 'Me dio mucho dolor de cuerpo esta madrugada (29 de Jun 2020)', '/documents/CDFiimnv6c.png', 24, 18),
    ('Malaria', 'Comenze a sentir estos malestares al final del 2019', '/documents/Pbqa3JTD0K.png', 21, 7),
    ('Hipertensión', 'Un medico me receto una medicina que se me fue dificil tomarmela', '/documents/vJatqtMNVp.txt', 12, 17),
    ('Dermatitis atópica', 'Surgio a inicios de este año (2020)', '/documents/StWxkbcJ56.png', 27, 1);

INSERT INTO
    perfil_contacto_doctor
    (nombre, telefono, especialidad, id_perfil_medico)
VALUES
    ('Alfonso Ayala Hernandez', '+50375028568', 'Medico general', 27),
    ('Guillermo Enrique Bahamonde', '+50379914332', 'Pediatra', 30),
    ('David Salvador Canas', '+50361116944', 'Pediatra', 2),
    ('Manuel Jorge Juarez', '+50361903228', 'Cardiólogo', 11),
    ('Gonzalo Javier Farres', '+50369538327', 'Nefrólogo', 26),
    ('Luis Gabriel Sirera', '+50363528440', 'Cardiólogo', 20),
    ('Leonardo Jose Jeronimo', '+50386295678', 'Ginecólogo', 12),
    ('Oscar Julian Rosario', '+50363847864', 'Terapeuta', 14),
    ('Ramon Luis Placeres', '+50388198293', 'Medico general', 21),
    ('Luis Ricardo Ferreres', '+50378114895', 'Neurocirujano', 4),
    ('Carlos Ernesto Mendo', '+50389494487', 'Neurocirujano', 15),
    ('Luis Alfredo Cerdeira', '+50361256328', 'Ginecólogo', 5),
    ('Francisco Santos Cerezuela', '+50374756069', 'Terapeuta', 16),
    ('Oscar Francisco Secades', '+50373976860', 'Terapeuta', 13),
    ('Eduardo Vicente Sirera', '+50367116957', 'Ginecólogo', 12),
    ('Jesus Gregorio Barreira', '+50361465345', 'Medico general', 6),
    ('Carlos Nicolas Lorite', '+50384943193', 'Pediatra', 22),
    ('Jose Marcos Balague', '+50375640966', 'Cardiólogo', 23),
    ('Oscar Santiago Mesas', '+50384120132', 'Cardiólogo', 7),
    ('Rafael Ivan Darriba', '+50366716630', 'Medico general', 25),
    ('Pere Antoni Hervas', '+50388279425', 'Neurocirujano', 8),
    ('David Jose De Oliveira', '+50372296077', 'Medico general', 1),
    ('Cesar Vicente Elena', '+50378496128', 'Ginecólogo', 9),
    ('Fernando Ignacio Bodi', '+50364815693', 'Neurocirujano', 10),
    ('Cristobal Jesus Salvador', '+50363871428', 'Medico general', 18),
    ('Moises David Colas', '+50389553457', 'Nefrólogo', 24),
    ('Jose Miguel Lerida', '+50381382858', 'Neurocirujano', 16),
    ('Roberto Clapes', '+50371774203', 'nefrólogo', 17),
    ('Ignacio Alejandro San Nicolas', '+50373829100', 'Terapeuta', 3),
    ('Jorge Joaquin Dominguez', '+50378315400', 'Ginecólogo', 19);

INSERT INTO
    perfil_contacto_emergencia
    (nombre, telefono, relacion, direccion, email, id_perfil_medico)
VALUES
    ('Juana Antonia Olaizola', '+50377077816', 'Hermano', 'AV. LIC. VICENTE AGUIRRE S/N', 'mfbanto@gmail.com', 1),
    ('Ainara Carmen Legido', '+50379933062', 'Madre', 'CALLE AGUSTIN LARA NO. 69-B', 'angelicabergez@gmail.com', 9),
    ('Soraya Maria Segurola', '+50389921148', 'Hermano', 'CARRETERA A LOMA ALTA S/N', 'sebastianatila@hotmail.com', 8),
    ('Tamar Dominguez', '+50379027883', 'Madre', 'AV. INDEPENDENCIA NO. 1282-A', 'nina_cabbada@hotmail.com', 7),
    ('Almudena Carmen Solera', '+50381065192', 'Hermana', 'CALLE MATAMOROS NO. 127', 'consuelo_caceres@hotmail.com', 6),
    ('Iris Maria Rafols', '+50369962409', 'Hermano', 'AV.INDEPENDENCIA NO.1010', 'tantitamivida@gmail.com', 5),
    ('Carmen Elizabeth Beraza', '+50384657923', 'Sobrina', 'Avenida Monseñor Romero y Final Calle 5 de Noviembre entre 21ª y 23ª Calle Oriente, una cuadra al norte del Mercado San Miguelito.', 'joacocordero@gmail.com', 10),
    ('Carlos Adolfo Panisello', '+50379348374', 'Hermano', 'Colonia Buenos Aires 3, Diagonal Centroamérica, Avenida Alvarado, contiguo al Ministerio de Hacienda', 'laah.valehh@hotmail.com', 30),
    ('Juan Mariano Dols', '+50383524434', 'Tio', '1ª Calle Poniente entre 60ª Avenida Norte y Boulevard Constitución No. 3549', 'karito_1404@hotmail.com', 14),
    ('Jorge Enrique Hinojosa', '+50381336309', 'Hermano', 'Colonia San Francisco, Avenida Las Camelias y Calle Los Abetos No. 21', 'pecmor63@gmail.com', 29),
    ('Aira Mella', '+50367628944', 'Madre', '10ª Avenida Sur y Calle Lara No. 934, Barrio San Jacinto', 'aespinz@hotmail.com', 15),
    ('Vicente Joaquin Bergua', '+50383596048', 'Primo', 'Avenida Independencia y Alameda Juan Pablo II, No. 437', 'alvaro.espoz@gmail.com', 16),
    ('Ana Elvira March', '+50366710247', 'Madre', 'Zona Franca San Bartolo Cl Tazumal No 16, Ilopango', 'patorfebre@hotmail.com', 17),
    ('Vicente Rafael Salvador', '+50389719499', 'Hermano', 'Carrt Troncal Del Nte Km 12 1.2 Edif Infica Apopa', 'cfernandez@isa.cl', 2),
    ('Hector Raul Prol', '+50387712560', 'Primo', 'Avenida Independencia y Alameda Juan Pablo II, No. 437', 'francis_nexos@hotmail.com', 18),
    ('Justa Maria Asin', '+50389386704', 'Hermano', 'Avenida Independencia y Alameda Juan Pablo II, No. 437', 'marcelafigueroazamora@hotmail.com', 19),
    ('Guillermo Alejandro De Paz', '+50379339134', 'Padrastro', '12 Av Nte y Alam Juan Pablo II No 520', 'mafigza@gmail.com', 28),
    ('Esther Carmen De Gregorio', '+50366495569', 'Madre', 'Cl Cojutepeque Edif 4-2 Z Franca San Bartolo Ilop', 'marissaleone@hotmail.com', 27),
    ('Carlos Antonio Picado', '+50374275588', 'Hermano', 'Carrt Al Pto Libertad Km 11 1.2 Z Franca El Progreso', 'natygris@hotmail.com', 4),
    ('Julio Miguel Irigoyen', '+50379935965', 'Hermano', 'Blvd del Ejérc Nac Km 8', 'consuelo.fornes@gmail.com', 20),
    ('Marco Jose Pin', '+50366829409', 'Primo', 'Carrt A San Marcos Km 4 1.2', 'jmfornes@yahoo.com', 21),
    ('Luis Javier Cifre', '+50362344996', 'Padrastro', 'Z Ind Plan De La Laguna Cl Circunv Políg A Bod 1 Antgo Cusca', 'fornickinson@hotmail.com', 3),
    ('Ana Margarita Frances', '+50382169382', 'Tia', 'Blvd Del Ejérc Km 7 1.2 Soya', 'xfreitte@gmail.com', 11),
    ('Jose Aaron Febles', '+50362069477', 'Sobrino', 'Avenida Independencia y Alameda Juan Pablo II, No. 437', 'fernandofreitte.xia@gmail.com', 26),
    ('Pedro Joaquin Garcias', '+50361481264', 'Tio', '29 av norte colonia zacamil casa #36', 'hfreitte2618@gmail.com', 12),
    ('Yaiza Carmen Menarguez', '+50383079677', 'Madre', 'Col Roma Blvd Venezuela No 2751', 'jfreitte@vtr.net', 13),
    ('Maria Farners Ladron De Guevara', '+50384758672', 'Madrastra', 'Z Franca San Bartolo Cl Cojutepeque L C-3 Ilop', 'cfalvear@hotmail.com', 25),
    ('Carlos Samuel Carceller', '+50364787665', 'Padrastro', 'Avenida Independencia y Alameda Juan Pablo II, No. 437', 'debora1611@hotmail.com', 24),
    ('Hilario Jose Zubia', '+50366042276', 'Hermano', 'Pqe Ind Desarrollo Pje 5 Lt 31 Soya', 'fernando.gaete@gmail.com', 22),
    ('Ana Lucia Valladolid', '+50364641559', 'Hermano', 'Avenida Independencia y Alameda Juan Pablo II, No. 437', 'panchop71@hotmail.com', 23);

INSERT INTO
    perfil_bitacora
    (descripcion, fecha, id_perfil_medico, id_accion_bitacora)
VALUES
    ('Iniciaste sesión a tu cuenta', '2020-01-15', 1, 4),
    ('Agregaste un nuevo contacto de emergencia', '2020-01-15', 2, 1),
    ('Actualizaste tu nombre de perfil', '2020-01-15', 8, 2),
    ('Agregaste una condicion medica', '2020-01-15', 7, 1),
    ('Iniciaste sesión a tu cuenta', '2020-01-15', 6, 4),
    ('Eliminaste un contacto de emergencia', '2020-01-15', 22, 3),
    ('Agregaste un nuevo contacto de emergencia', '2020-01-15', 23, 1),
    ('Agregaste una condicion medica', '2020-01-15', 5, 1),
    ('Actualizaste tu nombre de perfil', '2020-01-15', 30, 2),
    ('Iniciaste sesión a tu cuenta', '2020-01-15', 16, 4),
    ('Eliminaste un contacto de emergencia', '2020-01-15', 21, 3),
    ('Iniciaste sesión a tu cuenta', '2020-01-15', 4, 4),
    ('Actualizaste tu nombre de perfil', '2020-01-15', 3, 2),
    ('Agregaste una condicion medica', '2020-01-15', 26, 1),
    ('Actualizaste tu contraseña', '2020-01-15', 29, 6),
    ('Agregaste un nuevo contacto de emergencia', '2020-01-15', 27, 1),
    ('Agregaste un contacto de doctor', '2020-01-15', 17, 1),
    ('Agregaste una condicion medica', '2020-01-15', 12, 1),
    ('Agregaste un nuevo contacto de emergencia', '2020-01-15', 18, 1),
    ('Iniciaste sesión a tu cuenta', '2020-01-15', 28, 4),
    ('Agregaste un contacto de doctor', '2020-01-15', 13, 1),
    ('Iniciaste sesión a tu cuenta', '2020-01-15', 19, 4),
    ('Agregaste un contacto de doctor', '2020-01-15', 20, 1),
    ('Agregaste una condicion medica', '2020-01-15', 14, 1),
    ('Actualizaste tu nombre de perfil', '2020-01-15', 15, 2),
    ('Agregaste un nuevo contacto de emergencia', '2020-01-15', 9, 1),
    ('Actualizaste tu contraseña', '2020-01-15', 24, 6),
    ('Eliminaste un contacto de emergencia', '2020-01-15', 11, 3),
    ('Iniciaste sesión a tu cuenta', '2020-01-15', 25, 4),
    ('Agregaste un contacto de doctor', '2020-01-15', 10, 1);

INSERT INTO
    perfil_seguro_medico
VALUES
    (DEFAULT, 'Seguros Azul', '618596402', 10000, '(+503)6555-6975', 'Seguro de vida de Seguros Azul desde el 2016', '/documents/LMD99yx2-carnetdelseguro.jpg', 1),
    (DEFAULT, 'SISA Seguros', '574311417', 7200, '(+503)7578-1498', 'Seguro que abarca todos los posibles gastos médicos', '/documents/mgD0rCWM-seguromedico.jpg', 2),
    (DEFAULT, 'MAPFRE Seguros', '162268364', 4900, '(+503)7599-4680', 'Abarca la mitad de los gastos médicos', '/documents/UKoCF7eO-aseguradora.jpg', 3),
    (DEFAULT, 'ASSA Seguros', '430596312', 3500, '(+503)7187-0288', 'Seguro que abarca todos los posibles gastos médicos', '/documents/OUl5k2oq-seguro.pdf', 4),
    (DEFAULT, 'Fedecredito Vida', '604594487', 2000, '(+503)7155-8981', 'Abarca los gastos por medicinas', '/documents/KQYqf91X-carnet.pdf', 5),
    (DEFAULT, 'Sociedad Atlántida Vida', '457672881', 8000, '(+503)7696-0940', 'Abarca todos los posibles gastos médicos', '/documents/AOywzACh-identificaciondelseguro.jpg', 6),
    (DEFAULT, 'Aseguradora Vivir', '475394724', 15000, '(+503)7499-1803', 'Seguro', '/documents/nKoMJWVQ-segurodevida.jpg', 7),
    (DEFAULT, 'Seguros Fedecredito', '622354410', 10000, '(+503)7900-1986', 'Seguros Fedecredito', '/documents/jCyHsAes-seguro.jpg', 8),
    (DEFAULT, 'Scotia Seguros', '451657297', 200000, '(+503)7429-4008', 'Abarca todos los posibles gastos médicos', '/documents/1vWMxt0E-carnetseguro.jpg', 9),
    (DEFAULT, 'ASESUISA Vida', '320073597', 2000, '(+503)7057-0975', 'Seguro que abarca todos los posibles gastos médicos', '/documents/spvBANX4-aseguradora.jpg', 10),
    (DEFAULT, 'SISA Seguros', '229595024', 3500, '(+503)7655-4594', 'Seguro que abarca todos los posibles gastos médicos', '/documents/Ceu2TlOD-identificacionseguro.jpg', 11),
    (DEFAULT, 'Seguros Fedecredito', '536412965', 9000, '(+503)7946-9239', 'Es un seguro médico', '/documents/OoN2Fnnw-idenficacion.pdf', 12),
    (DEFAULT, 'Aseguradora Vivir', '212372051', 1100, '(+503)7591-5002', 'Es de la Aseguradora Vivir', '/documents/H0hgLxWr-seguromedico2020.pdf', 13),
    (DEFAULT, 'ASESUISA Vida', '356063431', 2300, '(+503)7591-5669', 'ASESUISA Vida', '/documents/o4Scyz4F-segurosalvador.pdf', 14),
    (DEFAULT, 'Scotia Seguros', '229675963', 4000, '(+503)7258-8523', 'Abarca un 25% de todos los gastos médicos', '/documents/yKSLdMkr-miseguro.pdf', 15),
    (DEFAULT, 'MAPFRE Seguros', '523395989', 3200, '(+503)7793-0237', 'Abarca los gastos por medicamentos', '/documents/3aCkOfi3-segurodevida.pdf', 16),
    (DEFAULT, 'Seguros Azul', '554777171', 3300, '(+503)6759-2268', 'Seguro de vida que abarca la mitad de los gastos en el hospital', '/documents/VdcKKCgk-carnetdelseguro.pdf', 17),
    (DEFAULT, 'SISA Seguros', '621436245', 5000, '(+503)6436-1904', 'Seguro', '/documents/mD6zcOzF-papeldelseguro.pdf', 18),
    (DEFAULT, 'ASSA Seguros', '542471293', 1000, '(+503)6477-6606', 'Es para el hospital', '/documents/AxFTDBly-seguro.pdf', 19),
    (DEFAULT, 'Sociedad Atlántida Vida', '622274362', 42000, '(+503)6012-1196', 'Abarca todos los gastos médicos', '/documents/jfc4vwVr-nombrededocumento.jpg', 20),
    (DEFAULT, 'Sociedad Atlántida Vida', '623378317', 7600, '(+503)6462-7307', 'Seguro de vida que abarca los gastos médicos', '/documents/lkTzkbnt-atlantidaseguro.jpg', 21),
    (DEFAULT, 'Seguros Futuro', '610359136', 2000, '(+503)6449-3443', 'Para seguridad', '/documents/qLMLXhNn-seguropersonalnuevo.jpg', 22),
    (DEFAULT, 'Seguros del Pacífico', '463615043', 1800, '(+503)6116-7130', 'Seguro', '/documents/lafvOOqR-nuevoseguro.pdf', 23),
    (DEFAULT, 'ASESUISA Vida', '550359677', 4000, '(+503)6523-6205', 'Seguro de vida para los gastos médicos', '/documents/xQDYVmGh-seguro2020.pdf', 24),
    (DEFAULT, 'MAPFRE Seguros', '259593220', 2500, '(+503)6774-0827', 'Seguro de vida para los gastos médicos', '/documents/k428BZhU-carnetaseguradora.pdf', 25),
    (DEFAULT, 'SISA Seguros', '609270931', 9000, '(+503)6676-1196', 'Abarca la mitad de los gastos médicos', '/documents/NgTEp4Ni-carnetsegurosocial.jpg', 26),
    (DEFAULT, 'Scotia Seguros', '551353329', 3500, '(+503)6080-2104', 'Seguro de vida para los gastos médicos', '/documents/kxob8JP9-segurodevida.jpg', 27),
    (DEFAULT, 'Fedecredito Vida', '227791278', 5000, '(+503)6383-5882', 'Abarca todos los gastos médicos', '/documents/s27IzWEN-carnetdelseguro.jpg', 28),
    (DEFAULT, 'Seguros Azul', '626554731', 10000, '(+503)6676-5947', 'Seguro de vida para los gastos médicos', '/documents/iTcoUsIB-aseguradora.jpg', 29),
    (DEFAULT, 'Aseguradora Vivir', '332059611', 30000, '(+503)6138-2305', 'Abarca todos los gastos médicos', '/documents/AEG0X7MY-papelseguro.jpg', 30);

INSERT INTO
    perfil_procedimiento_medico
VALUES
    (DEFAULT, 'Inmovilización del hueso', '2000-06-13', 'Hospital Nacional San Rafael', '/documents/CYzN7JqO-radiografia.jpg', 1, 10),
    (DEFAULT, 'Rayos X en la zona del tórax', '1985-09-29', 'Hospital Nacional Rosales', '/documents/6ZDruF13-radiografiatorax.jpg', 2, 11),
    (DEFAULT, 'Prueba de orina para la detección de diabetes', '2014-06-15', 'Hospital de Diagnóstico', '/documents/9ubT8EdU-resultadosprueba.pdf', 3, 12),
    (DEFAULT, 'Prueba de anticuerpos para hepatitis C', '1990-01-28', 'Hospital de la Mujer', '/documents/zJKVt6tG-resultados.pdf', 4, 28),
    (DEFAULT, 'Extracción de la muela del juicio', '2015-02-27', 'Centro Médico Lourdes', '/documents/67g2GACv-diagnostico.pdf', 5, 30),
    (DEFAULT, 'Trombectomía mecánica percutánea de la vena portal con guía fluoroscópica', '2006-05-16', 'Hospital Divina Providencia', '/documents/Fzd5aXaJ-perfilmedico.pdf', 6, 29),
    (DEFAULT, 'Ecocardiografía', '2016-07-24', 'Hospital Profamilia', '/documents/73Pg32be-resultados.jpg', 7, 27),
    (DEFAULT, 'Examen general breve', '2007-07-16', 'Hospital Merliot', '/documents/gy9Rinhm-examengeneral.jpg', 8, 26),
    (DEFAULT, 'La hemoglobina / hematocrito / Recuento de plaquetas', '2016-07-09', 'Hospital Paravida', '/documents/mDsVGFLs-resultados.jpg', 9, 25),
    (DEFAULT, 'Tobillo de rayos X', '2010-10-19', 'Hospital Nacional de Santa Rosa de Lima', '/documents/M22tHvl3-radiografiatobillo.jpg', 10, 24),

    (DEFAULT, 'Examen general breve', '1982-06-04', 'Hospital Nacional Rosales', '/documents/NrOS6WHt-resultadosexamen.jpg', 11, 1),
    (DEFAULT, 'Examen general breve', '2019-10-17', 'Hospital de Diagnóstico', '/documents/cX7ecWTf-examenrutinario.pdf', 12, 3),
    (DEFAULT, 'Examen de detección de la rubéola', '1983-03-16', 'Hospital Profamilia', '/documents/WQfxYYr7-resultadosrubeola.pdf', 13, 2),
    (DEFAULT, 'Prueba de infección por gonorrea', '2004-11-13', 'Hospital de la Mujer', '/documents/v0JedI7G-resultadosg.jpg', 14, 13),
    (DEFAULT, 'Prueba de antígeno del VIH', '1999-07-19', 'Hospital Divina Providencia', '/documents/43TRBc47-resultados.pdf', 15, 4),
    (DEFAULT, 'Inmunización pasiva RhD', '2014-04-10', 'Hospital Nacional de Santa Rosa de Lima', '/documents/Z5yJVNFm-diagnostico.pdf', 16, 20),
    (DEFAULT, 'La colonoscopia', '2014-04-14', 'Hospital Paravida', '/documents/JFsF8HDi-diagnostico.jpg', 17, 6),
    (DEFAULT, 'Sutura de herida abierta', '2018-08-10', 'Hospital San Rafael', '/documents/rnewldHt-diagnostico.jpg', 18, 7),
    (DEFAULT, 'Cultivo de garganta', '2002-04-06', 'Centro Médico Lourdes', '/documents/OB8mInQc-resultados.jpg', 19, 5),
    (DEFAULT, 'Examen general breve', '2016-01-05', 'Hospital Merliot', '/documents/1FUpNdp9-resultadosexamen.jpg', 20, 14),

    (DEFAULT, 'Análisis de orina para la glucosa', '2016-12-29', 'Hospital Divina Providencia', '/documents/bsvjf4u9-resultadosenprueba.jpg', 21, 19),
    (DEFAULT, 'Espirometría', '2013-05-31', 'Hospital Merliot', '/documents/q7lxdiks-diagnostico.pdf', 22, 15),
    (DEFAULT, 'Apendicectomía', '2008-05-14', 'Hospital Paravida', '/documents/eit8fcwq-diagnostico.jpg', 23, 8),
    (DEFAULT, 'Colonoscopia', '2005-02-25', 'Hospital Nacioal San Rafael', '/documents/khrkmoxz-constanciamedica.jpg', 24, 9),
    (DEFAULT, 'Inyección intramuscular', '1981-03-24', 'Centro Médico Lourdes', '/documents/udktl27f-diagnostico.jpg', 25, 18),
    (DEFAULT, 'De rayos X de la clavícula', '2014-05-31', 'Hospital de la Mujer', '/documents/cuowhh9p-radiografiaclavi.pdf', 26, 21),
    (DEFAULT, 'Remoción laparoscópica de la vesícula biliar', '2004-04-27', 'Hospital Profamilia', '/documents/bblkoosn-diagnostico.pdf', 27, 23),
    (DEFAULT, 'Examen general breve', '2011-06-23', 'Hospital de Diagnóstico', '/documents/3mij92re-resultados.pdf', 28, 22),
    (DEFAULT, 'Examen general breve', '2010-03-25', 'Hospital Nacional Rosales', '/documents/gzdiz5sl-resultadosexamen.pdf', 29, 16),
    (DEFAULT, 'Examen general breve', '2019-08-19', 'Hospital Nacional de Santa Rosa de Lima', '/documents/zfzfluoy-rutinadeexamenes.jpg', 30, 17);

INSERT INTO
    perfil_otra_informacion
VALUES
    (DEFAULT, 'En caso de morir', 'Llamar a mi abogado y que traiga el testamento.', 1),
    (DEFAULT, 'Adicciones', 'Alcohol y Tabaco', 2),
    (DEFAULT, 'Mi testamento', 'Lo tiene mi abogado', 3),
    (DEFAULT, 'Estoy en rehabilitación', 'Despúes de 6 meses de abuso de drogas', 6),
    (DEFAULT, 'En caso de morir', 'Quiero ser cremado', 7),
    (DEFAULT, 'Adicción', 'Al alcohol', 8),
    (DEFAULT, 'Lentes', 'Tengo astigmatismo y miopía', 9),
    (DEFAULT, 'En caso de morir', 'Quiero donar todos los organos que se puedan', 16),
    (DEFAULT, 'Salud', 'Siempre he tenido buena salud', 17),
    (DEFAULT, 'Al morir', 'Deseo donar solo mi corazón, y ser cremado', 18),
    (DEFAULT, 'Visión', 'Tengo buena visión sin ninguna enfermedad ocular', 19),
    (DEFAULT, 'Mi testamento', 'No está redactado, pero ya todo se reparte a mi familia', 20),
    (DEFAULT, 'Nunca he sido hospitalizado', 'No sé si soy alérgico a algún medicamento', 21),
    (DEFAULT, 'Rehabilitación', 'Por uso de drogas', 22),
    (DEFAULT, 'Al morir', 'Llamar a todos mis contactos', 23);

INSERT INTO 
    up_organizacion
VALUES
    (DEFAULT, 'Cruz Verde Salvadoreña', '+50322845792', '/content/U7xSUcMK2qwIOdsgWOFF.png'),
    (DEFAULT, 'Cruz Roja Salvadoreña', '+50322225155', '/content/tx6aknhOH5jjR5PY6ivJ.png'),
    (DEFAULT, 'Comandos de salvamento', '+50321330000', '/content/JPOyKNLGEHJfYQtBxBBq.png'),
    (DEFAULT, 'SEM', '+50325289700', '/content/2v6Mn54Gvr3DT7oKI1O6.png'),
    (DEFAULT, 'Protección Civil', '+50322012424', '/content/zZsFMCxTEzeiI0bB3ry5.png');

INSERT INTO 
    up_tipo_usuario
VALUES
    (DEFAULT, 'Superadministrador'),
    (DEFAULT, 'Administrador'),
    (DEFAULT, 'Paramédico');

INSERT INTO
    usuario_privilegiado
VALUES
    (DEFAULT, 'Rodrigo Maurico', 'Martínez López', 'rodrigo@cruzrojasal.org.sv', '+50372957458', '$argon2i$v=19$m=1024,t=4,p=2$MtxLemFoVnZFaEJuT1NyYg$4j2ZFDn1fVS70ZExmlJ33rXOinafcBXrp6A6grHEPkI', 2, 2),
    (DEFAULT, 'Nikolas', 'Dias', 'NikolasDias@cruzverdesalvadorena.org', '+50365558576', '$argon2i$v=19$m=1024,t=4,p=2$7Gl(%8Uu(%7Jo&3Ut%Zd.4Px%Rk%2Wz/#8Zw%0Wi)6Qi.9Vc)7Co/#8Ts&Qu-4Zr)Ov/#', 1, 1),
    (DEFAULT, 'Shawn', 'Galarza', 'ShawnGalarza@cruzverdesalvadorena.org', '+50375552195', '$argon2i$v=19$m=1024,t=4,p=2$3Wf/0Ks&3Jm,2Hs!Ne.6Zy%Gn)2Vy$4Gs(%6Qe!9Sw#0Qb%6Dw(%6Ax/#Sl(%5Cd&Qk+(', 1, 1),
    (DEFAULT, 'Ayden', 'Lewis', 'AydenLewis@cruzverdesalvadorena.org', '+50365555058', '$argon2i$v=19$m=1024,t=4,p=2$1Yk-1Qn/#1Tq/#2Ac(Nr%5Vd/Pa*8Xs#9Nn)5Hn%1Zq)9Io/2Th.7Al)Wr-3Gi(Gx4', 1, 1),
    (DEFAULT, 'Carlos', 'Abreu', 'CarlosAbreu@cruzverdesalvadorena.org', '+50365552949', '$argon2i$v=19$m=1024,t=4,p=2$8Ef/9Aj%2Cw*8Qu&Ut.3Kl&Fq+6Sg(9Gi%2Cf$4Cm*0Ee)3Bk,9Cg&Dt(%3Ew.Ac(%', 3, 1),
    (DEFAULT, 'Elijah', 'Mancilla', 'ElijahMancilla@cruzverdesalvadorena.org', '+50365550834', '$argon2i$v=19$m=1024,t=4,p=2$0Mm&6Ov*1Oq%9Ld)Zn%3Ot(%Jv.5Oo*7Kk%1Ih!7Fl.7Js-7Of(0Rb.Cz(%5Qk-R-1', 1, 1),
    (DEFAULT, 'Adonis', 'Robledo', 'AdonisRobledo@cruzverdesalvadorena.org', '+50375555837', '$argon2i$v=19$m=1024,t=4,p=2$1Bh%2Tl.5Xr.9Ea*Mv(%0Xn-Eg$0Zk*4Zy!9Kx*3Wi-6Xx.6Xn+5Zv&Ee#d%Ei.$6', 3, 1),
    (DEFAULT, 'Devin', 'Garduno', 'DevinGarduno@cruzverdesalvadorena.org', '+50375556975', '$argon2i$v=19$m=1024,t=4,p=2$5Cm+7Lj(4Lr!8Oo/#Tl.4Xm!Oj$1Vn&0Ny*9Vo&8Mj/2Co(%0Ty,0Rx(Pr%a+Dk)(%6', 1, 1),
    (DEFAULT, 'Jason', 'Rico', 'JasonRico@cruzverdesalvadorena.org', '+50365554152', '$argon2i$v=19$m=1024,t=4,p=2$8Ra+4Qa*5Oq.6Yk.Tf/7Kb,Af,0Vk#8Eq&1Kw(%2Hy(%3Xi-4Ic/6Ld-Ib#h%By*/5', 2, 1),
    (DEFAULT, 'Jordan', 'Rodarte', 'JordanRodarte@cruzverdesalvadorena.org', '+50375559656', '$argon2i$v=19$m=1024,t=4,p=2$8Va-3Bj(%8Fy+2Op/Ig+3Ll!Kk(%8Xx#7Bs/5Yz#5Bm-4Ee+1NcSa)Cv*1Qq/Vp$#7', 2, 1),
    (DEFAULT, 'Jose', 'Uribe', 'JoseUribe@cruzverdesalvadorena.org', '+50365558988', '$argon2i$v=19$m=1024,t=4,p=2$0Qi-1Jx*1Fi$9Yk-Ij&3Hh+Uq(8Ei+4Fw%9Ow)3Wm.3Wl!2Ju#0Lw-Az!0!Fr//2', 2, 1),
    (DEFAULT, 'Fernando', 'Alcaraz', 'FernandoAlcaraz@cruzverdesalvadorena.org', '+50365552971', '$argon2i$v=19$m=1024,t=4,p=2$0Mh)0Lp-7Ga#1Ng!Aj%7Vc#Xg)2Zt!5Ej(%6Nm%3Ew/#9(8Td#5Yk,Sq/#9Cc/m*', 2, 1),
    (DEFAULT, 'Angelo', 'Betancourt', 'AngeloBetancourt@cruzverdesalvadorena.org', '+50375558052', '$argon2i$v=19$m=1024,t=4,p=2$1Un*0Ss(%0It%4Ak*Xs-6St-Sx-3Jx!6Hd(%6Rh$5%6Sg/#9Mv&4Ih*Sa#5Coh*-1', 1, 1),
    (DEFAULT, 'Adam', 'Delgadillo', 'AdamDelgadillo@cruzverdesalvadorena.org', '+50375550906', '$argon2i$v=19$m=1024,t=4,p=2$1Kt%6Ez*6Ru&3Ib+Ql#8Ki-Qa-4Tp-1Mt%3Vr*0Ng&3N9Zq(%4Qp%Oa%n/Cp..1', 3, 1),
    (DEFAULT, 'Julian', 'Cotto', 'JulianCotto@cruzverdesalvadorena.org', '+50375550927', '$argon2i$v=19$m=1024,t=4,p=2$8Ty,2Kh$8Bd*0Yx-Yj(%0Gs&Ii+4Ec%5Om$5Fk,1Nm$3Oh.5/#6Ph#Ga!2Oq($)9', 2, 1),
    (DEFAULT, 'Ivan', 'Torres', 'IvanTorres@cruzverdesalvadorena.org', '+50375554077', '$argon2i$v=19$m=1024,t=4,p=2$8Ai!9Zi!4Vi(4Kf(Qa!9Fe&Jc!4Fh$9Zp(8Rk/4Nw#4Vh!3F0Fi%Pj(9Re(S(2', 1, 1),
    (DEFAULT, 'Freddy', 'Serrano', 'FreddySerrano@cruzrojasal.org.sv', '+50365554657', '$argon2i$v=19$m=1024,t=4,p=2$4Os/6Lx%7Hl!4Wx)Zu/#8Kj*So(3Di-9El*7Hj#2Tz-8VvHo%9Dy!Wk!6Cii-)0', 1, 2),
    (DEFAULT, 'Gregory', 'Orozco', 'GregoryOrozco@cruzrojasal.org.sv', '+50365557709', '$argon2i$v=19$m=1024,t=4,p=2$6Pk/5Mz(9Kf/#1Ew%Sb,8Yp-Eq&4Yc)0Ei#2Gc,2Ox(%y%2Nm/#4Ye(%BfVs#Yi*.4', 2, 2),
    (DEFAULT, 'Yariel', 'Duran', 'YarielDuran@cruzrojasal.org.sv', '+50375551536', '$argon2i$v=19$m=1024,t=4,p=2$1Ej#7Ul!3Em&7El%St#0Bs(%Cl,2Le!6Kj%7Le+4Pp/#8Z3Mo)7Os-Pk!4WQy$$5', 3, 2),
    (DEFAULT, 'Jose', 'Tobar', 'JoseTobar@cruzrojasal.org.sv', '+50365550303', '$argon2i$v=19$m=1024,t=4,p=2$2Pc!2Mg#2Pt-1Gq/Nk#8Pn+Sm!8Ye.3Aj(6Fx)7Ov(%0Ko$3.8Bu#Yh$2Cl&%$0', 3, 2),
    (DEFAULT, 'Carlos', 'Zavala', 'CarlosZavala@cruzrojasal.org.sv', '+50375556165', '$argon2i$v=19$m=1024,t=4,p=2$6Ei-2Vb(%4Xm$3Gb/Vd.2Vt/Pp#5Cl&3Ew%1Zr&8,0Ys/1Uo-4Zx+Dt,5Zh/#M!1', 2, 2),
    (DEFAULT, 'Allen', 'Menchaca', 'AllenMenchaca@salvamento.org', '+50365558109', '$argon2i$v=19$m=1024,t=4,p=2$7Fz(3Ev%7Dz(%7Fb#Wb*0Sy)Vm/#1Jo/#5Yq,7FcRs#8Qj&9Fz)3Oh+Aw/5Qq*Kp&.4', 2, 3),
    (DEFAULT, 'Alfredo', 'Montero', 'AlfredoMontero@salvamento.org', '+50365554586', '$argon2i$v=19$m=1024,t=4,p=2$7Uz)6Fm,2Cn+2Es&Vm.8Yk(Ek/2Mh%6Nz*0F%8Zw/6Od(0Bg*9Nk(%Gl+1Vy*In..9', 2, 3),
    (DEFAULT, 'Orlando', 'Quesada', 'OrlandoQuesada@salvamento.org', '+50365559802', '$argon2i$v=19$m=1024,t=4,p=2$9Pd*9Qu(1Ui/9Zf,Nk*2Zw!Kt&1Ba,4Ww!a.2Vf/2Hx(0Zs$3Jn/Xa,8Dt%Hs*%9', 2, 3),
    (DEFAULT, 'Eric', 'Rivero', 'EricRivero@salvamento.org', '+50375550408', '$argon2i$v=19$m=1024,t=4,p=2$5Je.5Xq/9Cd&8Zj!Ze/4Cq(Ju(%9Xt/#7Rl(%9VgOo/4Of-4Rh,9Du.Ud)3Ry$Fp/)1', 3, 3),
    (DEFAULT, 'Michael', 'Granados', 'MichaelGranados@salvamento.org', '+50375555225', '$argon2i$v=19$m=1024,t=4,p=2$2Oh+5Cf,0Nt+4Ys+Ca#7Br$Xy%3Q2Xr)5Oc!4Tp*8Jf&6Qa,5Nx)Af%1Gt(If-%2', 2, 3),
    (DEFAULT, 'Josiah', 'Pedraza', 'JosiahPedraza@proteccioncivil.gob.sv', '+50375558035', '$argon2i$v=19$m=1024,t=4,p=2$1Gr+6Np-0Dr#1Qx(%Qh#8UHj!6Tn%8Hc%0Xw/5Wm-1Vh-9Tb(%0Go!Cd(4Br)%$6', 1, 5),
    (DEFAULT, 'Rey', 'Barba', 'ReyBarba@proteccioncivil.gob.sv', '+50365558549', '$argon2i$v=19$m=1024,t=4,p=2$6Jp%0Jv$4Mh/5Mz*Mv,8Rg/#Qt&9GkKd(%3Ed*1Yk#6Xa-2Ag&7He+Mo#2Bi)Ng&/9', 3, 5),
    (DEFAULT, 'Paul', 'Vicente', 'PaulVicente@proteccioncivil.gob.sv', '+50365557762', '$argon2i$v=19$m=1024,t=4,p=2$4Zw-8Ez/#9Gz/#5Vg-Qr)6+Sm-1Ao$5Qd%2Po!2Kt,4Mi#7Wg(%4Wx(%Bu/#4Gf!/#.0', 2, 5),
    (DEFAULT, 'Ricardo', 'Calvo', 'RicardoCalvo@fosalud.gob.sv', '+50375558399', '$argon2i$v=19$m=1024,t=4,p=2$5Rm(%1Ry#1Lx/#9Sa#Uy+8Zi/J4Bd#3Di*1Al%0Iu/8Cp/#2En(5La#Jp&9Im#Gv!+1', 1, 4),
    (DEFAULT, 'Johnny', 'Soliz', 'JohnnySoliz@fosalud.gob.sv', '+50375554406', '$argon2i$v=19$m=1024,t=4,p=2$8Io&1Eb+2Oc(0Gl#Su*6Mw!Tc&x%8Oo!9Hp#7Oz$1Uh-2Lw-5Hn#Zc/5Tf/Sb,)3', 2, 4);

INSERT INTO 
    perfil_enlaces_compartir
VALUES
    (DEFAULT, '/share/4Myy8CthQC7/', '2020-05-19', '2020-05-23', 0, 4),
    (DEFAULT, '/share/9Mgp7HkmBG3/', '2020-05-01', '2020-05-11', 1, 23),
    (DEFAULT, '/share/8Oyj1IupMY4/', '2020-09-01', '2020-09-06', 4, 14),
    (DEFAULT, '/share/0Iyp9CpqMA6/', '2020-05-18', '2020-05-25', 3, 9),
    (DEFAULT, '/share/5Tpb8WipKB4/', '2020-05-11', '2020-05-13', 2, 4),
    (DEFAULT, '/share/4Ozv2XjaJH5/', '2020-05-09', '2020-05-14', 2, 22),
    (DEFAULT, '/share/1Emt3NqqGX1/', '2020-05-20', '2020-06-05', 0, 7),
    (DEFAULT, '/share/5Uog9TwlRN0/', '2020-08-01', '2020-08-06', 1, 2),
    (DEFAULT, '/share/9Qmm4FepWW3/', '2020-08-01', '2020-09-06', 2, 1),
    (DEFAULT, '/share/5Tur9NqqEX8/', '2020-04-18', '2020-04-25', 0, 11),
    (DEFAULT, '/share/9Gyn0NfkLT9/', '2020-04-11', '2020-04-19', 5, 20),
    (DEFAULT, '/share/1Gjq6MjnFQ0/', '2020-02-01', '2020-02-05', 2, 20),
    (DEFAULT, '/share/1Eoh2MtrLW6/', '2020-04-17', '2020-04-23', 1, 18),
    (DEFAULT, '/share/1Tco6JzoGH7/', '2020-06-01', '2020-06-13', 2, 30),
    (DEFAULT, '/share/1Waw3VnsFX0/', '2020-09-01', '2020-09-06', 5, 28),
    (DEFAULT, '/share/9Rky2MnwMZ8/', '2020-04-08', '2020-04-10', 3, 13),
    (DEFAULT, '/share/1Ufh7MyqKQ4/', '2020-02-04', '2020-02-05', 2, 6),
    (DEFAULT, '/share/6Bpf1FndDH6/', '2020-08-01', '2020-08-05', 2, 1),
    (DEFAULT, '/share/2Xrd6OedWX7/', '2020-04-02', '2020-04-10', 4, 4),
    (DEFAULT, '/share/7Pnj2LxaSK3/', '2020-06-10', '2020-06-13', 0, 6),
    (DEFAULT, '/share/7Wge6DmfXS2/', '2020-05-15', '2020-05-21', 1, 8),
    (DEFAULT, '/share/6Dgt6ExhIO0/', '2020-06-16', '2020-06-19', 1, 11),
    (DEFAULT, '/share/4Nts8AccYL1/', '2020-05-11', '2020-05-13', 3, 16),
    (DEFAULT, '/share/1Mgc1AgyJB5/', '2020-06-21', '2020-06-26', 1, 17),
    (DEFAULT, '/share/1Gyt3HroXG7/', '2020-05-22', '2020-05-28', 4, 21),
    (DEFAULT, '/share/3Uks0HcfYJ0/', '2020-04-15', '2020-04-16', 2, 6),
    (DEFAULT, '/share/4Wfh7RcsEE7/', '2020-06-11', '2020-06-13', 1, 29),
    (DEFAULT, '/share/5Eqo7IgdFF0/', '2020-04-14', '2020-04-19', 1, 28),
    (DEFAULT, '/share/0Vem8LjbHS1/', '2020-05-02', '2020-05-10', 5, 4),
    (DEFAULT, '/share/0Kin5YqrKF3/', '2020-06-17', '2020-06-22', 5, 5);

INSERT INTO 
    perfil_usuarios_compartir
VALUES
    (DEFAULT, 4, 17),
    (DEFAULT, 8, 22),
    (DEFAULT, 14, 29),
    (DEFAULT, 3, 18),
    (DEFAULT, 13, 19),
    (DEFAULT, 5, 17),
    (DEFAULT, 14, 15),
    (DEFAULT, 6, 25),
    (DEFAULT, 5, 26),
    (DEFAULT, 5, 25),
    (DEFAULT, 12, 24),
    (DEFAULT, 4, 25),
    (DEFAULT, 2, 21),
    (DEFAULT, 7, 17),
    (DEFAULT, 13, 20),
    (DEFAULT, 24, 1),
    (DEFAULT, 17, 3),
    (DEFAULT, 25, 10),
    (DEFAULT, 28, 13),
    (DEFAULT, 25, 14),
    (DEFAULT, 29, 10),
    (DEFAULT, 16, 13),
    (DEFAULT, 30, 8),
    (DEFAULT, 16, 12),
    (DEFAULT, 21, 7),
    (DEFAULT, 15, 3),
    (DEFAULT, 17, 12),
    (DEFAULT, 22, 10),
    (DEFAULT, 28, 4),
    (DEFAULT, 15, 9);