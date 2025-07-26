<?php
declare(strict_types=1);

namespace App\Models;


class CampanhaClique extends ActiveRecord {

	public string $id;
	public string $campanha;
	public string $lead;
	public string $url;
	public string $data_cadastro;
    
    public function getTable(): string {
        return 'MDM_campanhasCliques';
    }
    
     public function save() {
        if(empty($this->data_cadastro)) $this->data_cadastro = date("Y-m-d H:i:s");
		return parent::save();
	}
    
    public static function campo($id, $campo){
	    $param = self::find($id);
	    return $param->{$campo};
	}
    
	public static function last() {
		$last = self::find(0,null,'id ASC LIMIT 1');
		return $last[0];
	}

	public static function find($id = 0, $conditions = null, $order = 'id ASC', $group = null) {
		$conditions = self::treatConditions($id,$conditions);
		$result = self::load('MDM_campanhasCliques','CampanhaClique',$conditions,$order,$group);

		if(!empty($id))
			$result = $result[0];
		return $result;
	}

	public static function paginate($page,$quantity,$conditions="0=0",$order='id ASC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>