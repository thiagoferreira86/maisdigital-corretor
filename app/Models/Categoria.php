<?php

namespace App\Models;


class Categoria extends ActiveRecord {

	public $id;
	public $nome;
	public $personalizacao;
	public $reguas;
	public $treinamentos;
	public $blog;
	public $cartao;
	public $landing;
	public $leads;
	public $dashboard;
	public $cotacoes;
	public $agenda;
	public $emails;
    
    public function getTable() {
        return 'OTIMIZEcorretorasCategorias';
    }
    
    public function save() {
		return parent::save();
	}
    
	public static function last() {
		$last = self::find(0,null,'id DESC LIMIT 1');
		return $last[0];
	}

	public static function find($id = 0, $conditions = null, $order = 'id DESC') {
		$conditions = self::treatConditions($id,$conditions);
		$result = self::load('OTIMIZEcorretorasCategorias','Categoria',$conditions,$order);

		if(!empty($id))
			$result = $result[0];
		return $result;
	}

	public static function paginate($page,$quantity,$conditions="0=0",$order='id DESC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>