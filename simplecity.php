<?php

class City {
	function City(){
	}
}

class GameObjectManager{
	function GameObjectManager(){
	}

	function getObjectIdByTableName($tbl_name){
		var $sql_stmt = "select * from object where name = '$tbl_name'";
	}

	function addCity($player_id, $city_id, $city_x, $city_y){
	}

	function getPlayeyCityInfo($player_id){
	}

	function setCityTaxRate($city_id, $tax_rate){
	}
	
	function setCapital($player_id, $city_id){
	}
	
	function update($dt){
		updateTax($dt);
		updateGold($dt);
		updateFood($dt);
	}

	function updateTax( $dt ){
	}

	function updateGold( $dt ){
	}

	function updateFood( $dt ){
	}
}

class Player{
	function Player(){
	}
}
?>
