drop table if exists user;
drop table if exists news;
drop table if exists article;
drop table if exists mercenary;
drop table if exists mercenary_group;
drop table if exists resource;
drop table if exists craftable;
drop table if exists skill;

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
	name varchar(50),
	fixedprice integer,
	category varchar(50) references resource_category(name)
);
create unique index "ix_resource" on "resource" ("name");

create table resource_category (
	id varchar(50) primary key not null,
	name varchar(50)
);

create table craftable (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name varchar(50),
	skill varchar(50) references skill(name),
	experience integer,
	minlevel integer,
	batchsize integer,
	workload integer
);

create table skill (
	id varchar(50) primary key not null,
	name varchar(50) 
);