<?php

//put global vars here
define("NORMAL_TAX_RATE", 0.2);
define("CAPITAL_TAX_RATE", 0.3); //  maybe ? 
define("CAPITAL_FOOD_SPEED", 10000);
define("NORMAL_FOOD_SPEED", 1000);
define("NORMAL_GOLD_SPEED", 100); // maybe? 

set_include_path(get_include_path() . ':' . dirname(dirname(__FILE__)));




/**
 * DEMO ONLY : just simple require all files the system needd. (need improve)
 */

require_once ("controller/base.php");
require_once ("controller/player.php");
require_once ("controller/city.php");
require_once ("controller/system.php");

require_once("model/base.php");
require_once ("model/player.php");
require_once ("model/city.php");
require_once ("model/system.php");






