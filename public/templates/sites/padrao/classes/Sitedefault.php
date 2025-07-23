<?php

class Sitedefault extends ActiveRecord {

	public $id;
	public $frase;
	public $imagem_destaque;
	public $imagem_sobre;
	public $logotipo;
	public $cor_botoes;
    
    public function getTable() {
        return 'site_default';
    }
    
	public function save() {
		return parent::save();
	}
	public static function last() {
		$last = self::find(0,null,'id DESC LIMIT 1');
		return $last[0];
	}
	public static function find($id = 0, $conditions = null, $order = 'id ASC') {
		$conditions = self::treatConditions($id,$conditions);
		$result = self::load('site_default','Sitedefault',$conditions,$order);

		if(!empty($id))
			$result = $result[0];

		return $result;
	}
	public static function paginate($page,$quantity,$conditions="0=0",$order='id ASC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>
