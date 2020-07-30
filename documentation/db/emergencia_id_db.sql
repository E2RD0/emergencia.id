CREATE TABLE "tipo_sangre"
(
 "id_tipo_sangre" serial NOT NULL,
 "tipo"           varchar(50) UNIQUE NOT NULL,
 CONSTRAINT "PK_tipo_sangre" PRIMARY KEY ( "id_tipo_sangre" )
);

CREATE TABLE "estado_isss"
(
 "id_estado_isss" serial NOT NULL,
 "estado"         varchar(50) UNIQUE NOT NULL,
 CONSTRAINT "PK_estado_isss" PRIMARY KEY ( "id_estado_isss" )
);

CREATE TABLE "pais"
(
 "id_pais" serial NOT NULL,
 "nombre"         varchar(100) UNIQUE NOT NULL,
 CONSTRAINT "PK_pais" PRIMARY KEY ( "id_pais" )
);

CREATE TABLE "pais_estado"
(
 "id_pais_estado" serial NOT NULL,
 "nombre"         varchar(100) NOT NULL,
 "id_pais"        integer NOT NULL,
 CONSTRAINT "PK_pais_estado" PRIMARY KEY ( "id_pais_estado" ),
 CONSTRAINT "FK_232" FOREIGN KEY ( "id_pais" ) REFERENCES "pais" ( "id_pais" )
);

CREATE TABLE "perfil_medico"
(
 "id_perfil_medico" serial NOT NULL,
 "nombres"          varchar(100),
 "apellidos"        varchar(100),
 "uid"              char(5) UNIQUE,
 "pin"              smallint,
 "foto"             varchar(75) UNIQUE,
 "fecha_nacimiento" date,
 "documento_identidad"              varchar(50),
 "es_donador"       boolean,
 "listado"          boolean DEFAULT 't',
 "direccion"        varchar(250),
 "peso"             varchar(50),
 "estatura"         varchar(50),
 "id_pais"          integer,
 "id_pais_estado"   integer,
 "ciudad"           varchar(50),
 "id_tipo_sangre"   integer,
 "id_estado_isss"   integer,
 "id_usuario"       integer NOT NULL,
 CONSTRAINT "PK_perfil_medico" PRIMARY KEY ( "id_perfil_medico" ),
 CONSTRAINT "FK_255" FOREIGN KEY ( "id_usuario" ) REFERENCES "usuario" ( "id_usuario" ),
 CONSTRAINT "FK_230" FOREIGN KEY ( "id_tipo_sangre" ) REFERENCES "tipo_sangre" ( "id_tipo_sangre" ),
 CONSTRAINT "FK_212" FOREIGN KEY ( "id_estado_isss" ) REFERENCES "estado_isss" ( "id_estado_isss" ),
 CONSTRAINT "FK_236" FOREIGN KEY ( "id_pais" ) REFERENCES "pais" ( "id_pais" ),
 CONSTRAINT "FK_240" FOREIGN KEY ( "id_pais_estado" ) REFERENCES "pais_estado" ( "id_pais_estado" )


);

CREATE INDEX "fkIdx_212" ON "perfil_medico"
(
 "id_estado_isss"
);

CREATE INDEX "fkIdx_230" ON "perfil_medico"
(
 "id_tipo_sangre"
);

CREATE TABLE "usuario"
(
 "id_usuario"       serial NOT NULL,
 "email"            varchar(150) UNIQUE NOT NULL,
 "telefono"         varchar(35) UNIQUE,
 "clave"            char(98) NOT NULL,
 "id_perfil_medico" integer UNIQUE,
 CONSTRAINT "PK_usuario" PRIMARY KEY ( "id_usuario" ),
 CONSTRAINT "FK_201" FOREIGN KEY ( "id_perfil_medico" ) REFERENCES "perfil_medico" ( "id_perfil_medico" )
);

CREATE INDEX "fkIdx_201" ON "usuario"
(
 "id_perfil_medico"
);

CREATE TABLE "usuario_recuperar_clave"
(
 "id_recuperar_clave" serial NOT NULL,
 "fecha_creacion"     timestamptz NOT NULL,
 "pin"                char(6) NOT NULL,
 "id_usuario"         integer NOT NULL,
 CONSTRAINT "PK_usuario_recuperar_clave" PRIMARY KEY ( "id_recuperar_clave" ),
 CONSTRAINT "FK_223" FOREIGN KEY ( "id_usuario" ) REFERENCES "usuario" ( "id_usuario" )
);

CREATE INDEX "fkIdx_223" ON "usuario_recuperar_clave"
(
 "id_usuario"
);

/*CREATE TABLE "perfiles_usuario"
(
 "id_perfiles_usuario" serial NOT NULL,
 "id_usuario"          integer NOT NULL,
 "id_perfil_medico"    integer NOT NULL,
 CONSTRAINT "PK_perfiles_usuario" PRIMARY KEY ( "id_perfiles_usuario" ),
 CONSTRAINT "FK_195" FOREIGN KEY ( "id_usuario" ) REFERENCES "usuario" ( "id_usuario" ),
 CONSTRAINT "FK_215" FOREIGN KEY ( "id_perfil_medico" ) REFERENCES "perfil_medico" ( "id_perfil_medico" )
);

CREATE INDEX "fkIdx_195" ON "perfiles_usuario"
(
 "id_usuario"
);

CREATE INDEX "fkIdx_215" ON "perfiles_usuario"
(
 "id_perfil_medico"
);*/

CREATE TABLE "perfil_contacto_emergencia"
(
 "id_contacto"      serial NOT NULL,
 "nombre"           varchar(200) NOT NULL,
 "telefono"         varchar(35) NOT NULL,
 "relacion"         varchar(50) NOT NULL,
 "direccion"        varchar(250),
 "email"            varchar(150),
 "id_perfil_medico" integer NOT NULL,
 CONSTRAINT "PK_perfil_contacto_emergencia" PRIMARY KEY ( "id_contacto" ),
 CONSTRAINT "FK_26" FOREIGN KEY ( "id_perfil_medico" ) REFERENCES "perfil_medico" ( "id_perfil_medico" )
);

CREATE INDEX "fkIdx_26" ON "perfil_contacto_emergencia"
(
 "id_perfil_medico"
);

CREATE TABLE "perfil_contacto_doctor"
(
 "id_contacto_d"    serial NOT NULL,
 "nombre"           varchar(200) NOT NULL,
 "telefono"         varchar(35) NOT NULL,
 "especialidad"            varchar(50) NOT NULL,
 "id_perfil_medico" integer NOT NULL,
 CONSTRAINT "PK_perfil_contacto_doctor" PRIMARY KEY ( "id_contacto_d" ),
 CONSTRAINT "FK_35" FOREIGN KEY ( "id_perfil_medico" ) REFERENCES "perfil_medico" ( "id_perfil_medico" )
);

CREATE INDEX "fkIdx_35" ON "perfil_contacto_doctor"
(
 "id_perfil_medico"
);

CREATE TABLE "perfil_alergia"
(
 "id_alergia"       serial NOT NULL,
 "alergia"          varchar(200) NOT NULL,
 "reaccion"         varchar(800),
 "tratamiento"      varchar(200),
 "id_perfil_medico" integer NOT NULL,
 CONSTRAINT "PK_perfil_alergia" PRIMARY KEY ( "id_alergia" ),
 CONSTRAINT "FK_43" FOREIGN KEY ( "id_perfil_medico" ) REFERENCES "perfil_medico" ( "id_perfil_medico" )
);

CREATE INDEX "fkIdx_43" ON "perfil_alergia"
(
 "id_perfil_medico"
);

CREATE TABLE "perfil_seguro_medico"
(
 "id_seguro"          serial NOT NULL,
 "compania"           varchar(100) NOT NULL,
 "num_identificacion" varchar(50) NOT NULL,
 "deducible"          numeric(9,2),
 "telefono"           varchar(35),
 "notas"              varchar(800),
 "adjunto"            varchar(75) UNIQUE,
 "id_perfil_medico"   integer NOT NULL,
 CONSTRAINT "PK_perfil_seguro_medico" PRIMARY KEY ( "id_seguro" ),
 CONSTRAINT "FK_80" FOREIGN KEY ( "id_perfil_medico" ) REFERENCES "perfil_medico" ( "id_perfil_medico" )
);

CREATE INDEX "fkIdx_80" ON "perfil_seguro_medico"
(
 "id_perfil_medico"
);

CREATE TABLE "perfil_procedimiento_medico"
(
 "id_procedimiento" serial NOT NULL,
 "procedimiento"    varchar(200) NOT NULL,
 "fecha"            date,
 "hospital"         varchar(200),
 "adjunto"          varchar(75) UNIQUE,
 "id_contacto_d"	integer,
 "id_perfil_medico" integer NOT NULL,
 CONSTRAINT "PK_perfil_procedimiento_medico" PRIMARY KEY ( "id_procedimiento" ),
 CONSTRAINT "FK_250" FOREIGN KEY ( "id_contacto_d" ) REFERENCES "perfil_contacto_doctor" ( "id_contacto_d" ),
 CONSTRAINT "FK_91" FOREIGN KEY ( "id_perfil_medico" ) REFERENCES "perfil_medico" ( "id_perfil_medico" )
);

CREATE INDEX "fkIdx_91" ON "perfil_procedimiento_medico"
(
 "id_perfil_medico"
);

CREATE TABLE "perfil_medicacion"
(
 "id_medicacion"    serial NOT NULL,
 "nombre"           varchar(100) NOT NULL,
 "dosis"            varchar(25) NOT NULL,
 "frecuencia"       varchar(25) NOT NULL,
 "notas"            varchar(800),
 "adjunto"          varchar(75) UNIQUE,
 "id_perfil_medico" integer NOT NULL,
 CONSTRAINT "PK_perfil_medicacion" PRIMARY KEY ( "id_medicacion" ),
 CONSTRAINT "FK_74" FOREIGN KEY ( "id_perfil_medico" ) REFERENCES "perfil_medico" ( "id_perfil_medico" )
);

CREATE INDEX "fkIdx_74" ON "perfil_medicacion"
(
 "id_perfil_medico"
);

CREATE TABLE "perfil_condicion_medica"
(
 "id_condicion"     serial NOT NULL,
 "condicion"        varchar(200) NOT NULL,
 "notas"            varchar(800),
 "adjunto"          varchar(75) UNIQUE,
 "id_medicacion"	integer,
 "id_perfil_medico" integer NOT NULL,
 CONSTRAINT "PK_perfil_condicion_medica" PRIMARY KEY ( "id_condicion" ),
 CONSTRAINT "FK_73" FOREIGN KEY ( "id_medicacion" ) REFERENCES "perfil_medicacion" ( "id_medicacion" ),
 CONSTRAINT "FK_77" FOREIGN KEY ( "id_perfil_medico" ) REFERENCES "perfil_medico" ( "id_perfil_medico" )
);

CREATE INDEX "fkIdx_77" ON "perfil_condicion_medica"
(
 "id_perfil_medico"
);

CREATE TABLE "perfil_otra_informacion"
(
 "id_informacion"   serial NOT NULL,
 "clave"            varchar(200) NOT NULL,
 "valor"            varchar(800) NOT NULL,
 "id_perfil_medico" integer NOT NULL,
 CONSTRAINT "PK_perfil_otra_informacion" PRIMARY KEY ( "id_informacion" ),
 CONSTRAINT "FK_160" FOREIGN KEY ( "id_perfil_medico" ) REFERENCES "perfil_medico" ( "id_perfil_medico" )
);

CREATE INDEX "fkIdx_160" ON "perfil_otra_informacion"
(
 "id_perfil_medico"
);

CREATE TABLE "perfil_usuarios_compartir"
(
 "id_usuarios_compartir" serial NOT NULL,
 "id_perfil_medico"      integer NOT NULL,
 "id_usuario"            integer NOT NULL,
 CONSTRAINT "PK_perfil_usuarios_compartir" PRIMARY KEY ( "id_usuarios_compartir" ),
 CONSTRAINT "FK_132" FOREIGN KEY ( "id_perfil_medico" ) REFERENCES "perfil_medico" ( "id_perfil_medico" ),
 CONSTRAINT "FK_204" FOREIGN KEY ( "id_usuario" ) REFERENCES "usuario" ( "id_usuario" )
);

CREATE INDEX "fkIdx_132" ON "perfil_usuarios_compartir"
(
 "id_perfil_medico"
);

CREATE INDEX "fkIdx_204" ON "perfil_usuarios_compartir"
(
 "id_usuario"
);

CREATE TABLE "perfil_enlaces_compartir"
(
 "id_enlace"        serial NOT NULL,
 "enlace"           varchar(75) UNIQUE NOT NULL,
 "fecha_creacion"   timestamptz NOT NULL,
 "fecha_expiracion" timestamptz NOT NULL,
 "num_visitas"      int NOT NULL DEFAULT 0,
 "id_perfil_medico" integer NOT NULL,
 CONSTRAINT "PK_perfil_enlaces_compartir" PRIMARY KEY ( "id_enlace" ),
 CONSTRAINT "FK_138" FOREIGN KEY ( "id_perfil_medico" ) REFERENCES "perfil_medico" ( "id_perfil_medico" )
);

CREATE INDEX "fkIdx_138" ON "perfil_enlaces_compartir"
(
 "id_perfil_medico"
);

CREATE TABLE "accion_bitacora"
(
 "id_accion_bitacora" serial NOT NULL,
 "accion"             varchar(100) UNIQUE NOT NULL,
 CONSTRAINT "PK_accion_bitacora" PRIMARY KEY ( "id_accion_bitacora" )
);

CREATE TABLE "perfil_bitacora"
(
 "id_bitacora"        serial NOT NULL,
 "descripcion"        varchar(800) NOT NULL,
 "fecha"              timestamptz NOT NULL,
 "id_perfil_medico"   integer NOT NULL,
 "id_accion_bitacora" integer NOT NULL,
 CONSTRAINT "PK_perfil_bitacora" PRIMARY KEY ( "id_bitacora" ),
 CONSTRAINT "FK_146" FOREIGN KEY ( "id_perfil_medico" ) REFERENCES "perfil_medico" ( "id_perfil_medico" ),
 CONSTRAINT "FK_152" FOREIGN KEY ( "id_accion_bitacora" ) REFERENCES "accion_bitacora" ( "id_accion_bitacora" )
);

CREATE INDEX "fkIdx_146" ON "perfil_bitacora"
(
 "id_perfil_medico"
);

CREATE INDEX "fkIdx_152" ON "perfil_bitacora"
(
 "id_accion_bitacora"
);

CREATE TABLE "up_tipo_usuario"
(
 "id_tipo_usuario_p" serial NOT NULL,
 "tipo"              varchar(50) UNIQUE NOT NULL,
 CONSTRAINT "PK_up_tipo_usuario" PRIMARY KEY ( "id_tipo_usuario_p" )
);

CREATE TABLE "up_organizacion"
(
 "id_organizacion" serial NOT NULL,
 "nombre"          varchar(100) UNIQUE NOT NULL,
 "telefono"        varchar(35) UNIQUE,
 "logo"            varchar(75) UNIQUE,
 CONSTRAINT "PK_up_organizacion" PRIMARY KEY ( "id_organizacion" )
);

CREATE TABLE "usuario_privilegiado"
(
 "id_usuario_p"      serial NOT NULL,
 "nombres"           varchar(100) NOT NULL,
 "apellidos"         varchar(100) NOT NULL,
 "email"             varchar(150) UNIQUE NOT NULL,
 "telefono"          varchar(35) UNIQUE,
 "clave"             char(98) NOT NULL,
 "id_tipo_usuario_p" integer NOT NULL,
 "id_organizacion"   integer NOT NULL,
 CONSTRAINT "PK_usuario_privilegiado" PRIMARY KEY ( "id_usuario_p" ),
 CONSTRAINT "FK_108" FOREIGN KEY ( "id_tipo_usuario_p" ) REFERENCES "up_tipo_usuario" ( "id_tipo_usuario_p" ),
 CONSTRAINT "FK_114" FOREIGN KEY ( "id_organizacion" ) REFERENCES "up_organizacion" ( "id_organizacion" )
);

CREATE INDEX "fkIdx_108" ON "usuario_privilegiado"
(
 "id_tipo_usuario_p"
);

CREATE INDEX "fkIdx_114" ON "usuario_privilegiado"
(
 "id_organizacion"
);

ALTER TABLE perfil_medico ADD COLUMN id_usuario int;
alter table perfil_medico add constraint fkIdx_209 foreign key ("id_usuario") references usuario ("id_usuario");
DROP TABLE perfiles_usuario
