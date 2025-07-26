<?php



foreach($usuarios as $usuario){
    $u = CorretoraUsuario::find($usuario->id);
    $u->senha = '#corretor+DigitalMAPRE@@@';
    $u->save();
}
