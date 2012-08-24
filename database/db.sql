drop database if exists citygame;
create database if not exists citygame;
use citygame;


create table if not exists resource_types(id int not null, name varchar(64));
create unique index idx_resource_type_id on resource_type(id);

create table if not exists lands( id int not null, x int, y int, width int, height int);
create unique index idx_land_id on land( id);

create table if not exists city_resources( id int not null, resource_type_id int, resource_amount int);
create unique index idx_city_resource_id on city_resource(id);

create table if not exists players(id int, name varchar(64), capital_city_id int, created_at int(11), updated_at int(11));
create unique index idx_player_id on player(id);

create table if not exists cities( id int, player_id int, name varchar(64), food int, gold int, tax_rate float, captil_flag int, land_id int, created_at int(11), updated_at int(11));

create unique index idx_city_id on city(id);
