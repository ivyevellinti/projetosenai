<?php

use PHPUnit\Framework\TestCase;
use Controller\UserController;
use Model\User;

class UserTest extends TestCase {
     private $userController;
     private $mockUserModel;

     public function setUp(): void {
        $this->mockUserModel = $this->createMock(User::class);
        $this->userController = new UserController($this->mockUserModel);
     }

     #[PHPUnit\Framework\Attributes\Test]
     public function it_should_be_able_to_create_user(){
      $this->mockUserModel->method('registerUser')->willReturn(true);
      $userResult = $this->userController->createUser('Ivy Evellin', 'ivy@example.com', '2007-10-03','123.456.789-10', '123');
      $this->assertTrue($userResult);
     }

     #[PHPUnit\Framework\Attributes\Test]
     public function it_shouldnt_be_able_to_create_user_with_a_existent_cpf() {
      //PERGUNTAR A PROFESSORA COMO VERIFICA SE JÁ EXISTE CPF CADASTRADO
     }

     public function it_should_be_able_to_sign_in(){
      $this->mockUserModel->method('getUserByCpf')->willReturn([
         'id' => 1,
         "user_fullname" => 'Ivy Evellin',
         'email' => 'ivy@example.com',
         'birth' => '2007-10-03',
         'cpf' => '123.456.789-10',
         'password' => password_hash('123', PASSWORD_DEFAULT)
      ]);

      $userResult = $this->userController->login('123.456.789-10', '123');
      $this->assertTrue($userResult);

      $this->assertEquals(1, $_SESSION['id']);
      $this->assertEquals('Ivy Evellin', $_SESSION['user_fullname']);
      $this->assertEquals('123.456.789-10', $_SESSION['123.456.789-10']);
     }
}

?>