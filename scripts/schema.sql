drop table if exists user;
drop table if exists news;
drop table if exists article;
drop table if exists mercenary;
drop table if exists mercenary_group;
drop table if exists resource;
drop table if exists craftable;
drop table if exists skill;
drop table if exists resource_category;
drop table if exists formula;
drop table if exists calendar_event;

create table user (
	id serial,
	username varchar(32),
	password varchar(20)
);

create index "ix_user" on "user" ("id");

create table news (
	id serial,
	title varchar(100),
	content longtext,
	created_date timestamp
);

create table article (
	id serial,
	title varchar(100),
	content longtext,
	created_date timestamp
);

create table mercenary (
	id varchar(50) primary key not null,
	name varchar(50),
	str integer,
	dex integer,
	def integer,
	int integer,
	vit integer,
	mdef integer,
	base varchar(50) references mercenary(id),
	"group" varchar(50) references mercenary_group(id)
);

create table mercenary_group (
	id varchar(50),
	name varchar(50)
);

create table resource (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name varchar(100),
	fixedprice integer,
	category varchar(50) references resource_category(name),
	craftable boolean,
	craftable_id integer references craftable(id)
);
create unique index "ix_resource" on "resource" ("name");

create table resource_category (
	id varchar(50) primary key not null,
	name varchar(50)
);

create table craftable (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name varchar(100),
	skill varchar(50) references skill(name),
	experience integer,
	level integer,
	batch integer,
	workload integer,
	category varchar(50) references resource_category(name)
);

create table formula (
	craftable_id int references craftable(id),
	resource_id int references resource(id),
	amount int
);
create index "ix_formula_craftable_id_resource_id" on formula ("craftable_id", "resource_id");

create table skill (
	id varchar(50) primary key not null,
	name varchar(50) 
);

create table calendar_event (
	id integer primary key autoincrement,
	timestamp long,
	title varchar(30),
	category varchar(30),
	symbol integer,
	description text
);