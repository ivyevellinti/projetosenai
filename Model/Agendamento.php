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
            echo "Erro ao executar o comando " . $error->getMessage();
            return false;
        }
    }

}
?>