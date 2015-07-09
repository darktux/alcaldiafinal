-- co_factura

INSERT INTO co_factura VALUES (1, '2015-06-01 10:38:19', 'José Simeon Cañas', NULL, 2.1, true, 'Por Certificación de Partida de Nacimiento');
INSERT INTO co_factura VALUES (2, '2015-06-02 10:38:27', 'Maria Isabel Rodríguez', NULL, 2.1, true, 'Por Certificación de Partida de Matrimonio');
INSERT INTO co_factura VALUES (3, '2015-06-03 10:40:09', 'Santos Hernández Goméz', NULL, 2.1, true, 'Por certificación de Partida de Divorcio');
INSERT INTO co_factura VALUES (4, '2015-06-04 00:57:42', 'Franklin Ramos', NULL, 2.1, true, 'Por Certificación de Partida Defunción');
INSERT INTO co_factura VALUES (5, '2015-06-05 15:54:21', 'Milagro Constanza', NULL, 5.25, true, 'Por Revisión del Fierros');
INSERT INTO co_factura VALUES (6, '2015-06-06 15:58:12', 'Erlinda Rodríguez', NULL, 2.1, true, 'Por compra venta de Ganado');
INSERT INTO co_factura VALUES (7, '2015-06-07 16:09:02', 'Sandra Carcamo', NULL, 3.15, true, 'Por Cotejo de Fierros');
INSERT INTO co_factura VALUES (8, '2015-06-08 16:11:32', 'Marlene Gavidia', NULL, 6.30, true, 'Por Certificacionen de tres Partidas de Nacimiento');
INSERT INTO co_factura VALUES (9, '2015-06-09 16:14:00', 'Helen Alicia', NULL, 2.1, true, 'Por Certificación de Partida de Nacimiento');
INSERT INTO co_factura VALUES (10, '2015-06-10 16:14:00', 'Marina Elizabeth', NULL, 2.1, true, 'Por Certificación de Partida de Matrimonio');
INSERT INTO co_factura VALUES (11, '2015-06-11 16:14:00', 'José Lardé y Larin', NULL, 2.1, true, 'Por Certificación de Partida de Defunción');


-- co_factura_detalle

INSERT INTO co_factura_detalle VALUES (1, 'POR SERVICIO DE CERTIFICACIÓN', 2, NULL, 1, '12105');
INSERT INTO co_factura_detalle VALUES (2, '5% FIESTAS PATRONALES', 0.1, NULL, 1, '12114');
INSERT INTO co_factura_detalle VALUES (3, 'POR SERVICIO DE CERTIFICACIÓN', 2, NULL, 2, '12105');
INSERT INTO co_factura_detalle VALUES (4, '5% FIESTAS PATRONALES', 0.1, NULL, 2, '12114');
INSERT INTO co_factura_detalle VALUES (5, 'POR SERVICIO DE CERTIFICACIÓN', 2, NULL, 3, '12105');
INSERT INTO co_factura_detalle VALUES (6, '5% FIESTAS PATRONALES', 0.1, NULL, 3, '12114');
INSERT INTO co_factura_detalle VALUES (7, 'POR SERVICIO DE CERTIFICACIÓN', 2, NULL, 4, '12105');
INSERT INTO co_factura_detalle VALUES (8, '5% FIESTAS PATRONALES', 0.1, NULL, 4, '12114');
INSERT INTO co_factura_detalle VALUES (9, 'COTEJO DE FIERROS', 5, NULL, 5, '12211');
INSERT INTO co_factura_detalle VALUES (10, '5% FIESTAS PATRONALES', 0.25, NULL, 5, '12114');
INSERT INTO co_factura_detalle VALUES (11, 'RASTRO, TIANGUE Y FIERROS', 2, NULL, 6, '12119');
INSERT INTO co_factura_detalle VALUES (12, '5% FIESTAS PATRONALES', 0.1, NULL, 6, '12114');
INSERT INTO co_factura_detalle VALUES (13, 'COTEJO DE FIERROS', 3, NULL, 7, '12211');
INSERT INTO co_factura_detalle VALUES (14, '5% FIESTAS PATRONALES', 0.15, NULL, 7, '12114');
INSERT INTO co_factura_detalle VALUES (15, 'POR SERVICIO DE CERTIFICACIÓN', 6, NULL, 8, '12105');
INSERT INTO co_factura_detalle VALUES (16, '5% FIESTAS PATRONALES', 0.3, NULL, 8, '12114');
INSERT INTO co_factura_detalle VALUES (17, 'POR SERVICIO DE CERTIFICACIÓN', 2, NULL, 9, '12105');
INSERT INTO co_factura_detalle VALUES (18, '5% FIESTAS PATRONALES', 0.1, NULL, 9, '12114');
INSERT INTO co_factura_detalle VALUES (19, 'POR SERVICIO DE CERTIFICACIÓN', 2, NULL, 10, '12105');
INSERT INTO co_factura_detalle VALUES (20, '5% FIESTAS PATRONALES', 0.1, NULL, 10, '12114');
INSERT INTO co_factura_detalle VALUES (21, 'POR SERVICIO DE CERTIFICACIÓN', 2, NULL, 11, '12105');
INSERT INTO co_factura_detalle VALUES (22, '5% FIESTAS PATRONALES', 0.1, NULL, 11, '12114');