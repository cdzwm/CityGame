<?php

require_once (dirname(__FILE__) ."/../include/common.php");


class PlayerController extends BaseController {

    protected $model;
    protected $cm 
    public function __construcor() {
        $this->model = new Player();   
        $this->cm = new City();
    }


    public function getPlayeyInfo($pid) {
        return $mode->getPlayeyInfo(pid);
    }


	public function setCapital($player_id, $city_id){
        return $model->setCapital($player_id, $city_id);
	}

    public function createCityOnMap($player, $city_id, $x, $y) {
        return $model->createCity($player, $city_id, $x, $y);
    }


    /**
     * arr_soldiers array of soldier id
     */
    public function startAttackCity($pid, $from_city_id, $to_city_id , $arr_soldiers) {
        //update the city state to attact status
        $now  = time(); 

        $this->cm->updateState($cid, 1); //1: attack
        
        $distance = $this->cm->getDiastance($from_city_id, $to_city_id);

        $cor_speed = $this->model->getSpeed(implode(",", $arr_soldiers));
        $speed = sqrt(2)*$cor_speed; 
        
        $moving_time = $distance/$speed;
        
        //plan target ,maybe stop by players some time ?
        $plan_target_time =  $now + $moving_time * 60; 
        $from_city = $his->cm->getCityInfo($from_city_id);
        $target_city = $this->cm->getCityInfo($to_city_id);

        $this-model-> createAttack($from_city, $to_city,$now , $plan_target_time $distance, $speed);
    }

  }
