<?php

namespace Model;
use Model\Connection;
use PDO;
use PDOException;
use Exception;

class Agendamento {
    private $db;

    public function __construct(){
        $this->db = Connection::getInstance();
    }

    public function consultasAgendadas($nome_paciente, $especialidade, $data, $horario){
        try{
        $sql = 'INSERT INTO agendamento (nome_paciente, especialidade, data, horario) VALUES (:nome_paciente, :especialidade, :data, :horario)';
        
       
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindParam(":nome_paciente", $nome_paciente, PDO::PARAM_STR);
        $stmt->bindParam(":especialidade", $especialidade, PDO::PARAM_STR);
        $stmt->bindParam(":data", $data, PDO::PARAM_STR);
        $stmt->bindParam(":horario", $horario, PDO::PARAM_STR);

        return $stmt->execute();

        } catch (PDOException $error) {
            echo "Erro ao registrar as informações" . $error->getMessage();
            return false;
        }
    }


    public function getAgendamento($id){
        try {
            //ALTEREI ESSA LINHA PQ ESTAVA COM ERRO DE QUANTIDADE DE VARIÁVEL EMBAIXO, "msg de erro"
            $sql = "SELECT nome_paciente, especialidade, DATE_FORMAT(data, '%d/%m/%Y') AS dateFormated, horario FROM agendamento WHERE id = :id LIMIT 1";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
            
        } catch (PDOException $error) {
            echo "Erro ao buscar informações: " . $error->getMessage();
            return false;
        }
    }
}
?>