<?php
declare(strict_types=1);

namespace App\Models;


class Landing extends ActiveRecord {

	public string $id;
	public string $template;
	public string $nome;
	public string $corretora;
	public string $titulo;
	public string $url;
	public string $conteudo;
	public string $route;
	public string $descricao;
	public string $favicon;
	public string $tipo;
	public string $tagsHead;
	public string $status;
	public string $data_cadastro;
	public string $data_update;
	public string $tagsBody;
	public string $logotipo;
	public string $cor_primaria;
	public string $cor_secundaria;
	public string $cor_terciaria;
	public string $cor_quaternaria;
	public string $cor_quinaria;
	public string $cor_senaria;
	public string $redirecionamento;
	public string $telefone;
	public string $whatsapp;
	public string $email;
	public string $facebook;
	public string $instagram;
	public string $twitter;
	public string $linkedin;
	public string $endereco;
	public string $referencia;
	public string $pasta;
	public string $logotipo_footer;

    public function getTable(): string {
        return 'MDM_landings';
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
		$result = self::load('MDM_landings','Landing',$conditions,$order);

		if(!empty($id))
			$result = $result[0];

		return $result;
	}
	public static function paginate($page,$quantity,$conditions="0=0",$order='id ASC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>