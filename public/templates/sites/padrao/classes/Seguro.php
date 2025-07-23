<?php

class Seguro extends ActiveRecord {

	public $id;
	public $nome;
	public $imagem;
	public $icone;
	public $descricao;
	public $detalhes;
	public $titulo;
	public $subtitulo;
	public $url;
    
    public function save() {
        $this->url = CleanString::clean($this->nome);
		return parent::save();
	}
    
	public static function last() {
		$last = self::find(0,null,'id DESC LIMIT 1');
		return $last[0];
	}

	public static function find($id = 0, $conditions = null, $order = 'nome ASC') {
		$conditions = self::treatConditions($id,$conditions);
		$result = self::load('seguros','Seguro',$conditions,$order);

		if(!empty($id))
			$result = $result[0];
		return $result;
	}

	public static function paginate($page,$quantity,$conditions="0=0",$order='nome ASC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>
