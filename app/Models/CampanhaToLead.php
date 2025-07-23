<?php

namespace App\Models;


class CampanhaToLead extends ActiveRecord {

	public $id;
	public $campanha;
	public $lead;
    
    public function getTable() {
        return 'OTIMIZEcampanhasToLeads';
    }
    
    public static function campo($id, $campo){
	    $param = self::find($id);
	    return $param->{$campo};
	}
    
	public static function last() {
		$last = self::find(0,null,'id DESC LIMIT 1');
		return $last[0];
	}

	public static function find($id = 0, $conditions = null, $order = 'id DESC') {
		$conditions = self::treatConditions($id,$conditions);
		$result = self::load('OTIMIZEcampanhasToLeads','CampanhaToLead',$conditions,$order);

		if(!empty($id))
			$result = $result[0];
		return $result;
	}

	public static function paginate($page,$quantity,$conditions="0=0",$order='id DESC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>