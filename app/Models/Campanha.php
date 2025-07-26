<?php
declare(strict_types=1);

namespace App\Models;


class Campanha extends ActiveRecord {

	public string $id;
	public string $nome;
	public string $corretora;
	public string $data_envio;
	public string $conteudo;
	public string $data_cadastro;
	public string $status;
	public string $tipo;
	public string $facebook;
	public string $instagram;
	public string $twitter;
	public string $linkedin;
	public string $midia;
	public string $envios;
	public string $remetente;
	public string $remetente_nome;
    
    public function getTable(): string {
        return 'MDM_campanhas';
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
		$result = self::load('MDM_campanhas','Campanha',$conditions,$order);

		if(!empty($id))
			$result = $result[0];
		return $result;
	}

	public static function paginate($page,$quantity,$conditions="0=0",$order='nome ASC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>