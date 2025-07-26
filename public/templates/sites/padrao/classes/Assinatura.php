<?php

class Assinatura extends ActiveRecord {

	public $id;
	public $corretor;
	public $plano;
	public $valor;
	public $codigo;
	public $status;
	public $data_cadastro;
	public $ultimo_pagamento;
	public $proximo_pagamento;
	public $cupom;
	public $desconto;

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
		$result = self::load('assinaturas','Assinatura',$conditions,$order);

		if(!empty($id))
			$result = $result[0];
		return $result;
	}

	public static function paginate($page,$quantity,$conditions="0=0",$order='id DESC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>