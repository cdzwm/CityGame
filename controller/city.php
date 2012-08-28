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

    /**
     * NOTE: not really clear about the order, it's automatically or manully, so just put it here as param 
     */      
    public function createSoldiers($cid, $amount, $type, $order) {  
        $this->model->createSoldiers($cid, $amount, $type, $order);
    }
 
    public function cancelSoldiers($cid, $sid) {
        $this->model->cancelSoldiers($cid, $sid);
    }

}
