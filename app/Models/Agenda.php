<?php

namespace App\Models;


class Agenda extends ActiveRecord {

	public $id;
	public $corretora;
	public $end;
	public $start;
	public $title;
	public $color;
	public $detalhes;
    
    public function getTable() {
        return 'OTIMIZEagenda';
    }

	public static function last() {
		$last = self::find(0,null,'id DESC LIMIT 1');
		return $last[0];
	}

	public static function find($id = 0, $conditions = null, $order = 'id ASC') {
		$conditions = self::treatConditions($id,$conditions);
		$result = self::load('OTIMIZEagenda','Agenda',$conditions,$order);

		if(!empty($id))
			$result = $result[0];
		return $result;
	}

	public static function paginate($page,$quantity,$conditions="0=0",$order='id ASC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>