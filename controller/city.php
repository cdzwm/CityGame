<?php

require_once (dirname(__FILE__) ."/../include/common.php");

class CityControler  extends BaseController {

    protected $model; 

    public function __construcor() {
        $model = new City();
    }

    public function setCityTaxRate($city_id, $tax_rate){
        return $model->setCityTaxRate($city_id, $tax_rate);
    }
    
}
