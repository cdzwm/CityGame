<?php
require_once ("../include/common.php");
require_once("../model/city.php");



class CityControler {

    protected $model; 

    public function __construcor() {
        $model = new City();
    }

	public function addCity($player_id, $city_id, $city_x, $city_y){
        return $model->addCity($player_id, $city_id, $city_x, $city_y);
	}

    public function getCity($city_id) {
        return $model->getCity($city_id);
    }

    public function setCityTaxRate($city_id, $tax_rate){
        return $model->setCityTaxRate($city_id, $tax_rate);
    }
     
    public updateCity($city_id) {
        udpate        
    }

   
}
