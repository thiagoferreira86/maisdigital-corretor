<?php
declare(strict_types=1);

namespace App\Models;


class Admin extends ActiveRecord {

	public string $id;
	public string $nome;
	public string $email;
	public string $telefone;
	public string $senha;
	public string $data_cadastro;
	public string $imagem;

	public function getTable(): string{
        return 'MDM_administradores';
    }

	public function save() {
		if(empty($this->data_cadastro)) $this->data_cadastro = date("Y-m-d H:i:s");
		$this->senha = base64_encode(addslashes(trim($this->senha)));
		return parent::save();
	}

	public static function last() {
		$last = self::find(0,null,'id DESC LIMIT 1');
		return $last[0];
	}

	public static function find($id = 0, $conditions = null, $order = 'nome ASC') {
		$conditions = self::treatConditions($id,$conditions);
		$result = self::load('MDM_administradores','Admin',$conditions,$order);

		if(!empty($id))
			$result = $result[0];

		return $result;
	}

	public static function paginate($page,$quantity,$conditions="0=0",$order='nome ASC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>