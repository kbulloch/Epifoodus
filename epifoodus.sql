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
-- Name: cuisines; Type: TABLE; Schema: public; Owner: epicodus-103; Tablespace:
--

CREATE TABLE cuisines (
    id integer NOT NULL,
    type character varying
);


ALTER TABLE cuisines OWNER TO epicodus-103;

--
-- Name: cuisines_id_seq; Type: SEQUENCE; Schema: public; Owner: epicodus-103
--

CREATE SEQUENCE cuisines_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cuisines_id_seq OWNER TO epicodus-103;

--
-- Name: cuisines_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: epicodus-103
--

ALTER SEQUENCE cuisines_id_seq OWNED BY cuisines.id;


--
-- Name: cuisines_restaurants; Type: TABLE; Schema: public; Owner: epicodus-103; Tablespace:
--

CREATE TABLE cuisines_restaurants (
    id integer NOT NULL,
    cuisine_id integer,
    restaurant_id integer
);


ALTER TABLE cuisines_restaurants OWNER TO epicodus-103;

--
-- Name: cuisines_restaurants_id_seq; Type: SEQUENCE; Schema: public; Owner: epicodus-103
--

CREATE SEQUENCE cuisines_restaurants_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cuisines_restaurants_id_seq OWNER TO epicodus-103;

--
-- Name: cuisines_restaurants_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: epicodus-103
--

ALTER SEQUENCE cuisines_restaurants_id_seq OWNED BY cuisines_restaurants.id;


--
-- Name: likes; Type: TABLE; Schema: public; Owner: epicodus-103; Tablespace:
--

CREATE TABLE likes (
    id integer NOT NULL,
    answer integer,
    restaurant_id integer,
    user_id integer
);


ALTER TABLE likes OWNER TO epicodus-103;

--
-- Name: likes_id_seq; Type: SEQUENCE; Schema: public; Owner: epicodus-103
--

CREATE SEQUENCE likes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE likes_id_seq OWNER TO epicodus-103;

--
-- Name: likes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: epicodus-103
--

ALTER SEQUENCE likes_id_seq OWNED BY likes.id;


--
-- Name: prices; Type: TABLE; Schema: public; Owner: epicodus-103; Tablespace:
--

CREATE TABLE prices (
    id integer NOT NULL,
    level integer
);


ALTER TABLE prices OWNER TO epicodus-103;

--
-- Name: prices_id_seq; Type: SEQUENCE; Schema: public; Owner: epicodus-103
--

CREATE SEQUENCE prices_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE prices_id_seq OWNER TO epicodus-103;

--
-- Name: prices_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: epicodus-103
--

ALTER SEQUENCE prices_id_seq OWNED BY prices.id;


--
-- Name: restaurants; Type: TABLE; Schema: public; Owner: epicodus-103; Tablespace:
--

CREATE TABLE restaurants (
    id integer NOT NULL,
    name character varying,
    address character varying,
    phone character varying,
    price integer,
    vegie integer,
    opentime integer,
    closetime integer
);


ALTER TABLE restaurants OWNER TO epicodus-103;

--
-- Name: restaurants_id_seq; Type: SEQUENCE; Schema: public; Owner: epicodus-103
--

CREATE SEQUENCE restaurants_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE restaurants_id_seq OWNER TO epicodus-103;

--
-- Name: restaurants_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: epicodus-103
--

ALTER SEQUENCE restaurants_id_seq OWNED BY restaurants.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: epicodus-103; Tablespace:
--

CREATE TABLE users (
    id integer NOT NULL,
    username character varying,
    password character varying
);


ALTER TABLE users OWNER TO epicodus-103;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: epicodus-103
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_id_seq OWNER TO epicodus-103;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: epicodus-103
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: epicodus-103
--

ALTER TABLE ONLY cuisines ALTER COLUMN id SET DEFAULT nextval('cuisines_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: epicodus-103
--

ALTER TABLE ONLY cuisines_restaurants ALTER COLUMN id SET DEFAULT nextval('cuisines_restaurants_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: epicodus-103
--

ALTER TABLE ONLY likes ALTER COLUMN id SET DEFAULT nextval('likes_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: epicodus-103
--

ALTER TABLE ONLY prices ALTER COLUMN id SET DEFAULT nextval('prices_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: epicodus-103
--

ALTER TABLE ONLY restaurants ALTER COLUMN id SET DEFAULT nextval('restaurants_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: epicodus-103
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: cuisines; Type: TABLE DATA; Schema: public; Owner: epicodus-103
--

COPY cuisines (id, type) FROM stdin;
1	Bakery
2	Bar
3	Barbecue
4	Breakfast
5	Burgers
6	Cafe
7	Chicken
8	Chinese
9	Deli
10	FastFood
11	German
12	Irish
13	Italian
14	Japanese
15	Kebab
16	Mediterranean
17	Mexican
18	Pizza
19	Polish
20	Sandwich
21	Seafood
22	Sushi
23	Thai
24	Wrap
\.


--
-- Name: cuisines_id_seq; Type: SEQUENCE SET; Schema: public; Owner: epicodus-103
--

SELECT pg_catalog.setval('cuisines_id_seq', 24, true);


--
-- Data for Name: cuisines_restaurants; Type: TABLE DATA; Schema: public; Owner: epicodus-103
--

COPY cuisines_restaurants (id, cuisine_id, restaurant_id) FROM stdin;
1	1	1
2	2	2
3	3	3
4	4	4
\.


--
-- Name: cuisines_restaurants_id_seq; Type: SEQUENCE SET; Schema: public; Owner: epicodus-103
--

SELECT pg_catalog.setval('cuisines_restaurants_id_seq', 4, true);


--
-- Data for Name: likes; Type: TABLE DATA; Schema: public; Owner: epicodus-103
--

COPY likes (id, answer, restaurant_id, user_id) FROM stdin;
\.


--
-- Name: likes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: epicodus-103
--

SELECT pg_catalog.setval('likes_id_seq', 1, false);


--
-- Data for Name: prices; Type: TABLE DATA; Schema: public; Owner: epicodus-103
--

COPY prices (id, level) FROM stdin;
\.


--
-- Name: prices_id_seq; Type: SEQUENCE SET; Schema: public; Owner: epicodus-103
--

SELECT pg_catalog.setval('prices_id_seq', 1, false);


--
-- Data for Name: restaurants; Type: TABLE DATA; Schema: public; Owner: epicodus-103
--

COPY restaurants (id, name, address, phone, price, vegie, opentime, closetime) FROM stdin;
1	Testaurant	123 fake st	555 555 5555	1	0	400	2000
2	Doctor Taco	124 fake st	555 555 5556	1	1	600	1800
3	Senor Bean	126 Fake St	420 6969	1	1	700	1400
4	Hack A Planet	128 Fake St	111 1111 1	1	0	900	1100
\.


--
-- Name: restaurants_id_seq; Type: SEQUENCE SET; Schema: public; Owner: epicodus-103
--

SELECT pg_catalog.setval('restaurants_id_seq', 4, true);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: epicodus-103
--

COPY users (id, username, password) FROM stdin;
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: epicodus-103
--

SELECT pg_catalog.setval('users_id_seq', 1, false);


--
-- Name: cuisines_pkey; Type: CONSTRAINT; Schema: public; Owner: epicodus-103; Tablespace:
--

ALTER TABLE ONLY cuisines
    ADD CONSTRAINT cuisines_pkey PRIMARY KEY (id);


--
-- Name: cuisines_restaurants_pkey; Type: CONSTRAINT; Schema: public; Owner: epicodus-103; Tablespace:
--

ALTER TABLE ONLY cuisines_restaurants
    ADD CONSTRAINT cuisines_restaurants_pkey PRIMARY KEY (id);


--
-- Name: likes_pkey; Type: CONSTRAINT; Schema: public; Owner: epicodus-103; Tablespace:
--

ALTER TABLE ONLY likes
    ADD CONSTRAINT likes_pkey PRIMARY KEY (id);


--
-- Name: prices_pkey; Type: CONSTRAINT; Schema: public; Owner: epicodus-103; Tablespace:
--

ALTER TABLE ONLY prices
    ADD CONSTRAINT prices_pkey PRIMARY KEY (id);


--
-- Name: restaurants_pkey; Type: CONSTRAINT; Schema: public; Owner: epicodus-103; Tablespace:
--

ALTER TABLE ONLY restaurants
    ADD CONSTRAINT restaurants_pkey PRIMARY KEY (id);


--
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: epicodus-103; Tablespace:
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: public; Type: ACL; Schema: -; Owner: epicodus-103
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM epicodus-103;
GRANT ALL ON SCHEMA public TO epicodus-103;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--
