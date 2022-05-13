

CREATE TABLE "rol" (
	"id"	INTEGER,
	"nombre"	TEXT,
	PRIMARY KEY("id" AUTOINCREMENT)
);

CREATE TABLE "estatus_proceso" (
	"id"	INTEGER,
	"nombre"	TEXT,
	PRIMARY KEY("id" AUTOINCREMENT)
);

CREATE TABLE "menu" (
	"id"	INTEGER,
	"id_uno"	INTEGER NOT NULL,
	"texto"	TEXT,
	"url"	TEXT ,
	FOREIGN KEY("id_uno") REFERENCES "rol"("id"),
	PRIMARY KEY("id" AUTOINCREMENT)
);

CREATE TABLE "vacante" (
	"id"	INTEGER,
	"nombrevac"	TEXT,
	"descripcion" TEXT,
	"habtecreq"	TEXT,
	"habtecdes"	TEXT,
	"escolaridad" TEXT,
	"experiencia" TEXT,
	"estatus" TEXT,
	PRIMARY KEY("id" AUTOINCREMENT)
);

CREATE TABLE "usuario" (
	"id"	INTEGER,
	"id_dos"	INTEGER,
	"email"	TEXT,
	"contrasena"	TEXT,
	FOREIGN KEY("id_dos") REFERENCES "rol"("id"),
	PRIMARY KEY("id" AUTOINCREMENT)
);

CREATE TABLE "proceso" (
	"id"	INTEGER,
	"id_tres"	INTEGER ,
	"id_cuatro"	INTEGER ,
	"id_cinco"	INTEGER,
	"comentarios"	TEXT,
	"fecha_creacion"	date,
	"fecha_ultima_actualizacion"	date,
	FOREIGN KEY("id_tres") REFERENCES "candidato"("id"),
	FOREIGN KEY("id_cuatro") REFERENCES "vacante"("id"),
	FOREIGN KEY("id_cinco") REFERENCES "estatus_proceso"("id"),
	PRIMARY KEY("id" AUTOINCREMENT)
);

CREATE TABLE "candidato" (
	"id"	INTEGER,
	"id_seis"	INTEGER,
	"nombre"	TEXT,
	"fecha_nacimiento"	date,
	"nacionalidad"	TEXT,
	"ciudad_residencia"	TEXT,
	"cv_file"	TEXT,
	"more_attributes"	TEXT,
	FOREIGN KEY("id_seis") REFERENCES "usuario"("id"),
	PRIMARY KEY("id" AUTOINCREMENT)
);