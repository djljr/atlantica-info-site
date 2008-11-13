drop table user;

create table user (
	id integer not null primary key autoincrement,
	username varchar(32),
	password varchar(20)
);

create index "ix_user" on "user" ("id");