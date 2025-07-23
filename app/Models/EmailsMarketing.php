<?php

namespace App\Models;


class EmailsMarketing extends ActiveRecord {

	public $id;
	public $template;
	public $corretora;
	public $titulo;
	public $url;
	public $conteudo;
	public $rota;
	public $meta_description;
	public $meta_keywords;
	public $principal;
	public $pasta;
	public $referencia;
	public $head;
	public $footer;
	public $status; // Ativo / Inativo
	public $data_cadastro;
	public $cor_primaria;
	public $cor_secundaria;
	public $logotipo;
	public $link_logotipo;
	public $imagem;
	public $link_imagem;
	public $texto;
	public $cor_texto;
	public $texto_botao;
	public $cor_botao;
	public $cor_texto_botao;
	public $link_botao;
	public $data_update;

    public function getTable() {
        return 'OTIMIZEemailsMarketing';
    }
    
    public static function campo($id, $campo){
        $result = self::find($id);
        return $result->{$campo};
    }
    
	public function save() {
        if(empty($this->data_cadastro)) $this->data_cadastro = date("Y-m-d H:i:s");
        $this->data_update = date("Y-m-d H:i:s");
        $this->conteudo = addslashes($this->conteudo);
        $this->head = addslashes($this->head);
        $this->footer = addslashes($this->footer);
        if(empty($this->rota)) $this->rota = CleanString::clean($this->rota);
		return parent::save();
	}
	
	public static function last() {
		$last = self::find(0,null,'id DESC LIMIT 1');
		return $last[0];
	}
	public static function find($id = 0, $conditions = null, $order = 'id ASC') {
		$conditions = self::treatConditions($id,$conditions);
		$result = self::load('OTIMIZEemailsMarketing','EmailsMarketing',$conditions,$order);

		if(!empty($id))
			$result = $result[0];

		return $result;
	}
	public static function paginate($page,$quantity,$conditions="0=0",$order='id ASC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>