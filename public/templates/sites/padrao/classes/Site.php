<?php

class Site extends ActiveRecord {

	public $id;
	public $corretor;
	public $email;
	public $telefone;
	public $dominio;
	public $subdominio;
	public $frase;
	public $imagem_destaque;
	public $texto_sobre;
	public $imagem_sobre;
	public $facebook;
	public $instagram;
	public $youtube;
	public $twitter;
	public $logotipo;
	public $cep;
	public $endereco;
	public $numero;
	public $complemento;
	public $bairro;
	public $cidade;
	public $estado;
	public $status;
	public $cor_botoes;
	public $parceiro;

	public function save() {
		return parent::save();
	}
	public static function last() {
		$last = self::find(0,null,'id DESC LIMIT 1');
		return $last[0];
	}
	public static function find($id = 0, $conditions = null, $order = 'id ASC') {
		$conditions = self::treatConditions($id,$conditions);
		$result = self::load('sites','Site',$conditions,$order);

		if(!empty($id))
			$result = $result[0];

		return $result;
	}
	public static function paginate($page,$quantity,$conditions="0=0",$order='id ASC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>
