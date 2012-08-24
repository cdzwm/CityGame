<?php

require_once (dirname(__FILE__) ."/../include/common.php");


class PlayerController extends BaseController {

    protected $model;

    public function __construcor() {
        $this->model = new Player();   
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

  }
