<?php

namespace Controller;

use Model\User;
use Exception;

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    // REGISTRO DE USUÁRIO
    public function createUser($user_fullname, $email, $birth, $cpf, $password)
    {

        if (empty($user_fullname) or empty($email) or empty($birth) or  empty($cpf) or empty($password)) {
            return false;
        }

        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        return $this->userModel->registerUser($user_fullname, $email, $birth,  $cpf, $password);

    }

    // E-MAIL JÁ CADASTRADO?
    public function checkUserByCpf($cpf)
    {
        return $this->userModel->getUserByCpf($cpf);
    }

    // LOGIN DE USUÁRIO
    public function login($cpf, $password)
    {
        $user = $this->userModel->getUserByCpf($cpf);

        /**
         * $user = [
         *    "id" => 1,
         *    "user_fullname" => "Teste",
         *    "email" => "teste@example.com",
         *    "password" => "$2y$10$19ujCfISbUFtFqPRJx9PN.G8fGcqNCkWTnitJpMOdJZ0x6TYL6EzC",
         *    ...
         * ]
         */
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['user_fullname'] = $user['user_fullname'];
            $_SESSION['cpf'] = $user['cpf'];
            var_dump($_SESSION);
            return true;
        }
        return false;
    }

    // USUÁRIO LOGADO?
    public function isLoggedIn()
    {
        return isset($_SESSION['id']);
    }

    // RESGATAR DADOS DO USUÁRIO
    public function getUserData($id, $user_fullname, $email, $birth, $cpf)
    {
        return $this->userModel->getUserInfo($id, $user_fullname, $email, $birth, $cpf);
    }
}

?>