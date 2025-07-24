<?php
declare(strict_types=1);

namespace App\Models;


class Lead extends ActiveRecord {

	public string $id;
	public string $nome;
	public string $email;
	public string $telefone;
	public string $mensagem;
	public string $origem;
	public string $data_cadastro;
	public string $observacoes;
	public string $corretora;
	public string $csv;
	public string $descricao;
    
    public function getTable(): string {
        return 'MDM_leads';
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
		$result = self::load('MDM_leads','Lead',$conditions,$order);

		if(!empty($id))
			$result = $result[0];
		return $result;
	}

	public static function paginate($page,$quantity,$conditions="0=0",$order='id DESC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>