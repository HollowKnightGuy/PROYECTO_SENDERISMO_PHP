DROP DATABASE IF EXISTS senderismo;
CREATE DATABASE IF NOT EXISTS senderismo;
SET NAMES UTF8;
USE senderismo;


DROP TABLE IF EXISTS rutas;
CREATE TABLE IF NOT EXISTS rutas(
id              int(11) not null auto_increment ,
titulo          varchar(55) not null,
descripcion     varchar(255) not null,
desnivel        int(6) not null,
distancia       double not null,
notas           blob,
dificultad      smallint(5) not null,
CONSTRAINT pk_idrutas PRIMARY KEY(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS rutas_comentarios;
CREATE TABLE IF NOT EXISTS rutas_comentarios( 
id              smallint(6) auto_increment not null,
id_ruta         int(11) not null,
nombre          varchar(50),
texto           blob not null,
fecha           date not null,
CONSTRAINT pk_idcomentarios PRIMARY KEY(id),  
CONSTRAINT fk_id_ruta FOREIGN KEY(id_ruta) REFERENCES rutas(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
