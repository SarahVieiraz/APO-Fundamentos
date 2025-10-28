<?php
// sucesso.php — Página de confirmação após gerar/baixar o currículo
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Currículo Gerado com Sucesso</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
  <nav class="navbar navbar-dark navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#">Gerador de Currículos</a>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Ajuda</a></li>
      </ul>
    </div>
  </nav>

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">
        <div class="card success-card text-center shadow-sm">
          <div class="card-body p-4">
            <div class="success-icon mx-auto mb-3" aria-hidden="true">
              <!-- Ícone de check dentro de círculo verde -->
              <svg width="72" height="72" viewBox="0 0 72 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="36" cy="36" r="36" fill="#DFF6DD"></circle>
                <path d="M50 27L33 44L22 33" stroke="#2E7D32" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>

            <h1 class="h5 mb-2">Currículo gerado com sucesso!</h1>
            <p class="text-muted mb-4">Seu currículo foi gerado e está pronto para download. Use a função de impressão do navegador para salvar como PDF.</p>

            <div class="d-flex justify-content-center gap-2 mb-4">
              <a href="index.php" class="btn btn-outline-secondary">
                <span class="me-1">📄</span> Criar Novo Currículo
              </a>
              <a href="index.php" class="btn btn-primary">
                <span class="me-1">🏠</span> Voltar ao Início
              </a>
            </div>

            <hr>
            <div class="mt-4 text-start">
              <p class="text-muted fw-semibold mb-2">Próximos passos</p>
              <ul class="list-unstyled small text-muted">
                <li class="mb-2">✓ Revise seu currículo cuidadosamente antes de enviar</li>
                <li class="mb-2">✓ Personalize o currículo para cada vaga que se candidatar</li>
                <li class="mb-1">✓ Mantenha suas informações sempre atualizadas</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>