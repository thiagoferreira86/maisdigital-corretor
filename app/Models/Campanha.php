<?php

namespace App\Models;


class Campanha extends ActiveRecord {

	public $id;
	public $nome;
	public $corretora;
	public $data_envio;
	public $conteudo;
	public $data_cadastro;
	public $status;
	public $tipo;
	public $facebook;
	public $instagram;
	public $twitter;
	public $linkedin;
	public $midia;
	public $envios;
	public $remetente;
	public $remetente_nome;
    
    public function getTable() {
        return 'OTIMIZEcampanhas';
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
		$last = self::find(0,null,'nome ASC LIMIT 1');
		return $last[0];
	}

	public static function find($id = 0, $conditions = null, $order = 'nome ASC') {
		$conditions = self::treatConditions($id,$conditions);
		$result = self::load('OTIMIZEcampanhas','Campanha',$conditions,$order);

		if(!empty($id))
			$result = $result[0];
		return $result;
	}

	public static function paginate($page,$quantity,$conditions="0=0",$order='nome ASC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>