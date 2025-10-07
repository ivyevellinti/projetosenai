<?php

use PHPUnit\Framework\TestCase;
use Controller\UserController;
use Model\User;

class UserTest extends TestCase {
     private $AgendamentoController;
     private $mockUserModel;

     public function setUp(): void {
        $this->mockAgendamentoModel = $this->createMock(Agendamento::class);
        $this->AgendamentoController = new UserController($this->mockAgendamentoModel);
     }

     #[PHPUnit\Framework\Attributes\Test]
     public function it_should_be_able_to_create_schedule_appointment (){
      $this->mockAgendamentoModel->method('consultasAgendadas')->willReturn(true);
      $agendamentoResult = $this->AgendamentoController->criarAgendamento('Ivy Evellin', 'Clínico Geral', '2026-10-07','10:30');
      $this->assertTrue($agendamentoResult);
     }

}
?>