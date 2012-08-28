<?php

class GameObjectManager{
	private static $gom;
	
	private $dbc;
	private $dbname, $dbuser, $dbpassword, $dbserver, $dbport;

	private function GameObjectManager(){
		$this->setDatabaseParm();
	}

	function setDatabaseParm($dbuser="root", $dbpassword="", $dbname = "citygame", $dbserver="localhost", $dbport = "3306"){

		$this->dbname = $dbname;
		$this->dbuser = $dbuser;
		$this->dbpassword = $dbpassword;
		$this->dbserver = $dbserver;
		$this->dbport = $dbport;
	}

	public function connect(){
		$this->dbc = mysql_connect($this->dbserver . ":" . $this->dbport, $this->dbuser, $this->dbpassword);
		if( !$this->dbc )
			return false;

		if( !mysql_select_db($this->dbname, $this->dbc)){
			return false;
		}
		
		return true;
	}

	public static function getInstance(){
		if( !isset(self::$gom)){
			self::$gom = new GameObjectManager();
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
?>
