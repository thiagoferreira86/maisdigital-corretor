<?php

namespace App\Controllers;

use App\Models\{Corretora, CorretoraUsuario, Slide, Arte, Video, ArteTema, Log};

class UtilsController 
{

    public function pass(): void
    {
        $usuarios = CorretoraUsuario::find(0);
        foreach($usuarios as $usuario){
            $u = CorretoraUsuario::find($usuario->id);
            $u->senha = '#corretor+DigitalMAPRE@@@';
            $u->save();
        }
    }
    private function view(string $path, array $data = []): void
    {
        extract($data);
        require_once __DIR__ . "/../Views/{$path}.php";
    }
}
