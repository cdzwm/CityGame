<?php 
require_once (dirname(__FILE__) . "/../include/common.php");


class City extends BaseModel {

    public function __construcor() {
    }

    public function setCityTaxRate($cid, $tax_rate) {
        $sql = "udpate cites set tax_rate = $tax_rate where id = $cid";
        $this->query($sql);
    }

    public function getCityInfo($cid) {
        return $this->query("select * from cites where id = $cid");
    }

    public function createSoldiers($cid $amount, $type,$order,$state = 0) {
        $now  = time();

        //state 0: default , 1: traing 
        $arsqls[] = " insert into soldiers (city_id,soldier_type, amount, state, train_order, created_at, updated_at)  values($cid,$type, $amount ,1, $order, $now, $now);";
        if ($state == 1)  //start train , should change the people count 
            $arsqls[] = "update cites set people_count = people_count - $amount where id = $cid";
        
        $this->trans($arsqls);
    }
    
    public function cancelSoldiers($cid , $sid) {
        $sql = "DELETE FROM soldiers where city_id = $cid and id = $sid"; 
        $this->trans($sql);
    }

    public function getDiastance($from_id ,$to_id) {
        $city1 = $this->getCityInfo($from_id); 
        $city2 = $this->getCityInfo($to_id); 
        
        return sqrt(pow($city2->cor_x - $city1->cor_x, 2) + pow( $city2->cor_y - $city1->cor_y,2));
    }

}