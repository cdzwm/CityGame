<?php
require_once ("../include/common.php");


class Player extends BaseModel{
    
	public function __construcor(){
	}

    public function getPlayerInfo($pid) {
        $query = "select * from players wherer id = $pid ";
        return $this->query($query);
    }

    public function setCapital($player_id, $city_id) {
        $player = getPlayerInfo($player_id) ; 
        if ($player->captital_city_id > 0)  {
            
            $this->query("udpate cities set tax_rate = ".NORMAL_TAX_RATE ." where id =" . $player->captital_city_id);
        } else {
            //TODO transactions here 
            $sql = "update cities set tax_rate = ".CAPITAL_TAX_RATE . " where id= $city_id;"; 
            $this->query($sql);
            $sql = "update players set $city_id = $city_id where player_id = $player_id";
            $this->query($sql);
        }

    }
  }


