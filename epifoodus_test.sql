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
-- Name: cuisines; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
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
-- Name: cuisines_restaurants; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
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
-- Name: likes; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
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
-- Name: prices; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
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
-- Name: restaurants; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
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
-- Name: users; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
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

SELECT pg_catalog.setval('cuisines_id_seq', 170, true);


--
-- Data for Name: cuisines_restaurants; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY cuisines_restaurants (id, cuisine_id, restaurant_id) FROM stdin;
1	12	15
2	13	16
3	14	16
4	15	17
5	27	32
6	28	33
7	29	33
8	30	34
9	42	49
10	43	50
11	44	50
12	45	51
13	54	52
14	54	53
15	56	54
16	57	69
17	58	70
18	59	70
19	60	71
20	68	72
21	69	73
22	69	74
23	71	75
24	72	90
25	73	91
26	74	91
27	75	92
28	83	93
29	84	94
30	84	95
31	86	96
32	87	111
33	88	112
34	89	112
35	90	113
36	98	114
37	99	115
38	99	116
39	101	117
40	102	132
41	103	133
42	104	133
43	105	134
44	113	135
45	114	136
46	114	137
47	116	138
48	117	153
49	118	154
50	119	154
51	120	155
52	128	156
53	129	157
54	129	158
55	131	159
56	133	174
57	134	175
58	135	175
59	136	176
60	144	177
61	145	178
62	145	179
63	147	180
64	149	195
65	150	196
66	151	196
67	152	197
68	153	198
69	161	199
70	162	200
71	162	201
72	164	202
73	166	217
74	167	218
75	168	218
76	169	219
77	170	220
\.


--
-- Name: cuisines_restaurants_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('cuisines_restaurants_id_seq', 77, true);


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

COPY restaurants (id, name, address, phone, price, vegie, opentime, closetime) FROM stdin;
\.


--
-- Name: restaurants_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('restaurants_id_seq', 220, true);


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
-- Name: cuisines_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY cuisines
    ADD CONSTRAINT cuisines_pkey PRIMARY KEY (id);


--
-- Name: cuisines_restaurants_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY cuisines_restaurants
    ADD CONSTRAINT cuisines_restaurants_pkey PRIMARY KEY (id);


--
-- Name: likes_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY likes
    ADD CONSTRAINT likes_pkey PRIMARY KEY (id);


--
-- Name: prices_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY prices
    ADD CONSTRAINT prices_pkey PRIMARY KEY (id);


--
-- Name: restaurants_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY restaurants
    ADD CONSTRAINT restaurants_pkey PRIMARY KEY (id);


--
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
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

