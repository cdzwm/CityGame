<?php


require_once('citygame.php'); 

echo "Test Question1:\n"

$mgr = new GameManager(); 




// x: 100 y:100, city:1 player:1
//add city
$mgr->addCity(1, 1, 100, 100);

//get player information
echo print_r($mgr->getPlayeyCityInfo(1));

//update tax rate 
$mgr->setCityTaxRate(1, 0.3);
echo print_r($mgr->getCityInfo(1));

$mgr->setCapital(1, 1);

echo print_r($mgr0>getPlayeyCityInfo(1));



