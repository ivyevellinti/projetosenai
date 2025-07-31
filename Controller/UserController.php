<?php
namespace Controller;
use Model\User;
use Exception;

class UserController
{
    private $userModel;
    public function __construct(){
        $this->userModel = new User();
    }
    public function createUser($user_fullname, $email, $birth, $cpf, $password){
        if (empty($user_fullname) or empty($email) or empty($birth) or  empty($cpf) or empty($password)) {
            return false;
        }
        // echo "hello";
        //REGISTRAR USUÁRIO
        return $this->userModel->registerUser($user_fullname, $email, $password, $birth, $cpf);

    }

    public function checkUserByCpf($cpf)
    {
        return $this->userModel->getUserByCpf($cpf);
    }

    public function login($cpf, $password)
    {
        $user = $this->userModel->getUserByCpf($cpf);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['user_fullname'] = $user['user_fullname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['formatedDate'] = $user [date('d/m/Y', strtotime($user['birth']))];
            $_SESSION['cpf'] = $user['cpf'];
            
            return true;
        }
        return false;
    }

    public function isLoggedIn(){
        return isset($_SESSION['id']);
    }
    public function dadosUsuario($id){
        return $this->userModel->getUserInfo($id);
    }
}

?>