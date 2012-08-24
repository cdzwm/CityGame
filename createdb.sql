drop database if exists citygame;
create database if not exists citygame;
use citygame;
create table if not exists object(tbl_name varchar(255), object_id int);
create unique index idx_tbl_name on object(tbl_name); 

create table if not exists resource_type(id int not null, name varchar(64));
create unique index idx_resource_type_id on resource_type(id);

create table if not exists land( id int not null, x int, y int, width int, height int);
create unique index idx_land_id on land( id);

create table if not exists city_resource( id int not null, resource_type_id int, resource_amount int);
create unique index idx_city_resource_id on city_resource(id);

create table if not exists player(id int not null, name varchar(64), capital_city_id int);
create unique index idx_player_id on player(id);

create table if not exists city( id int not null, player_id int, name varchar(64), food int, gold int, tax_rate float, captil_flag int, land_id int);
create unique index idx_city_id on city(id);

insert into object values("resource_type", 1);
insert into object values("land", 1);
insert into object values("city_resource", 1);
insert into object values("player", 1);
insert into object values("city", 1);
