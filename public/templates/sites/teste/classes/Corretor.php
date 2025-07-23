<?php

class Corretor extends ActiveRecord {

	public $id;
	public $nome;
	public $email;
	public $telefone;
	public $senha;
	public $data_cadastro;
	public $cpf;
	public $nascimento;
	public $cnpj;
	public $codigo;
	public $cep;
	public $endereco;
	public $numero;
	public $complemento;
	public $bairro;
	public $cidade;
	public $estado;
	public $imagem;
	public $dominio;
	public $subdominio;

    public function getTable() {
        return 'corretores';
    }
	public function save() {
		if(empty($this->data_cadastro)) $this->data_cadastro = date("Y-m-d H:i:s");
		return parent::save();
	}
	public static function last() {
		$last = self::find(0,null,'id DESC LIMIT 1');
		return $last[0];
	}
	public static function find($id = 0, $conditions = null, $order = 'nome ASC') {
		$conditions = self::treatConditions($id,$conditions);
		$result = self::load('corretores','Corretor',$conditions,$order);

		if(!empty($id))
			$result = $result[0];

		return $result;
	}
	public static function paginate($page,$quantity,$conditions="0=0",$order='nome ASC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>
