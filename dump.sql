--
-- PostgreSQL database dump
--

-- Dumped from database version 17.2 (Debian 17.2-1.pgdg120+1)
-- Dumped by pg_dump version 17.2 (Debian 17.2-1.pgdg120+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: artists; Type: TABLE; Schema: public; Owner: sail
--

CREATE TABLE public.artists (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    description text,
    image json,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.artists OWNER TO sail;

--
-- Name: artists_id_seq; Type: SEQUENCE; Schema: public; Owner: sail
--

CREATE SEQUENCE public.artists_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.artists_id_seq OWNER TO sail;

--
-- Name: artists_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sail
--

ALTER SEQUENCE public.artists_id_seq OWNED BY public.artists.id;


--
-- Name: artworks; Type: TABLE; Schema: public; Owner: sail
--

CREATE TABLE public.artworks (
    id bigint NOT NULL,
    artist_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    description text,
    images json,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.artworks OWNER TO sail;

--
-- Name: artworks_id_seq; Type: SEQUENCE; Schema: public; Owner: sail
--

CREATE SEQUENCE public.artworks_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.artworks_id_seq OWNER TO sail;

--
-- Name: artworks_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sail
--

ALTER SEQUENCE public.artworks_id_seq OWNED BY public.artworks.id;


--
-- Name: cache; Type: TABLE; Schema: public; Owner: sail
--

CREATE TABLE public.cache (
    key character varying(255) NOT NULL,
    value text NOT NULL,
    expiration integer NOT NULL
);


ALTER TABLE public.cache OWNER TO sail;

--
-- Name: cache_locks; Type: TABLE; Schema: public; Owner: sail
--

CREATE TABLE public.cache_locks (
    key character varying(255) NOT NULL,
    owner character varying(255) NOT NULL,
    expiration integer NOT NULL
);


ALTER TABLE public.cache_locks OWNER TO sail;

--
-- Name: exhibitions; Type: TABLE; Schema: public; Owner: sail
--

CREATE TABLE public.exhibitions (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    author_name character varying(255),
    author_description text,
    description text,
    image character varying(255),
    start_date date,
    end_date date,
    is_active boolean DEFAULT false NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    year character varying(255),
    banner character varying(255),
    summary text,
    sort integer DEFAULT 0 NOT NULL,
    gallery json
);


ALTER TABLE public.exhibitions OWNER TO sail;

--
-- Name: exhibitions_id_seq; Type: SEQUENCE; Schema: public; Owner: sail
--

CREATE SEQUENCE public.exhibitions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.exhibitions_id_seq OWNER TO sail;

--
-- Name: exhibitions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sail
--

ALTER SEQUENCE public.exhibitions_id_seq OWNED BY public.exhibitions.id;


--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: sail
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO sail;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: sail
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.failed_jobs_id_seq OWNER TO sail;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sail
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: galleries; Type: TABLE; Schema: public; Owner: sail
--

CREATE TABLE public.galleries (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    image character varying(255) NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.galleries OWNER TO sail;

--
-- Name: galleries_id_seq; Type: SEQUENCE; Schema: public; Owner: sail
--

CREATE SEQUENCE public.galleries_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.galleries_id_seq OWNER TO sail;

--
-- Name: galleries_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sail
--

ALTER SEQUENCE public.galleries_id_seq OWNED BY public.galleries.id;


--
-- Name: job_batches; Type: TABLE; Schema: public; Owner: sail
--

CREATE TABLE public.job_batches (
    id character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    total_jobs integer NOT NULL,
    pending_jobs integer NOT NULL,
    failed_jobs integer NOT NULL,
    failed_job_ids text NOT NULL,
    options text,
    cancelled_at integer,
    created_at integer NOT NULL,
    finished_at integer
);


ALTER TABLE public.job_batches OWNER TO sail;

--
-- Name: jobs; Type: TABLE; Schema: public; Owner: sail
--

CREATE TABLE public.jobs (
    id bigint NOT NULL,
    queue character varying(255) NOT NULL,
    payload text NOT NULL,
    attempts smallint NOT NULL,
    reserved_at integer,
    available_at integer NOT NULL,
    created_at integer NOT NULL
);


ALTER TABLE public.jobs OWNER TO sail;

--
-- Name: jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: sail
--

CREATE SEQUENCE public.jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.jobs_id_seq OWNER TO sail;

--
-- Name: jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sail
--

ALTER SEQUENCE public.jobs_id_seq OWNED BY public.jobs.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: sail
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO sail;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: sail
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.migrations_id_seq OWNER TO sail;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sail
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: noticies; Type: TABLE; Schema: public; Owner: sail
--

CREATE TABLE public.noticies (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    author_name character varying(255),
    content text,
    image character varying(255),
    is_active boolean DEFAULT false NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    summary character varying(255),
    url character varying(255)
);


ALTER TABLE public.noticies OWNER TO sail;

--
-- Name: noticies_id_seq; Type: SEQUENCE; Schema: public; Owner: sail
--

CREATE SEQUENCE public.noticies_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.noticies_id_seq OWNER TO sail;

--
-- Name: noticies_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sail
--

ALTER SEQUENCE public.noticies_id_seq OWNED BY public.noticies.id;


--
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: sail
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_reset_tokens OWNER TO sail;

--
-- Name: sessions; Type: TABLE; Schema: public; Owner: sail
--

CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);


ALTER TABLE public.sessions OWNER TO sail;

--
-- Name: users; Type: TABLE; Schema: public; Owner: sail
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO sail;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: sail
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_seq OWNER TO sail;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sail
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: artists id; Type: DEFAULT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.artists ALTER COLUMN id SET DEFAULT nextval('public.artists_id_seq'::regclass);


--
-- Name: artworks id; Type: DEFAULT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.artworks ALTER COLUMN id SET DEFAULT nextval('public.artworks_id_seq'::regclass);


--
-- Name: exhibitions id; Type: DEFAULT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.exhibitions ALTER COLUMN id SET DEFAULT nextval('public.exhibitions_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: galleries id; Type: DEFAULT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.galleries ALTER COLUMN id SET DEFAULT nextval('public.galleries_id_seq'::regclass);


--
-- Name: jobs id; Type: DEFAULT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.jobs ALTER COLUMN id SET DEFAULT nextval('public.jobs_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: noticies id; Type: DEFAULT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.noticies ALTER COLUMN id SET DEFAULT nextval('public.noticies_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: artists; Type: TABLE DATA; Schema: public; Owner: sail
--

COPY public.artists (id, name, description, image, deleted_at, created_at, updated_at) FROM stdin;
1	Angelo Pastorello	Angelo Pastorello\n	["artists\\/01JPBA9KZTTAVWMHR6V5W8AK9B.jpg","artists\\/01JPBA9KZZN4YB2FE5N9MMRX94.jpg","artists\\/01JPBA9M039H7DXGQJAC11XHDR.jpg","artists\\/01JPBA9M05YKJ9TMWDH89KDPET.JPG","artists\\/01JPBA9M09WCSB3ZGEHMT9N1BG.JPG","artists\\/01JPBA9M0DGJRDR37Z48N9BVRC.jpg","artists\\/01JPBA9M0HPRC985T85HPQB707.JPG","artists\\/01JPBA9M0M7R83VHXJYY1SPXK5.jpg","artists\\/01JPBA9M0R42MYJZRHEXBZSECV.jpg","artists\\/01JPBA9M0WAEG4RNB39436F6JH.jpg"]	2025-04-01 20:55:56	2025-03-14 21:52:18	2025-04-01 20:55:56
2	Antonio Saggese	Antonio Saggese	["artists\\/01JPBADXPNQW9F8V3NDWCW56QD.jpg","artists\\/01JPBADXPSBGT42KWXWZZHHVTY.jpg","artists\\/01JPBADXQ2ZY2DZBMAWBHP216H.jpg","artists\\/01JPBADXQ953B6GH7FBT7P2J3K.JPG","artists\\/01JPBADXQH941J0ECEXXC83ZPT.jpg","artists\\/01JPBADXQMHX5Q4CA16S9F4N2R.jpg","artists\\/01JPBADXQQVQ47HR553GE8G1VJ.jpg","artists\\/01JPBADXQWQSTRVB5PDJ0C2EP4.jpg","artists\\/01JPBADXR4QP4Q7W1GDH3F452Z.jpg","artists\\/01JPBADXR8R5WT6GD34AKX8H39.jpg","artists\\/01JPBADXRGEWZ53YJ905RDEK9B.jpg"]	2025-04-01 20:55:56	2025-03-14 21:54:39	2025-04-01 20:55:56
3	Angelo Pastorello	Angelo Pastorello é fotógrafo cuja prática se estende por enfoques e temáticas\nabrangentes. Sua trajetória iniciou-se aos 14 anos, quando descobriu as\npossibilidades técnicas e estéticas do laboratório fotográfico. Essa experiência\ninicial, centrada na revelação e ampliação de imagens, consolidou a base\nfundamental para seu desenvolvimento posterior na fotografia.\nAlém de trabalhar como laboratorista na Fuji Filmes do Brasil e como assistente\nno estúdio Forster & Brehm, Pastorello também colaborou profissionalmente em\nrevistas de grande circulação no Brasil como Casa Vogue, Playboy, Vip, entre\noutras, e demonstrou sua capacidade de integrar luz natural e artificial em\ncomposições harmoniosas. Essas experiências impulsionaram o fotógrafo ao\ndesenvolvimento de propostas fotográficas cujas narrativas visuais complexas se\nindividualizavam por abordar a singularidade das interseções entre a arquitetura a\nexperiência humana.\nPastorello enfatiza a importância do conhecimento técnico e da cultura geral na\nprática fotográfica. Para ele, a fotografia é uma “escrita da luz” que exige um\nentendimento profundo das possibilidades técnicas e estéticas. Através de sua\nprática fotográfica, Angelo Pastorello continua a explorar e capturar a essência\ndas histórias humanas e as complexidades do mundo que nos cerca.	[]	\N	2025-04-01 21:01:51	2025-04-01 21:01:51
\.


--
-- Data for Name: artworks; Type: TABLE DATA; Schema: public; Owner: sail
--

COPY public.artworks (id, artist_id, name, description, images, created_at, updated_at, deleted_at) FROM stdin;
1	3	Obra 1	\N	["artworks\\/01JQSJJ5SCC8448S7QXRN02QYF.jpg"]	2025-04-01 21:01:51	2025-04-01 21:01:51	\N
2	3	Obra 2	\N	["artworks\\/01JQSJJ5SHWZNBQ4SHJKMPK7K4.jpg"]	2025-04-01 21:01:51	2025-04-01 21:01:51	\N
3	3	Obra 3	\N	["artworks\\/01JQSJJ5SPX9TWW2GJ67KN84KG.JPG"]	2025-04-01 21:01:51	2025-04-01 21:01:51	\N
4	3	Obra 4	\N	["artworks\\/01JQSJJ5SS1EKBNS6XP0NP8J5J.jpg"]	2025-04-01 21:01:51	2025-04-01 21:01:51	\N
5	3	Obra 5	\N	["artworks\\/01JQSJJ5SXF2SY7Y98J8TGTVTB.JPG"]	2025-04-01 21:01:51	2025-04-01 21:01:51	\N
6	3	Obra 6	\N	["artworks\\/01JQSJJ5T19N1WDT94015R0J6D.jpg"]	2025-04-01 21:01:51	2025-04-01 21:01:51	\N
7	3	Obra 7	\N	["artworks\\/01JQSJJ5T52TK62TPT9K47Z61N.jpg"]	2025-04-01 21:01:51	2025-04-01 21:01:51	\N
8	3	Obra 8	\N	["artworks\\/01JQSJJ5T9CHAXWQ42RW4MB00Z.JPG"]	2025-04-01 21:01:51	2025-04-01 21:01:51	\N
9	3	Obra 9	\N	["artworks\\/01JQSJJ5TCHS93Z0V8T6TVH2NY.jpg"]	2025-04-01 21:01:51	2025-04-01 21:01:51	\N
10	3	Obra 10	\N	["artworks\\/01JQSJJ5TH1CK9Q068KT6WNHHX.jpg"]	2025-04-01 21:01:51	2025-04-01 21:01:51	\N
11	3	Obra 11	\N	["artworks\\/01JQSJJ5TNZ0H29EAFRNH3E165.jpg"]	2025-04-01 21:01:51	2025-04-01 21:01:51	\N
\.


--
-- Data for Name: cache; Type: TABLE DATA; Schema: public; Owner: sail
--

COPY public.cache (key, value, expiration) FROM stdin;
livewire-rate-limiter:8277bae22d70a1e7a58043d5932857a9f92cc444:timer	i:1744376328;	1744376328
livewire-rate-limiter:8277bae22d70a1e7a58043d5932857a9f92cc444	i:2;	1744376328
356a192b7913b04c54574d18c28d46e6395428ab:timer	i:1744379381;	1744379381
356a192b7913b04c54574d18c28d46e6395428ab	i:4;	1744379381
\.


--
-- Data for Name: cache_locks; Type: TABLE DATA; Schema: public; Owner: sail
--

COPY public.cache_locks (key, owner, expiration) FROM stdin;
\.


--
-- Data for Name: exhibitions; Type: TABLE DATA; Schema: public; Owner: sail
--

COPY public.exhibitions (id, title, slug, author_name, author_description, description, image, start_date, end_date, is_active, deleted_at, created_at, updated_at, year, banner, summary, sort, gallery) FROM stdin;
14	Sognarium	sognarium	Helo Mello	<p><strong>Helô Mello</strong>, artista visual, é formada em Comunicação Social na FAAP e MBA com ênfase em Marketing na FIA, Fundação Instituto de Administração.</p><p>Dedica-se à fotografia contemporânea, especialmente à temática do tempo e memória, retomando arquivos anônimos e familiares e paisagens inventadas, temas voltados ao meio ambiente, conflitos e minorias.</p><p>Desenvolve pesquisa experimental na área da fotografia destacando intervenções sejam elas na captura das imagens (negativo de vidro, filmes vencidos, entre outras), manipulações digitais como também no suporte (lixa, colagem, tinta, etc). Incorpora os acasos como estratégia criativa nos seus processos de trabalho artístico.</p><p>Publicou o livro,<em> Sognarium</em>, pela editora <em>Fotô Editorial</em> em 2022 que foi um dos selecionados na convocatória de Fotolivros da revista <em>Zum</em> e da Biblioteca de Fotografia do <em>Instituto Moreira Salles</em> e do <em>Lucie Photo Book Prize Foundation</em> de Los Angeles, EUA. Realizou a exposição individual “<em>Horizonte Suspenso</em>” na Galeria Zipper (2019), com curadoria de Eder Chiodetto. No livro “<em>Imagens – Ocasiões</em>” de George Didi-Huberman, editora<em> Fotô Editorial</em>, estão publicadas duas imagens de suas séries fotográficas.</p><p>Selecionada para a leitura de portfólio durante o <em>V Fórum Latino Americano de São Paulo</em> (2019), expôs na DOC Galeria (2017) com a série “<em>Arqueologia da Não Memória</em>” e teve seu vídeo veiculado no evento “Tiradentes em Pauta” em 2017.</p><p>Em 2022/23 Participou do Curso de <em>Edición fotográfica y narrativa visual avançada Lens Scuela de Artes Visuales</em> (Madri), da residência artística internacional ACHO-Imagens e suas metamorfoses <em>feitiços e fabulações dos arquivos, e</em> grupos de estudos e de leitura no Ateliê Fotô.</p>	\N	uploads/exhibitions/01JRJFGS78WWPGTCK9B7S6ZSYZ.jpg	\N	\N	f	\N	2025-04-11 13:09:40	2025-04-11 13:42:28	\N	uploads/exhibitions/banners/01JRJFGS7D0ZXTHMJ2MADCQD13.png	\N	6	\N
10	Gentes do mundo	gentes-do-mundo	Eduardo el Kobbi	\N	\N	uploads/exhibitions/01JRJF0XW36B3PT4T83XGMDKH4.JPG	\N	\N	f	\N	2025-04-11 13:01:01	2025-04-11 13:28:47	\N	uploads/exhibitions/banners/01JRJF0XW7VD6Y6MKZAJT6C1KK.jpg	\N	10	\N
11	Gigantes por Natureza	gigantes-por-natuerza	Anderson Nielsen	\N	\N	uploads/exhibitions/01JRJF872MHXVF7QRAPFBTNAK0.JPG	\N	\N	f	\N	2025-04-11 13:04:59	2025-04-11 13:28:47	\N	uploads/exhibitions/banners/01JRJF872RDV405YGDHW6NVF4V.JPG	\N	9	\N
12	Antropoloogia da beleza	antrorpologia-da-beleza	Renato Soeares	\N	\N	uploads/exhibitions/01JRJFA3FPEH3Y03XXFF8CEA6W.JPG	\N	\N	f	\N	2025-04-11 13:06:01	2025-04-11 13:28:47	\N	uploads/exhibitions/banners/01JRJFA3FTAFASAP7F1AHRNTHK.png	\N	8	\N
13	Olhares cruzados	olhares-cruzados	Exposição coletiva	<p>Ver de perto. Observar a interseção dos mundos de fotógrafos de diferentes gerações que,</p><p>numa linha de força, se unem. Essa é a ideia da mostra Olhares Cruzados, uma exposição</p><p>coletiva que reúne artistas cujas abordagens variam, mas que juntos formam um</p><p>inventário de múltiplas experiências fotográficas</p>	<p><strong>OLHARES CRUZADOS</strong>, Exposição Coletiva</p><p>Fotógrafos:</p><p>- Antonio Freitas - Christiana Carvalho - Eduardo Kobbi - Gabriel Villas Boas -</p><p>- Mario Cravo Neto - Sheila Oliveira - Valdemir Cunha -</p><p>Ver de perto. Observar a interseção dos mundos de fotógrafos de diferentes gerações que,</p><p>numa linha de força, se unem. Essa é a ideia da mostra Olhares Cruzados, uma exposição</p><p>coletiva que reúne artistas cujas abordagens variam, mas que juntos formam um</p><p>inventário de múltiplas experiências fotográficas.</p><p>O que nos passa despercebido pelas ruas é trazido à luz nos detalhes do olhar de Christiana</p><p>Carvalho, já o que é viso do alto é capturado pela sinestesia de texturas nas fotografias de</p><p>Gabriel Villas Boas. Exploramos a natureza silenciosa na imagem de Antônio Freitas e</p><p>na plástica planície alagada que compõe o livro Vaqueiro das Águas de Valdemir Cunha.</p><p>Conhecemos Gentes do Mundo pela visão de Eduardo Kobbi, e a delicadeza nas reflexões</p><p>de Sheila Oliveira em seu trabalho De Onde Emergem os Nervos.</p><p>O mestre baiano Mario Cravo Neto (1947-2009), nos saúda com imagens da série The</p><p>Eternal Now, onde a potência das fotografias nos afeta como se estivesse viva. Em sua</p><p>trajetória, ele alcançou reconhecimento internacional, suas obras estão em muitas</p><p>coleções de fotografia e de arte contemporânea, tais como as do MoMA, de Nova York,</p><p>do Stedelijk Museum, de Amsterdã e o Museo Reina Sofía, de Madri.</p><p>TRADUÇÃO DO TEXTO DE APRESENTAÇÃO</p><p><strong><em>Crossing Glances</em></strong></p><p><em>To see up close. To observe the intersection of many generations of photographers and</em></p><p><em>their worlds. As if connected by a power line, they become one. This is the idea behind</em></p><p><em>the show Olhares Cruzados, a collective exhibition that brings together artists and their</em></p><p><em>various approaches to photography. When together, they are able to make up a single</em></p><p><em>inventory with multiple photographic experiences.What goes unnoticed on the streets is brought to light with Christiana Carvalho’s</em></p><p><em>attention to detail. What is seen from above is captured by the synesthesia of textures in</em></p><p><em>Gabriel Villas Boas’ photographs. We explore the silent nature with Antônio Freitas’</em></p><p><em>images and with the plastic floodplains that make up the book Vaqueiro das Águas by</em></p><p><em>Valdemir Cunha. We also get to know some People of The World through Eduardo Kobbi’s</em></p><p><em>eyes, and the tender reflections of Sheila Oliveira, in her work De Onde Emergem os</em></p><p><em>Nervos.</em></p><p><em>The Baiano master Mario Cravo Neto (1947-2009) welcomes us with images from his</em></p><p><em>series The Eternal Now, where the potent photographs affect us as if they had come to</em></p><p><em>life. Throughout his career, he achieved international recognition, his works are</em></p><p><em>displayed in many photography and contemporary art permanent collections, such as</em></p><p><em>The MoMA, in New York, Stedelijk Museum, in Amsterdam and Museo Reina Sofía, in</em></p><p><em>Madrid.</em></p>	uploads/exhibitions/01JRJFEN5Q745EFGDZ4EXN23AJ.jpg	\N	\N	f	\N	2025-04-11 13:08:31	2025-04-11 13:28:47	\N	uploads/exhibitions/banners/01JRJFEN5W7P5HY9A5SBAQDRZ6.JPG	<p>Ver de perto. Observar a interseção dos mundos de fotógrafos de diferentes gerações que,</p><p>numa linha de força, se unem. Essa é a ideia da mostra Olhares Cruzados, uma exposição</p><p>coletiva que reúne artistas cujas abordagens variam, mas que juntos formam um</p><p>inventário de múltiplas experiências fotográficas</p>	7	\N
15	Coexistência	coexistencia	Expoosicão coletiva	\N	\N	uploads/exhibitions/01JRJFJGVZSBYY7TJQ9X0H0AT7.jpg	\N	\N	f	\N	2025-04-11 13:10:37	2025-04-11 13:28:47	\N	uploads/exhibitions/banners/01JRJFJGW5EP3FXS8SV7WPQXDS.JPG	\N	5	\N
17	Terra D'água Pantanal	terra-dagua-pantanal	Luciano Candisani	<p>São Paulo, SP, 1950.</p><p>Vive e trabalha em São Paulo, SP.</p><p>Luciano Candisani é fotógrafo que começou a capturar imagens subaquáticas durante sua</p><p>adolescência no litoral, onde vive. Estudante e estagiário no Instituto Oceanográfico da</p><p>Universidade de São Paulo, participou de diversas expedições científicas, documentando</p><p>a vida submarina na Antártica e ganhando destaque por suas imagens inéditas desse</p><p>ambiente. Com o tempo, passou a explorar o mundo em missões fotográficas, registrando</p><p>culturas tradicionais e ecossistemas globais em crônicas visuais da National Geographic,</p><p>onde colabora desde 2000.</p><p>O Pantanal, que ele chama de ‘mar interior’, tornou-se um tema recorrente em sua obra,</p><p>sendo um dos locais onde realizou trabalhos de grande repercussão internacional, como</p><p>o premiado ‘Into the mouth of the caiman’. Em 2019, sua exposição ‘Haenyeo, mulheres</p><p>do mar’ no Museu da Imagem e do Som (MIS) em São Paulo foi aclamada pela crítica,</p><p>apresentando a vida das mergulhadoras da ilha de Jeju.</p><p>Sua obra busca sensibilizar as pessoas para a beleza da natureza e a importância de</p><p>preservar territórios e culturas em risco, equilibrando de forma peculiar arte e</p><p>documento em suas fotografias.</p>	<p>A água molda a paisagem e controla a vida no Pantanal, a maior planície alagável do</p><p>planeta. Durante dez anos percorri esse grande espaço natural em busca de águas claras o</p><p>suficiente para a documentação fotográfica dos seus ecossistemas subaquáticos. Nessa</p><p>jornada, descobri lugares fascinantes e tive a oportunidade de trazer à luz imagens nunca</p><p>vistas dos domínios de jacarés, sucuris, piranhas e ariranhas.</p><p>Porém, enquanto a narrativa visual aqui exposta ganhava corpo, os ambientes diante das</p><p>minhas lentes recebiam cada vez menos água devido ao desmatamento e consequente</p><p>destruição das nascentes dos rios formadores do Pantanal, localizadas nos planaltos ao</p><p>redor – a superfície alagada do bioma já encolheu quase 30% em relação à média histórica</p><p>das cheias.</p><p>Com menos água e secas mais profundas no período de estiagem, em decorrência das</p><p>mudanças climáticas, o Pantanal está criticamente vulnerável ao alastramento de</p><p>incêndios provocados pelo uso inadequado do fogo para manejo de solo. Em 2020, as</p><p>queimadas destruíram quase um terço do bioma. E neste inverno de 2024. Quando se</p><p>espera a maior seca já registrada, o número de focos de incêndio já supera os registrados</p><p>no mesmo período, há quatro anos.</p><p>Terra d’água representa a contribuição para trazer à tona um universo subaquático</p><p>desconhecido e, agora, bastante ameaçado. São fotografias unidas por um fio condutor</p><p>líquido: a água está presente em todas as composições, assim como em tudo o que tem</p><p>vida.</p><p>TRADUÇÃO DO TEXTO DE APRESENTAÇÃO</p><p><strong><em>LAND OF WATER</em></strong>, Luciano Candisani</p><p><em>Water shapes the landscape and controls life in the Pantanal, the largest wetland on the</em></p><p><em>planet. For ten years, I traversed this vast natural space in search of waters clear enough</em></p><p><em>for the photographic documentation of its underwater ecosystems. On this journey, I</em></p><p><em>discovered fascinating places and had the opportunity to bring to light never-before-seen</em></p><p><em>images of the domains of caimans, anacondas, piranhas, and giant otters.However, as this visual narrative took shape, the environments before my lenses received</em></p><p><em>increasingly less water due to deforestation and the subsequent destruction of the</em></p><p><em>headwaters of the rivers that form the Pantanal. Situated on the surrounding plateaus,</em></p><p><em>-</em></p><p><em>the flooded surface on the biome has already shrunk by nearly 30% compared to the</em></p><p><em>historical average of its floods.</em></p><p><em>With reduced water levels and deeper droughts during the dry season, a consequence of</em></p><p><em>climate change, the Pantanal is critically vulnerable to the spread of fires ravaged almost</em></p><p><em>a third of the biome. This winter of 2024 is expected to bring the most severe drought on</em></p><p><em>record, and the number of fire outbreaks has already surpassed those recorded during the</em></p><p><em>same period four years ago.</em></p><p><em>Land of Water is my contribution to illuminate an unknown and now severely threatened</em></p><p><em>underwater universe. These photographs are united by a liquid thread: water is present</em></p><p><em>in all compositions, just as it is in all things that live.</em></p>	uploads/exhibitions/01JRJFXSH9SKH6EN988SZJKX76.png	\N	\N	f	\N	2025-04-11 13:16:47	2025-04-11 13:28:47	2024	uploads/exhibitions/banners/01JRJFXSHGE7XXD4775F2E7SX4.JPG	<p>A água molda a paisagem e controla a vida no Pantanal, a maior planície alagável do</p><p>planeta. Durante dez anos percorri esse grande espaço natural em busca de águas claras o</p><p>suficiente para a documentação fotográfica dos seus ecossistemas subaquáticos. Nessa</p><p>jornada, descobri lugares fascinantes e tive a oportunidade de trazer à luz imagens nunca</p><p>vistas dos domínios de jacarés, sucuris, piranhas e ariranhas.</p>	3	\N
19	Derradeiro	derradeiro	Marcos Alves	\N	\N	uploads/exhibitions/01JRJGAZ5ZPM0ZHXXCDZHP6YBE.jpg	\N	\N	f	\N	2025-04-11 13:23:58	2025-04-11 13:28:47	\N	uploads/exhibitions/banners/01JRJGAZ7MBDETQ0916S2TJ0B4.jpg	\N	1	\N
16	Água	agua	Érico Miller	<p>Érico Hiller é fotógrafo documental há 20 anos. Em 2008, publica seu primeiro grande projeto autoral intitulado EMERGENTES, sobre as tensões sociais e ambientais em países como Argentina, Brasil, China, Índia, México e Rússia. Entre 2011 e 2012 esteve no Ártico, Monte Kilimanjaro, Etiópia, Maldivas e Mata Atlântica retratando regiões afetadas pela presença destrutiva humana para seu livro AMEAÇADOS. Em 2016 lança um trabalho que alcança um amplo interesse de público e da mídia internacional, A JORNADA DO RINOCERONTE, um manifesto moderno sobre a caça ilegal dos rinocerontes na África e na Ásia. Em A MARCHA DO SAL (2018) Érico caminhou o trajeto de 400km que Mahatma Gandhi percorreu na Índia em 1930 de Ahmedabad até a praia de Dandi.</p><p>Érico já exibiu suas fotos em exposições individuais para um grande público em locais como Museu do Amanhã, Museu da Casa Brasileira, Casa Bandeirista e Leica Gallery. Suas fotografias já foram veiculadas nas revistas National Geographic, Marie Claire e Rolling Stone, entre outras publicações. Érico produz artesanalmente suas impressões fine art para coleções e instituições e apresenta suas estórias em palestras para empresas, escolas, universidades e diversos canais de comunicação.</p><p>Em 2020 lança durante a pandemia seu aguardado mega-projeto ÁGUA, cujas fotografias mostram um panorama da luta de diversos povos em busca por água limpa para sobreviver em países como Bangladesh, Bolívia, Jordânia e Quênia; Essas fotografias são expostas ao público pela primeira vez agora na Galeria Kobbi em São Paulo. ÁGUA apresenta um testemunho de um fotógrafo humanitário que documentou em profundidade importantes aspectos da nossa sociedade no século 21.</p>	\N	uploads/exhibitions/01JRJFRVGC84AJHP8D4TGF518V.jpg	\N	\N	f	\N	2025-04-11 13:14:05	2025-04-11 13:43:20	\N	uploads/exhibitions/banners/01JRJFRVGJSCWCDKQQE4199JDA.jpg	\N	4	\N
18	Ipuã - Pisagens e Marinhas	ipua-paisagens-e-marinhas	Antonio Saggese	<h2>What is Lorem Ipsum?</h2><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><h2>Why do we use it?</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p><br></p>	<h2>What is Lorem Ipsum?</h2><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><h2>Why do we use it?</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p><br></p><h2>Where does it come from?</h2><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p><p><br></p>	uploads/exhibitions/01JRJG01T8836THCYY2WHYEF47.jpg	\N	\N	f	\N	2025-04-11 13:18:01	2025-04-11 14:13:06	\N	uploads/exhibitions/banners/01JRJG01TC38894MM58GT192C5.jpg	\N	2	[{"image":"uploads\\/exhibitions\\/gallery\\/01JRJHS06SVMFQ947B0FEWEZDD.JPG","caption":null},{"image":"uploads\\/exhibitions\\/gallery\\/01JRJHS081XSBVER6QPWSV7XVX.JPG","caption":null},{"image":"uploads\\/exhibitions\\/gallery\\/01JRJHS0A0Q7DEPSPG82YNM6RY.JPG","caption":null},{"image":"uploads\\/exhibitions\\/gallery\\/01JRJHS0BZ4X1AQVRVQCRQX2KQ.JPG","caption":null}]
\.


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: sail
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Data for Name: galleries; Type: TABLE DATA; Schema: public; Owner: sail
--

COPY public.galleries (id, name, image, deleted_at, created_at, updated_at) FROM stdin;
1	Imagem 1	01JPATQFGSMYM9G9NMY5V66Q02.webp	\N	2025-03-14 17:20:15	2025-03-14 17:20:15
2	Imagem 2	01JPATQWN0K2MAW62E3NM4APYT.webp	\N	2025-03-14 17:20:28	2025-03-14 17:20:28
4	Imagem 4	01JPB85QVPD39ZH38JWPSP65KH.webp	2025-03-20 20:08:18	2025-03-14 21:15:14	2025-03-20 20:08:18
3	Imagem 3	01JPATRRJDDA7YA6HY3QXB1CA3.webp	2025-03-20 20:08:28	2025-03-14 17:20:57	2025-03-20 20:08:28
\.


--
-- Data for Name: job_batches; Type: TABLE DATA; Schema: public; Owner: sail
--

COPY public.job_batches (id, name, total_jobs, pending_jobs, failed_jobs, failed_job_ids, options, cancelled_at, created_at, finished_at) FROM stdin;
\.


--
-- Data for Name: jobs; Type: TABLE DATA; Schema: public; Owner: sail
--

COPY public.jobs (id, queue, payload, attempts, reserved_at, available_at, created_at) FROM stdin;
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: sail
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	0001_01_01_000000_create_users_table	1
2	0001_01_01_000001_create_cache_table	1
3	0001_01_01_000002_create_jobs_table	1
5	2025_01_26_175923_create_exhibitions_table	2
6	2025_03_11_033817_add_year_exhibitions	3
8	2025_03_14_010835_create_noticies_table	4
9	2025_03_14_125855_add_summary_on_noticies_table	5
10	2025_03_14_171355_create_galleries_table	6
11	2025_03_14_214303_create_artists_table	7
12	2025_03_25_204025_add_banner_and_summary_column_in_exhibiton	8
14	2025_03_25_205028_alter_description_exhbitions_table	9
15	2025_03_26_143818_add_sort_column_in_exhibitions	10
16	2025_04_01_205326_create_artworks_table	11
17	2025_04_10_224426_add_gallery_to_exhibitions_table	12
18	2025_04_11_134645_add_url_in_notice_table	13
\.


--
-- Data for Name: noticies; Type: TABLE DATA; Schema: public; Owner: sail
--

COPY public.noticies (id, title, slug, author_name, content, image, is_active, deleted_at, created_at, updated_at, summary, url) FROM stdin;
\.


--
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: sail
--

COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: sail
--

COPY public.sessions (id, user_id, ip_address, user_agent, payload, last_activity) FROM stdin;
B17QuErWnXg10iJidKS5sA8vUSlbw6Tzq10wDVwY	1	172.20.0.1	Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36	YTo3OntzOjY6Il90b2tlbiI7czo0MDoidWZVaG5FbjlPRnI3VklwVGpGOU5JcWZKMEpVWHJJS1pOcnZwVlVySyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI5OiJodHRwOi8vbG9jYWxob3N0Ojg2MDAvY29udGF0byI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiROd3ZTVVdQUEpaT0x4YlNDTWNlNDVlMllSZnZYRUZaQ1R6R2dpVHhDOEI5ZmpxZmdkSXgvTyI7czo4OiJmaWxhbWVudCI7YTowOnt9fQ==	1744387696
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: sail
--

COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
1	Anders	anders@gmail.com	\N	$2y$12$NwvSUWPPJZOLxbSCMce45e2YRfvXEFZCTzGgiTxC8B9fjqfgdIx/O	\N	2025-01-26 16:33:07	2025-01-26 16:33:07
\.


--
-- Name: artists_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sail
--

SELECT pg_catalog.setval('public.artists_id_seq', 3, true);


--
-- Name: artworks_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sail
--

SELECT pg_catalog.setval('public.artworks_id_seq', 11, true);


--
-- Name: exhibitions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sail
--

SELECT pg_catalog.setval('public.exhibitions_id_seq', 19, true);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sail
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: galleries_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sail
--

SELECT pg_catalog.setval('public.galleries_id_seq', 4, true);


--
-- Name: jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sail
--

SELECT pg_catalog.setval('public.jobs_id_seq', 1, false);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sail
--

SELECT pg_catalog.setval('public.migrations_id_seq', 18, true);


--
-- Name: noticies_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sail
--

SELECT pg_catalog.setval('public.noticies_id_seq', 4, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sail
--

SELECT pg_catalog.setval('public.users_id_seq', 1, true);


--
-- Name: artists artists_pkey; Type: CONSTRAINT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.artists
    ADD CONSTRAINT artists_pkey PRIMARY KEY (id);


--
-- Name: artworks artworks_pkey; Type: CONSTRAINT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.artworks
    ADD CONSTRAINT artworks_pkey PRIMARY KEY (id);


--
-- Name: cache_locks cache_locks_pkey; Type: CONSTRAINT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.cache_locks
    ADD CONSTRAINT cache_locks_pkey PRIMARY KEY (key);


--
-- Name: cache cache_pkey; Type: CONSTRAINT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.cache
    ADD CONSTRAINT cache_pkey PRIMARY KEY (key);


--
-- Name: exhibitions exhibitions_pkey; Type: CONSTRAINT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.exhibitions
    ADD CONSTRAINT exhibitions_pkey PRIMARY KEY (id);


--
-- Name: exhibitions exhibitions_slug_unique; Type: CONSTRAINT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.exhibitions
    ADD CONSTRAINT exhibitions_slug_unique UNIQUE (slug);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- Name: galleries galleries_pkey; Type: CONSTRAINT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.galleries
    ADD CONSTRAINT galleries_pkey PRIMARY KEY (id);


--
-- Name: job_batches job_batches_pkey; Type: CONSTRAINT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.job_batches
    ADD CONSTRAINT job_batches_pkey PRIMARY KEY (id);


--
-- Name: jobs jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: noticies noticies_pkey; Type: CONSTRAINT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.noticies
    ADD CONSTRAINT noticies_pkey PRIMARY KEY (id);


--
-- Name: noticies noticies_slug_unique; Type: CONSTRAINT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.noticies
    ADD CONSTRAINT noticies_slug_unique UNIQUE (slug);


--
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- Name: sessions sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: jobs_queue_index; Type: INDEX; Schema: public; Owner: sail
--

CREATE INDEX jobs_queue_index ON public.jobs USING btree (queue);


--
-- Name: sessions_last_activity_index; Type: INDEX; Schema: public; Owner: sail
--

CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);


--
-- Name: sessions_user_id_index; Type: INDEX; Schema: public; Owner: sail
--

CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);


--
-- Name: artworks artworks_artist_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: sail
--

ALTER TABLE ONLY public.artworks
    ADD CONSTRAINT artworks_artist_id_foreign FOREIGN KEY (artist_id) REFERENCES public.artists(id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

