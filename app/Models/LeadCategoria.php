<?php
declare(strict_types=1);

namespace App\Models;


class LeadCategoria extends ActiveRecord {

	public string $id;
	public string $nome;
	public string $corretora;
    
    public function getTable(): string {
        return 'MDM_leadsCategorias';
    }
    
    public static function campo($id, $campo){
	    $param = self::find($id);
	    return $param->{$campo};
	}
    
	public static function last() {
		$last = self::find(0,null,'nome ASC LIMIT 1');
		return $last[0];
	}

	public static function find($id = 0, $conditions = null, $order = 'nome ASC') {
		$conditions = self::treatConditions($id,$conditions);
		$result = self::load('MDM_leadsCategorias','LeadCategoria',$conditions,$order);

		if(!empty($id))
			$result = $result[0];
		return $result;
	}

	public static function paginate($page,$quantity,$conditions="0=0",$order='nome ASC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>