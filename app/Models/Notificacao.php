<?php
declare(strict_types=1);

namespace App\Models;


class Notificacao extends ActiveRecord {

	public string $id;
	public string $corretor;
	public string $tipo;
	public string $mensagem;
	public string $lida;
	public string $data_cadastro;
	public string $admin;
    
    public function getTable(): string {
        return 'PROnotificacoes';
    }
    
    
    public function save() {
		return parent::save();
	}
    
	public static function last() {
		$last = self::find(0,null,'id DESC LIMIT 1');
		return $last[0];
	}

	public static function find($id = 0, $conditions = null, $order = 'id ASC') {
		$conditions = self::treatConditions($id,$conditions);
		$result = self::load('PROnotificacoes','Notificacao',$conditions,$order);

		if(!empty($id))
			$result = $result[0];
		return $result;
	}

	public static function paginate($page,$quantity,$conditions="0=0",$order='id ASC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>