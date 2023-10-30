// Verifica se o navegador suporta notificações
if ("Notification" in window) {
    // Verifica se o usuário já concedeu permissão de notificação
    if (Notification.permission === "granted") {
      mostrarConteudo();
    } else if (Notification.permission !== "denied") {
      // Se a permissão não foi negada, exibe o tutorial e solicita permissão
      exibirTutorial();
      solicitarPermissao();
    }
  }
  
  // Função para exibir o tutorial visual
  function exibirTutorial() {
    document.getElementById("tutorial").classList.remove("hidden");
  }
  
  // Função para solicitar permissão de notificação
  function solicitarPermissao() {
    Notification.requestPermission().then(function (permission) {
      if (permission === "granted") {
        mostrarConteudo();
      }
    });
  }
  
  // Função para mostrar o conteúdo após a permissão ser concedida
  function mostrarConteudo() {
    document.getElementById("tutorial").classList.add("hidden");
    document.getElementById("conteudo").classList.remove("hidden");
    window.location.href = "index.php";

  }
  