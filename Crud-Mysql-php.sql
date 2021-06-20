DROP DATABASE IF EXISTS tienda;
CREATE DATABASE tienda CHARSET utf8mb4;
USE tienda;

--
-- Creamos la estructura de la tabla provincia
--

CREATE TABLE provincia (
  id_provincia INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nombre_provincia VARCHAR(255) NOT NULL
);

--
-- Creamos la estructura de la tabla tienda
--

CREATE TABLE tienda (
	id_tienda INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre_tienda VARCHAR(60) NOT NULL UNIQUE,
    direccion VARCHAR(250) NOT NULL,
    codigo_postal VARCHAR(10) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    id_provincia INT UNSIGNED NOT NULL,
    FOREIGN KEY(id_provincia) REFERENCES provincia(id_provincia)
);

--
-- Creamos la estructura de la tabla empleado
--

CREATE TABLE empleado (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255) DEFAULT NULL,
  apellidos VARCHAR(255) DEFAULT NULL,
  id_provincia INT UNSIGNED NOT NULL,
  direccion VARCHAR(300) DEFAULT NULL,
  estado VARCHAR(1) DEFAULT NULL,
  id_tienda INT UNSIGNED NOT NULL,
  FOREIGN KEY(id_provincia) REFERENCES provincia(id_provincia),
  FOREIGN KEY(id_tienda) REFERENCES tienda(id_tienda)
);

--
-- Creamos la estructura de la tabla usuario
--
CREATE TABLE usuario (
  id_usuario INT(11) PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(60) NOT NULL,
  nombre_usuario VARCHAR(20) NOT NULL UNIQUE,
  password VARCHAR(20) NOT NULL
);

--
-- Creamos la estructura de la tabla inventario
--

CREATE TABLE inventario (
	id_inventario INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre_producto VARCHAR(60) NOT NULL,
    precio DOUBLE NOT NULL,
    cantidad INT NOT NULL DEFAULT 0,
	descripcion VARCHAR(500) NOT NULL,
    id_tienda INT UNSIGNED NOT NULL,
    FOREIGN KEY(id_tienda) REFERENCES tienda(id_tienda)
);

--
-- Introducimos los valores de la tabla usuario
--
INSERT INTO usuario VALUES (1,'Violeta', 'Violeta', '1234');
INSERT INTO usuario VALUES (2,'admin', 'admin', 'admin');


--
-- Introducimos valores a la tabla provincia
--
INSERT INTO provincia VALUES (1,'Almería'), (2,'Granada'), (3, 'Málaga'),
							 (4, 'Jaen'),  (5, 'Sevilla'), (6, 'Córdoba'),
							 (7, 'Huelva'), (8, 'Cádiz');
                      
--
-- Introducimos valores a la tabla tienda
--                          

INSERT INTO tienda VALUES (1,'Tienda Informática','Av.Mediterraneo 23','04008','950163726','1'),
						  (2,'Tienda Electrodomésticos','Calle García Lorca 8','04567','6345678','5');

--
-- Introducimos valores a la tabla inventario
--    

INSERT INTO inventario VALUES (1,'Procesador AMD Ryzen 5 2600 34 Ghz','164',10,'Procesador AMD','1'),
							  (2,'TV LED 55" - Samsung UE55AU7175UXXC','539',15,'Verás los contenidos 
                               de la forma más nítida, realista y natural posible gracias a su tecnología 
                               Contrast Enhancer y a sus más de mil millones de colores formados por 
                               nanopartículas inorgánicas cristalinas que ofrece el Procesador Crystal UHD.','2');

--
-- Introducimos valores a la tabla empleado
--

INSERT INTO empleado VALUES (1,'Juan','Hernandez','1','Calle García Lorca 29',1,'1'),
							(2,'Antonio','Fernandez','3','Avenida Garcilaso de la Vega 56',0,'1'),
                            (3,'Álvaro','Martínez Fernández','4','Calle Pinto 26',0,'1'),
                            (4,'Irene','Molina','2','Av.Santa Isabel 96',1,'1'),
                            (5,'Manolo','González Díaz','8','Av.Mediterraneo 103',1,'1'),
                            (6,'Eva','Gómez','5','Calle María Callas 5',0,'1'),
                            (7,'Francisco','Rojas','6','Calle el Prado 56',1,'1'),
                            (8,'Luis','Rojas','1','Calle Medinas 3',1,'1'),
                            (9,'María','Contreras Silva','7','Calle Dátil 34',0,'1'),
                            (10,'Violeta','Sáez','1','Calle Almería 1',1,'1');
                          