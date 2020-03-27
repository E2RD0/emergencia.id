CREATE TABLE "usuario"
(
 "id_usuario"       serial,
 "nombres"          varchar(100) NOT NULL,
 "apellidos"        varchar(100) NOT NULL,
 "email"            varchar(150) UNIQUE NOT NULL,
 "telefono"         varchar(35) UNIQUE,
 "clave"            char(98) NOT NULL,
 "uid"              char(5) UNIQUE NOT NULL, /*Unique identifier*/
 "pin"              smallint NOT NULL,
 "direccion"        varchar(250),
 "foto"             varchar(75) UNIQUE,
 "tipo_sangre"      varchar(5),
 "fecha_nacimiento" date,
 "di"               varchar(25), /*Documento de identidad*/
 "es_donador"       boolean,
 "listado"          boolean NOT NULL DEFAULT 't',
 "ciudad"           varchar(50),
 "estado"           varchar(50),
 "pais"             varchar(50) NOT NULL,
 CONSTRAINT "PK_usuario" PRIMARY KEY ( "id_usuario" )
);



CREATE TABLE "usuario_alergia"
(
 "id_alergia" serial,
 "alergia"    varchar(200) NOT NULL,
 "reaccion"   varchar(800),
 "id_usuario" integer NOT NULL,
 CONSTRAINT "PK_alergia" PRIMARY KEY ( "id_alergia" ),
 CONSTRAINT "FK_43" FOREIGN KEY ( "id_usuario" ) REFERENCES "usuario" ( "id_usuario" )
);

CREATE INDEX "fkIdx_43" ON "usuario_alergia"
(
 "id_usuario"
);



CREATE TABLE "contacto_emergencia"
(
 "id_contacto" serial NOT NULL,
 "nombre"      varchar(200) NOT NULL,
 "telefono"    varchar(35) NOT NULL,
 "relacion"    varchar(50) NOT NULL,
 "id_usuario"  integer NOT NULL,
 CONSTRAINT "PK_contactos_emergencia" PRIMARY KEY ( "id_contacto" ),
 CONSTRAINT "FK_26" FOREIGN KEY ( "id_usuario" ) REFERENCES "usuario" ( "id_usuario" )
);

CREATE INDEX "fkIdx_26" ON "contacto_emergencia"
(
 "id_usuario"
);



CREATE TABLE "contacto_doctor"
(
 "id_contacto_d" serial NOT NULL,
 "nombre"        varchar(200) NOT NULL,
 "telefono"      varchar(35) NOT NULL,
 "cargo"         varchar(50) NOT NULL,
 "id_usuario"    integer NOT NULL,
 CONSTRAINT "PK_contacto_doctor" PRIMARY KEY ( "id_contacto_d" ),
 CONSTRAINT "FK_35" FOREIGN KEY ( "id_usuario" ) REFERENCES "usuario" ( "id_usuario" )
);

CREATE INDEX "fkIdx_35" ON "contacto_doctor"
(
 "id_usuario"
);



CREATE TABLE "condicion_medica"
(
 "id_condicion" serial NOT NULL,
 "condicion"    varchar(200) NOT NULL,
 "notas"        varchar(800),
 "adjunto"      varchar(75) UNIQUE,
 "id_usuario"   integer NOT NULL,
 CONSTRAINT "PK_condicion_medica" PRIMARY KEY ( "id_condicion" ),
 CONSTRAINT "FK_77" FOREIGN KEY ( "id_usuario" ) REFERENCES "usuario" ( "id_usuario" )
);

CREATE INDEX "fkIdx_77" ON "condicion_medica"
(
 "id_usuario"
);



CREATE TABLE "seguro_medico"
(
 "id_seguro"          serial NOT NULL,
 "compania"           varchar(100) NOT NULL,
 "num_identificacion" varchar(50) NOT NULL,
 "deducible"          numeric(9,2),
 "telefono"           varchar(35),
 "notas"              varchar(800),
 "adjunto"            varchar(75) UNIQUE,
 "id_usuario"         integer NOT NULL,
 CONSTRAINT "PK_seguro_medico" PRIMARY KEY ( "id_seguro" ),
 CONSTRAINT "FK_80" FOREIGN KEY ( "id_usuario" ) REFERENCES "usuario" ( "id_usuario" )
);

CREATE INDEX "fkIdx_80" ON "seguro_medico"
(
 "id_usuario"
);



CREATE TABLE "procedimiento_medico"
(
 "id_procedimiento" serial NOT NULL,
 "procedimiento"    varchar(200) NOT NULL,
 "fecha"            date,
 "hospital"         varchar(200),
 "adjunto"          varchar(75) UNIQUE,
 "id_usuario"       integer NOT NULL,
 CONSTRAINT "PK_procedimiento_medico" PRIMARY KEY ( "id_procedimiento" ),
 CONSTRAINT "FK_91" FOREIGN KEY ( "id_usuario" ) REFERENCES "usuario" ( "id_usuario" )
);

CREATE INDEX "fkIdx_91" ON "procedimiento_medico"
(
 "id_usuario"
);



CREATE TABLE "usuario_medicacion"
(
 "id_medicacion" serial NOT NULL,
 "nombre"        varchar(100) NOT NULL,
 "dosis"         varchar(25) NOT NULL,
 "frecuencia"    varchar(25) NOT NULL,
 "notas"         varchar(800),
 "adjunto"       varchar(75) UNIQUE,
 "id_usuario"    integer NOT NULL,
 CONSTRAINT "PK_usuario_medicacion" PRIMARY KEY ( "id_medicacion" ),
 CONSTRAINT "FK_74" FOREIGN KEY ( "id_usuario" ) REFERENCES "usuario" ( "id_usuario" )
);

CREATE INDEX "fkIdx_74" ON "usuario_medicacion"
(
 "id_usuario"
);



CREATE TABLE "otra_informacion"
(
 "id_informacion" serial NOT NULL,
 "clave"          varchar(200) NOT NULL,
 "valor"          varchar(800) NOT NULL,
 "id_usuario"     integer NOT NULL,
 CONSTRAINT "PK_otra_informacion" PRIMARY KEY ( "id_informacion" ),
 CONSTRAINT "FK_160" FOREIGN KEY ( "id_usuario" ) REFERENCES "usuario" ( "id_usuario" )
);

CREATE INDEX "fkIdx_160" ON "otra_informacion"
(
 "id_usuario"
);



CREATE TABLE "usuarios_compartir"
(
 "id_usuarios_compartir" serial NOT NULL,
 "id_usuario"            integer NOT NULL,
 "id_usuario_comparte"  integer NOT NULL,
 CONSTRAINT "PK_usuarios_compartir" PRIMARY KEY ( "id_usuarios_compartir" ),
 CONSTRAINT "FK_132" FOREIGN KEY ( "id_usuario" ) REFERENCES "usuario" ( "id_usuario" ),
 CONSTRAINT "FK_135" FOREIGN KEY ( "id_usuario_comparte" ) REFERENCES "usuario" ( "id_usuario" )
);

CREATE INDEX "fkIdx_132" ON "usuarios_compartir"
(
 "id_usuario"
);

CREATE INDEX "fkIdx_135" ON "usuarios_compartir"
(
 "id_usuario_comparte"
);



CREATE TABLE "enlaces_compartir"
(
 "id_enlace"        serial NOT NULL,
 "enlace"           varchar(75) UNIQUE NOT NULL,
 "fecha_creacion"   timestamptz NOT NULL,
 "fecha_expiracion" timestamptz NOT NULL,
 "num_visitas"      int NOT NULL,
 "id_usuario"       integer NOT NULL,
 CONSTRAINT "PK_enlaces_compartir" PRIMARY KEY ( "id_enlace" ),
 CONSTRAINT "FK_138" FOREIGN KEY ( "id_usuario" ) REFERENCES "usuario" ( "id_usuario" )
);

CREATE INDEX "fkIdx_138" ON "enlaces_compartir"
(
 "id_usuario"
);



CREATE TABLE "tipo_usuario_p"
(
 "id_tipo_usuario_p" serial NOT NULL,
 "tipo"              varchar(50) UNIQUE NOT NULL,
 CONSTRAINT "PK_tipo_usuario_p" PRIMARY KEY ( "id_tipo_usuario_p" )
);



CREATE TABLE "organizacion"
(
 "id_organizacion" serial NOT NULL,
 "nombre"          varchar(100) UNIQUE NOT NULL,
 "telefono"        varchar(35) UNIQUE,
 "logo"            varchar(75) UNIQUE,
 CONSTRAINT "PK_organizacion_p" PRIMARY KEY ( "id_organizacion" )
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
 CONSTRAINT "FK_108" FOREIGN KEY ( "id_tipo_usuario_p" ) REFERENCES "tipo_usuario_p" ( "id_tipo_usuario_p" ),
 CONSTRAINT "FK_114" FOREIGN KEY ( "id_organizacion" ) REFERENCES "organizacion" ( "id_organizacion" )
);

CREATE INDEX "fkIdx_108" ON "usuario_privilegiado"
(
 "id_tipo_usuario_p"
);

CREATE INDEX "fkIdx_114" ON "usuario_privilegiado"
(
 "id_organizacion"
);



CREATE TABLE "accion_bitacora"
(
 "id_accion_bitacora" serial NOT NULL,
 "accion"             varchar(100) UNIQUE NOT NULL,
 CONSTRAINT "PK_accion_bitacora" PRIMARY KEY ( "id_accion_bitacora" )
);



CREATE TABLE "bitacora_usuario"
(
 "id_bitacora"        serial NOT NULL,
 "descripcion"        varchar(800) NOT NULL,
 "fecha"              timestamptz NOT NULL, 
 "id_usuario"         integer NOT NULL,
 "id_accion_bitacora" integer NOT NULL,
 CONSTRAINT "PK_bitacora_usuario" PRIMARY KEY ( "id_bitacora" ),
 CONSTRAINT "FK_146" FOREIGN KEY ( "id_usuario" ) REFERENCES "usuario" ( "id_usuario" ),
 CONSTRAINT "FK_152" FOREIGN KEY ( "id_accion_bitacora" ) REFERENCES "accion_bitacora" ( "id_accion_bitacora" )
);

CREATE INDEX "fkIdx_146" ON "bitacora_usuario"
(
 "id_usuario"
);

CREATE INDEX "fkIdx_152" ON "bitacora_usuario"
(
 "id_accion_bitacora"
);
