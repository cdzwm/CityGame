<?php

require_once (dirname(__FILE__) . "/../include/common.php");


class System extends BaseModel {

    public function __construcor() {
    }

    
    public function collectTax($pid, $cid, $people,$updated_at) {
        $sql = "udpate cities set people_count = $people, updated_at = $updated_at wherer id = $cid ";
        $this->query($sql);
    }


    public function generateFood($pid, $cid, $speed) {
        $sql = "udpate cites set food = food + $seed where id = $cid ";
        $this->query($sql);
    }
    
    
}