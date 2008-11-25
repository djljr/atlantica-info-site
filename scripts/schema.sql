drop table if exists user;
drop table if exists news;
drop table if exists article;
drop table if exists mercenary;

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
	name varchar(50) primary key not null,
	str integer,
	dex integer,
	def integer,
	int integer,
	vit integer,
	mdef integer
);