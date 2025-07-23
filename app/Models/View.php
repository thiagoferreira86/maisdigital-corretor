<?php

namespace App\Models;


class View extends ActiveRecord {

	public $id;
	public $nome;
	public $email;
	public $telefone;
	public $automovel;
	public $categoria;
	public $status;
	public $observacoes;
	public $data_cadastro;
	public $usuario;
    
    public function getTable() {
        return 'PROviews';
    }
    
    public function save() {
		if(empty($this->data_cadastro)) $this->data_cadastro = date("Y-m-d H:i:s");
		return parent::save();
	}
    
	public static function last() {
		$last = self::find(0,null,'id DESC LIMIT 1');
		return $last[0];
	}

	public static function find($id = 0, $conditions = null, $order = 'id DESC') {
		$conditions = self::treatConditions($id,$conditions);
		$result = self::load('PROviews','View',$conditions,$order);

		if(!empty($id))
			$result = $result[0];
		return $result;
	}

	public static function paginate($page,$quantity,$conditions="0=0",$order='id DESC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>