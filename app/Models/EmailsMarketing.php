<?php
declare(strict_types=1);

namespace App\Models;


class EmailsMarketing extends ActiveRecord {

	public string $id;
	public string $template;
	public string $corretora;
	public string $titulo;
	public string $url;
	public string $conteudo;
	public string $rota;
	public string $meta_description;
	public string $meta_keywords;
	public string $principal;
	public string $pasta;
	public string $referencia;
	public string $head;
	public string $footer;
	public string $status; // Ativo / Inativo
	public string $data_cadastro;
	public string $cor_primaria;
	public string $cor_secundaria;
	public string $logotipo;
	public string $link_logotipo;
	public string $imagem;
	public string $link_imagem;
	public string $texto;
	public string $cor_texto;
	public string $texto_botao;
	public string $cor_botao;
	public string $cor_texto_botao;
	public string $link_botao;
	public string $data_update;

    public function getTable(): string {
        return 'MDM_emailsMarketing';
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
		$result = self::load('MDM_emailsMarketing','EmailsMarketing',$conditions,$order);

		if(!empty($id))
			$result = $result[0];

		return $result;
	}
	public static function paginate($page,$quantity,$conditions="0=0",$order='id ASC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>