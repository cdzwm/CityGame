drop database if exists citygame;
create database if not exists citygame;
use citygame;


create table if not exists resource_type(id int not null, name varchar(64));
create unique index idx_resource_type_id on resource_type(id);

create table if not exists land( id int not null, x int, y int, width int, height int);
create unique index idx_land_id on land( id);

create table if not exists city_resource( id int not null, resource_type_id int, resource_amount int);
create unique index idx_city_resource_id on city_resource(id);

create table if not exists player(id int, name varchar(64), capital_city_id int, created_at int(11));
create unique index idx_player_id on player(id);

create table if not exists city( id int, player_id int, name varchar(64), food int, gold int, tax_rate float, captil_flag int, land_id int, created_at int(11));

create unique index idx_city_id on city(id);

insert into land (1, 0, 0 , 1000, 1000);
insert into player(1, "Player1", 0, UNIX_TIMESTAMP(now()));
insert into city(1, 1, "City1", 0, 0, 0.2, 0, 1, UNIX_TIMESTAMP(now()));
