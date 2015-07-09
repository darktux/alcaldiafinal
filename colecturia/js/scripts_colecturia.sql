

;Facturas

INSERT INTO co_factura VALUES (1, '2015-06-04 10:38:19', 'Santos Hernández Goméz', 16, 2.1000000000000001, false, 'extension de partida de nacimiento');
INSERT INTO co_factura VALUES (2, '2015-06-04 10:38:27', 'Santos Hernández Goméz', 16, 2.1000000000000001, false, 'extension de partida de nacimiento');
INSERT INTO co_factura VALUES (7, '2015-06-07 16:09:02', 'Sandra Carcamo', NULL, 3.1499999999999999, true, 'Por cotejo de fierros');
INSERT INTO co_factura VALUES (4, '2015-06-07 00:57:42', 'Franklin Ramos', NULL, 2.1000000000000001, true, 'por certificacion de partida');
INSERT INTO co_factura VALUES (3, '2015-06-04 10:40:09', 'Santos Hernández Goméz', 16, 3.1499999999999999, true, 'Por certificación de partida de nacimiento');
INSERT INTO co_factura VALUES (9, '2015-06-07 16:14:00', 'Helen Alicia', NULL, 2.1000000000000001, true, 'Por partidas de nacimiento');
INSERT INTO co_factura VALUES (8, '2015-06-07 16:11:32', 'Marlene Gavidia', NULL, 6.2999999999999998, true, 'Por Certificaciones');
INSERT INTO co_factura VALUES (6, '2015-06-07 15:58:12', 'Erlinda Rodríguez', NULL, 2.1000000000000001, true, 'Por compra venta de Ganado Vacuno');
INSERT INTO co_factura VALUES (5, '2015-06-07 15:54:21', 'Milagro Constanza', NULL, 5.25, true, 'Revisión del fierros');

INSERT INTO co_factura_detalle VALUES (1, 'POR SERVICIO DE CERTIFICACIÓN', 2, NULL, 1, '12105');
INSERT INTO co_factura_detalle VALUES (2, '5% FIESTAS PATRONALES', 0.10000000000000001, NULL, 1, '12114');
INSERT INTO co_factura_detalle VALUES (3, 'POR SERVICIO DE CERTIFICACIÓN', 2, NULL, 2, '12105');
INSERT INTO co_factura_detalle VALUES (4, '5% FIESTAS PATRONALES', 0.10000000000000001, NULL, 2, '12114');
INSERT INTO co_factura_detalle VALUES (5, 'POR SERVICIO DE CERTIFICACIÓN', 3, NULL, 3, '12105');
INSERT INTO co_factura_detalle VALUES (6, '5% FIESTAS PATRONALES', 0.14999999999999999, NULL, 3, '12114');
INSERT INTO co_factura_detalle VALUES (7, 'POR SERVICIO DE CERTIFICACIÓN', 2, NULL, 4, '12105');
INSERT INTO co_factura_detalle VALUES (8, '5% FIESTAS PATRONALES', 0.10000000000000001, NULL, 4, '12114');
INSERT INTO co_factura_detalle VALUES (9, 'COTEJO DE FIERROS', 5, NULL, 5, '12211');
INSERT INTO co_factura_detalle VALUES (10, '5% FIESTAS PATRONALES', 0.25, NULL, 5, '12114');
INSERT INTO co_factura_detalle VALUES (11, 'RASTRO, TIANGUE Y FIERROS', 2, NULL, 6, '12119');
INSERT INTO co_factura_detalle VALUES (12, '5% FIESTAS PATRONALES', 0.10000000000000001, NULL, 6, '12114');
INSERT INTO co_factura_detalle VALUES (13, 'COTEJO DE FIERROS', 3, NULL, 7, '12211');
INSERT INTO co_factura_detalle VALUES (14, '5% FIESTAS PATRONALES', 0.14999999999999999, NULL, 7, '12114');
INSERT INTO co_factura_detalle VALUES (15, 'POR SERVICIO DE CERTIFICACIÓN', 6, NULL, 8, '12105');
INSERT INTO co_factura_detalle VALUES (16, '5% FIESTAS PATRONALES', 0.29999999999999999, NULL, 8, '12114');
INSERT INTO co_factura_detalle VALUES (17, 'POR SERVICIO DE CERTIFICACIÓN', 2, NULL, 9, '12105');
INSERT INTO co_factura_detalle VALUES (18, '5% FIESTAS PATRONALES', 0.10000000000000001, NULL, 9, '12114');