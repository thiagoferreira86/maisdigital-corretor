<?php
declare(strict_types=1);

namespace App\Models;


class Post extends ActiveRecord {

	public string $id;
	public string $titulo;
	public string $subtitulo;
	public string $capa;
	public string $imagem;
	public string $texto;
	public string $status;
	public string $url;
	public string $data_cadastro;
	public string $views;
    
    public function getTable(): string {
        return 'MDM_posts';
    }
    
    public static function campo($id, $campo){
        $result = self::find($id);
        return $result->{$campo};
    }

    public function save() {
        $this->texto = addslashes($this->texto);
        if(empty($this->url)) $this->url = CleanString::clean($this->titulo);
        if(empty($this->data_cadastro)) $this->data_cadastro = date("Y-m-d H:i:s");
		return parent::save();
	}
    
	public static function last() {
		$last = self::find(0,null,'id DESC LIMIT 1');
		return $last[0];
	}
	
	public static function visto($id) {
		$obj = self::add('MDM_posts', $id, 'views');
		return true;
	}

	public static function find($id = 0, $conditions = null, $order = 'id DESC') {
		$conditions = self::treatConditions($id,$conditions);
		$result = self::load('MDM_posts','Post',$conditions,$order);

		if(!empty($id))
			$result = $result[0];
		return $result;
	}

	public static function paginate($page,$quantity,$conditions="0=0",$order='id DESC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>