drop schema if exists h2;
create schema h2;
use h2;

-- 0 = aplikanti, 1 = kompanije

create table users(
	id int primary key not null auto_increment,
	type int not null, 
	name varchar(128) not null,
	email varchar(128) not null,
	description varchar(16384) not null,
	tags varchar(1024) not null
) engine = InnoDB;

