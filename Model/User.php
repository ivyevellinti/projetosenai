<?php

namespace Model;
use Model\Connection;
use PDO;
use PDOException;
use Exception;

class User
{
    private $db;

    public function __construct(){
        $this->db = Connection::getInstance();
    }

    public function registerUser($user_fullname, $email, $password, $birth, $cpf){
        try {
            $sql = 'INSERT INTO user (user_fullname, email, password, birth, cpf) VALUES (:user_fullname, :email, :password, :birth, :cpf)';
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":user_fullname", $user_fullname, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":birth", $birth, PDO::PARAM_STR);
            $stmt->bindParam(":cpf", $cpf, PDO::PARAM_STR);
            $stmt->bindParam(":password", $hashedPassword, PDO::PARAM_STR);
            return $stmt->execute();

        } catch (PDOException $error) {
            echo "Erro ao executar o comando " . $error->getMessage();
            return false;
        }
    }
    public function getUserByCpf($cpf){
        try {
            $sql = "SELECT * FROM user WHERE cpf = :cpf LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":cpf", $cpf, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
        }
    }

    //PRECISO DESSA FUNÇÃO PARA MOSTRAR AS CONSULTAS AGENDADAS
    public function getUserInfo($id){
        try {
            //ALTEREI ESSA LINHA PQ ESTAVA COM ERRO DE QUANTIDADE DE VARIÁVEL EMBAIXO, "msg de erro"
            $sql = "SELECT user_fullname, email, birth, cpf FROM user WHERE id = :id LIMIT 1"; 

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            // $stmt->bindParam(":user_fullname", $user_fullname, PDO::PARAM_STR);
            // $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            // $stmt->bindParam(":birth", $birth, PDO::PARAM_STR);
            // $stmt->bindParam(":cpf", $cpf, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
            
        } catch (PDOException $error) {
            echo "Erro ao buscar informações: " . $error->getMessage();
            return false;
        }
    }
}

?>