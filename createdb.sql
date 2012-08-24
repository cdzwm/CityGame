drop table object;
drop table resource_type;
drop table land;
drop table city_resource;
drop table player;
drop table city;

create table object(tbl_name varchar(255), object_id int);
create unique index idx_tbl_name on object(tbl_name); 

create table resource_type(id int, name varchar(64));
create unique index idx_resource_type_id on resource_type(id);

create table land( id int, x int, y int, width int, height int);
create unique index idx_land_id on land( id);

create table city_resource( id int, resource_type_id int, resource_amount int);
create unique index idx_city_resource_id on city_resource(id);

create table player(id int, name varchar(64), capital_city_id int);
create unique index idx_player_id on player(id);

create table city( id int, player_id int, name varchar(64), food int, gold int, tax_rate float, captil_flag int, land_id int);
create unique index idx_city_id on city(id);

insert into object values("resource_type", 1);
insert into object values("land", 1);
insert into object values("city_resource", 1);
insert into object values("player", 1);
insert into object values("city", 1);
