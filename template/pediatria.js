document.addEventListener("DOMContentLoaded", function () {
  // Seleciona todos os botões de horários
  const horarios = document.querySelectorAll(".horarios button");

  horarios.forEach((botao) => {
    botao.addEventListener("click", function () {
      // Obtém o horário
      const horario = botao.textContent.trim();

      // Obtém o nome do médico
      const medico = botao.closest(".medico-box").querySelector("h4").textContent.trim();

      // Obtém o preço
      const preco = botao.closest(".medico-box").querySelector(".preco").textContent.trim();

      // Aqui você pode enviar os dados para o servidor ou apenas mostrar a confirmação
      alert(
        `Agendamento Concluído!\n\nMédico: ${medico}\nHorário: ${horario}\n${preco}`
      );

      // 🔹  redirecionar para uma página de perfil:
      window.location.href = ".html";
    });
  });
});