<?php

namespace App\Models;


class Arte extends ActiveRecord {

	public $id;
	public $nome;
	public $formato;
	public $tipo;
	public $imagem;
	public $tema;
	public $status;
	public $logox;
	public $logoy;
	public $whatsappx;
	public $whatsappy;
	public $data_cadastro;
	public $downloads;
	public $disclamimer_x;
	public $disclamimer_y;
    
    public function getTable() {
        return 'OTIMIZEartes';
    }
    
    public static function campo($id, $campo){
        $result = self::find($id);
        return $result->{$campo};
    }
    
    public static function download($id) {
		$obj = self::add(self::getTable(), $id, 'downloads');
		return true;
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
		$result = self::load('OTIMIZEartes','Arte',$conditions,$order);

		if(!empty($id))
			$result = $result[0];
		return $result;
	}

	public static function paginate($page,$quantity,$conditions="0=0",$order='id DESC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>