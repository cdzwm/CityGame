<?php


require_once(dirname(__FILE__) . "/../include/common.php");

echo "Test Question1:\n";


$pc = new PlayerController();


//add city
$pc->addCityOnMap(1, 1, 100, 100);

//get player information
echo print_r($mgr->getPlayeyCityInfo(1));

//update tax rate 
$mgr->setCityTaxRate(1, 0.3);
echo print_r($mgr->getCityInfo(1));

$mgr->setCapital(1, 1);

echo print_r($mgr->getPlayeyCityInfo(1));



