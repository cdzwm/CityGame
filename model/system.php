<?php

require_once (dirname(__FILE__) . "/../include/common.php");


class System extends BaseModel {

    public function __construcor() {
    }

    
    public function collectTax($pid, $cid, $people,$updated_at) {
        $sql = "UPDATE cities SET people_count = $people, updated_at = $updated_at WHERE id = $cid ";
        $this->query($sql);
        
        //update soliders if food == 0 
        $city = $this->query("SELECT * FROM cites WHERE id= $cid");
        if ($city->food == 0) {
            $sql = "UPDDATE soldiers SET amount = amount*0.9 WHERE city_id = $cid";
            $this->query($sql);
        }
    }


    public function generateFood($pid, $cid, $speed) {
        $sql = "udpate cites set food = food + $seed where id = $cid ";
        $this->query($sql);
    }


    //UNDONE:  cid optinal?? update all 
    public function updateSoldiers($cid) {

        $sql = "UPDATE soldiers SET updated_at = now() where id=" .$soldiers[$i];
            
        $sql2 = "SELECT amount FROM soldiers WHERE soldier_type = 1";  //长枪手
        $foods = 0; 
        $foods += $this->query($sql2) * 10/60; 
            
        $sql3 = "SELECT amount FROM soldiers WHERE soldier_type = 2";  //弓箭手
        $foods += $this->query($sql3) * 13/60;

        $sql3 = "SELECT amount FROM soldiers WHERE soldier_type = 3";  //骑兵
        $foods += $this->query($sql3) * 30/60;
            
        //eat food! 
        $this->query("UPDATE cites set food = food- $foods WHERE id = $cid");
            
        //check if have some soldiers finish the train 
            
        $this->query("UPDATE soldiers SET state = 2 WHERE (udpated_at - created_at) >= 180 AND soldier_type=1");
        $this->query("UPDATE soldiers SET state = 2 WHERE (udpated_at - created_at) >= 12*60 AND soldier_type=2");
        $this->query("UPDATE soldiers SET state = 2 WHERE (udpated_at - created_at) >= 50*60 AND soldier_type=3");
            
        $soldersgold_changes = $this->query("SELECT * FROM soldiers WHERE city_id = $cid AND state = 2");

        $total_golds = 0; 
        for($i =0; $i< count($soldersgold_changes); $i++) {
            switch ($soldersgold_changes[$i]->soldier_type ) {
                case 1: 
                    $total_golds += $soldersgold_changes[$i]->amount*1; 
                    break; 
                case 2:
                $total_golds += $soldersgold_changes[$i]->amount*3; 
                    break;
                case 3: 
                $total_golds += $soldersgold_changes[$i]->amount*; 
                    break;
                    
            }

        }

 
        $sql = "update cites set gold = gold - $total_golds where id = $cid";
        $this->query($sql);

    }


    public function updateAttackInfo($attack) {
        $this->query("UPDATE attack_city SET current_x = " . $attack->current_x . ", current_y = " . $attack->current_y ." WHERE id = ". $attack->id);
    }
    

    public function getAttackSoldiersAmount($attack) {
        $result = array();
        
        $result[0] = $this->query("SELECT  sum(amount) FROM soldiers WHERE id in (". $attack->attack_soldier_ids .")");
        $result[1] = $this->query("SELECT sum(amount) FROM soldiers WHERE city_id = ". $attack->to_city_id ." AND state =0"); //0 : not traning  1: traning
    }
    
}