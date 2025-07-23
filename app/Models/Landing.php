<?php

namespace App\Models;


class Landing extends ActiveRecord {

	public $id;
	public $template;
	public $nome;
	public $corretora;
	public $titulo;
	public $url;
	public $conteudo;
	public $route;
	public $descricao;
	public $favicon;
	public $tipo;
	public $tagsHead;
	public $status;
	public $data_cadastro;
	public $data_update;
	public $tagsBody;
	public $logotipo;
	public $cor_primaria;
	public $cor_secundaria;
	public $cor_terciaria;
	public $cor_quaternaria;
	public $cor_quinaria;
	public $cor_senaria;
	public $redirecionamento;
	public $telefone;
	public $whatsapp;
	public $email;
	public $facebook;
	public $instagram;
	public $twitter;
	public $linkedin;
	public $endereco;
	public $referencia;
	public $pasta;
	public $logotipo_footer;

    public function getTable() {
        return 'OTIMIZElandings';
    }
    
    public static function campo($id, $campo){
        $result = self::find($id);
        return $result->{$campo};
    }
    
	public function save() {
        if(empty($this->data_cadastro)) $this->data_cadastro = date("Y-m-d H:i:s");
        $this->data_update = date("Y-m-d H:i:s");
        $this->conteudo = addslashes($this->conteudo);
        $this->tagsBody = addslashes($this->tagsBody);
        $this->tagsHead = addslashes($this->tagsHead);
        if(empty($this->route)){ $this->route = CleanString::clean($this->titulo); } else { $this->route = CleanString::clean($this->route); }
		return parent::save();
	}
	
	public static function last() {
		$last = self::find(0,null,'id DESC LIMIT 1');
		return $last[0];
	}
	public static function find($id = 0, $conditions = null, $order = 'id ASC') {
		$conditions = self::treatConditions($id,$conditions);
		$result = self::load('OTIMIZElandings','Landing',$conditions,$order);

		if(!empty($id))
			$result = $result[0];

		return $result;
	}
	public static function paginate($page,$quantity,$conditions="0=0",$order='id ASC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>