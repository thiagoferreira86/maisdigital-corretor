<?php
declare(strict_types=1);

namespace App\Models;


class Csv extends ActiveRecord {

	public string $id;
	public string $corretora;
	public string $arquivo;
	public string $leads;
	public string $data_cadastro;
	public string $json;
	public string $erros;
	public string $repetidos;
	public string $salvos;

    public function getTable(): string {
        return 'MDM_csv';
    }
    
    public static function atualiza($id, $campo, $valor){
        $result = self::find($id);
        $result->{$campo} = $valor;
        if($result){
            return true;
        } else {
            return false;
        }
    }
    
    public static function campo($id, $campo){
        $result = self::find($id);
        return $result->{$campo};
    }
    
	public function save(){
		if(empty($this->data_cadastro)) $this->data_cadastro = date("Y-m-d H:i:s");
		return parent::save();
	}
	
	public static function last() {
		$last = self::find(0,null,'id DESC LIMIT 1');
		return $last[0];
	}
	
	public static function find($id = 0, $conditions = null, $order = 'id DESC') {
		$conditions = self::treatConditions($id,$conditions);
		$result = self::load('MDM_csv','Csv',$conditions,$order);

		if(!empty($id))
			$result = $result[0];

		return $result;
	}
	
	public static function paginate($page,$quantity,$conditions="0=0",$order='id DESC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>