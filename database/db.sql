/**
 * TODO: move the gold and food stuff to a new table city_resources something like
 */

drop database if exists citygame;
create database if not exists citygame;
use citygame;


create table if not exists players(
        id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY, 
        player_name varchar(64),
        capital_city_id INTEGER(11),
        created_at INTEGER(11)(11),
        updated_at INTEGER(11)(11));

create table if not exists cities(
   id INTEGER(11)EGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    player_id INTEGER(11), city_name varchar(64),
    food INTEGER(11),
    gold INTEGER(11),
    tax_rate float,
    captil_flag INTEGER(11),
    people_count INTEGER(11)(11),
    cor_x, INTEGER DEFAULT '-1',
    cor_y , INTEGER DEFAULT '-1',
    created_at INTEGER(11),
    updated_at INTEGER(11));

