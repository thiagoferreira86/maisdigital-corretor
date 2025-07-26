<?php
namespace App\Controllers;

use App\Models\Corretora;
use App\Models\CorretoraUsuario;
use App\Models\CorretoraTentativaLogin;
use App\Models\CorretoraSessao;
use App\Models\Log;
use App\Models\Slide;
use App\Models\Video;
use App\Models\Arte;
use App\Models\View;
use App\Models\AgendaDica;
use UAParser\Parser;
use \DateTime;

class AgendaController{
    
    public function index(){
        $ativa = 'Agenda';
        $subativo = '';
        $corretoraNome = explode(" ", $_SESSION['corretora_nome']);
        $slides = Slide::paginate(0, 3, "status = 'Ativo'");
        $artes = Arte::paginate(0, 8, "status = 'Ativo'", "id DESC");
        $videos = Video::paginate(0, 2, "status = 'Ativo'");
        $usuario = CorretoraUsuario::find($_SESSION['corretora_usuario_id']);
        Log::grava('Acesso Agenda');
        require_once __DIR__ . '/../Views/dashboard/agenda.php';
    }
    
    public function pegaDica(){
        if(isset($_POST['dt'])){
            $dt = $_POST['dt'];
            $date = new DateTime($dt);
            
            // Pega o nome do dia da semana (em inglês)
            $diaSemana = $date->format('l'); // Ex: Friday
            
            // Se quiser em português, pode fazer uma tradução simples:
            $traducao = [
                'Sunday' => 'dom',
                'Monday' => 'seg',
                'Tuesday' => 'ter',
                'Wednesday' => 'qua',
                'Thursday' => 'qui',
                'Friday' => 'sex',
                'Saturday' => 'sab',
            ];
            $dicas = AgendaDica::find(0, ["dia_semana LIKE '".$traducao[$diaSemana]."'"]);
            if(count($dicas) >0){
                $data['dica'] = '<div class="agendaDica">Dica: '.strtoupper($traducao[$diaSemana]).' - '.$dicas[0]->dica.'</div>';
                $data['sucesso'] = true;
            } else {
                $data['dica'] = '';
                $data['sucesso'] = true;
            }
        } else {
            $data['sucesso'] = false;
            $data['erro'] = 'A Data não pode estar vazia';
        }
        echo json_encode($data);
    }
    public function logout(){
        session_destroy();
        header("Location: /login");
    }
}
