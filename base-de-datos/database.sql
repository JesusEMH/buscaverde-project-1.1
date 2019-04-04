
create database buscaverde;

use buscaverde;

CREATE TABLE usuarios(
id          int(11) auto_increment not null,
nombre      varchar(100) not null,
apellido    varchar(255) not null,
email       varchar(100) not null,
password    varchar(255) not null,
fecha		date not null,
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)
)ENGINE=innoDB;

CREATE TABLE tipo(
id          int(255) auto_increment not null,
tipo      	varchar(255) not null,
CONSTRAINT pk_tipo PRIMARY KEY(id),
CONSTRAINT uq_tipo UNIQUE(tipo)
)ENGINE=innoDB;

CREATE TABLE codigopostal(
id          	  int(255) auto_increment not null,
codigopostal      int(255) not null,
CONSTRAINT pk_codigopostal PRIMARY KEY(id),
CONSTRAINT uq_codigopostal UNIQUE(codigopostal)
)ENGINE=innoDB;

CREATE TABLE direccion(
id          int(255) auto_increment not null,
colonia     varchar(255) not null,
CONSTRAINT pk_direccion PRIMARY KEY(id),
CONSTRAINT uq_colonia UNIQUE(colonia)
)ENGINE=innoDB;

CREATE TABLE areasverdes(
id         		    int(11) auto_increment not null,
usuarios_id         int(11) not null,
tipo_id         	int(11) not null,
direccion_id        int(11) not null,
codigopostal_id     int(11) not null,
nombre              varchar(255) not null,
descripcion         MEDIUMTEXT not null,
calle				varchar(255) not null,
arboles             varchar(255) not null,
contacto            varchar(255) not null,
fecha				date not null,
CONSTRAINT pk_areasverdes PRIMARY KEY(id),
CONSTRAINT fk_usuarios_id FOREIGN KEY(usuarios_id) REFERENCES usuarios(id),
CONSTRAINT fk_tipo_id FOREIGN KEY(tipo_id) REFERENCES tipo(id),
CONSTRAINT fk_direccion_id FOREIGN KEY(direccion_id) REFERENCES direccion(id),
CONSTRAINT fk_codigopostal_id FOREIGN KEY(codigopostal_id) REFERENCES codigopostal(id)
)ENGINE=innoDB;