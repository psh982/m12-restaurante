DROP DATABASE db_restaurante;

CREATE DATABASE db_restaurante;

USE db_restaurante;

/* Tabla de roles */
CREATE TABLE tbl_roles(
    id_roles INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre_rol VARCHAR(20) NOT NULL
);

/* Tabla de usuarios */
CREATE TABLE tbl_users(
    id_user INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    apellido1 VARCHAR(50) NOT NULL,
    apellido2 VARCHAR(50),
    contra VARCHAR(120),
    salario INT(6) NOT NULL,
    correo VARCHAR(30) NOT NULL,
    telefono INT(9) NOT NULL,
    DNI VARCHAR(9) NOT NULL,
    rol INT NOT NULL
);

/* Tabla de tipos de sala que tenemos */
CREATE TABLE tbl_tipos_salas(
    id_tipos INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre_tipos VARCHAR(20) NOT NULL,
    aforo INT (2)
);

/* Tabla numero de salas */
CREATE TABLE tbl_salas(
    id_sala INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_tipos_sala INT NOT NULL,
    nombre_sala VARCHAR(20) NOT NULL
);
/* Tabla de mesas */
CREATE TABLE tbl_mesas(
    id_mesa INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre_mesa VARCHAR(20) NOT NULL,
    sillas INT (2) NOT NULL,
    id_estado_mesa INT NOT NULL,
    id_camarero INT,
    id_sala_mesa INT NOT NULL
);
/* Tabla de estado para la mesa */
CREATE TABLE tbl_estado(
    id_estado INT NOT NULL PRIMARY KEY,
    estado_nombre VARCHAR(20) NOT NULL
);

ALTER TABLE tbl_mesas
ADD CONSTRAINT fk_salas_mesas
FOREIGN KEY (id_sala_mesa)
REFERENCES tbl_salas(id_sala);

ALTER TABLE tbl_users
ADD CONSTRAINT fk_users_roles
FOREIGN KEY (rol)
REFERENCES tbl_roles(id_roles);

ALTER TABLE tbl_salas
ADD CONSTRAINT fk_salas_tipos_salas
FOREIGN KEY (id_tipos_sala)
REFERENCES tbl_tipos_salas(id_tipos);

ALTER TABLE tbl_mesas
ADD CONSTRAINT fk_mesas_camareros
FOREIGN KEY (id_camarero)
REFERENCES tbl_users(id_user);

ALTER TABLE tbl_mesas
ADD CONSTRAINT fk_mesas_estado
FOREIGN KEY (id_estado_mesa)
REFERENCES tbl_estado(id_estado);

CREATE TABLE tbl_historial(
    id_historial INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    id_mesa INT NOT NULL,
    id_sala INT NOT NULL,
    fecha_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES tbl_users(id_user),
    FOREIGN KEY (id_mesa) REFERENCES tbl_mesas(id_mesa),
    FOREIGN KEY (id_sala) REFERENCES tbl_salas(id_sala)
);
/*_________________________________ Roles _________________________________*/
INSERT INTO tbl_roles VALUES (1,'admin');
INSERT INTO tbl_roles VALUES (2,'camarero');
INSERT INTO tbl_roles VALUES (3,'chef');
/*_________________________________ Estado _________________________________*/
INSERT INTO tbl_estado VALUES (1,'Ocupado');
INSERT INTO tbl_estado VALUES (2,'Libre');
/*_________________________________ Tipos de sala _________________________________*/
INSERT INTO tbl_tipos_salas VALUES (1,'Terraza',24);
INSERT INTO tbl_tipos_salas VALUES (2,'Comedor',72);
INSERT INTO tbl_tipos_salas VALUES (3,'Sala_privada',16);
/*_________________________________ Salas _________________________________*/
/* Terraza */
INSERT INTO tbl_salas VALUES (1,1,'1');
INSERT INTO tbl_salas VALUES (2,1,'2');
INSERT INTO tbl_salas VALUES (3,1,'3');
/* Comedor */
INSERT INTO tbl_salas VALUES (4,2,'1');
INSERT INTO tbl_salas VALUES (5,2,'2');
/* Sala privada */
INSERT INTO tbl_salas VALUES (6,3,'1');
INSERT INTO tbl_salas VALUES (7,3,'2');
INSERT INTO tbl_salas VALUES (8,3,'3');
INSERT INTO tbl_salas VALUES (9,3,'4');
/* _________________________________ Usuarios _________________________________*/
INSERT INTO tbl_users VALUES (1,'Admin', 'Supremo', '', '$2y$10$eQV9jOJPHQq9X/gY.LUCb.LxlmQaSwyHLOT88AEyQ/55UggDpEbd6', 10000, 'admin@gmail.com', 123456789, '12345678A', 1);
INSERT INTO tbl_users VALUES (2,'Alberto', 'Bermejo', 'Nuñez', '$2y$10$AaLco/MRdphg960EbWCmkO40QRcBTrOlcVOlmT3sxpxaBoOKp.E1q', 2000, 'abermejo@escolagoar.cat', 690621200, '12345679A', 2);
/*_________________________________ Mesas de sala privada _________________________________*/
INSERT INTO tbl_mesas VALUES (1,'Mesa_1',16, 2, NULL, 6);
INSERT INTO tbl_mesas VALUES (2,'Mesa_2',16, 2, NULL, 7);
INSERT INTO tbl_mesas VALUES (3,'Mesa_3',16, 2, NULL, 8);
INSERT INTO tbl_mesas VALUES (4,'Mesa_4',16, 2, NULL, 9);
/*_________________________________ Mesas de Terraza _________________________________*/
/* Sala terraza 1 */
INSERT INTO tbl_mesas VALUES (5, 'Mesa_5', 4, 2, NULL, 1);
INSERT INTO tbl_mesas VALUES (6, 'Mesa_6', 4, 2, NULL, 1);
INSERT INTO tbl_mesas VALUES (7, 'Mesa_7', 4, 2, NULL, 1);
INSERT INTO tbl_mesas VALUES (8, 'Mesa_8', 4, 2, NULL, 1);
INSERT INTO tbl_mesas VALUES (9, 'Mesa_9', 4, 2, NULL, 1);
INSERT INTO tbl_mesas VALUES (10, 'Mesa_10', 4, 2, NULL, 1);
/* Sala terraza 2 */
INSERT INTO tbl_mesas VALUES (11, 'Mesa_11', 4, 2, NULL, 2);
INSERT INTO tbl_mesas VALUES (12, 'Mesa_12', 4, 2, NULL, 2);
INSERT INTO tbl_mesas VALUES (13, 'Mesa_13', 4, 2, NULL, 2);
INSERT INTO tbl_mesas VALUES (14, 'Mesa_14', 4, 2, NULL, 2);
INSERT INTO tbl_mesas VALUES (15, 'Mesa_15', 4, 2, NULL, 2);
INSERT INTO tbl_mesas VALUES (16, 'Mesa_16', 4, 2, NULL, 2);
/* Sala terraza 3 */
INSERT INTO tbl_mesas VALUES (17, 'Mesa_17', 4, 2, NULL, 3);
INSERT INTO tbl_mesas VALUES (18, 'Mesa_18', 4, 2, NULL, 3);
INSERT INTO tbl_mesas VALUES (19, 'Mesa_19', 4, 2, NULL, 3);
INSERT INTO tbl_mesas VALUES (20, 'Mesa_20', 4, 2, NULL, 3);
INSERT INTO tbl_mesas VALUES (21, 'Mesa_21', 4, 2, NULL, 3);
INSERT INTO tbl_mesas VALUES (22, 'Mesa_22', 4, 2, NULL, 3);
/*_________________________________ Mesas del comedor _________________________________*/
/* Mesas de comedor1 de 4 personas */
INSERT INTO tbl_mesas VALUES (23, 'Mesa_23', 4, 2, NULL, 4);
INSERT INTO tbl_mesas VALUES (24, 'Mesa_24', 4, 2, NULL, 4);
INSERT INTO tbl_mesas VALUES (25, 'Mesa_25', 4, 2, NULL, 4);
INSERT INTO tbl_mesas VALUES (26, 'Mesa_26', 4, 2, NULL, 4);
INSERT INTO tbl_mesas VALUES (27, 'Mesa_27', 4, 2, NULL, 4);
INSERT INTO tbl_mesas VALUES (28, 'Mesa_28', 4, 2, NULL, 4);
INSERT INTO tbl_mesas VALUES (29, 'Mesa_29', 4, 2, NULL, 4);
INSERT INTO tbl_mesas VALUES (30, 'Mesa_30', 4, 2, NULL, 4);
/* Mesas de comedor1 de 6 personas */
INSERT INTO tbl_mesas VALUES (31, 'Mesa_31', 6, 2, NULL, 4);
INSERT INTO tbl_mesas VALUES (32, 'Mesa_32', 6, 2, NULL, 4);
INSERT INTO tbl_mesas VALUES (33, 'Mesa_33', 6, 2, NULL, 4);
INSERT INTO tbl_mesas VALUES (34, 'Mesa_34', 6, 2, NULL, 4);
/* Mesas de comedor1 de 8 personas */
INSERT INTO tbl_mesas VALUES (35, 'Mesa_35', 8, 2, NULL, 4);
INSERT INTO tbl_mesas VALUES (36, 'Mesa_36', 8, 2, NULL, 4);

/* Mesas de comedor2 de 4 personas */
INSERT INTO tbl_mesas VALUES (37, 'Mesa_37', 4, 2, NULL, 5);
INSERT INTO tbl_mesas VALUES (38, 'Mesa_38', 4, 2, NULL, 5);
INSERT INTO tbl_mesas VALUES (39, 'Mesa_39', 4, 2, NULL, 5);
INSERT INTO tbl_mesas VALUES (40, 'Mesa_40', 4, 2, NULL, 5);
INSERT INTO tbl_mesas VALUES (41, 'Mesa_41', 4, 2, NULL, 5);
INSERT INTO tbl_mesas VALUES (42, 'Mesa_42', 4, 2, NULL, 5);
INSERT INTO tbl_mesas VALUES (43, 'Mesa_43', 4, 2, NULL, 5);
INSERT INTO tbl_mesas VALUES (44, 'Mesa_44', 4, 2, NULL, 5);
/* Mesas de comedor2 de 6 personas */
INSERT INTO tbl_mesas VALUES (45, 'Mesa_45', 6, 2, NULL, 5);
INSERT INTO tbl_mesas VALUES (46, 'Mesa_46', 6, 2, NULL, 5);
INSERT INTO tbl_mesas VALUES (47, 'Mesa_47', 6, 2, NULL, 5);
INSERT INTO tbl_mesas VALUES (48, 'Mesa_48', 6, 2, NULL, 5);
/* Mesas de comedor2 de 8 personas */
INSERT INTO tbl_mesas VALUES (49, 'Mesa_49', 8, 2, NULL, 5);
INSERT INTO tbl_mesas VALUES (50, 'Mesa_50', 8, 2, NULL, 5);


