/**
 * TODO: move the gold and food stuff to a new table city_resources something like
 */

/**
 * TODO: move the gold and food stuff to a new table city_resources something like
 */

drop database if exists citygame;
create database if not exists citygame;
use citygame;


create table if not exists players(
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY, 
        player_name varchar(64),
        capital_city_id int(11),
        created_at int(11),
        updated_at int(11));

create table if not exists cities(
   id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    player_id int(11), city_name varchar(64),
    food int(11),
    gold int(11),
    state int(11) default '0',
    tax_rate float,
    capital_flag int(11),
    people_count int(11),
    cor_x int DEFAULT '-1',
    cor_y  int DEFAULT '-1',
    created_at int(11),
    updated_at int(11));

create table if not exists soldiers(
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  city_id int(11),
  soldier_type int(11), /*BETTER: use table for this*/
  amount int(11),
  moving_speed  decimal(8,1),
  state int(11) default '0', /* traing or awaiting  or done*/ 
  train_order int(11),
  created_at int(11),
  updated_at int(11));

create table if not exists attack_city(
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  from_city_id int(11),
  to_city_id int(11), 
  started_time int(11), 
  moving_speed decimal(8,1),
  start_x int(11), 
  start_y ont(11), 
  tartet_x int(11), 
  target_y int(11),
  currrnt_x int(11),
  current_y int(11),
  target_time int(11),
);
