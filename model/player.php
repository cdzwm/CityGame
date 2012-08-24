<?php


class Player extends BaseModel{
    
	public function __construcor(){
	}

    public function getPlayerInfo($pid) {
        $query = "select * from players wherer id = $pid ";
        return $this->query($query);
        
    }
  }


