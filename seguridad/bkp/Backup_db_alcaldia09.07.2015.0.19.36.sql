--
-- PostgreSQL database dump
--
SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--
CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--
COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
SET search_path = public, pg_catalog;
SET default_tablespace = '';
SET default_with_oids = false;

--
-- Estrutura de tabla 'af_activo'
--
DROP TABLE IF EXISTS af_activo CASCADE;
CREATE TABLE af_activo (
	cod_act character varying(25) NOT NULL,
	nom character varying(50),
	mar character varying(50),
	mod character varying(50),
	ser character varying(50),
	cos_adq double precision,
	fec_adq date,
	act boolean,
	cod_tfondo integer,
	ori character varying(10),
	fec_gar date,
	don character varying(25),
	tact integer
);

--
-- Creando datos de 'af_activo'
--
--
-- Creando indices PrimaryKey de 'af_activo'
--
ALTER TABLE ONLY  af_activo  ADD CONSTRAINT  af_activo_pkey  PRIMARY KEY  (cod_act);
--

-- Creando indices Unique de 'af_activo'
--



--
-- Estrutura de secuencia af_depto_cod_seq para la tabla 'af_depto'
--
DROP SEQUENCE IF EXISTS af_depto_cod_seq CASCADE;
CREATE SEQUENCE af_depto_cod_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'af_depto'
--
DROP TABLE IF EXISTS af_depto CASCADE;
CREATE TABLE af_depto (
	cod integer NOT NULL DEFAULT nextval('af_depto_cod_seq'::regclass),
	nom character varying(50)
);

ALTER SEQUENCE af_depto_cod_seq OWNED BY af_depto.cod;

--
-- Creando datos de 'af_depto'
--
--
-- Creando indices PrimaryKey de 'af_depto'
--
ALTER TABLE ONLY  af_depto  ADD CONSTRAINT  af_depto_pkey  PRIMARY KEY  (cod);
--

-- Creando indices Unique de 'af_depto'
--



--
-- Estrutura de secuencia af_descargo_cod_des_seq para la tabla 'af_descargo'
--
DROP SEQUENCE IF EXISTS af_descargo_cod_des_seq CASCADE;
CREATE SEQUENCE af_descargo_cod_des_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'af_descargo'
--
DROP TABLE IF EXISTS af_descargo CASCADE;
CREATE TABLE af_descargo (
	cod_des integer NOT NULL DEFAULT nextval('af_descargo_cod_des_seq'::regclass),
	des character varying(150),
	cod_act character varying(25),
	fec date
);

ALTER SEQUENCE af_descargo_cod_des_seq OWNED BY af_descargo.cod_des;

--
-- Creando datos de 'af_descargo'
--
--
-- Creando indices PrimaryKey de 'af_descargo'
--
ALTER TABLE ONLY  af_descargo  ADD CONSTRAINT  af_descargo_pkey  PRIMARY KEY  (cod_des);
--

-- Creando indices Unique de 'af_descargo'
--



--
-- Estrutura de secuencia af_empresa_cod_emp_seq para la tabla 'af_empresa'
--
DROP SEQUENCE IF EXISTS af_empresa_cod_emp_seq CASCADE;
CREATE SEQUENCE af_empresa_cod_emp_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'af_empresa'
--
DROP TABLE IF EXISTS af_empresa CASCADE;
CREATE TABLE af_empresa (
	cod_emp integer NOT NULL DEFAULT nextval('af_empresa_cod_emp_seq'::regclass),
	nom character varying(50),
	dir character varying(150),
	tel character varying(10),
	nit character varying(20)
);

ALTER SEQUENCE af_empresa_cod_emp_seq OWNED BY af_empresa.cod_emp;

--
-- Creando datos de 'af_empresa'
--
--
-- Creando indices PrimaryKey de 'af_empresa'
--
ALTER TABLE ONLY  af_empresa  ADD CONSTRAINT  af_empresa_pkey  PRIMARY KEY  (cod_emp);
--

-- Creando indices Unique de 'af_empresa'
--



--
-- Estrutura de secuencia af_mantenimiento_cod_man_seq para la tabla 'af_mantenimiento'
--
DROP SEQUENCE IF EXISTS af_mantenimiento_cod_man_seq CASCADE;
CREATE SEQUENCE af_mantenimiento_cod_man_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'af_mantenimiento'
--
DROP TABLE IF EXISTS af_mantenimiento CASCADE;
CREATE TABLE af_mantenimiento (
	cod_act character varying(25),
	des character varying(100),
	cos double precision,
	emp integer,
	fec date,
	cod_man integer NOT NULL DEFAULT nextval('af_mantenimiento_cod_man_seq'::regclass)
);

ALTER SEQUENCE af_mantenimiento_cod_man_seq OWNED BY af_mantenimiento.cod_man;

--
-- Creando datos de 'af_mantenimiento'
--
--
-- Creando indices PrimaryKey de 'af_mantenimiento'
--
--

-- Creando indices Unique de 'af_mantenimiento'
--



--
-- Estrutura de secuencia af_tactivo_cod_seq para la tabla 'af_tactivo'
--
DROP SEQUENCE IF EXISTS af_tactivo_cod_seq CASCADE;
CREATE SEQUENCE af_tactivo_cod_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'af_tactivo'
--
DROP TABLE IF EXISTS af_tactivo CASCADE;
CREATE TABLE af_tactivo (
	cod integer NOT NULL DEFAULT nextval('af_tactivo_cod_seq'::regclass),
	nom character varying(25),
	anio integer,
	des character varying(150)
);

ALTER SEQUENCE af_tactivo_cod_seq OWNED BY af_tactivo.cod;

--
-- Creando datos de 'af_tactivo'
--
--
-- Creando indices PrimaryKey de 'af_tactivo'
--
ALTER TABLE ONLY  af_tactivo  ADD CONSTRAINT  af_tactivo_pkey  PRIMARY KEY  (cod);
--

-- Creando indices Unique de 'af_tactivo'
--



--
-- Estrutura de secuencia af_tfondo_cod_tfondo_seq para la tabla 'af_tfondo'
--
DROP SEQUENCE IF EXISTS af_tfondo_cod_tfondo_seq CASCADE;
CREATE SEQUENCE af_tfondo_cod_tfondo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'af_tfondo'
--
DROP TABLE IF EXISTS af_tfondo CASCADE;
CREATE TABLE af_tfondo (
	cod_tfondo integer NOT NULL DEFAULT nextval('af_tfondo_cod_tfondo_seq'::regclass),
	nom character varying(50),
	des text
);

ALTER SEQUENCE af_tfondo_cod_tfondo_seq OWNED BY af_tfondo.cod_tfondo;

--
-- Creando datos de 'af_tfondo'
--
--
-- Creando indices PrimaryKey de 'af_tfondo'
--
ALTER TABLE ONLY  af_tfondo  ADD CONSTRAINT  af_tfondo_pkey  PRIMARY KEY  (cod_tfondo);
--

-- Creando indices Unique de 'af_tfondo'
--



--
-- Estrutura de secuencia af_traslados_cod_tra_seq para la tabla 'af_traslados'
--
DROP SEQUENCE IF EXISTS af_traslados_cod_tra_seq CASCADE;
CREATE SEQUENCE af_traslados_cod_tra_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'af_traslados'
--
DROP TABLE IF EXISTS af_traslados CASCADE;
CREATE TABLE af_traslados (
	cod_tra integer NOT NULL DEFAULT nextval('af_traslados_cod_tra_seq'::regclass),
	cod_act character varying(25),
	fec date,
	des character varying(100),
	new_ubi integer
);

ALTER SEQUENCE af_traslados_cod_tra_seq OWNED BY af_traslados.cod_tra;

--
-- Creando datos de 'af_traslados'
--
--
-- Creando indices PrimaryKey de 'af_traslados'
--
ALTER TABLE ONLY  af_traslados  ADD CONSTRAINT  af_traslados_pkey  PRIMARY KEY  (cod_tra);
--

-- Creando indices Unique de 'af_traslados'
--



--
-- Estrutura de secuencia ca_alumbrado_cod_alumbrado_seq para la tabla 'ca_alumbrado'
--
DROP SEQUENCE IF EXISTS ca_alumbrado_cod_alumbrado_seq CASCADE;
CREATE SEQUENCE ca_alumbrado_cod_alumbrado_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'ca_alumbrado'
--
DROP TABLE IF EXISTS ca_alumbrado CASCADE;
CREATE TABLE ca_alumbrado (
	cod_alumbrado integer NOT NULL DEFAULT nextval('ca_alumbrado_cod_alumbrado_seq'::regclass),
	sit_en text,
	alum_mun character varying(20),
	puntos text
);

ALTER SEQUENCE ca_alumbrado_cod_alumbrado_seq OWNED BY ca_alumbrado.cod_alumbrado;

--
-- Creando datos de 'ca_alumbrado'
--
--
-- Creando indices PrimaryKey de 'ca_alumbrado'
--
ALTER TABLE ONLY  ca_alumbrado  ADD CONSTRAINT  ca_alumbrado_pkey  PRIMARY KEY  (cod_alumbrado);
--

-- Creando indices Unique de 'ca_alumbrado'
--



--
-- Estrutura de secuencia ca_calle_cod_call_seq para la tabla 'ca_calle'
--
DROP SEQUENCE IF EXISTS ca_calle_cod_call_seq CASCADE;
CREATE SEQUENCE ca_calle_cod_call_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'ca_calle'
--
DROP TABLE IF EXISTS ca_calle CASCADE;
CREATE TABLE ca_calle (
	cod_call integer NOT NULL DEFAULT nextval('ca_calle_cod_call_seq'::regclass),
	est_call text,
	tip_call character varying(50),
	concepto text,
	puntos text
);

ALTER SEQUENCE ca_calle_cod_call_seq OWNED BY ca_calle.cod_call;

--
-- Creando datos de 'ca_calle'
--
--
-- Creando indices PrimaryKey de 'ca_calle'
--
--

-- Creando indices Unique de 'ca_calle'
--



--
-- Estrutura de secuencia ca_cementerio_cod_cem_seq para la tabla 'ca_cementerio'
--
DROP SEQUENCE IF EXISTS ca_cementerio_cod_cem_seq CASCADE;
CREATE SEQUENCE ca_cementerio_cod_cem_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'ca_cementerio'
--
DROP TABLE IF EXISTS ca_cementerio CASCADE;
CREATE TABLE ca_cementerio (
	cod_cem integer NOT NULL DEFAULT nextval('ca_cementerio_cod_cem_seq'::regclass),
	nom_cem character varying(50),
	sit_en text,
	zon_cem character varying(6),
	pre_nicpc double precision,
	pre_nic2pc double precision,
	pre_nicce double precision,
	pre_nic2ce double precision,
	pre_nicfc double precision,
	pre_nic2fc double precision
);

ALTER SEQUENCE ca_cementerio_cod_cem_seq OWNED BY ca_cementerio.cod_cem;

--
-- Creando datos de 'ca_cementerio'
--
--
-- Creando indices PrimaryKey de 'ca_cementerio'
--
ALTER TABLE ONLY  ca_cementerio  ADD CONSTRAINT  ca_cementerio_pkey  PRIMARY KEY  (cod_cem);
--

-- Creando indices Unique de 'ca_cementerio'
--



--
-- Estrutura de tabla 'ca_cierre'
--
DROP TABLE IF EXISTS ca_cierre CASCADE;
CREATE TABLE ca_cierre (
	cod_neg integer,
	fec_cie date,
	mot_cie text
);

--
-- Creando datos de 'ca_cierre'
--
--
-- Creando indices PrimaryKey de 'ca_cierre'
--
--

-- Creando indices Unique de 'ca_cierre'
--



--
-- Estrutura de tabla 'ca_enterrado'
--
DROP TABLE IF EXISTS ca_enterrado CASCADE;
CREATE TABLE ca_enterrado (
	cod_per integer,
	cod_tit integer,
	cod_ent integer,
	fec_ent date,
	nom_fall character varying(80)
);

--
-- Creando datos de 'ca_enterrado'
--
--
-- Creando indices PrimaryKey de 'ca_enterrado'
--
--

-- Creando indices Unique de 'ca_enterrado'
--



--
-- Estrutura de tabla 'ca_inmueble'
--
DROP TABLE IF EXISTS ca_inmueble CASCADE;
CREATE TABLE ca_inmueble (
	cod_inm character varying(20) NOT NULL,
	cod_pro integer,
	zon_inm character varying(6),
	dir_inm text,
	med_inm double precision,
	lim_nor text,
	lim_sur text,
	lim_est text,
	lim_oes text,
	fec_ins date,
	puntos text
);

--
-- Creando datos de 'ca_inmueble'
--
--
-- Creando indices PrimaryKey de 'ca_inmueble'
--
ALTER TABLE ONLY  ca_inmueble  ADD CONSTRAINT  ca_inmueble_pkey  PRIMARY KEY  (cod_inm);
--

-- Creando indices Unique de 'ca_inmueble'
--



--
-- Estrutura de secuencia ca_negocio_cod_neg_seq para la tabla 'ca_negocio'
--
DROP SEQUENCE IF EXISTS ca_negocio_cod_neg_seq CASCADE;
CREATE SEQUENCE ca_negocio_cod_neg_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'ca_negocio'
--
DROP TABLE IF EXISTS ca_negocio CASCADE;
CREATE TABLE ca_negocio (
	cod_neg integer NOT NULL DEFAULT nextval('ca_negocio_cod_neg_seq'::regclass),
	nom_neg text,
	rub_neg text,
	zon_neg character varying(6),
	dep character varying(12),
	mun character varying(30),
	dir_neg text,
	med_neg double precision,
	img_neg text,
	est_neg boolean,
	tip_con character(1),
	cod_con integer,
	fec_ins date,
	puntos text
);

ALTER SEQUENCE ca_negocio_cod_neg_seq OWNED BY ca_negocio.cod_neg;

--
-- Creando datos de 'ca_negocio'
--
--
-- Creando indices PrimaryKey de 'ca_negocio'
--
ALTER TABLE ONLY  ca_negocio  ADD CONSTRAINT  ca_negocio_pkey  PRIMARY KEY  (cod_neg);
--

-- Creando indices Unique de 'ca_negocio'
--



--
-- Estrutura de secuencia ca_perpetuidad_cod_tit_seq para la tabla 'ca_perpetuidad'
--
DROP SEQUENCE IF EXISTS ca_perpetuidad_cod_tit_seq CASCADE;
CREATE SEQUENCE ca_perpetuidad_cod_tit_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'ca_perpetuidad'
--
DROP TABLE IF EXISTS ca_perpetuidad CASCADE;
CREATE TABLE ca_perpetuidad (
	cod_tit integer NOT NULL DEFAULT nextval('ca_perpetuidad_cod_tit_seq'::regclass),
	ancho double precision,
	largo double precision,
	lim_nor text,
	lim_sur text,
	lim_est text,
	lim_oes text,
	nic_aut integer,
	clase character varying(30),
	valor double precision,
	num_rec character varying(15),
	fec_rec date,
	cod_cem integer,
	cod_pro integer
);

ALTER SEQUENCE ca_perpetuidad_cod_tit_seq OWNED BY ca_perpetuidad.cod_tit;

--
-- Creando datos de 'ca_perpetuidad'
--
--
-- Creando indices PrimaryKey de 'ca_perpetuidad'
--
ALTER TABLE ONLY  ca_perpetuidad  ADD CONSTRAINT  ca_perpetuidad_pkey  PRIMARY KEY  (cod_tit);
--

-- Creando indices Unique de 'ca_perpetuidad'
--



--
-- Estrutura de secuencia ca_rubro_cod_rub_seq para la tabla 'ca_rubro'
--
DROP SEQUENCE IF EXISTS ca_rubro_cod_rub_seq CASCADE;
CREATE SEQUENCE ca_rubro_cod_rub_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'ca_rubro'
--
DROP TABLE IF EXISTS ca_rubro CASCADE;
CREATE TABLE ca_rubro (
	cod_rub integer NOT NULL DEFAULT nextval('ca_rubro_cod_rub_seq'::regclass),
	rubro text
);

ALTER SEQUENCE ca_rubro_cod_rub_seq OWNED BY ca_rubro.cod_rub;

--
-- Creando datos de 'ca_rubro'
--
--
-- Creando indices PrimaryKey de 'ca_rubro'
--
ALTER TABLE ONLY  ca_rubro  ADD CONSTRAINT  ca_rubro_pkey  PRIMARY KEY  (cod_rub);
--

-- Creando indices Unique de 'ca_rubro'
--



--
-- Estrutura de secuencia ca_sociedad_idsoc_seq para la tabla 'ca_sociedad'
--
DROP SEQUENCE IF EXISTS ca_sociedad_idsoc_seq CASCADE;
CREATE SEQUENCE ca_sociedad_idsoc_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'ca_sociedad'
--
DROP TABLE IF EXISTS ca_sociedad CASCADE;
CREATE TABLE ca_sociedad (
	idsoc integer NOT NULL DEFAULT nextval('ca_sociedad_idsoc_seq'::regclass),
	nom_jur character varying(30),
	fec_cons date,
	gir_jur character varying(40),
	nit_jur character varying(20),
	tel_jur character varying(10),
	dir_jur text,
	rep_jur character varying(100)
);

ALTER SEQUENCE ca_sociedad_idsoc_seq OWNED BY ca_sociedad.idsoc;

--
-- Creando datos de 'ca_sociedad'
--
--
-- Creando indices PrimaryKey de 'ca_sociedad'
--
ALTER TABLE ONLY  ca_sociedad  ADD CONSTRAINT  ca_sociedad_pkey  PRIMARY KEY  (idsoc);
--

-- Creando indices Unique de 'ca_sociedad'
--



--
-- Estrutura de tabla 'ca_traspaso'
--
DROP TABLE IF EXISTS ca_traspaso CASCADE;
CREATE TABLE ca_traspaso (
	cod_neg integer,
	cod_pan integer,
	cod_pnu integer,
	fec_tra date
);

--
-- Creando datos de 'ca_traspaso'
--
--
-- Creando indices PrimaryKey de 'ca_traspaso'
--
--

-- Creando indices Unique de 'ca_traspaso'
--



--
-- Estrutura de tabla 'co_condonado'
--
DROP TABLE IF EXISTS co_condonado CASCADE;
CREATE TABLE co_condonado (
	codigo character varying(5),
	fec_ini date,
	fec_fin date,
	num_acu character varying(25)
);

--
-- Creando datos de 'co_condonado'
--
--
-- Creando indices PrimaryKey de 'co_condonado'
--
--

-- Creando indices Unique de 'co_condonado'
--



--
-- Estrutura de secuencia co_estcta_inm_cod_estcta_seq para la tabla 'co_estcta_inm'
--
DROP SEQUENCE IF EXISTS co_estcta_inm_cod_estcta_seq CASCADE;
CREATE SEQUENCE co_estcta_inm_cod_estcta_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'co_estcta_inm'
--
DROP TABLE IF EXISTS co_estcta_inm CASCADE;
CREATE TABLE co_estcta_inm (
	cod_estcta integer NOT NULL DEFAULT nextval('co_estcta_inm_cod_estcta_seq'::regclass),
	cod_inm character varying(20),
	fec_imp text,
	concepto text,
	monto double precision
);

ALTER SEQUENCE co_estcta_inm_cod_estcta_seq OWNED BY co_estcta_inm.cod_estcta;

--
-- Creando datos de 'co_estcta_inm'
--
--
-- Creando indices PrimaryKey de 'co_estcta_inm'
--
ALTER TABLE ONLY  co_estcta_inm  ADD CONSTRAINT  co_estcta_inm_pkey  PRIMARY KEY  (cod_estcta);
--

-- Creando indices Unique de 'co_estcta_inm'
--



--
-- Estrutura de secuencia co_estcta_neg_cod_estcta_seq para la tabla 'co_estcta_neg'
--
DROP SEQUENCE IF EXISTS co_estcta_neg_cod_estcta_seq CASCADE;
CREATE SEQUENCE co_estcta_neg_cod_estcta_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'co_estcta_neg'
--
DROP TABLE IF EXISTS co_estcta_neg CASCADE;
CREATE TABLE co_estcta_neg (
	cod_estcta integer NOT NULL DEFAULT nextval('co_estcta_neg_cod_estcta_seq'::regclass),
	cod_neg integer,
	fec_imp text,
	concepto text,
	monto double precision
);

ALTER SEQUENCE co_estcta_neg_cod_estcta_seq OWNED BY co_estcta_neg.cod_estcta;

--
-- Creando datos de 'co_estcta_neg'
--
--
-- Creando indices PrimaryKey de 'co_estcta_neg'
--
ALTER TABLE ONLY  co_estcta_neg  ADD CONSTRAINT  co_estcta_neg_pkey  PRIMARY KEY  (cod_estcta);
--

-- Creando indices Unique de 'co_estcta_neg'
--



--
-- Estrutura de secuencia co_factura_cod_fac_seq para la tabla 'co_factura'
--
DROP SEQUENCE IF EXISTS co_factura_cod_fac_seq CASCADE;
CREATE SEQUENCE co_factura_cod_fac_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'co_factura'
--
DROP TABLE IF EXISTS co_factura CASCADE;
CREATE TABLE co_factura (
	cod_fac integer NOT NULL DEFAULT nextval('co_factura_cod_fac_seq'::regclass),
	fec timestamp,
	nom_con character varying(50),
	cod_con integer,
	mon double precision,
	est boolean,
	des character varying(100)
);

ALTER SEQUENCE co_factura_cod_fac_seq OWNED BY co_factura.cod_fac;

--
-- Creando datos de 'co_factura'
--
--
-- Creando indices PrimaryKey de 'co_factura'
--
ALTER TABLE ONLY  co_factura  ADD CONSTRAINT  co_factura_pkey  PRIMARY KEY  (cod_fac);
--

-- Creando indices Unique de 'co_factura'
--



--
-- Estrutura de secuencia co_factura_detalle_cod_det_seq para la tabla 'co_factura_detalle'
--
DROP SEQUENCE IF EXISTS co_factura_detalle_cod_det_seq CASCADE;
CREATE SEQUENCE co_factura_detalle_cod_det_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'co_factura_detalle'
--
DROP TABLE IF EXISTS co_factura_detalle CASCADE;
CREATE TABLE co_factura_detalle (
	cod_det integer NOT NULL DEFAULT nextval('co_factura_detalle_cod_det_seq'::regclass),
	det text,
	mon double precision,
	can integer,
	cod_fac integer,
	cod_rub character varying(5)
);

ALTER SEQUENCE co_factura_detalle_cod_det_seq OWNED BY co_factura_detalle.cod_det;

--
-- Creando datos de 'co_factura_detalle'
--
--
-- Creando indices PrimaryKey de 'co_factura_detalle'
--
ALTER TABLE ONLY  co_factura_detalle  ADD CONSTRAINT  co_factura_detalle_pkey  PRIMARY KEY  (cod_det);
--

-- Creando indices Unique de 'co_factura_detalle'
--



--
-- Estrutura de tabla 'co_fecpag_inm'
--
DROP TABLE IF EXISTS co_fecpag_inm CASCADE;
CREATE TABLE co_fecpag_inm (
	cod_estcta integer,
	fec_pag text
);

--
-- Creando datos de 'co_fecpag_inm'
--
--
-- Creando indices PrimaryKey de 'co_fecpag_inm'
--
--

-- Creando indices Unique de 'co_fecpag_inm'
--



--
-- Estrutura de tabla 'co_fecpag_neg'
--
DROP TABLE IF EXISTS co_fecpag_neg CASCADE;
CREATE TABLE co_fecpag_neg (
	cod_estcta integer,
	fec_pag text
);

--
-- Creando datos de 'co_fecpag_neg'
--
--
-- Creando indices PrimaryKey de 'co_fecpag_neg'
--
--

-- Creando indices Unique de 'co_fecpag_neg'
--



--
-- Estrutura de tabla 'co_impuesto'
--
DROP TABLE IF EXISTS co_impuesto CASCADE;
CREATE TABLE co_impuesto (
	codigo character varying(5) NOT NULL,
	nom_cue text,
	des_cue text,
	tip_cob character varying(10),
	cob_por double precision,
	cob_fij double precision,
	cob_min double precision,
	cob_met boolean
);

--
-- Creando datos de 'co_impuesto'
--
INSERT INTO co_impuesto VALUES('11801','COMERCIO',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('11802','INDUSTRIA',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('11804','DE SERVICIOS',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('11816','TRANSPORTES',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('11818','VIALIDAD',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('12105','SERVICIOS DE CERTIFICACIÓN',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('12106','EXPEDICIÓN DE DOC. DE IDENTIFICACIÓN',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('12108','ALUMBRADO PÚBLICO',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('12110','CASETAS DE TELÉFONOS',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('12111','CEMENTERIOS MUNICIPALES',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('12114','FIESTAS PATRONALES',NULL,'Porcentaje','5','0','0','f');
INSERT INTO co_impuesto VALUES('12115','MERCADO',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('12117','PAVIMENTACIÓN',NULL,'Fijo','0','0','0','t');
INSERT INTO co_impuesto VALUES('12118','POSTES, TORRES Y ANTENAS',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('12119','RASTRO Y TIANGUE',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('12123','BAÑOS Y SERVICIOS SANITARIOS',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('12210','PERMISOS Y LICENCIAS MUNICIPALES',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('12211','COTEJO DE FIERROS',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('14201','SERVICIOS BÁSICOS',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('14299','SERVICIOS DIVERSOS',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('15301','MULTAS POR MORA DE IMPUESTOS',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('15302','INTERESES MORATORIOS',NULL,'Porcentaje','0','0','0','f');
INSERT INTO co_impuesto VALUES('15312','MULTAS (REG)',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('15313','MULTAS AL COMERCIO',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('15314','MULTAS',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('15703','INTERESES BANCARIOS',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('15799','INGRESOS DIVERSOS',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('16201','FODES-FUNCIONAMIENTO',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('16304','DE PERSONAS NATURALES',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('22201','TRANSF. DE CAPITAL AL SECTOR PÚBLICO',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('22036','ESTUDIOS DE FACTIBILIDAD',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('22038','INFRAESTRUCTURA SOCIAL',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('31306','DE MUNICIPALIDADES',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('31308','CRÉDITO DE EMPRESA PRIVADA FINANCIERA',NULL,'Fijo','0','0','0','f');
INSERT INTO co_impuesto VALUES('31310','EMPRESTITO DE PERSONAS NATURALES',NULL,'Fijo','0','0','0','f');
--
-- Creando indices PrimaryKey de 'co_impuesto'
--
ALTER TABLE ONLY  co_impuesto  ADD CONSTRAINT  co_impuesto_pkey  PRIMARY KEY  (codigo);
--

-- Creando indices Unique de 'co_impuesto'
--



--
-- Estrutura de tabla 'co_inm_imp'
--
DROP TABLE IF EXISTS co_inm_imp CASCADE;
CREATE TABLE co_inm_imp (
	cod_inm character varying(20) NOT NULL,
	cod_imp character varying(5) NOT NULL
);

--
-- Creando datos de 'co_inm_imp'
--
--
-- Creando indices PrimaryKey de 'co_inm_imp'
--
ALTER TABLE ONLY  co_inm_imp  ADD CONSTRAINT  co_inm_imp_pkey  PRIMARY KEY  (cod_inm, cod_imp);
--

-- Creando indices Unique de 'co_inm_imp'
--



--
-- Estrutura de tabla 'co_neg_imp'
--
DROP TABLE IF EXISTS co_neg_imp CASCADE;
CREATE TABLE co_neg_imp (
	cod_neg integer NOT NULL,
	cod_imp character varying(5) NOT NULL
);

--
-- Creando datos de 'co_neg_imp'
--
--
-- Creando indices PrimaryKey de 'co_neg_imp'
--
ALTER TABLE ONLY  co_neg_imp  ADD CONSTRAINT  co_neg_imp_pkey  PRIMARY KEY  (cod_neg, cod_imp);
--

-- Creando indices Unique de 'co_neg_imp'
--



--
-- Estrutura de secuencia co_notificacion_id_not_seq para la tabla 'co_notificacion'
--
DROP SEQUENCE IF EXISTS co_notificacion_id_not_seq CASCADE;
CREATE SEQUENCE co_notificacion_id_not_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'co_notificacion'
--
DROP TABLE IF EXISTS co_notificacion CASCADE;
CREATE TABLE co_notificacion (
	id_not integer NOT NULL DEFAULT nextval('co_notificacion_id_not_seq'::regclass),
	mensaje text,
	fec_hor timestamp,
	status boolean,
	cod_fac integer
);

ALTER SEQUENCE co_notificacion_id_not_seq OWNED BY co_notificacion.id_not;

--
-- Creando datos de 'co_notificacion'
--
--
-- Creando indices PrimaryKey de 'co_notificacion'
--
ALTER TABLE ONLY  co_notificacion  ADD CONSTRAINT  co_notificacion_pkey  PRIMARY KEY  (id_not);
--

-- Creando indices Unique de 'co_notificacion'
--



--
-- Estrutura de tabla 'funcionario'
--
DROP TABLE IF EXISTS funcionario CASCADE;
CREATE TABLE funcionario (
	cod_fun character varying(5) NOT NULL,
	nom character varying(70),
	cargo character varying(40),
	per character varying(12)
);

--
-- Creando datos de 'funcionario'
--
--
-- Creando indices PrimaryKey de 'funcionario'
--
ALTER TABLE ONLY  funcionario  ADD CONSTRAINT  funcionario_pkey  PRIMARY KEY  (cod_fun);
--

-- Creando indices Unique de 'funcionario'
--



--
-- Estrutura de tabla 'rf_defuncion_digestyc'
--
DROP TABLE IF EXISTS rf_defuncion_digestyc CASCADE;
CREATE TABLE rf_defuncion_digestyc (
	num_lib integer,
	num_par integer,
	jub_pen character varying(10),
	are character(1),
	otr_est character varying(50),
	fal_emb character varying(50),
	mue_acc character varying(10),
	cer_med boolean,
	cer_for boolean,
	nom_reg text
);

--
-- Creando datos de 'rf_defuncion_digestyc'
--
--
-- Creando indices PrimaryKey de 'rf_defuncion_digestyc'
--
--

-- Creando indices Unique de 'rf_defuncion_digestyc'
--
ALTER TABLE ONLY rf_defuncion_digestyc ADD CONSTRAINT rf_defuncion_digestyc_num_lib_num_par_key UNIQUE (num_lib,num_par);


--
-- Estrutura de tabla 'rf_defuncion_digestyc2'
--
DROP TABLE IF EXISTS rf_defuncion_digestyc2 CASCADE;
CREATE TABLE rf_defuncion_digestyc2 (
	num_lib integer,
	num_par integer,
	hor_min time without time zone,
	dia integer,
	mes integer,
	mad_cas character varying(7),
	tip_par character varying(7),
	eda_mad integer,
	dur_emb character varying(20),
	sem_ges integer
);

--
-- Creando datos de 'rf_defuncion_digestyc2'
--
--
-- Creando indices PrimaryKey de 'rf_defuncion_digestyc2'
--
--

-- Creando indices Unique de 'rf_defuncion_digestyc2'
--
ALTER TABLE ONLY rf_defuncion_digestyc2 ADD CONSTRAINT rf_defuncion_digestyc2_num_lib_num_par_key UNIQUE (num_lib,num_par);


--
-- Estrutura de tabla 'rf_defuncion_digestyc3'
--
DROP TABLE IF EXISTS rf_defuncion_digestyc3 CASCADE;
CREATE TABLE rf_defuncion_digestyc3 (
	num_lib integer,
	num_par integer,
	pes integer,
	tal integer,
	lug_nac character varying(20),
	num_emb integer,
	num_abo integer,
	num_nac_mue integer
);

--
-- Creando datos de 'rf_defuncion_digestyc3'
--
--
-- Creando indices PrimaryKey de 'rf_defuncion_digestyc3'
--
--

-- Creando indices Unique de 'rf_defuncion_digestyc3'
--



--
-- Estrutura de tabla 'rf_defuncion_partida'
--
DROP TABLE IF EXISTS rf_defuncion_partida CASCADE;
CREATE TABLE rf_defuncion_partida (
	ano_lib integer,
	num_lib integer,
	num_tom integer,
	num_pag integer,
	num_par integer,
	cod_per integer,
	nom character varying(30),
	ape1 character varying(20),
	ape2 character varying(20),
	sex character(1),
	eda integer,
	est_fam character varying(15),
	nom_con character varying(70),
	ocu character varying(50),
	dep_org character varying(12),
	mun_org character varying(50),
	dep_res character varying(12),
	mun_res character varying(50),
	canlug_res character varying(50),
	jur character varying(50),
	nac character varying(25),
	dui character varying(10),
	dep_def character varying(12),
	mun_def character varying(50),
	canlug_def character varying(50),
	loc_def character varying(50),
	fec_def date,
	hor_min time without time zone,
	asi_med boolean,
	cau_def text,
	nom_pro character varying(100),
	car_pro character varying(50),
	jvpm character varying(20),
	nom_mad character varying(70),
	nom_pad character varying(70),
	cem character varying(100),
	inf character varying(100),
	dui_inf character varying(10),
	par_inf character varying(50),
	nom_tes1 character varying(70),
	dui_tes1 character varying(10),
	nom_tes2 character varying(70),
	dui_tes2 character varying(10),
	fec_reg date,
	enm character varying(50),
	esc_lib character varying(70)
);

--
-- Creando datos de 'rf_defuncion_partida'
--
--
-- Creando indices PrimaryKey de 'rf_defuncion_partida'
--
--

-- Creando indices Unique de 'rf_defuncion_partida'
--
ALTER TABLE ONLY rf_defuncion_partida ADD CONSTRAINT rf_defuncion_partida_num_lib_num_par_key UNIQUE (num_lib,num_par);


--
-- Estrutura de tabla 'rf_divorcio_digestyc'
--
DROP TABLE IF EXISTS rf_divorcio_digestyc CASCADE;
CREATE TABLE rf_divorcio_digestyc (
	num_lib integer,
	num_par integer,
	dep_div character varying(12),
	mun_div character varying(50),
	fec_fal date,
	eda_eso integer,
	alf_eso character(1),
	ocu_eso character varying(50),
	dep_res_eso character varying(12),
	mun_res_eso character varying(50),
	can_res_eso character varying(50),
	are_res_eso character(1),
	eda_esa integer,
	alf_esa character(1),
	ocu_esa character varying(50),
	dep_res_esa character varying(12),
	mun_res_esa character varying(50),
	can_res_esa character varying(50),
	are_res_esa character(1),
	cau_div text,
	fec_mat date,
	num_hij integer,
	fec_reg date,
	obs text,
	nom_reg text
);

--
-- Creando datos de 'rf_divorcio_digestyc'
--
--
-- Creando indices PrimaryKey de 'rf_divorcio_digestyc'
--
--

-- Creando indices Unique de 'rf_divorcio_digestyc'
--
ALTER TABLE ONLY rf_divorcio_digestyc ADD CONSTRAINT rf_divorcio_digestyc_num_lib_num_par_key UNIQUE (num_lib,num_par);


--
-- Estrutura de tabla 'rf_divorcio_partida'
--
DROP TABLE IF EXISTS rf_divorcio_partida CASCADE;
CREATE TABLE rf_divorcio_partida (
	ano_lib integer,
	num_lib integer,
	num_tom integer,
	num_pag integer,
	num_par integer,
	cod_eso integer,
	cod_esa integer,
	nom_eso character varying(30),
	ape1_eso character varying(20),
	ape2_eso character varying(20),
	nom_esa character varying(30),
	ape1_esa character varying(20),
	ape2_esa character varying(20),
	fec_div date,
	cue text,
	esc_lib character varying(100)
);

--
-- Creando datos de 'rf_divorcio_partida'
--
--
-- Creando indices PrimaryKey de 'rf_divorcio_partida'
--
--

-- Creando indices Unique de 'rf_divorcio_partida'
--
ALTER TABLE ONLY rf_divorcio_partida ADD CONSTRAINT rf_divorcio_partida_num_lib_num_par_key UNIQUE (num_lib,num_par);


--
-- Estrutura de secuencia rf_marginacion_id_seq para la tabla 'rf_marginacion'
--
DROP SEQUENCE IF EXISTS rf_marginacion_id_seq CASCADE;
CREATE SEQUENCE rf_marginacion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'rf_marginacion'
--
DROP TABLE IF EXISTS rf_marginacion CASCADE;
CREATE TABLE rf_marginacion (
	id integer NOT NULL DEFAULT nextval('rf_marginacion_id_seq'::regclass),
	num_lib integer,
	num_par integer,
	tip character varying(10),
	fec date,
	cue text
);

ALTER SEQUENCE rf_marginacion_id_seq OWNED BY rf_marginacion.id;

--
-- Creando datos de 'rf_marginacion'
--
--
-- Creando indices PrimaryKey de 'rf_marginacion'
--
--

-- Creando indices Unique de 'rf_marginacion'
--
ALTER TABLE ONLY rf_marginacion ADD CONSTRAINT rf_marginacion_id_key UNIQUE (id);


--
-- Estrutura de tabla 'rf_matrimonio_acta'
--
DROP TABLE IF EXISTS rf_matrimonio_acta CASCADE;
CREATE TABLE rf_matrimonio_acta (
	ano_lib integer,
	num_lib integer,
	num_tom integer,
	num_pag integer,
	num_act integer,
	cod_eso integer,
	cod_esa integer,
	nom_eso character varying(30),
	ape1_eso character varying(20),
	ape2_eso character varying(20),
	nom_esa character varying(30),
	ape1_esa character varying(20),
	ape2_esa character varying(20),
	fec_mat date,
	cue text,
	esc_lib character varying(100)
);

--
-- Creando datos de 'rf_matrimonio_acta'
--
--
-- Creando indices PrimaryKey de 'rf_matrimonio_acta'
--
--

-- Creando indices Unique de 'rf_matrimonio_acta'
--
ALTER TABLE ONLY rf_matrimonio_acta ADD CONSTRAINT rf_matrimonio_acta_num_lib_num_act_key UNIQUE (num_act,num_lib);


--
-- Estrutura de tabla 'rf_matrimonio_digestyc'
--
DROP TABLE IF EXISTS rf_matrimonio_digestyc CASCADE;
CREATE TABLE rf_matrimonio_digestyc (
	num_lib integer,
	num_par integer,
	dep_mat character varying(12),
	mun_mat character varying(50),
	eda_eso integer,
	dep_eso character varying(12),
	mun_eso character varying(50),
	can_eso character varying(50),
	zon_eso character varying(6),
	est_civ_eso character varying(15),
	alf_eso character varying(30),
	ocu_eso character varying(50),
	eda_esa integer,
	dep_esa character varying(12),
	mun_esa character varying(50),
	can_esa character varying(50),
	zon_esa character varying(6),
	est_civ_esa character varying(15),
	alf_esa character varying(30),
	ocu_esa character varying(50),
	fec_reg date,
	nom_reg character varying(70),
	obs text
);

--
-- Creando datos de 'rf_matrimonio_digestyc'
--
--
-- Creando indices PrimaryKey de 'rf_matrimonio_digestyc'
--
--

-- Creando indices Unique de 'rf_matrimonio_digestyc'
--
ALTER TABLE ONLY rf_matrimonio_digestyc ADD CONSTRAINT rf_matrimonio_digestyc_num_lib_num_par_key UNIQUE (num_lib,num_par);


--
-- Estrutura de tabla 'rf_matrimonio_partida'
--
DROP TABLE IF EXISTS rf_matrimonio_partida CASCADE;
CREATE TABLE rf_matrimonio_partida (
	ano_lib integer,
	num_lib integer,
	num_tom integer,
	num_pag integer,
	num_par integer,
	cod_eso integer,
	cod_esa integer,
	nom_eso character varying(30),
	ape1_eso character varying(20),
	ape2_eso character varying(20),
	nom_esa character varying(30),
	ape1_esa character varying(20),
	ape2_esa character varying(20),
	fec_mat date,
	cue text,
	esc_lib character varying(100)
);

--
-- Creando datos de 'rf_matrimonio_partida'
--
--
-- Creando indices PrimaryKey de 'rf_matrimonio_partida'
--
--

-- Creando indices Unique de 'rf_matrimonio_partida'
--
ALTER TABLE ONLY rf_matrimonio_partida ADD CONSTRAINT rf_matrimonio_partida_num_lib_num_par_key UNIQUE (num_lib,num_par);


--
-- Estrutura de tabla 'rf_nacimiento_digestyc'
--
DROP TABLE IF EXISTS rf_nacimiento_digestyc CASCADE;
CREATE TABLE rf_nacimiento_digestyc (
	num_lib integer,
	num_par integer,
	loc_nac character varying(30),
	can_nac character varying(40),
	pes_nac integer,
	tal integer,
	cla_par character varying(15),
	tip_par character varying(7),
	nom_asi character varying(70),
	car_asi character varying(9),
	dur_emb integer,
	est_fam character varying(15),
	alf_mad character varying(8),
	can_res character varying(40),
	are_res character varying(6),
	hij_nac_viv integer,
	hij_mue integer,
	hij_nac_mue integer,
	alf_pad character varying(8)
);

--
-- Creando datos de 'rf_nacimiento_digestyc'
--
--
-- Creando indices PrimaryKey de 'rf_nacimiento_digestyc'
--
--

-- Creando indices Unique de 'rf_nacimiento_digestyc'
--
ALTER TABLE ONLY rf_nacimiento_digestyc ADD CONSTRAINT rf_nacimiento_digestyc_num_lib_num_par_key UNIQUE (num_lib,num_par);


--
-- Estrutura de tabla 'rf_nacimiento_partida'
--
DROP TABLE IF EXISTS rf_nacimiento_partida CASCADE;
CREATE TABLE rf_nacimiento_partida (
	ano_lib integer,
	num_lib integer,
	num_tom integer,
	num_pag integer,
	num_par integer,
	nom character varying(30),
	sex character(1),
	lug_nac character varying(100),
	dep_nac character varying(12),
	mun_nac character varying(30),
	fec_nac date,
	hor_min time without time zone,
	nom_mad character varying(30),
	ape1_mad character varying(20),
	ape2_mad character varying(20),
	eda_mad integer,
	ocu_mad character varying(40),
	dep_ori_mad character varying(12),
	mun_ori_mad character varying(30),
	dep_res_mad character varying(12),
	mun_res_mad character varying(30),
	nac_mad character varying(25),
	doc_mad character varying(25),
	num_doc_mad character varying(10),
	nom_pad character varying(30),
	ape1_pad character varying(20),
	ape2_pad character varying(20),
	eda_pad integer,
	ocu_pad character varying(40),
	dep_ori_pad character varying(12),
	mun_ori_pad character varying(30),
	dep_res_pad character varying(12),
	mun_res_pad character varying(30),
	nac_pad character varying(25),
	doc_pad character varying(25),
	num_doc_pad character varying(10),
	nom_inf character varying(30),
	ape1_inf character varying(20),
	ape2_inf character varying(20),
	doc_inf character varying(25),
	num_doc_inf character varying(10),
	par_inf character varying(25),
	fir character varying(5),
	ded character varying(7),
	man character varying(9),
	vir_ase character varying(10),
	fec_vir_ase date,
	dec_tes character varying(12),
	nom_tes1 character varying(30),
	ape1_tes1 character varying(20),
	ape2_tes1 character varying(20),
	doc_tes1 character varying(25),
	num_doc_tes1 character varying(10),
	nom_tes2 character varying(30),
	ape1_tes2 character varying(20),
	ape2_tes2 character varying(20),
	doc_tes2 character varying(25),
	num_doc_tes2 character varying(10),
	nom_reg character varying(30),
	fec date,
	cue text,
	esc_lib character varying(100),
	cod_per integer,
	cod_mad integer,
	cod_pad integer,
	cod_inf integer,
	cod_tes1 integer,
	cod_tes2 integer
);

--
-- Creando datos de 'rf_nacimiento_partida'
--
--
-- Creando indices PrimaryKey de 'rf_nacimiento_partida'
--
--

-- Creando indices Unique de 'rf_nacimiento_partida'
--
ALTER TABLE ONLY rf_nacimiento_partida ADD CONSTRAINT rf_nacimiento_partida_num_lib_num_par_key UNIQUE (num_lib,num_par);


--
-- Estrutura de secuencia rf_persona_cod_per_seq para la tabla 'rf_persona'
--
DROP SEQUENCE IF EXISTS rf_persona_cod_per_seq CASCADE;
CREATE SEQUENCE rf_persona_cod_per_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'rf_persona'
--
DROP TABLE IF EXISTS rf_persona CASCADE;
CREATE TABLE rf_persona (
	cod_per integer NOT NULL DEFAULT nextval('rf_persona_cod_per_seq'::regclass),
	nom character varying(30),
	ape1 character varying(20),
	ape2 character varying(20),
	sex character(1),
	fec_nac date,
	dui character varying(10),
	nit character varying(20),
	tel1 character varying(10),
	tel2 character varying(10),
	dep character varying(12),
	mun character varying(30),
	dir text,
	ocu character varying(40),
	est_civ character varying(10)
);

ALTER SEQUENCE rf_persona_cod_per_seq OWNED BY rf_persona.cod_per;

--
-- Creando datos de 'rf_persona'
--
--
-- Creando indices PrimaryKey de 'rf_persona'
--
ALTER TABLE ONLY  rf_persona  ADD CONSTRAINT  rf_persona_pkey  PRIMARY KEY  (cod_per);
--

-- Creando indices Unique de 'rf_persona'
--



--
-- Estrutura de secuencia se_bitacora_cod_seq para la tabla 'se_bitacora'
--
DROP SEQUENCE IF EXISTS se_bitacora_cod_seq CASCADE;
CREATE SEQUENCE se_bitacora_cod_seq
    START WITH 11
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'se_bitacora'
--
DROP TABLE IF EXISTS se_bitacora CASCADE;
CREATE TABLE se_bitacora (
	cod bigint NOT NULL DEFAULT nextval('se_bitacora_cod_seq'::regclass),
	accion character varying(200) NOT NULL,
	id_usuario integer NOT NULL,
	fecha date NOT NULL,
	hora time without time zone NOT NULL
);

ALTER SEQUENCE se_bitacora_cod_seq OWNED BY se_bitacora.cod;

--
-- Creando datos de 'se_bitacora'
--
INSERT INTO se_bitacora VALUES('1','Inició sesión en el sistema','20','2015-07-08','22:19:42.204');
INSERT INTO se_bitacora VALUES('2','Inició sesión en el sistema','20','2015-07-08','22:38:12.462');
INSERT INTO se_bitacora VALUES('3','Inició sesión en el sistema','20','2015-07-08','22:39:20.984');
INSERT INTO se_bitacora VALUES('4','Inició sesión en el sistema','20','2015-07-08','22:40:30.857');
INSERT INTO se_bitacora VALUES('5','Inició sesión en el sistema','20','2015-07-08','22:46:56.607');
INSERT INTO se_bitacora VALUES('6','Inició sesión en el sistema','20','2015-07-08','22:51:44.916');
INSERT INTO se_bitacora VALUES('7','Inició sesión en el sistema','20','2015-07-08','22:53:55.255');
INSERT INTO se_bitacora VALUES('8','Inició sesión en el sistema','20','2015-07-08','23:06:09.429');
INSERT INTO se_bitacora VALUES('9','Inició sesión en el sistema','20','2015-07-08','23:08:49.853');
INSERT INTO se_bitacora VALUES('10','Cerro sesión en el sistema','20','2015-07-08','23:17:58.598');
INSERT INTO se_bitacora VALUES('11','Inició sesión en el sistema','20','2015-07-08','23:18:09.189');
--
-- Creando indices PrimaryKey de 'se_bitacora'
--
ALTER TABLE ONLY  se_bitacora  ADD CONSTRAINT  se_bitacora_pkey  PRIMARY KEY  (cod);
--

-- Creando indices Unique de 'se_bitacora'
--



--
-- Estrutura de secuencia se_preguntas_cod_seq para la tabla 'se_preguntas'
--
DROP SEQUENCE IF EXISTS se_preguntas_cod_seq CASCADE;
CREATE SEQUENCE se_preguntas_cod_seq
    START WITH 7
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'se_preguntas'
--
DROP TABLE IF EXISTS se_preguntas CASCADE;
CREATE TABLE se_preguntas (
	cod integer NOT NULL DEFAULT nextval('se_preguntas_cod_seq'::regclass),
	pre character varying(100)
);

ALTER SEQUENCE se_preguntas_cod_seq OWNED BY se_preguntas.cod;

--
-- Creando datos de 'se_preguntas'
--
INSERT INTO se_preguntas VALUES('1','Color favorito?');
INSERT INTO se_preguntas VALUES('2','Mascota favorita?');
INSERT INTO se_preguntas VALUES('3','Nombre de la primera mascota?');
INSERT INTO se_preguntas VALUES('4','Lugar de nacimiento de mama?');
INSERT INTO se_preguntas VALUES('5','Lugar de nacimiento de papa?');
INSERT INTO se_preguntas VALUES('6','Nombre de algun familiar?');
INSERT INTO se_preguntas VALUES('7','Equipo deportivo preferido?');
--
-- Creando indices PrimaryKey de 'se_preguntas'
--
ALTER TABLE ONLY  se_preguntas  ADD CONSTRAINT  se_preguntas_pkey  PRIMARY KEY  (cod);
--

-- Creando indices Unique de 'se_preguntas'
--



--
-- Estrutura de secuencia se_usuario_id_seq para la tabla 'se_usuario'
--
DROP SEQUENCE IF EXISTS se_usuario_id_seq CASCADE;
CREATE SEQUENCE se_usuario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'se_usuario'
--
DROP TABLE IF EXISTS se_usuario CASCADE;
CREATE TABLE se_usuario (
	id integer NOT NULL DEFAULT nextval('se_usuario_id_seq'::regclass),
	nom character varying(100),
	mail character varying(100),
	usu character varying(25),
	contra character varying(40),
	niv character varying(13),
	act boolean,
	res character varying(100),
	cod_pre integer
);

ALTER SEQUENCE se_usuario_id_seq OWNED BY se_usuario.id;

--
-- Creando datos de 'se_usuario'
--
INSERT INTO se_usuario VALUES('20','Administrador','admin@gmail.com','admin','ec04321e2c7bf2e0b01bac41896796b19f22a244','7','t',NULL,NULL);
--
-- Creando indices PrimaryKey de 'se_usuario'
--
ALTER TABLE ONLY  se_usuario  ADD CONSTRAINT  se_usuario_pkey  PRIMARY KEY  (id);
--

-- Creando indices Unique de 'se_usuario'
--
ALTER TABLE ONLY se_usuario ADD CONSTRAINT se_usuario_usu_key UNIQUE (usu);


--
-- Estrutura de tabla 'um_ben_proy'
--
DROP TABLE IF EXISTS um_ben_proy CASCADE;
CREATE TABLE um_ben_proy (
	cod_per integer,
	cod_pro character varying(10)
);

--
-- Creando datos de 'um_ben_proy'
--
--
-- Creando indices PrimaryKey de 'um_ben_proy'
--
--

-- Creando indices Unique de 'um_ben_proy'
--



--
-- Estrutura de tabla 'um_checkbox'
--
DROP TABLE IF EXISTS um_checkbox CASCADE;
CREATE TABLE um_checkbox (
	cod_chk integer,
	cat_chk text,
	sel_chk text
);

--
-- Creando datos de 'um_checkbox'
--
--
-- Creando indices PrimaryKey de 'um_checkbox'
--
--

-- Creando indices Unique de 'um_checkbox'
--



--
-- Estrutura de tabla 'um_exp_padres'
--
DROP TABLE IF EXISTS um_exp_padres CASCADE;
CREATE TABLE um_exp_padres (
	cod_mad integer,
	cod_pad integer,
	cod_exp integer
);

--
-- Creando datos de 'um_exp_padres'
--
--
-- Creando indices PrimaryKey de 'um_exp_padres'
--
--

-- Creando indices Unique de 'um_exp_padres'
--



--
-- Estrutura de secuencia um_expediente_cod_exp_seq para la tabla 'um_expediente'
--
DROP SEQUENCE IF EXISTS um_expediente_cod_exp_seq CASCADE;
CREATE SEQUENCE um_expediente_cod_exp_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'um_expediente'
--
DROP TABLE IF EXISTS um_expediente CASCADE;
CREATE TABLE um_expediente (
	cod_exp integer NOT NULL DEFAULT nextval('um_expediente_cod_exp_seq'::regclass),
	ano_res integer,
	niv_edu character varying(25),
	oci_otr text,
	tra_rem character(2),
	baj_con character(2),
	jor_tra integer,
	ing_med_men double precision,
	otr_tip_ing character varying(25),
	dep_eco_agr character(2),
	rec_ayu character(2),
	rec_ayu_ong character varying(30),
	med_cab character(2),
	acu_amb character varying(20),
	tra_con text,
	com character varying(10),
	con_agr character varying(25),
	dur_rel_sen character varying(30),
	pri_con character(2),
	suf_mal character(2),
	mal_qui character varying(30),
	suf_abu_sex character(2),
	abu_qui_sex character varying(30),
	tra_sep character(2),
	med_cau text,
	rup_ant character(2),
	dur_mal character varying(25),
	ame_rup character(2),
	mal_men character(2),
	tip_mal_men text,
	num_hij integer,
	apo_eco_fam character varying(25),
	apo_afe_fam character varying(25),
	apo_cri character varying(25),
	con_sit character(2),
	con_apo character(2),
	man_rel_agr character(2),
	apo_efe_ami character varying(25),
	apo_afe_ami character varying(25),
	ent_con_agr character(2),
	ent_apo_agr character(2),
	niv_edu_agr character varying(25),
	ant_pen_agr text,
	cod_per integer,
	cod_agr integer
);

ALTER SEQUENCE um_expediente_cod_exp_seq OWNED BY um_expediente.cod_exp;

--
-- Creando datos de 'um_expediente'
--
--
-- Creando indices PrimaryKey de 'um_expediente'
--
ALTER TABLE ONLY  um_expediente  ADD CONSTRAINT  um_expediente_pkey  PRIMARY KEY  (cod_exp);
--

-- Creando indices Unique de 'um_expediente'
--



--
-- Estrutura de secuencia um_gas_proy_cod_com_seq para la tabla 'um_gas_proy'
--
DROP SEQUENCE IF EXISTS um_gas_proy_cod_com_seq CASCADE;
CREATE SEQUENCE um_gas_proy_cod_com_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Estrutura de tabla 'um_gas_proy'
--
DROP TABLE IF EXISTS um_gas_proy CASCADE;
CREATE TABLE um_gas_proy (
	cod_com integer NOT NULL DEFAULT nextval('um_gas_proy_cod_com_seq'::regclass),
	fec_com date,
	num_com character varying(10),
	con_com text,
	mon_com double precision,
	cod_pro character varying(10)
);

ALTER SEQUENCE um_gas_proy_cod_com_seq OWNED BY um_gas_proy.cod_com;

--
-- Creando datos de 'um_gas_proy'
--
--
-- Creando indices PrimaryKey de 'um_gas_proy'
--
--

-- Creando indices Unique de 'um_gas_proy'
--



--
-- Estrutura de tabla 'um_obs_exp'
--
DROP TABLE IF EXISTS um_obs_exp CASCADE;
CREATE TABLE um_obs_exp (
	cod_exp integer,
	fec_obs date,
	obs text
);

--
-- Creando datos de 'um_obs_exp'
--
--
-- Creando indices PrimaryKey de 'um_obs_exp'
--
--

-- Creando indices Unique de 'um_obs_exp'
--



--
-- Estrutura de tabla 'um_per_proy'
--
DROP TABLE IF EXISTS um_per_proy CASCADE;
CREATE TABLE um_per_proy (
	car character varying(12),
	sal double precision,
	cod_pro character varying(10),
	cod_per integer
);

--
-- Creando datos de 'um_per_proy'
--
--
-- Creando indices PrimaryKey de 'um_per_proy'
--
--

-- Creando indices Unique de 'um_per_proy'
--



--
-- Estrutura de tabla 'um_per_proy_temp'
--
DROP TABLE IF EXISTS um_per_proy_temp CASCADE;
CREATE TABLE um_per_proy_temp (
	car character varying(12),
	sal double precision,
	cod_pro character varying(10),
	cod_per integer
);

--
-- Creando datos de 'um_per_proy_temp'
--
--
-- Creando indices PrimaryKey de 'um_per_proy_temp'
--
--

-- Creando indices Unique de 'um_per_proy_temp'
--



--
-- Estrutura de tabla 'um_proyecto'
--
DROP TABLE IF EXISTS um_proyecto CASCADE;
CREATE TABLE um_proyecto (
	cod_pro character varying(25) NOT NULL,
	nom_pro character varying(100),
	des text,
	ubi text,
	fec_ini date,
	fec_fin date,
	tip_fon character varying(10),
	mon_pro double precision,
	mon_ext double precision,
	pat text,
	est character varying(15)
);

--
-- Creando datos de 'um_proyecto'
--
--
-- Creando indices PrimaryKey de 'um_proyecto'
--
ALTER TABLE ONLY  um_proyecto  ADD CONSTRAINT  um_proyecto_pkey  PRIMARY KEY  (cod_pro);
--

-- Creando indices Unique de 'um_proyecto'
--




--
-- Creando relaciones para 'af_activo'
--

ALTER TABLE ONLY af_activo ADD CONSTRAINT af_activo_cod_tfondo_fkey FOREIGN KEY (cod_tfondo) REFERENCES af_tfondo(cod_tfondo);

--
-- Creando relaciones para 'af_activo'
--

ALTER TABLE ONLY af_activo ADD CONSTRAINT af_activo_tact_fkey FOREIGN KEY (tact) REFERENCES af_tactivo(cod);

--
-- Creando relaciones para 'af_descargo'
--

ALTER TABLE ONLY af_descargo ADD CONSTRAINT af_descargo_cod_act_fkey FOREIGN KEY (cod_act) REFERENCES af_activo(cod_act);

--
-- Creando relaciones para 'af_mantenimiento'
--

ALTER TABLE ONLY af_mantenimiento ADD CONSTRAINT af_mantenimiento_cod_act_fkey FOREIGN KEY (cod_act) REFERENCES af_activo(cod_act);

--
-- Creando relaciones para 'af_mantenimiento'
--

ALTER TABLE ONLY af_mantenimiento ADD CONSTRAINT af_mantenimiento_emp_fkey FOREIGN KEY (emp) REFERENCES af_empresa(cod_emp);

--
-- Creando relaciones para 'af_traslados'
--

ALTER TABLE ONLY af_traslados ADD CONSTRAINT af_traslados_cod_act_fkey FOREIGN KEY (cod_act) REFERENCES af_activo(cod_act);

--
-- Creando relaciones para 'af_traslados'
--

ALTER TABLE ONLY af_traslados ADD CONSTRAINT af_traslados_new_ubi_fkey FOREIGN KEY (new_ubi) REFERENCES af_depto(cod);

--
-- Creando relaciones para 'ca_cierre'
--

ALTER TABLE ONLY ca_cierre ADD CONSTRAINT ca_cierre_cod_neg_fkey FOREIGN KEY (cod_neg) REFERENCES ca_negocio(cod_neg);

--
-- Creando relaciones para 'ca_enterrado'
--

ALTER TABLE ONLY ca_enterrado ADD CONSTRAINT ca_enterrado_cod_per_fkey FOREIGN KEY (cod_per) REFERENCES rf_persona(cod_per);

--
-- Creando relaciones para 'ca_enterrado'
--

ALTER TABLE ONLY ca_enterrado ADD CONSTRAINT ca_enterrado_cod_tit_fkey FOREIGN KEY (cod_tit) REFERENCES ca_perpetuidad(cod_tit);

--
-- Creando relaciones para 'ca_inmueble'
--

ALTER TABLE ONLY ca_inmueble ADD CONSTRAINT ca_inmueble_cod_pro_fkey FOREIGN KEY (cod_pro) REFERENCES rf_persona(cod_per);

--
-- Creando relaciones para 'ca_perpetuidad'
--

ALTER TABLE ONLY ca_perpetuidad ADD CONSTRAINT ca_perpetuidad_cod_cem_fkey FOREIGN KEY (cod_cem) REFERENCES ca_cementerio(cod_cem);

--
-- Creando relaciones para 'ca_perpetuidad'
--

ALTER TABLE ONLY ca_perpetuidad ADD CONSTRAINT ca_perpetuidad_cod_pro_fkey FOREIGN KEY (cod_pro) REFERENCES rf_persona(cod_per);

--
-- Creando relaciones para 'ca_traspaso'
--

ALTER TABLE ONLY ca_traspaso ADD CONSTRAINT ca_traspaso_cod_neg_fkey FOREIGN KEY (cod_neg) REFERENCES ca_negocio(cod_neg);

--
-- Creando relaciones para 'ca_traspaso'
--

ALTER TABLE ONLY ca_traspaso ADD CONSTRAINT ca_traspaso_cod_pnu_fkey FOREIGN KEY (cod_pnu) REFERENCES rf_persona(cod_per);

--
-- Creando relaciones para 'ca_traspaso'
--

ALTER TABLE ONLY ca_traspaso ADD CONSTRAINT ca_traspaso_cod_pan_fkey FOREIGN KEY (cod_pan) REFERENCES rf_persona(cod_per);

--
-- Creando relaciones para 'co_condonado'
--

ALTER TABLE ONLY co_condonado ADD CONSTRAINT co_condonado_codigo_fkey FOREIGN KEY (codigo) REFERENCES co_impuesto(codigo);

--
-- Creando relaciones para 'co_estcta_inm'
--

ALTER TABLE ONLY co_estcta_inm ADD CONSTRAINT co_estcta_inm_cod_inm_fkey FOREIGN KEY (cod_inm) REFERENCES ca_inmueble(cod_inm);

--
-- Creando relaciones para 'co_estcta_neg'
--

ALTER TABLE ONLY co_estcta_neg ADD CONSTRAINT co_estcta_neg_cod_neg_fkey FOREIGN KEY (cod_neg) REFERENCES ca_negocio(cod_neg);

--
-- Creando relaciones para 'co_factura_detalle'
--

ALTER TABLE ONLY co_factura_detalle ADD CONSTRAINT co_factura_detalle_cod_rub_fkey FOREIGN KEY (cod_rub) REFERENCES co_impuesto(codigo);

--
-- Creando relaciones para 'co_factura_detalle'
--

ALTER TABLE ONLY co_factura_detalle ADD CONSTRAINT co_factura_detalle_cod_fac_fkey FOREIGN KEY (cod_fac) REFERENCES co_factura(cod_fac);

--
-- Creando relaciones para 'co_fecpag_inm'
--

ALTER TABLE ONLY co_fecpag_inm ADD CONSTRAINT co_fecpag_inm_cod_estcta_fkey FOREIGN KEY (cod_estcta) REFERENCES co_estcta_inm(cod_estcta);

--
-- Creando relaciones para 'co_fecpag_neg'
--

ALTER TABLE ONLY co_fecpag_neg ADD CONSTRAINT co_fecpag_neg_cod_estcta_fkey FOREIGN KEY (cod_estcta) REFERENCES co_estcta_neg(cod_estcta);

--
-- Creando relaciones para 'co_inm_imp'
--

ALTER TABLE ONLY co_inm_imp ADD CONSTRAINT co_inm_imp_cod_imp_fkey FOREIGN KEY (cod_imp) REFERENCES co_impuesto(codigo);

--
-- Creando relaciones para 'co_inm_imp'
--

ALTER TABLE ONLY co_inm_imp ADD CONSTRAINT co_inm_imp_cod_inm_fkey FOREIGN KEY (cod_inm) REFERENCES ca_inmueble(cod_inm);

--
-- Creando relaciones para 'co_neg_imp'
--

ALTER TABLE ONLY co_neg_imp ADD CONSTRAINT co_neg_imp_cod_neg_fkey FOREIGN KEY (cod_neg) REFERENCES ca_negocio(cod_neg);

--
-- Creando relaciones para 'co_neg_imp'
--

ALTER TABLE ONLY co_neg_imp ADD CONSTRAINT co_neg_imp_cod_imp_fkey FOREIGN KEY (cod_imp) REFERENCES co_impuesto(codigo);

--
-- Creando relaciones para 'rf_defuncion_digestyc'
--

ALTER TABLE ONLY rf_defuncion_digestyc ADD CONSTRAINT rf_defuncion_digestyc_num_lib_fkey FOREIGN KEY (num_lib, num_par) REFERENCES rf_defuncion_partida(num_lib, num_par);

--
-- Creando relaciones para 'rf_defuncion_digestyc2'
--

ALTER TABLE ONLY rf_defuncion_digestyc2 ADD CONSTRAINT rf_defuncion_digestyc2_num_lib_fkey FOREIGN KEY (num_lib, num_par) REFERENCES rf_defuncion_digestyc(num_lib, num_par);

--
-- Creando relaciones para 'rf_defuncion_digestyc3'
--

ALTER TABLE ONLY rf_defuncion_digestyc3 ADD CONSTRAINT rf_defuncion_digestyc3_num_lib_fkey FOREIGN KEY (num_lib, num_par) REFERENCES rf_defuncion_digestyc2(num_lib, num_par);

--
-- Creando relaciones para 'rf_defuncion_partida'
--

ALTER TABLE ONLY rf_defuncion_partida ADD CONSTRAINT rf_defuncion_partida_cod_per_fkey FOREIGN KEY (cod_per) REFERENCES rf_persona(cod_per);

--
-- Creando relaciones para 'rf_divorcio_digestyc'
--

ALTER TABLE ONLY rf_divorcio_digestyc ADD CONSTRAINT rf_divorcio_digestyc_num_lib_fkey FOREIGN KEY (num_lib, num_par) REFERENCES rf_divorcio_partida(num_lib, num_par);

--
-- Creando relaciones para 'rf_divorcio_partida'
--

ALTER TABLE ONLY rf_divorcio_partida ADD CONSTRAINT rf_divorcio_partida_cod_eso_fkey FOREIGN KEY (cod_eso) REFERENCES rf_persona(cod_per);

--
-- Creando relaciones para 'rf_divorcio_partida'
--

ALTER TABLE ONLY rf_divorcio_partida ADD CONSTRAINT rf_divorcio_partida_cod_esa_fkey FOREIGN KEY (cod_esa) REFERENCES rf_persona(cod_per);

--
-- Creando relaciones para 'rf_matrimonio_acta'
--

ALTER TABLE ONLY rf_matrimonio_acta ADD CONSTRAINT rf_matrimonio_acta_cod_esa_fkey FOREIGN KEY (cod_esa) REFERENCES rf_persona(cod_per);

--
-- Creando relaciones para 'rf_matrimonio_acta'
--

ALTER TABLE ONLY rf_matrimonio_acta ADD CONSTRAINT rf_matrimonio_acta_cod_eso_fkey FOREIGN KEY (cod_eso) REFERENCES rf_persona(cod_per);

--
-- Creando relaciones para 'rf_matrimonio_digestyc'
--

ALTER TABLE ONLY rf_matrimonio_digestyc ADD CONSTRAINT rf_matrimonio_digestyc_num_lib_fkey FOREIGN KEY (num_lib, num_par) REFERENCES rf_matrimonio_partida(num_lib, num_par);

--
-- Creando relaciones para 'rf_matrimonio_partida'
--

ALTER TABLE ONLY rf_matrimonio_partida ADD CONSTRAINT rf_matrimonio_partida_cod_eso_fkey FOREIGN KEY (cod_eso) REFERENCES rf_persona(cod_per);

--
-- Creando relaciones para 'rf_matrimonio_partida'
--

ALTER TABLE ONLY rf_matrimonio_partida ADD CONSTRAINT rf_matrimonio_partida_cod_esa_fkey FOREIGN KEY (cod_esa) REFERENCES rf_persona(cod_per);

--
-- Creando relaciones para 'rf_nacimiento_digestyc'
--

ALTER TABLE ONLY rf_nacimiento_digestyc ADD CONSTRAINT rf_nacimiento_digestyc_num_lib_fkey FOREIGN KEY (num_lib, num_par) REFERENCES rf_nacimiento_partida(num_lib, num_par);

--
-- Creando relaciones para 'rf_nacimiento_partida'
--

ALTER TABLE ONLY rf_nacimiento_partida ADD CONSTRAINT rf_nacimiento_partida_cod_per_fkey FOREIGN KEY (cod_per) REFERENCES rf_persona(cod_per);

--
-- Creando relaciones para 'se_bitacora'
--

ALTER TABLE ONLY se_bitacora ADD CONSTRAINT se_bitacora_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES se_usuario(id);

--
-- Creando relaciones para 'se_usuario'
--

ALTER TABLE ONLY se_usuario ADD CONSTRAINT se_usuario_cod_pre_fkey FOREIGN KEY (cod_pre) REFERENCES se_preguntas(cod);

--
-- Creando relaciones para 'um_ben_proy'
--

ALTER TABLE ONLY um_ben_proy ADD CONSTRAINT um_ben_proy_cod_pro_fkey FOREIGN KEY (cod_pro) REFERENCES um_proyecto(cod_pro);

--
-- Creando relaciones para 'um_ben_proy'
--

ALTER TABLE ONLY um_ben_proy ADD CONSTRAINT um_ben_proy_cod_per_fkey FOREIGN KEY (cod_per) REFERENCES rf_persona(cod_per);

--
-- Creando relaciones para 'um_checkbox'
--

ALTER TABLE ONLY um_checkbox ADD CONSTRAINT um_checkbox_cod_chk_fkey FOREIGN KEY (cod_chk) REFERENCES um_expediente(cod_exp);

--
-- Creando relaciones para 'um_exp_padres'
--

ALTER TABLE ONLY um_exp_padres ADD CONSTRAINT um_exp_padres_cod_pad_fkey FOREIGN KEY (cod_pad) REFERENCES rf_persona(cod_per);

--
-- Creando relaciones para 'um_exp_padres'
--

ALTER TABLE ONLY um_exp_padres ADD CONSTRAINT um_exp_padres_cod_exp_fkey FOREIGN KEY (cod_exp) REFERENCES um_expediente(cod_exp);

--
-- Creando relaciones para 'um_exp_padres'
--

ALTER TABLE ONLY um_exp_padres ADD CONSTRAINT um_exp_padres_cod_mad_fkey FOREIGN KEY (cod_mad) REFERENCES rf_persona(cod_per);

--
-- Creando relaciones para 'um_expediente'
--

ALTER TABLE ONLY um_expediente ADD CONSTRAINT um_expediente_cod_agr_fkey FOREIGN KEY (cod_agr) REFERENCES rf_persona(cod_per);

--
-- Creando relaciones para 'um_expediente'
--

ALTER TABLE ONLY um_expediente ADD CONSTRAINT um_expediente_cod_per_fkey FOREIGN KEY (cod_per) REFERENCES rf_persona(cod_per);

--
-- Creando relaciones para 'um_gas_proy'
--

ALTER TABLE ONLY um_gas_proy ADD CONSTRAINT um_gas_proy_cod_pro_fkey FOREIGN KEY (cod_pro) REFERENCES um_proyecto(cod_pro);

--
-- Creando relaciones para 'um_obs_exp'
--

ALTER TABLE ONLY um_obs_exp ADD CONSTRAINT um_obs_exp_cod_exp_fkey FOREIGN KEY (cod_exp) REFERENCES um_expediente(cod_exp);

--
-- Creando relaciones para 'um_per_proy'
--

ALTER TABLE ONLY um_per_proy ADD CONSTRAINT um_per_proy_cod_per_fkey FOREIGN KEY (cod_per) REFERENCES rf_persona(cod_per);

--
-- Creando relaciones para 'um_per_proy'
--

ALTER TABLE ONLY um_per_proy ADD CONSTRAINT um_per_proy_cod_pro_fkey FOREIGN KEY (cod_pro) REFERENCES um_proyecto(cod_pro);