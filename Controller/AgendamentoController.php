<?php
namespace Controller;
use Model\Agendamento;
use Exception;

class AgendamentoController{

    private $agendamentoModel;

    public function __construct(Agendamento $agendamentoModel){
        $this->agendamentoModel = $agendamentoModel;
    }

    //ESSA FUNÇÃO É RESPONSÁVEL POR ENVIAR OS DADOS AO BANCO DE DADOS, MAS NÃO ESTÁ FUNCIONANDO
    //Sophia e anna luisa "espacialidade"
    public function criarAgendamento($nome_paciente, $especialidade, $data, $horario){
        if (empty($nome_paciente) or empty($especialidade) or empty ($data) or empty ($horario)){
            return false;
        }
            return $this->agendamentoModel->consultasAgendadas($nome_paciente, $especialidade, $data, $horario);
    }

    public function dadosAgendamento($id){
        return $this->agendamentoModel->getAgendamento($id);
    }

}

?>