<?php
return array(
	'lead' => array( 'class'=>'Lead',
						'header'=>'Lead',
						'location'=>'index.php',
						'return'=>'gerenciar_leads',
						'form'=>'novo_lead.php',
						'find'=>(isset($GLOBALS['type']) && $GLOBALS['type'] == 'lead') ? Lead::find(isset($_POST['id'])?$_POST['id']:0) : "",
						'get'=>(isset($GLOBALS['type']) && $GLOBALS['type'] == 'lead') ? Lead::find(isset($_GET['id'])?$_GET['id']:0) : "",
						'paginate'=>(isset($GLOBALS['type']) && $GLOBALS['type'] == 'lead') ? Lead::paginate(isset($GLOBALS['page'])?$GLOBALS['page']:0, isset($GLOBALS['quantity'])?$GLOBALS['quantity']:0, isset($GLOBALS['conditions'])?$GLOBALS['conditions']:'0=0') : "",
						'count'=>(isset($GLOBALS['type']) && $GLOBALS['type'] == 'lead') ? Lead::count("0=0","leads") : "",
						'none'=>'Nenhum Lead encontrado com esses dados.'
				 ),
   
	'usuario' => array( 'class'=>'Usuario',
						'header'=>'Usuário',
						'location'=>'painel.php',
						'return'=>'gerenciar_usuarios.php',
						'form'=>'novo_usuario.php',
						'find'=>(isset($GLOBALS['type']) && $GLOBALS['type'] == 'usuario') ? Usuario::find(isset($_POST['id'])?$_POST['id']:0) : "",
						'get'=>(isset($GLOBALS['type']) && $GLOBALS['type'] == 'usuario') ? Usuario::find(isset($_GET['id'])?$_GET['id']:0) : "",
						'paginate'=>(isset($GLOBALS['type']) && $GLOBALS['type'] == 'usuario') ? Usuario::paginate(isset($GLOBALS['page'])?$GLOBALS['page']:0, isset($GLOBALS['quantity'])?$GLOBALS['quantity']:0, isset($GLOBALS['conditions'])?$GLOBALS['conditions']:'0=0') : "",
						'count'=>(isset($GLOBALS['type']) && $GLOBALS['type'] == 'usuario') ? Usuario::count("0=0","usuarios") : "",
						'none'=>'Nenhum Usuário encontrado com esses dados.'
				 ),
);
