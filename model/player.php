<?php

require_once (dirname(__FILE__) . "/../include/common.php");


class Player extends BaseModel{
    
	public function __construcor(){
	}

    public function getPlayerInfo($pid) {
        $query = "select * from players wherer id = $pid  ";
        $player  = $this->query($query);
        $query = "select * from cites whwere player_id= $pid"; 
        $cites = $this->query($query);
        $player->cites = $cites;
        
        return $player;
    }

    public function setCapital($player_id, $city_id) {
        $player = getPlayerInfo($player_id) ; 
        if ($player->captital_city_id > 0)  {
            
            $this->query("udpate cities set tax_rate = ".NORMAL_TAX_RATE .", updated_at=now() where id =" . $player->captital_city_id);
        } else {
            //TODO transactions here 
            $sql = "update cities set tax_rate = ".CAPITAL_TAX_RATE . ", updated_at=now() where id= $city_id;"; 
            $this->query($sql);
            $sql = "update players set $city_id = $city_id, updated_at = now() where player_id = $player_id";
            $this->query($sql);
        }

    }

    /**
     * suppose the city $c alredy created in database
     */
    public function createCityOnMap($p, $c, $x ,$y) {
        $sql = "update cites set cor_x = $x, cor_y = $y where player_id = $p and city_id = $c";
        $this->query($sql);
    }


    /**
     * NOTE: this function is created for  question 2,
     *       avoid override the old function 
     */
    public function getPlayerInfoWithSoldiers($pid) {
        $player = $this->getPlayerInfo($pid);
        
        for($i=0; $i<count($player->cites); $i++) {
            $sql = "SELECT * FROM soldiers WHERE city_id = "+ $player->cites[$i]; 
            $player->cites[$i]->soldiers = $this->query($sql);
        }

        return $player; 
    }
  }


