document.addEventListener("DOMContentLoaded", function () {
  // Seleciona todos os botões "Agendar" dos serviços
  const botoesAgendar = document.querySelectorAll(".service-item button");

  botoesAgendar.forEach((botao) => {
    botao.addEventListener("click", function () {
      // Pegamos o título do serviço
      const servico = botao.parentElement.querySelector("h4").textContent.trim();

      if (servico === "Pediatria") {
        // Redireciona para a página específica de Pediatria
        window.location.href = "pediatria.php";
      } else {
        // Caso clique em outro serviço (você pode futuramente criar as páginas deles também)
        alert(`Página de ${servico} ainda não está pronta.`);
      }
    });
  });
});