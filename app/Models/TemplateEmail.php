<?php
declare(strict_types=1);

namespace App\Models;


class TemplateEmail extends ActiveRecord {

	public string $id;
	public string $nome;
	public string $imagem;
	public string $pasta;
	public string $tipo; // sites // emails // landingpages
	public string $status;
	public string $conteudo;
    public string $referencia;
    
    public function getTable(): string {
        return 'MDM_templatesEmails';
    }
    
	public function save() {
		return parent::save();
	}
	
	public static function campo($id, $campo){
        $result = self::find($id);
        return $result->{$campo};
    }
	
	public static function last() {
		$last = self::find(0,null,'nome DESC LIMIT 1');
		return $last[0];
	}
	public static function find($id = 0, $conditions = null, $order = 'nome ASC') {
		$conditions = self::treatConditions($id,$conditions);
		$result = self::load('MDM_templatesEmails','TemplateEmail',$conditions,$order);

		if(!empty($id))
			$result = $result[0];

		return $result;
	}
	public static function paginate($page,$quantity,$conditions="0=0",$order='nome ASC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}
	
	public static function copiar_diretorio($dirFont, $dirDest){

        if(!file_exists($dirDest)){
            mkdir($dirDest);
        }
        if ($dd = opendir($dirFont)) {
            while (false !== ($arq = readdir($dd))) {
                if($arq != "." && $arq != ".."){
                    $pathIn = "$dirFont/$arq";
                    $pathOut = "$dirDest/$arq";
                    if(is_dir($pathIn)){
                        self::copiar_diretorio($pathIn, $pathOut);
                    }elseif(is_file($pathIn)){
                        copy($pathIn, $pathOut);
                    }
                }
            }
            closedir($dd);
        }
    }
}

?>