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
<<<<<<< HEAD
<<<<<<< HEAD
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner:
=======
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner:
>>>>>>> 380a0e96833b0838793821242231dea4505e58d8
=======
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner:
>>>>>>> 42ec94d45371e3051b175f7ddf0d9282653c37ba
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
<<<<<<< HEAD
<<<<<<< HEAD
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner:
=======
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner:
>>>>>>> 380a0e96833b0838793821242231dea4505e58d8
=======
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner:
>>>>>>> 42ec94d45371e3051b175f7ddf0d9282653c37ba
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
<<<<<<< HEAD
<<<<<<< HEAD
-- Name: cuisines; Type: TABLE; Schema: public; Owner: Guest; Tablespace:
=======
-- Name: cuisines; Type: TABLE; Schema: public; Owner: Guest; Tablespace:
>>>>>>> 380a0e96833b0838793821242231dea4505e58d8
=======
-- Name: cuisines; Type: TABLE; Schema: public; Owner: Guest; Tablespace:
>>>>>>> 42ec94d45371e3051b175f7ddf0d9282653c37ba
--

CREATE TABLE cuisines (
    id integer NOT NULL,
    type character varying
);


ALTER TABLE cuisines OWNER TO "Guest";

--
-- Name: cuisines_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE cuisines_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cuisines_id_seq OWNER TO "Guest";

--
-- Name: cuisines_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE cuisines_id_seq OWNED BY cuisines.id;


--
<<<<<<< HEAD
<<<<<<< HEAD
-- Name: cuisines_restaurants; Type: TABLE; Schema: public; Owner: Guest; Tablespace:
=======
-- Name: cuisines_restaurants; Type: TABLE; Schema: public; Owner: Guest; Tablespace:
>>>>>>> 380a0e96833b0838793821242231dea4505e58d8
=======
-- Name: cuisines_restaurants; Type: TABLE; Schema: public; Owner: Guest; Tablespace:
>>>>>>> 42ec94d45371e3051b175f7ddf0d9282653c37ba
--

CREATE TABLE cuisines_restaurants (
    id integer NOT NULL,
    cuisine_id integer,
    restaurant_id integer
);


ALTER TABLE cuisines_restaurants OWNER TO "Guest";

--
-- Name: cuisines_restaurants_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE cuisines_restaurants_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cuisines_restaurants_id_seq OWNER TO "Guest";

--
-- Name: cuisines_restaurants_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE cuisines_restaurants_id_seq OWNED BY cuisines_restaurants.id;


--
<<<<<<< HEAD
<<<<<<< HEAD
-- Name: likes; Type: TABLE; Schema: public; Owner: Guest; Tablespace:
=======
-- Name: likes; Type: TABLE; Schema: public; Owner: Guest; Tablespace:
>>>>>>> 380a0e96833b0838793821242231dea4505e58d8
=======
-- Name: likes; Type: TABLE; Schema: public; Owner: Guest; Tablespace:
>>>>>>> 42ec94d45371e3051b175f7ddf0d9282653c37ba
--

CREATE TABLE likes (
    id integer NOT NULL,
    answer integer,
    restaurant_id integer,
    user_id integer
);


ALTER TABLE likes OWNER TO "Guest";

--
-- Name: likes_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE likes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE likes_id_seq OWNER TO "Guest";

--
-- Name: likes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE likes_id_seq OWNED BY likes.id;


--
<<<<<<< HEAD
<<<<<<< HEAD
-- Name: prices; Type: TABLE; Schema: public; Owner: Guest; Tablespace:
=======
-- Name: prices; Type: TABLE; Schema: public; Owner: Guest; Tablespace:
>>>>>>> 380a0e96833b0838793821242231dea4505e58d8
=======
-- Name: prices; Type: TABLE; Schema: public; Owner: Guest; Tablespace:
>>>>>>> 42ec94d45371e3051b175f7ddf0d9282653c37ba
--

CREATE TABLE prices (
    id integer NOT NULL,
    level integer
);


ALTER TABLE prices OWNER TO "Guest";

--
-- Name: prices_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE prices_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE prices_id_seq OWNER TO "Guest";

--
-- Name: prices_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE prices_id_seq OWNED BY prices.id;


--
<<<<<<< HEAD
<<<<<<< HEAD
-- Name: restaurants; Type: TABLE; Schema: public; Owner: Guest; Tablespace:
=======
-- Name: restaurants; Type: TABLE; Schema: public; Owner: Guest; Tablespace:
>>>>>>> 380a0e96833b0838793821242231dea4505e58d8
=======
-- Name: restaurants; Type: TABLE; Schema: public; Owner: Guest; Tablespace:
>>>>>>> 42ec94d45371e3051b175f7ddf0d9282653c37ba
--

CREATE TABLE restaurants (
    id integer NOT NULL,
    name character varying,
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 42ec94d45371e3051b175f7ddf0d9282653c37ba
    address character varying,
    phone character varying,
    price integer,
    vegie integer,
    opentime integer,
    closetime integer
<<<<<<< HEAD
=======
    price_id integer,
    vegetarian integer,
    hours time without time zone
>>>>>>> 380a0e96833b0838793821242231dea4505e58d8
=======
>>>>>>> 42ec94d45371e3051b175f7ddf0d9282653c37ba
);


ALTER TABLE restaurants OWNER TO "Guest";

--
-- Name: restaurants_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE restaurants_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE restaurants_id_seq OWNER TO "Guest";

--
-- Name: restaurants_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE restaurants_id_seq OWNED BY restaurants.id;


--
<<<<<<< HEAD
<<<<<<< HEAD
-- Name: users; Type: TABLE; Schema: public; Owner: Guest; Tablespace:
=======
-- Name: users; Type: TABLE; Schema: public; Owner: Guest; Tablespace:
>>>>>>> 380a0e96833b0838793821242231dea4505e58d8
=======
-- Name: users; Type: TABLE; Schema: public; Owner: Guest; Tablespace:
>>>>>>> 42ec94d45371e3051b175f7ddf0d9282653c37ba
--

CREATE TABLE users (
    id integer NOT NULL,
    username character varying,
    password character varying
);


ALTER TABLE users OWNER TO "Guest";

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_id_seq OWNER TO "Guest";

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY cuisines ALTER COLUMN id SET DEFAULT nextval('cuisines_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY cuisines_restaurants ALTER COLUMN id SET DEFAULT nextval('cuisines_restaurants_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY likes ALTER COLUMN id SET DEFAULT nextval('likes_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY prices ALTER COLUMN id SET DEFAULT nextval('prices_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY restaurants ALTER COLUMN id SET DEFAULT nextval('restaurants_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: cuisines; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY cuisines (id, type) FROM stdin;
\.


--
-- Name: cuisines_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('cuisines_id_seq', 1, false);


--
-- Data for Name: cuisines_restaurants; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY cuisines_restaurants (id, cuisine_id, restaurant_id) FROM stdin;
\.


--
-- Name: cuisines_restaurants_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('cuisines_restaurants_id_seq', 1, false);


--
-- Data for Name: likes; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY likes (id, answer, restaurant_id, user_id) FROM stdin;
\.


--
-- Name: likes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('likes_id_seq', 1, false);


--
-- Data for Name: prices; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY prices (id, level) FROM stdin;
\.


--
-- Name: prices_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('prices_id_seq', 1, false);


--
-- Data for Name: restaurants; Type: TABLE DATA; Schema: public; Owner: Guest
--

<<<<<<< HEAD
<<<<<<< HEAD
COPY restaurants (id, name, address, phone, price, vegie, opentime, closetime) FROM stdin;
=======
COPY restaurants (id, name, price_id, vegetarian, hours) FROM stdin;
>>>>>>> 380a0e96833b0838793821242231dea4505e58d8
=======
COPY restaurants (id, name, address, phone, price, vegie, opentime, closetime) FROM stdin;
>>>>>>> 42ec94d45371e3051b175f7ddf0d9282653c37ba
\.


--
-- Name: restaurants_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('restaurants_id_seq', 1, false);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY users (id, username, password) FROM stdin;
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('users_id_seq', 1, false);


--
<<<<<<< HEAD
<<<<<<< HEAD
-- Name: cuisines_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace:
=======
-- Name: cuisines_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace:
>>>>>>> 380a0e96833b0838793821242231dea4505e58d8
=======
-- Name: cuisines_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace:
>>>>>>> 42ec94d45371e3051b175f7ddf0d9282653c37ba
--

ALTER TABLE ONLY cuisines
    ADD CONSTRAINT cuisines_pkey PRIMARY KEY (id);


--
<<<<<<< HEAD
<<<<<<< HEAD
-- Name: cuisines_restaurants_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace:
=======
-- Name: cuisines_restaurants_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace:
>>>>>>> 380a0e96833b0838793821242231dea4505e58d8
=======
-- Name: cuisines_restaurants_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace:
>>>>>>> 42ec94d45371e3051b175f7ddf0d9282653c37ba
--

ALTER TABLE ONLY cuisines_restaurants
    ADD CONSTRAINT cuisines_restaurants_pkey PRIMARY KEY (id);


--
<<<<<<< HEAD
<<<<<<< HEAD
-- Name: likes_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace:
=======
-- Name: likes_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace:
>>>>>>> 380a0e96833b0838793821242231dea4505e58d8
=======
-- Name: likes_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace:
>>>>>>> 42ec94d45371e3051b175f7ddf0d9282653c37ba
--

ALTER TABLE ONLY likes
    ADD CONSTRAINT likes_pkey PRIMARY KEY (id);


--
<<<<<<< HEAD
<<<<<<< HEAD
-- Name: prices_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace:
=======
-- Name: prices_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace:
>>>>>>> 380a0e96833b0838793821242231dea4505e58d8
=======
-- Name: prices_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace:
>>>>>>> 42ec94d45371e3051b175f7ddf0d9282653c37ba
--

ALTER TABLE ONLY prices
    ADD CONSTRAINT prices_pkey PRIMARY KEY (id);


--
<<<<<<< HEAD
<<<<<<< HEAD
-- Name: restaurants_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace:
=======
-- Name: restaurants_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace:
>>>>>>> 380a0e96833b0838793821242231dea4505e58d8
=======
-- Name: restaurants_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace:
>>>>>>> 42ec94d45371e3051b175f7ddf0d9282653c37ba
--

ALTER TABLE ONLY restaurants
    ADD CONSTRAINT restaurants_pkey PRIMARY KEY (id);


--
<<<<<<< HEAD
<<<<<<< HEAD
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace:
=======
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace:
>>>>>>> 380a0e96833b0838793821242231dea4505e58d8
=======
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace:
>>>>>>> 42ec94d45371e3051b175f7ddf0d9282653c37ba
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: public; Type: ACL; Schema: -; Owner: epicodus
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM epicodus;
GRANT ALL ON SCHEMA public TO epicodus;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> 380a0e96833b0838793821242231dea4505e58d8
=======

>>>>>>> 42ec94d45371e3051b175f7ddf0d9282653c37ba
