<?php
declare(strict_types=1);

namespace App\Models;


class TemplateLandingpage extends ActiveRecord {

	public string $id;
	public string $nome;
	public string $imagem;
	public string $pasta;
	public string $route;
	public string $status;
	public string $conteudo;
	public string $facebook;
	public string $instagram;
	public string $linkedin;
	public string $twitter;
	public string $telefone;
	public string $email;
	public string $logotipo;
	public string $titulo;
	public string $descricao;
	public string $tipo;
	public string $whatsapp;
	public string $endereco;
	public string $favicon;
	public string $tagsHead;
	public string $tagsBody;
	public string $cor_primaria;
	public string $cor_secundaria;
	public string $cor_terciaria;
	public string $cor_quaternaria;
	public string $cor_quinaria;
	public string $cor_senaria;
    public string $logotipo_footer;
    
    public function getTable(): string {
        return 'MDM_templatesLandingpages';
    }
    
	public function save(): bool{
	    $this->conteudo = addslashes($this->conteudo);
		return parent::save();
	}
	
	public static function last() {
		$last = self::find(0,null,'nome DESC LIMIT 1');
		return $last[0];
	}
	public static function find(int $id = 0, ?array $conditions = null, string $order = 'id DESC'): mixed
		$conditions = self::treatConditions($id,$conditions);
		$result = self::load('MDM_templatesLandingpages','TemplateLandingpage',$conditions,$order);

		if(!empty($id))
			$result = $result[0];

		return $result;
	}
	public static function paginate($page,$quantity,$conditions="0=0",$order='nome ASC') {
		return self::find(0,array($conditions),$order. " LIMIT ".($page*$quantity).",$quantity");
	}
	
	public static function campo($id, $campo){
        $result = self::find($id);
        return $result->{$campo};
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