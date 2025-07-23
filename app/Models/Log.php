<?php

namespace App\Models;


class Log extends ActiveRecord {

	public $id;
	public $corretora;
	public $ip;
	public $data_cadastro;
	public $acao;
    
    public function getTable() {
        return 'OTIMIZElogs';
    }
    
    public function save() {
        if(empty($this->data_cadastro)) $this->data_cadastro = date("Y-m-d H:i:s");
		return parent::save();
	}
	
	public static function totalAcessos($limite = 10, $order = 'DESC') {
		$result = self::countAcessos('Log', $order, 'OTIMIZElogs', $limite);
		return $result;
	}
	
	public static function acessos($param) {
	    $data = array();
	    if($param == 'd'){
	        for($i=0; $i<24; $i++){
	            $horario_inicial = date("Y-m-d ".str_pad($i, 2, "0", STR_PAD_LEFT).":00:00");
	            $horario_final = date("Y-m-d ".str_pad($i, 2, "0", STR_PAD_LEFT).":59:59");
	            $obj = Sessao::find(0, array("data_cadastro BETWEEN '".$horario_inicial."' AND '".$horario_final."'"), "id ASC");
	            array_push($data, count($obj));
	        }
	    } elseif($param == 's'){
	        $mes = date("m-Y");
            $obj = Sessao::find(0, array("data_cadastro LIKE '%".$mes."%'"), "id ASC", "corretora");
            array_push($data, count($obj));
            for($i=5; $i>0; $i--){
                $date = new DateTime('-'.$i.' month');
                $mes = $date->format('m-Y').'<br>';
                $obj = Sessao::find(0, array("data_cadastro LIKE '%".$mes."%'"), "id ASC", "corretora");
                array_push($data, count($obj));
            }
	    } elseif($param == 'm'){
	        $data['values'] = array();
	        $data['meses'] = array();
	        
            for($i=5; $i>0; $i--){
                $date = new DateTime('-'.$i.' month');
                $mes = $date->format('Y-m');
                $mes_formatado = $date->format('m/Y');
                $obj = Sessao::find(0, array("data_cadastro LIKE '%".$mes."%'"), "id ASC");
                array_push($data['values'], count($obj));
                array_push($data['meses'], mesAbrv($mes_formatado));
            }
            $mes = date("Y-m");
            $mes_formatado = date('m/Y');
            $obj = Sessao::find(0, array("data_cadastro LIKE '%".$mes."%'"), "id ASC");
            array_push($data['meses'], mesAbrv($mes_formatado));
            array_push($data['values'], count($obj));
            
	    }
		return $data;
	}
	
	
	public static function grava($acao) {
        $obj = new Log();
        $obj->corretora = $_SESSION['corretora_id'];
        $obj->ip = $_SERVER['REMOTE_ADDR'];
        $obj->acao = $acao;
        $obj->save();
	}
    
	public static function last() {
		$last = self::find(0,null,'id DESC LIMIT 1');
		return $last[0];
	}

	public static function find($id = 0, $conditions = null, $order = 'id DESC', $group = null) {
		$conditions = self::treatConditions($id,$conditions);
		$result = self::load('OTIMIZElogs','Log',$conditions,$order, $group);

		if(!empty($id))
			$result = $result[0];
		return $result;
	}

	public static function paginate($page,$quantity,$conditions="0=0",$order='id DESC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>