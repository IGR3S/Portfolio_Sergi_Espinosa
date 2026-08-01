-- Si existiera, borramos tanto la base de datos, como el usuario
DROP DATABASE IF EXISTS `portfolio_sergi`;
DROP USER IF EXISTS `sergi`;
  
-- Creamos la base de datos
CREATE DATABASE `portfolio_sergi` DEFAULT CHARACTER SET UTF8MB4 COLLATE utf8mb4_unicode_ci;

-- Establecemos la base de datos creada como la base de datos activa  
USE `portfolio_sergi`;

-- Creamos las tablas en la base de datos creada 
CREATE TABLE proyectos (
  id_proyecto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre_proyecto VARCHAR(100) NOT NULL,
  telefono_usuario VARCHAR(13) NOT NULL,
  administrador BOOLEAN NOT NULL DEFAULT FALSE,
  activo BOOLEAN NOT NULL DEFAULT TRUE
) ENGINE=InnoDB;

CREATE TABLE tecnologias (
  id_tecnologia INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL UNIQUE
) ENGINE=InnoDB;

INSERT INTO tecnologias (nombre) VALUES
('wordpress_elementor'),
('html_css'),
('js');

CREATE TABLE proyecto_tecnologia (
  id_proyecto INT NOT NULL,
  id_tecnologia INT NOT NULL,
  valor BOOLEAN NOT NULL DEFAULT FALSE,
  PRIMARY KEY (id_proyecto, id_tecnologia),
  FOREIGN KEY (id_proyecto) REFERENCES proyectos(id_proyecto),
  FOREIGN KEY (id_tecnologia) REFERENCES tecnologias(id_tecnologia)
) ENGINE=InnoDB;

INSERT INTO proyecto_tecnologia (id_proyecto, id_tecnologia, valor)
VALUES
(1, 1, TRUE),
(1, 2, TRUE),
(1, 3, FALSE);
 
-- Creamos un usuario para nuestras prácticas.
CREATE USER `admin` IDENTIFIED BY 'seb241003';
 
-- Otorgamos al usuario permisos de conexión
GRANT ALL PRIVILEGES ON `portfolio_sergi`.* TO `admin`@'%';