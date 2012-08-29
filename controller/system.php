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
                $this->simulateAttack($attack);
            } else {  //just update the information of attack team 
                $time_gap = $now - $attack->startd_time; 
                
                
            }

            
            
            
        }

        

    }

        
    
  }
