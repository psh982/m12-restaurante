DROP DATABASE db_restaurante;

CREATE DATABASE db_restaurante;

USE db_restaurante;

CREATE TABLE tbl_users(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    apellido1 VARCHAR(50) NOT NULL,
    apellido2 VARCHAR(50),
    contra VARCHAR(120),
    salario INT(5) NOT NULL,
    correo VARCHAR(30) NOT NULL,
    telefono INT(9) NOT NULL,
    DNI VARCHAR(9) NOT NULL,
    rol INT NOT NULL
);

CREATE TABLE tbl_roles(
    id_roles INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre_rol VARCHAR(20) NOT NULL
);

CREATE TABLE tbl_salas(
    id_sala INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre_sala VARCHAR(20) NOT NULL,
    mesas_sala INT NOT NULL,
    tipos_sala INT NOT NULL
);

CREATE TABLE tbl_tipos_salas(
    id_tipos INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre_tipos VARCHAR(20) NOT NULL,
    aforo INT
);

CREATE TABLE tbl_mesas(
    id_mesa INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre_mesa VARCHAR(20) NOT NULL,
    sillas INT (2) NOT NULL,
    estado_mesa INT(1) NOT NULL,
    camarero INT
);

CREATE TABLE tbl_estado(
    id_estado INT NOT NULL PRIMARY KEY,
    estado_nombre VARCHAR(20) NOT NULL
);

ALTER TABLE tbl_users
ADD CONSTRAINT fk_users_roles
FOREIGN KEY (rol)
REFERENCES tbl_roles(id_roles);

ALTER TABLE tbl_salas
ADD CONSTRAINT fk_salas_tipos_salas
FOREIGN KEY (tipos_sala)
REFERENCES tbl_tipos_salas(id_tipos);

ALTER TABLE tbl_salas
ADD CONSTRAINT fk_salas_mesas
FOREIGN KEY (mesas_sala)
REFERENCES tbl_mesas(id_mesa);

ALTER TABLE tbl_mesas
ADD CONSTRAINT fk_mesas_camareros
FOREIGN KEY (camarero)
REFERENCES tbl_users(id);

ALTER TABLE tbl_mesas
ADD CONSTRAINT fk_mesas_estado
FOREIGN KEY (estado_mesa)
REFERENCES tbl_estado(id_estado);

CREATE TABLE tbl_historial(
    id_historial INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    id_mesa INT NOT NULL,
    id_sala INT NOT NULL,
    fecha_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    dia DATE,
    FOREIGN KEY (id_usuario) REFERENCES tbl_users(id),
    FOREIGN KEY (id_mesa) REFERENCES tbl_mesas(id_mesa),
    FOREIGN KEY (id_sala) REFERENCES tbl_salas(id_sala)
);

