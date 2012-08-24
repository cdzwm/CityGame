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
        $this->sm->collectTaxe($pid, $cid);
    }
    
  }
