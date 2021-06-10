DROP DATABASE IF EXISTS tienda;
CREATE DATABASE tienda CHARSET utf8mb4;
USE tienda;

--
-- Creamos la estructura de la tabla provincia
--

CREATE TABLE provincia (
  id_provincia INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nombre_provincia varchar(255) NOT NULL
);

--
-- Creamos la estructura de la tabla empleado
--

CREATE TABLE empleado (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nombre varchar(255) DEFAULT NULL,
  apellidos varchar(255) DEFAULT NULL,
  id_provincia INT UNSIGNED NOT NULL,
  direccion varchar(300) DEFAULT NULL,
  estado varchar(1) DEFAULT NULL,
  FOREIGN KEY(id_provincia) REFERENCES provincia(id_provincia)
);

--
-- Creamos la estructura de la tabla usuario
--
CREATE TABLE usuario (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
);

--
-- Introducimos los valores de la tabla usuario
--
INSERT INTO usuario VALUES (1,'Violeta', 'Vayo', '1234');

--
-- Introducimos valores a la tabla provincia
--
INSERT INTO provincia VALUES (1,'Almería'), (2,'Granada'), (3, 'Málaga'),
                          (4, 'Jaen'),  (5, 'Sevilla'), (6, 'Córdoba'),
                          (7, 'Huelva'), (8, 'Cádiz');

--
-- Introducimos valores a la tabla empleado
--

INSERT INTO empleado VALUES (1,'Juan','Hernandez','1','Calle García Lorca 29','1'),
						  (2,'Antonio','Fernandez','3','Avenida Garcilaso de la Vega 56','0');
                          