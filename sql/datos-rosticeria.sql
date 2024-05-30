USE rocisteria;
INSERT INTO
    `alergenos`
VALUES ('Altramuces'),
    ('Apio'),
    ('Cacahuetes'),
    ('Crustáceos'),
    ('Frutos secos'),
    ('Gluten'),
    ('Huevo'),
    ('Lactosa'),
    ('Moluscos'),
    ('Mostaza'),
    ('Pescado'),
    ('Sésamo'),
    ('Soja'),
    ('Sulfitos');

INSERT INTO
    `tipos_plato` (id_tipo, tipos_de_plato)
VALUES (1, 'ROSTIZADOS'),
    (2, 'SALSAS'),
    (3, 'ENSALADAS'),
    (4, 'ACOMPAÑAMIENTOS'),
    (5, 'POSTRES/CAFÉ'),
    (6, 'BEBIDAS'),
    (7, 'COMBINADOS'),
    (8, 'PASTAS');

INSERT INTO
    `categorias`
VALUES (1, 'Aceites y vinagres'),
    (2, 'Carnes y Aves'),
    (3, 'Bebidas'),
    (4, 'Cafés'),
    (5, 'Elaborados'),
    (6, 'Fruta y Verdura'),
    (10, 'Especies'),
    (11, 'Productos Lácteos'),
    (12, 'Ovoproductos'),
    (13, 'Pan y Bollería'),
    (15, 'Harinas'),
    (16, 'Salsas'),
    (17, 'Semielaborados');

INSERT INTO
    `productos`
VALUES (
        1,
        'Pollo entero',
        'unidades',
        10,
        2,
        50,
        6
    ),
    (
        2,
        'Alitas de pollo',
        'unidades',
        50,
        2,
        150,
        1.25
    ),
    (
        3,
        'Harina',
        'Kilogramos',
        2,
        16,
        5,
        0.25
    ),
    (
        4,
        'Aceite de oliva',
        'litros',
        8,
        1,
        10,
        1.35
    ),
    (
        5,
        'Especias picantes',
        'Kilogramos',
        0.5,
        10,
        1,
        0.05
    ),
    (
        6,
        'Huevos',
        'unidades',
        40,
        12,
        50,
        0.25
    ),
    (
        7,
        'Pan rallado',
        'Kilogramos',
        2,
        13,
        3,
        0.45
    ),
    (
        8,
        'Champiñones',
        'Kilogramos',
        1,
        5,
        4,
        1.25
    ),
    (
        9,
        'Ajo',
        'Kilogramos',
        3,
        6,
        3,
        0.25
    ),
    (
        10,
        'Patatas',
        'Kilogramos',
        10,
        6,
        25,
        0.55
    ),
    (
        11,
        'Láminas pasta',
        'unidades',
        50,
        15,
        100,
        0.1
    ),
    (
        12,
        'Carne de cerdo',
        'Kilogramos',
        6,
        2,
        12,
        2.55
    ),
    (
        13,
        'Alcachofas',
        'unidades',
        20,
        6,
        35,
        1
    ),
    (
        14,
        'Refresco de cola (lata)',
        'unidades',
        45,
        3,
        50,
        0.85
    ),
    (
        15,
        'Agua con gas (botella)',
        'unidades',
        25,
        3,
        40,
        1.15
    ),
    (
        1002,
        'Aceite de maíz',
        'litros',
        20,
        1,
        0,
        0
    ),
    (
        1101,
        'Sal de Himalaya',
        'Kilogramos',
        2,
        11,
        10,
        2.21
    ),
    (
        1102,
        'Pimienta dulce',
        'Kilogramos',
        5,
        11,
        0,
        0
    ),
    (
        1103,
        'Hierbas provenzales',
        'Kilogramos',
        5,
        11,
        0,
        0
    ),
    (
        1104,
        'Orégano',
        'Kilogramos',
        5,
        11,
        0,
        0
    ),
    (
        1105,
        'Romero',
        'Kilogramos',
        2,
        11,
        2,
        10.91
    ),
    (
        1106,
        'Laurel en hojas',
        'Kilogramos',
        5,
        11,
        5,
        8.75
    ),
    (
        1107,
        'Ajo',
        'Kilogramos',
        10,
        11,
        5,
        6.5
    ),
    (
        1501,
        'Copa de nata con café',
        'unidades',
        70,
        15,
        100,
        0.32
    ),
    (
        1502,
        'Flan de huevo (100g)',
        'unidades',
        70,
        15,
        100,
        1.6
    ),
    (
        1607,
        'Harina de trigo (1 kg)',
        'unidades',
        240,
        16,
        700,
        0.52
    ),
    (
        1701,
        'Salsa Worcester',
        'unidades',
        360,
        17,
        0,
        0
    ),
    (
        2001,
        'Pechuga marinada',
        'Kilogramos',
        30,
        2,
        85,
        3.24
    ),
    (
        4001,
        'Cápsulas de cafè cappuccino (16 cápsulas)',
        'unidades',
        20,
        4,
        480,
        4.25
    ),
    (
        6005,
        'Malla de Limón (500gr)',
        'unidades',
        36,
        6,
        0,
        0
    );

INSERT INTO
    `alergenos_producto`
VALUES (5, 'Cacahuetes'),
    (5, 'Frutos secos'),
    (3, 'Gluten'),
    (7, 'Gluten'),
    (11, 'Gluten'),
    (6, 'Huevo'),
    (5, 'Mostaza'),
    (5, 'Sésamo'),
    (5, 'Soja');

INSERT INTO
    `proveedores`
VALUES (
        'A01189364',
        'ALAVESA DE PATATAS',
        'J. Suárez Tascón',
        'alavesadepatatas@alavesadepatatas.com',
        'http://alavesadepatatas.com/',
        40
    ),
    (
        'A28647451',
        'MAKRO',
        'L. Piquer',
        'atencionclientes.02@makro.es',
        'https://www.makro.es/',
        34
    ),
    (
        'A50090349',
        'ALBERTO POLO DISTRIBUCIONES',
        'A. Polo',
        'info@albertopolo.com',
        'https://albertopolo.com/',
        30
    ),
    (
        'A58058868',
        'HUEVERIAS BONET S.A.',
        'A. Bonet Pedret',
        'dbonet@dbonet.es',
        'http://dbonet.es/',
        38
    ),
    (
        'A58241084',
        'MONTSEC',
        'J. del Castillo',
        'info@comercialmontsec.com',
        'http://www.comercialmontsec.com',
        39
    ),
    (
        'B11223344',
        'LA PADUANA',
        'P. Soler',
        'info@lapaduana.com',
        'http://www.lapaduana.com',
        41
    ),
    (
        'B23373624',
        'INDUSTRIA AVICOLA SUREÑA',
        'J.  Molina',
        'info@inasur.es',
        'www.inasur.es',
        32
    ),
    (
        'B73148793',
        'AGRORIZAO',
        'M. Agrorizao',
        'ventas@agrorizao.com',
        'www.agrorizao.com',
        35
    ),
    (
        'B85227635',
        'RUBIATO PAREDES SL',
        'J. Pedros Riasol',
        'rubiatoparedes@rubiatoparedes.com',
        'https://www.rubiatoparedes.com/',
        33
    ),
    (
        'B87867834',
        'CHEF FRUIT',
        'J. Domingo',
        'pedidos@chef-fruit.com',
        'https://www.chef-fruit.com/',
        36
    ),
    (
        'B90307034',
        'FRUTAS CUEVAS',
        'J. Cuevas',
        'info@frutascuevas.es',
        'https://www.frutascuevas.es/',
        37
    );

INSERT INTO
    `direcciones`
VALUES (
        3,
        'A50090349',
        'Río Ara',
        '8',
        'Zaragoza',
        50014
    ),
    (
        5,
        'B23373624',
        'Toledo 149 E Pa',
        NULL,
        '(Madrid) - Madrid',
        28005
    ),
    (
        6,
        'B85227635',
        'Calle de los Cerrajeros',
        ' 6 y 8',
        'Alcorcón - Madrid',
        28923
    ),
    (
        7,
        'A28647451',
        'Carrer A',
        '1 Sector C',
        'Polígono Industrial Zona Franca, Barcelona',
        8040
    ),
    (
        8,
        'B73148793',
        'Carretera Nacional 340',
        ' KM 614',
        'Totana, Murcia',
        30850
    ),
    (
        9,
        'B87867834',
        'Centro de Transportes de Madrid (ctm)',
        'CL EJE 6 2',
        'Madrid',
        28053
    ),
    (
        10,
        'B90307034',
        'Polígono Pagusa Calle Labrador',
        '47',
        'Sevilla',
        41007
    ),
    (
        11,
        'A58058868',
        'Transversal 8',
        '48',
        NULL,
        NULL
    ),
    (
        12,
        'A58241084',
        'Severo Ochoa',
        '36 - Pol. Ind. Font del Radium',
        'Granollers. Barcelona',
        8403
    ),
    (
        13,
        'A01189364',
        'Polígono industrial Lurgorri',
        's/n Alegría-Dulantzi',
        'Álava',
        1240
    );

INSERT INTO
    `telefonos`
VALUES ('A01189364', '691423566'),
    ('A01189364', '945400429'),
    ('A28647451', '933363111'),
    ('A50090349', '976574909'),
    ('A58058868', '933357212'),
    ('A58241084', '938498799'),
    ('B23373624', '902101566'),
    ('B23373624', '915076224'),
    ('B23373624', '915077600'),
    ('B73148793', '868457203'),
    ('B73148793', '968420381'),
    ('B73148793', '968425470'),
    ('B85227635', '607387265'),
    ('B85227635', '916415512'),
    ('B87867834', '910578136'),
    ('B90307034', '615187204'),
    ('B90307034', '954417158');

INSERT INTO `elaborados` VALUES (14, 0.85, 21), (15, 1.15, 21);

INSERT INTO
    `ingredientes`
VALUES (1, '2-4ºC'),
    (2, '2-4ºC'),
    (3, 'Tª ambiente'),
    (4, 'Tª ambiente'),
    (5, 'Tª ambiente'),
    (6, '2-4ºC'),
    (7, 'Tª ambiente'),
    (8, '2-4ºC'),
    (9, 'Tª ambiente'),
    (10, 'Tª ambiente'),
    (11, 'Tª ambiente'),
    (12, '2-4ºC'),
    (13, 'Tª ambiente'),
    (
        1002,
        'Guardar en un lugar oscuro de la despensa'
    ),
    (
        1101,
        'Guardar en un lugar seco'
    ),
    (
        1102,
        'Guardar en un lugar fresco y seco'
    ),
    (
        1103,
        'Guardar en un lugar fresco y seco'
    ),
    (
        1104,
        'Guardar en un lugar fresco y seco'
    ),
    (
        1105,
        'Guardar en un lugar fresco y seco'
    ),
    (
        1106,
        'Guardar en un lugar fresco y seco'
    ),
    (
        1107,
        'Guardar en lugar fresco, seco y alejado de la luz'
    ),
    (
        1607,
        'Guardar en un lugar fresco y seco'
    ),
    (
        1701,
        'Guardar en un lugar fresco y seco'
    ),
    (
        2001,
        'Guardar limpio en el refrigerador en bolsas de congelación'
    ),
    (
        6005,
        'Guardar en una bolsa sellada en el cajón de frigorífico'
    );

INSERT INTO
    `platos`
VALUES (
        1,
        'Alitas de pollo crujientes',
        1,
        'Mezclamos las alitas de pollo con harina y posteriormente las freímos a fuego lento en la sartén. A continuación, una vez estén hechas, aumentamos la intensidad del fuego para añadirles su especial toque crujiente',
        5.61,
        21,
        'x'
    ),
    (
        2,
        'Croquetas caseras de Pollo al Ast',
        1,
        'Damos forma a la masa de las croquetas. Seguidamente, pasamos la masa por harina, huevo y pan rallado para poder freírlas en abundante aceite',
        5.1,
        21,
        'x'
    ),
    (
        3,
        'Champiñones al ajillo',
        4,
        'Se cortan los champiñones y el ajo en láminas. Lo añadimos a la sartén con unas hojitas de perejil a fuego medio. Una vez cocinados, aumentamos temperatura del fuego durante cinco minutos',
        6.375,
        21,
        'x'
    ),
    (
        4,
        'Patatas Bravas (c/s Alioli)',
        4,
        'Preparamos, pelamos y cortamos las patatas. A continuación, se fríen las patatas a fuego lento hasta que adquieran un color dorado',
        3.57,
        21,
        'x'
    ),
    (
        5,
        'Patatas al Caliu (c/s Alioli)',
        4,
        'Preparamos y lavamos las patatas, sin quitarles la piel. Cocemos las patatas con agua hirviendo y sal durante diez minutos. Una vez hervidas, añadimos una pizca de sal y las horneamos. Mientras se hornean, preparamos el aliño a base de perejil y ajo en láminas y, posteriormente, se macera todo con aceite de oliva',
        3.825,
        21,
        'x'
    ),
    (
        6,
        'Canelones de carne',
        8,
        'Preparamos las láminas de pasta y las cocemos. A continuación, rellenamos las láminas ya cocidas y les damos forma, cerrando cuidadosamente la pasta. Seguidamente, los colocamos en el horno y se echa por encima la salsa bechamel',
        7.395,
        21,
        'x'
    ),
    (
        7,
        'Lasaña casera',
        8,
        'Introducimos en agua hirviendo las láminas de pasta. Una vez preparadas, montamos las láminas y vamos preparando el relleno de carne. Seguidamente, echamos una capa de bechamel por encima y queso rallado para gratinar',
        7.905,
        21,
        'x'
    ),
    (
        8,
        'Alcachofas a la parrilla',
        1,
        'Preparamos las alcachofas quitando las hojas. A continuación, se cuecen las alcachofas durante veinte minutos. Untamos el exterior de la alcachofa con aceite de oliva y, seguidamente, las asamos en la parrilla',
        6.273,
        21,
        'x'
    ),
    (
        9,
        'Escalivada',
        3,
        'Lavamos las verduras y pinchamos las berenjenas. Cuando el horno esté caliente, introducimos las verduras y las horneamos durante cincuenta minutos, asegurándonos de darles la vuelta para una buena cocción',
        5.355,
        21,
        'x'
    ),
    (
        10,
        'Pollo al Ast con patatas',
        1,
        'Limpiamos el pollo por dentro y por fuera y lo salpimentamos. Pelamos y troceamos las patatas y las horneamos. A continuación, echamos un chorro de aceite de oliva al pollo al ast y lo horneamos durante una hora y media',
        10.71,
        21,
        'x'
    ),
    (
        11,
        'Alitas de Pollo con patatas panaderas',
        1,
        'Cortamos las patatas en rodajas y la cebolla en juliana aderezando con sal. Condimentamos el pollo con sal y pimienta. Seguidamente, horneamos las alitas de pollo y las patatas a 250ºC',
        11.22,
        21,
        'x'
    ),
    (
        12,
        'Brocheta de pollo al Ast',
        1,
        'Practicamos incisiones en el pollo. A continuación, salpimentamos el pollo y lo cocinamos a la plancha. Una vez cocinado, cortamos el pollo en láminas y se coloca en las brochetas y las horneamos',
        9.996,
        21,
        'x'
    ),
    (
        13,
        'Chuletas de cerdo a la parrilla',
        1,
        'Preparamos las chuletas de cerdo y las salpimentamos. Seguidamente, sellamos la carne para añadirle sabor y jugosidad. Cocinamos las chuletas en la parrilla',
        11.526,
        21,
        'x'
    );

INSERT INTO
    `ingredientes_plato`
VALUES (1, 2, 5, 5, 'unidades', 1),
    (
        1,
        3,
        0.1,
        0.1,
        'kilogramos',
        1
    ),
    (
        1,
        4,
        0.2,
        0.15,
        'litros',
        0.75
    ),
    (
        1,
        5,
        0.02,
        0.02,
        'kilogramos',
        1
    ),
    (2, 1, 1, 1, 'unidades', 1),
    (
        2,
        3,
        0.4,
        0.3,
        'kilogramos',
        0.75
    ),
    (2, 6, 2, 2, 'unidades', 1),
    (
        2,
        7,
        0.3,
        0.25,
        'kilogramos',
        0.833333
    ),
    (
        3,
        8,
        0.3,
        0.25,
        'kilogramos',
        0.833333
    ),
    (3, 9, 3, 3, 'unidades', 1),
    (4, 4, 0.2, 0.2, 'litros', 1),
    (
        4,
        10,
        0.5,
        0.45,
        'kilogramos',
        0.9
    ),
    (
        5,
        10,
        0.55,
        0.5,
        'kilogramos',
        0.909091
    ),
    (6, 11, 10, 10, 'unidades', 1),
    (7, 11, 12, 12, 'unidades', 1),
    (8, 13, 1, 1, 'unidades', 1),
    (10, 1, 1, 1, 'unidades', 1),
    (
        10,
        5,
        0.2,
        0.15,
        'kilogramos',
        0.75
    ),
    (11, 2, 5, 5, 'unidades', 1);

INSERT INTO
    `comandas`
VALUES (
        1,
        '2022-03-01',
        1,
        4,
        '13:30:00',
        220009
    ),
    (
        2,
        '2022-03-01',
        2,
        5,
        '14:00:00',
        220010
    ),
    (
        3,
        '2022-03-01',
        0,
        NULL,
        '14:00:00',
        220011
    ),
    (
        4,
        '2022-03-02',
        4,
        8,
        '14:00:00',
        220012
    ),
    (
        5,
        '2022-03-02',
        1,
        2,
        '14:15:00',
        220013
    ),
    (
        6,
        '2022-03-02',
        0,
        NULL,
        '14:18:00',
        220014
    ),
    (
        7,
        '2022-03-02',
        0,
        NULL,
        '14:20:00',
        220015
    ),
    (
        8,
        '2022-03-02',
        1,
        5,
        '21:00:00',
        220016
    ),
    (
        9,
        '2022-03-03',
        0,
        NULL,
        '14:50:00',
        220017
    ),
    (
        10,
        '2022-03-03',
        0,
        NULL,
        '15:25:00',
        220018
    );

INSERT INTO
    `comanda_elaborados`
VALUES (1, 14, 2, 1.7, 21),
    (2, 14, 4, 3.4, 21),
    (3, 15, 2, 2.3, 21),
    (4, 15, 2, 2.3, 21),
    (5, 15, 4, 4.6, 21),
    (6, 14, 2, 1.7, 21),
    (7, 14, 3, 2.55, 21),
    (8, 14, 5, 4.25, 21),
    (9, 14, 4, 3.4, 21),
    (10, 14, 2, 1.7, 21);

INSERT INTO
    `comanda_platos`
VALUES (1, 4, 1, 3.5, 21),
    (1, 10, 1, 10.5, 21),
    (2, 10, 1, 10.5, 21),
    (3, 6, 2, 14.5, 21),
    (4, 8, 3, 18.45, 21),
    (4, 10, 1, 10.5, 21),
    (5, 10, 1, 10.5, 21),
    (6, 9, 2, 10.5, 21),
    (7, 7, 1, 7.75, 21),
    (8, 4, 2, 7, 21),
    (9, 11, 2, 22, 21),
    (10, 1, 2, 11, 21);

INSERT INTO
    `compras_producto`
VALUES (
        1,
        'B23373624',
        '2022-01-23 12:45:56',
        50,
        300,
        21,
        '2022-04-30'
    ),
    (
        2,
        'B23373624',
        '2022-01-23 12:45:56',
        100,
        125,
        21,
        '2022-04-30'
    ),
    (
        3,
        'A58241084',
        '2022-01-24 08:32:00',
        10,
        2.5,
        21,
        NULL
    ),
    (
        4,
        'B73148793',
        '2022-01-25 11:25:51',
        30,
        37.5,
        21,
        NULL
    ),
    (
        5,
        'B85227635',
        '2022-01-29 21:45:12',
        2,
        2,
        21,
        NULL
    ),
    (
        6,
        'A58058868',
        '2022-02-03 13:32:15',
        200,
        90,
        21,
        '2022-03-07'
    ),
    (
        7,
        'A28647451',
        '2022-02-05 12:28:30',
        25,
        11.25,
        21,
        NULL
    ),
    (
        8,
        'A28647451',
        '2022-02-05 12:28:30',
        10,
        12.5,
        21,
        '2022-02-22'
    ),
    (
        9,
        'B90307034',
        '2022-02-08 14:02:15',
        5,
        1.25,
        21,
        NULL
    ),
    (
        10,
        'A01189364',
        '2022-02-13 17:00:42',
        50,
        27.5,
        21,
        '2022-03-20'
    ),
    (
        15,
        'B11223344',
        '2022-04-04 15:50:00',
        20,
        1,
        10,
        '2030-01-23'
    ),
    (
        1101,
        'A28647451',
        '2021-09-07 00:00:00',
        10,
        2.21,
        10,
        NULL
    ),
    (
        1105,
        'B90307034',
        '2021-09-17 00:00:00',
        2,
        10.91,
        10,
        '2020-04-21'
    ),
    (
        1106,
        'A28647451',
        '2021-09-02 00:00:00',
        5,
        8.75,
        10,
        '2023-09-09'
    ),
    (
        1107,
        'B87867834',
        '2021-09-18 00:00:00',
        5,
        6.5,
        0,
        '2019-11-06'
    ),
    (
        1501,
        'A28647451',
        '2021-09-07 00:00:00',
        100,
        0.32,
        10,
        NULL
    ),
    (
        1502,
        'A58058868',
        '2021-09-05 00:00:00',
        100,
        1.6,
        10,
        NULL
    ),
    (
        1607,
        'A28647451',
        '2021-09-07 00:00:00',
        700,
        0.52,
        10,
        NULL
    ),
    (
        2001,
        'A50090349',
        '2021-08-10 00:00:00',
        25,
        2.99,
        10,
        '2021-08-27'
    ),
    (
        2001,
        'B23373624',
        '2021-08-01 00:00:00',
        60,
        3.24,
        10,
        '2021-08-23'
    ),
    (
        4001,
        'A28647451',
        '2021-09-07 00:00:00',
        480,
        4.25,
        10,
        NULL
    );

INSERT INTO
    `donaciones`
VALUES ('2022-03-01'),
    ('2022-03-02'),
    ('2022-03-03'),
    ('2022-03-04'),
    ('2022-03-05'),
    ('2022-03-06'),
    ('2022-03-07'),
    ('2022-03-08'),
    ('2022-03-09'),
    ('2022-03-10');

INSERT INTO
    `detalles_donacion`
VALUES (
        '2022-03-01',
        1,
        1,
        3,
        'En buen estado.'
    ),
    (
        '2022-03-01',
        2,
        6,
        12,
        'En buen estado.'
    ),
    (
        '2022-03-02',
        1,
        2,
        3,
        'En buen estado.'
    ),
    (
        '2022-03-02',
        2,
        8,
        1,
        'En buen estado.'
    ),
    (
        '2022-03-02',
        3,
        12,
        2,
        'En buen estado.'
    ),
    (
        '2022-03-03',
        1,
        1,
        5,
        'En buen estado.'
    ),
    (
        '2022-03-03',
        2,
        10,
        2,
        'En buen estado.'
    ),
    (
        '2022-03-03',
        3,
        13,
        9,
        'En buen estado.'
    ),
    (
        '2022-03-04',
        1,
        1,
        5,
        'En buen estado.'
    ),
    (
        '2022-03-04',
        2,
        2,
        2,
        'En buen estado.'
    );

INSERT INTO
    proveedor_categoria (nif, id_categoria)
VALUES ('B23373624', 2),
    ('B23373624', 12),
    ('A58241084', 16),
    ('B73148793', 1),
    ('B85227635', 10),
    ('A58058868', 12),
    ('A28647451', 13),
    ('A28647451', 5),
    ('B90307034', 6),
    ('A01189364', 6),
    ('B11223344', '3');