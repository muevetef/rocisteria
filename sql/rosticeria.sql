DROP DATABASE rocisteria;

CREATE DATABASE rocisteria;

USE rocisteria;
-- crear tabla alergenos
CREATE TABLE alergenos (
    `alergeno` varchar(45) NOT NULL,
    PRIMARY KEY (`alergeno`)
);

-- crear tabla categorias
CREATE TABLE categorias (
    `id_categoria` int NOT NULL,
    `categoria` varchar(45) NOT NULL,
    PRIMARY KEY (`id_categoria`)
);

-- crear tabla productos
CREATE TABLE productos (
    `codigo_producto` int NOT NULL,
    `nombre` varchar(45) NOT NULL,
    `unidad` varchar(45) DEFAULT NULL,
    `alerta_stock` float NOT NULL,
    `id_categoria` int DEFAULT NULL,
    PRIMARY KEY (`codigo_producto`),
    FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE SET NULL ON UPDATE CASCADE
);

-- ingredientes
CREATE TABLE `ingredientes` (
    `codigo_producto` int NOT NULL,
    `conservacion` varchar(200) DEFAULT NULL,
    PRIMARY KEY (`codigo_producto`),
    FOREIGN KEY (`codigo_producto`) REFERENCES `productos` (`codigo_producto`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- elaborados
CREATE TABLE `elaborados` (
    `codigo_producto` int NOT NULL,
    FOREIGN KEY (`codigo_producto`) REFERENCES `productos` (`codigo_producto`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `tipos_plato` (
    `id_tipo` int NOT NULL,
    `tipos_de_plato` varchar(45) DEFAULT NULL,
    PRIMARY KEY (`id_tipo`)
);
-- DROP TABLE platos;
CREATE TABLE `platos` (
    `codigo_plato` int NOT NULL,
    `nombre` varchar(45) NOT NULL,
    `id_tipo` int DEFAULT NULL,
    `elaboracion` mediumtext,
    `pvp` float NOT NULL,
    `iva` int DEFAULT NULL,
    `en_menu` boolean,
    PRIMARY KEY (`codigo_plato`),
    FOREIGN KEY (`id_tipo`) REFERENCES `tipos_plato` (`id_tipo`) ON DELETE SET NULL ON UPDATE CASCADE
);

CREATE TABLE `ingredientes_plato` (
    `codigo_plato` int NOT NULL,
    `codigo_producto` int NOT NULL,
    `cant_bruta` float NOT NULL,
    `cant_neta` float NOT NULL,
    `unidad` enum(
        'kilogramos',
        'litros',
        'unidades'
    ) DEFAULT NULL,
    PRIMARY KEY (
        `codigo_plato`,
        `codigo_producto`
    ),
    FOREIGN KEY (`codigo_plato`) REFERENCES `platos` (`codigo_plato`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`codigo_producto`) REFERENCES `ingredientes` (`codigo_producto`) ON DELETE RESTRICT ON UPDATE RESTRICT
);

CREATE TABLE `comandas` (
    `id_comanda` int NOT NULL,
    `fecha` date NOT NULL,
    `mesa` int NOT NULL,
    `comensales` int DEFAULT NULL,
    `hora` time NOT NULL,
    `ticket` int DEFAULT NULL,
    PRIMARY KEY (`id_comanda`)
);

CREATE TABLE `comanda_elaborados` (
    `id_comanda` int NOT NULL,
    `codigo_producto` int NOT NULL,
    `cantidad` float NOT NULL,
    `pvp` float NOT NULL,
    `iva` int DEFAULT NULL,
    PRIMARY KEY (
        `id_comanda`,
        `codigo_producto`
    ),
    FOREIGN KEY (`id_comanda`) REFERENCES `comandas` (`id_comanda`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`codigo_producto`) REFERENCES `elaborados` (`codigo_producto`) ON DELETE RESTRICT ON UPDATE RESTRICT
);

CREATE TABLE `comanda_platos` (
    `id_comanda` int NOT NULL,
    `codigo_plato` int NOT NULL,
    `cantidad` float NOT NULL,
    `pvp` float NOT NULL,
    `iva` int DEFAULT NULL,
    PRIMARY KEY (`id_comanda`, `codigo_plato`),
    FOREIGN KEY (`id_comanda`) REFERENCES `comandas` (`id_comanda`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`codigo_plato`) REFERENCES `platos` (`codigo_plato`) ON DELETE RESTRICT ON UPDATE RESTRICT
);

CREATE TABLE `proveedores` (
    `nif` varchar(9) NOT NULL,
    `empresa` varchar(45) DEFAULT NULL,
    `contacto` varchar(45) DEFAULT NULL,
    `email` varchar(45) NOT NULL,
    `web` varchar(45) DEFAULT NULL,
    `registro` int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`nif`),
    UNIQUE KEY (`registro`)
);

CREATE TABLE `proveedor_categoria` (
    `nif` varchar(9) NOT NULL,
    `id_categoria` int NOT NULL,
    PRIMARY KEY (`nif`, `id_categoria`),
    FOREIGN KEY (`nif`) REFERENCES `proveedores` (`nif`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE `alergenos_producto` (
    `codigo_producto` int NOT NULL,
    `alergeno` varchar(45) NOT NULL,
    PRIMARY KEY (`codigo_producto`, `alergeno`),
    FOREIGN KEY (`codigo_producto`) REFERENCES `productos` (`codigo_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`alergeno`) REFERENCES `alergenos` (`alergeno`) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE `compras_producto` (
    `codigo_producto` int NOT NULL,
    `nif` varchar(9) NOT NULL,
    `fecha` datetime NOT NULL,
    `cantidad` float NOT NULL,
    `precio` float NOT NULL,
    `iva` int DEFAULT NULL,
    `caducidad` date DEFAULT NULL,
    PRIMARY KEY (
        `codigo_producto`,
        `nif`,
        `fecha`
    ),
    FOREIGN KEY (`codigo_producto`) REFERENCES `productos` (`codigo_producto`) ON DELETE RESTRICT ON UPDATE RESTRICT,
    FOREIGN KEY (`nif`) REFERENCES `proveedores` (`nif`) ON DELETE RESTRICT ON UPDATE RESTRICT
);

CREATE TABLE `direcciones` (
    `id_direccion` int unsigned NOT NULL AUTO_INCREMENT,
    `nif` varchar(9) NOT NULL,
    `calle` varchar(45) DEFAULT NULL,
    `numero` varchar(40) DEFAULT NULL,
    `poblacion` varchar(45) DEFAULT NULL,
    `cp` int DEFAULT NULL,
    PRIMARY KEY (`id_direccion`),
    FOREIGN KEY (`nif`) REFERENCES `proveedores` (`nif`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `telefonos` (
    `nif` varchar(9) NOT NULL,
    `telefono` varchar(45) NOT NULL,
    PRIMARY KEY (`telefono`, `nif`),
    FOREIGN KEY (`nif`) REFERENCES `proveedores` (`nif`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `donaciones` (
    `fecha` date NOT NULL,
    PRIMARY KEY (`fecha`)
);

CREATE TABLE `detalles_donacion` (
    `fecha` date NOT NULL,
    `linea` int unsigned NOT NULL,
    `codigo_producto` int NOT NULL,
    `cantidad` float DEFAULT NULL,
    `observaciones` varchar(200) DEFAULT NULL,
    PRIMARY KEY (
        `fecha`,
        `linea`,
        `codigo_producto`
    ),
    FOREIGN KEY (`codigo_producto`) REFERENCES `productos` (`codigo_producto`) ON DELETE RESTRICT ON UPDATE RESTRICT,
    FOREIGN KEY (`fecha`) REFERENCES `donaciones` (`fecha`) ON DELETE CASCADE ON UPDATE CASCADE
);

USE rosticeria;

ALTER TABLE productos
MODIFY unidad enum(
    'kilogramos',
    'litros',
    'unidades'
);

USE rosticeria;

ALTER TABLE productos
ADD COLUMN stock FLOAT(2) null,
ADD COLUMN precio_compra float(2) not null;

ALTER TABLE elaborados
ADD COLUMN pvp FLOAT(2) not null,
ADD COLUMN iva int null;

ALTER TABLE comandas ADD UNIQUE (fecha, mesa, hora);

ALTER TABLE platos MODIFY en_menu enum('x', ' ');

ALTER TABLE INGREDIENTES_PLATO
ADD COLUMN porcentaje_merma FLOAT(2) null;