class City extends BaseModel {
    public function __construcor() {
    }

    public updateCity($city_id) {
        $dt = time();
        updateTax($dt);
        updateGold($dt);
		updateFood($dt);
    }
    
    private function updateTax( $dt ){
        
    }

    private function updateGold( $dt ){
	}

    private  function updateFood( $dt ){
	}

}