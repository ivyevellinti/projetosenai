<?php
namespace Controller;
use Model\Agendamento;
use Exception;

class AgendamentoController{

    private $agendamentoModel;

    public function __construct(){
        $this->agendamentoModel = new Agendamento();
    }

    public function criarAgendamento($nome_paciente, $espacialidade, $data, $horario){
        if (empty($nome_paciente) or empty($especialidade) or empty ($data) or empty ($horario)){
            return false;
        }
        
        return $this->agendamentoModel->consultasAgendadas($nome_paciente, $espacialidade, $data, $horario);
    }



}

?>