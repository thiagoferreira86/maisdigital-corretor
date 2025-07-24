<?php
declare(strict_types=1);

namespace App\Models;


class Email extends ActiveRecord {

	public string $id;
	public string $email;
	public string $senha;
	public string $armazenamento;
	public string $corretora;
	public string $conta;
	public string $assinatura;
	public string $email_recuperacao;
    
    public function getTable(): string {
        return 'MDM_emails';
    }
    
    public function save() {
        $this->assinatura = addslashes($this->assinatura);
		return parent::save();
	}
	
	public function cotaDisponivel($id, $plano){
	    $subtotal = 0;
	    $planoEmail = PlanoEmail::dados($plano);
	    $cotaemails = $planoEmail->armazenamento;
		$cotas = Email::find(0, array("corretora = '".$id."'"));
        if(count($cotas) >0){
            foreach($cotas as $c){
                $subtotal +=  $c->armazenamento;
            }
        } 
        return ($cotaemails-$subtotal);
	}
    
	public static function last() {
		$last = self::find(0,null,'id DESC LIMIT 1');
		return $last[0];
	}

	public static function find($id = 0, $conditions = null, $order = 'id DESC') {
		$conditions = self::treatConditions($id,$conditions);
		$result = self::load('MDM_emails','Email',$conditions,$order);

		if(!empty($id))
			$result = $result[0];
		return $result;
	}

	public static function paginate($page,$quantity,$conditions="0=0",$order='id DESC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}

}

?>