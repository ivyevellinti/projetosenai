<?php

use PHPUnit\Framework\TestCase;
use Controller\AgendamentoController;
use Model\Agendamento;

class AgendamentoTest extends TestCase {
     private $AgendamentoController;
     private $mockAgendamentoModel;

     public function setUp(): void {
        $this->mockAgendamentoModel = $this->createMock(Agendamento::class);
        $this->AgendamentoController = new AgendamentoController($this->mockAgendamentoModel);
     }

     #[PHPUnit\Framework\Attributes\Test]
     public function it_should_be_able_to_create_schedule_appointment (){
      $this->mockAgendamentoModel->method('consultasAgendadas')->willReturn(true);
      $agendamentoResult = $this->AgendamentoController->criarAgendamento(
         'Ivy Evellin',
         'Clínico Geral',
         '2026-10-07',
         '10:30');
      $this->assertTrue($agendamentoResult);
     }

}
?>