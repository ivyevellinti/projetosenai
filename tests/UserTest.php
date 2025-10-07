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
      $userResult = $this->userController->createUser(
         'Ivy Evellin',
         'ivy@example.com',
         '2007-10-03',
         '123.456.789-10',
         '123');
      $this->assertTrue($userResult);
     }

















   #[PHPUnit\Framework\Attributes\Test]
   public function it_shouldnt_be_able_to_create_user_with_a_existent_cpf() {
    $this->mockUserModel->method('registerUser')->willReturn(false);
    $this->mockUserModel->method('registerUser')->willThrowException(new \Exception('Já existe um usuário cadastrado com esse cpf'));
    $this->expectExceptionMessage('Já existe um usuário cadastrado com esse cpf');

    $this->userController->createUser(
        'Ivy Evellin',
        'ivy@example.com',
        '2007-10-03',
        '123.456.789-10',
        '123'
    );
    }













      #[\PHPUnit\Framework\Attributes\Test]
      public function it_shouldnt_be_able_to_create_user_with_empty_or_null_inputs(){
        $this->userController->method('createUser')->willThrowException(new \Exception('Preencha todos os campos!'));
        $this->expectExceptionMessage('Preencha todos os campos!');

     $this->userController->createUser(
        'Ivy Evellin',
        'ivy@example.com',
        '2007-10-03',
        null,
        '123'
    );
    }












     
     #[PHPUnit\Framework\Attributes\Test]
     public function it_should_be_able_to_sign_in(){
      $this->mockUserModel->method('getUserByCpf')->willReturn([
         'id' => 1,
         'cpf' => '123.456.789-10',
         'password' => password_hash('123', PASSWORD_DEFAULT)
      ]);

      $userResult = $this->userController->login('123.456.789-10', '123');
      $this->assertTrue($userResult);

      $this->assertEquals(1, $_SESSION['id']);
      $this->assertEquals('123.456.789-10', $_SESSION['cpf']);
     }
     
















     #[PHPUnit\Framework\Attributes\Test]
        public function it_shouldnt_login_with_invalid_credentials(){
         $this->mockUserModel->method('getUserByCpf')->willReturn([
          'id' => 1,
          'cpf' => '123.456.789-10',
          'password' => password_hash('123443563457', PASSWORD_DEFAULT)
        ]);
        $userResult = $this->userController->login('123.456.789-10', '123443563457');

        $this->expectExceptionMessage('Cpf ou Senha incorretos');
        $this->assertFalse($userResult);
        }

















        public function it_shouldnt_login_with_empty_or_null_inputs(){
         $this->mockUserModel->method('getUserByCpf')->willReturn([
          'id' => 1,
          'cpf' => null,
          'password' => password_hash('123', PASSWORD_DEFAULT)
        ]);
        $userResult = $this->userController->login(null, '123');
        $this->expectExceptionMessage('Preencha suas credenciais!');
        $this->assertFalse($userResult);
        }

}

?>