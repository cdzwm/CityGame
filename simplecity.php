<?php

class City {
	function City(){
	}
}

class GameObjectManager{
	private static $gom;
	private function GameObjectManager(){
	}

	public static function getInstance(){
		if( !isset(self::$gom)){
			self::$gom = new GameObjectManager();
			echo "Create GameObjecManager instance.";
		}

		return self::$gom;
	}

	function getObjectIdByTableName($tbl_name){
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

$gom = GameObjectManager::getInstance();
?>
