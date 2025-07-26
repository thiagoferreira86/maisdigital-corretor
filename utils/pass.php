<?php

include '../vendor/autload.php';

use App\Models\CorretoraUsuario;

$usuarios = CorretoraUsuario::find(0);
foreach($usuarios as $usuario){
    $u = CorretoraUsuario::find($usuario->id);
    $u->senha = '#corretor+DigitalMAPRE@@@';
    $u->save();
}
