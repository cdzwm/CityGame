<?php
  /**
   * cron controller 
   * used it as a crontab script or someway similar to update tax etc...
   */ 

require_once (dirname(__FILE__) ."/../include/common.php");


class SystemController extends BaseController {

    protected $cm; 
    protected $sm; 
    protected $pm; 

    public function __construcor() {
       $this->cm = new City();
       $this->pm = new Player();
       $this->sm = new System();
    }

    public  function collectTax($pid, $cid) {
        $city = $this->cm->getCityInfo($cid);
        $now = time();

        $people = 1; 
        if ($city->people_count > $city->tax_rate*1000) {
            $people =  $city->people_count *0.95;
        } else {
            $people = $city->people_count*1.05;
        }             

        if ($people >1000) 
            $people = 1000; 
        else if ($people < 1) 
            $people =1; 

        $this->cm->collectTax($pid,$cid, $people);

            
    }

    //call this function every second maybe 
    public function generateFood($pid, $cid) {
        $city = $this->cm->getCityInfo($cid) ;
        $speed  =  $city->capital_flag == 1 ? CAPITAL_FOOD_SPEED :NORMAL_FOOD_SPEED;
        $this->sm->updateFood($pid, $cid, (int)($speed/60)); 
    }

    /** 
     * call this function every second maybe 
     * NOTE: $cid  maybe optional for all cites
     */
    public function updateSoldiers($cid) {
        $this->sm->updateSoldiers($cid); 
    }



    /**
     * Call this function every minute or (59 seconds) maybe 
     * NOTE: $cid  maybe make it optinal and loop for all cities 
     */
    public function updateAttackInfo($cid) {
        $sql = "SELECT * FROM attack_city WHERE from_city_id = $cid";
        $attacks = $this->query($sql); 
        
        $now = time(); 
        //maybe  have many attacks 
        for ($i =0; $i<count($attacks) ;$i++) {
            $attack = $attacks[$i]; 

            //NOTE: maybe stop by player or some case
            $is_destination_ok = false; 
            if ($current_x < $target_x + 100 && $current_x> $target_x && $current_y< ($target_y+100) && $current_y > $target_y)
                $is_destination_ok = true; 

            if ($attack->target_time >=  $now && $is_destination_ok) { //should start fighting 
                $this->cm->updateCityState($attack->to_city_id , 1);  // change the city state  and shuld be show a warning to player
                $this->simulateAttack($attack);
            } else {  //just update the information of attack team 
                $time_gap = ($now - $attack->startd_time)/60; 
                $distanced =  $time_gap * $attack->moving_speed; 
                $sin = (($attack->target_y - $attack->start_y))/sqrt( pow($attack->target_y - $attack->start_y, 2) + pow($attack->target_x - $attack->start_x, 2));
                    
                $x =  $attack->start_x  + $distanced * （1- pow($cos, 2));
                $y = $attack->start_y + $distanced * $sin;
                
                //
                $attack->current_x = (int)$x;  
                $attack->current_y = (int)$y; 
                $this->sm->updateAttackInfo($attack);
                
            }
        }
    }

    
    protected function  simulateAttack($attack) {
        $soldiers = $this->sm->getAttackSoldiersAmount($attack);
        
        $black_box_result = $this->blackBox($attack, $soldiers);

        $this->cm->saveAttackResult($black_box_result);
    }


    protected function blackBox($$attack, $soldiers) {

        $result = array(); 
        $result["from_city_died"] = rand(0, $soldiers[0]);
        $result["to_city_died"] = rand(0, $soliders[1]);
        
        
        $lost_city_id = $result["from_city_soldiers"] >= $result["to_city_soldiers"] ? $attack->to_city_id : $attack->from_city_id;

        $lost_city = $this->cm->getCityInfo($lost_city);
        $gold = $lost_city->gold;
        $food = $lost_city->food; 
        $result["gold"] = rand(0, $gold); 
        $result["food"] = rand(0, $food);

        return $result;
    }
    
  }
