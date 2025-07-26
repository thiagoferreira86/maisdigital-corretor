<?php

class Corretorseguradora extends ActiveRecord {

	public $id;
	public $corretor;
	public $seguradora;
    
    public function save() {
		return parent::save();
	}
    
    public function getTable() {
        return 'corretor_seguradora';
    }
    
	public static function last() {
		$last = self::find(0,null,'id DESC LIMIT 1');
		return $last[0];
	}

	public static function find($id = 0, $conditions = null, $order = 'id ASC') {
		$conditions = self::treatConditions($id,$conditions);
		$result = self::load('corretor_seguradora','Corretorseguradora',$conditions,$order);

		if(!empty($id))
			$result = $result[0];
		return $result;
	}

	public static function paginate($page,$quantity,$conditions="0=0",$order='id ASC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>
