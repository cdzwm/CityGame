<?php 
require_once (dirname(__FILE__) . "/../include/common.php");


class City extends BaseModel {

    public function __construcor() {
    }

    public function setCityTaxRate($cid, $tax_rate) {
        $sql = "udpate cites set tax_rate = $tax_rate where id = $cid";
        $this->query($sql);
    }

}