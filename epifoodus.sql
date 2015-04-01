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
    password character varying,
    vegie integer,
    admin integer
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

SELECT pg_catalog.setval('cuisines_id_seq', 172, true);


--
-- Data for Name: cuisines_restaurants; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY cuisines_restaurants (id, cuisine_id, restaurant_id) FROM stdin;
1	2	4
2	10	5
3	11	6
4	11	7
5	13	8
6	15	23
7	16	24
8	17	24
9	18	25
10	19	26
11	27	30
12	28	31
13	28	32
14	30	33
15	32	48
16	33	49
17	34	49
18	35	50
19	36	51
20	44	55
21	45	56
22	45	57
23	47	58
24	49	73
25	50	74
26	51	74
27	52	75
28	53	76
29	61	80
30	62	81
31	62	82
32	64	83
33	66	98
34	67	99
35	68	99
36	69	100
37	70	101
38	78	105
39	79	106
40	79	107
41	81	108
42	83	123
43	84	124
44	85	124
45	86	125
46	87	126
47	95	130
48	96	131
49	96	132
50	98	133
51	100	148
52	101	149
53	102	149
54	103	150
55	104	151
56	112	155
57	113	156
58	113	157
59	115	158
60	117	173
61	118	174
62	119	174
63	120	175
64	121	176
65	129	177
66	130	178
67	130	179
68	132	180
69	134	195
70	135	196
71	136	196
72	137	197
73	138	198
74	146	202
75	147	203
76	147	204
77	149	205
78	151	220
79	152	221
80	153	221
81	154	222
82	155	223
83	163	224
84	164	225
85	164	226
86	166	227
87	168	242
88	169	243
89	170	243
90	171	244
91	172	245
\.


--
-- Name: cuisines_restaurants_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('cuisines_restaurants_id_seq', 91, true);


--
-- Data for Name: likes; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY likes (id, answer, restaurant_id, user_id) FROM stdin;
\.


--
-- Name: likes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('likes_id_seq', 128, true);


--
-- Data for Name: prices; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY prices (id, level) FROM stdin;
\.


--
-- Name: prices_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('prices_id_seq', 100, true);


--
-- Data for Name: restaurants; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY restaurants (id, name, address, phone, price, vegie, opentime, closetime) FROM stdin;
\.


--
-- Name: restaurants_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('restaurants_id_seq', 248, true);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY users (id, username, password, vegie, admin) FROM stdin;
136	hjh	jhhh	0	0
137	Abeer	abeer	0	0
138	abeer	abeer	0	0
139	Abeer	abeer	0	0
140	Jill	epicodsu	0	0
141	epicodus	epicodus	0	0
142	dscASD	xzczxs	0	0
143	Abeer&Jill	xczcds	0	0
144	Jill1	lulj	0	0
145	dhvaihus	xscAS	0	0
146	sdaesdel	zXASdA	0	0
147	hello	lksdjf	0	0
148	drtd	adsa	0	0
149	Jill4	sdf	0	0
150	Jill5	hello	0	0
151	Patrick	hello	0	0
152		cz	0	0
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('users_id_seq', 152, true);


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

