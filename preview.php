<?php
session_start();
$dados = $_SESSION['cv_data'] ?? null;
if (!$dados) {
    header('Location: index.php');
    exit;
}

function e($str) { return htmlspecialchars((string)$str, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preview do Currículo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Gerador de Currículos</a>
            <div class="ms-auto no-print">
                <a href="index.php" class="btn btn-outline-light btn-sm">Voltar</a>
            </div>
        </div>
    </nav>

    <div class="container my-4 cv-preview">
        <div class="row">
            <!-- Sidebar Esquerda -->
            <div class="col-12 col-md-4">
                <div class="sidebar p-4">
                    <h1 class="h4 mb-3"><?= e($dados['nome'] ?? '') ?></h1>
                    <ul class="list-unstyled mb-3">
                        <li><strong>Idade:</strong> <?= isset($dados['idade']) && $dados['idade'] !== null ? e($dados['idade']) : '-' ?></li>
                        <li><strong>Email:</strong> <?= e($dados['email'] ?? '') ?></li>
                        <li><strong>Telefone:</strong> <?= e($dados['telefone'] ?? '') ?></li>
                    </ul>
                    <div class="mb-3">
                        <h2 class="h6 text-uppercase">Objetivo</h2>
                        <p><?= nl2br(e($dados['objetivo'] ?? '')) ?></p>
                    </div>
                    <div>
                        <h2 class="h6 text-uppercase">Referências</h2>
                        <?php if (!empty($dados['referencias'])): ?>
                            <ul class="list-unstyled">
                                <?php foreach ($dados['referencias'] as $ref): ?>
                                    <li class="mb-2">
                                        <strong><?= e($ref['nome'] ?? '') ?></strong><br>
                                        <span><?= e($ref['telefone'] ?? '') ?></span><br>
                                        <span><?= e($ref['email'] ?? '') ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p class="text-muted">Nenhuma referência informada.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Coluna Direita: Experiências -->
            <div class="col-12 col-md-8">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="h5 section-title">Experiências Profissionais</h2>
                    <div class="no-print">
                        <button class="btn btn-primary btn-sm me-2" onclick="window.print()">Imprimir</button>
                        <button class="btn btn-secondary btn-sm" id="btn-baixar">Baixar PDF</button>
                    </div>
                </div>

                <?php if (!empty($dados['experiencias'])): ?>
                    <?php foreach ($dados['experiencias'] as $exp): ?>
                        <div class="card shadow-sm mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <strong><?= e($exp['cargo'] ?? '') ?></strong>
                                    <span class="text-muted"><?= e($exp['periodo'] ?? '') ?></span>
                                </div>
                                <div class="mb-2"><span class="badge bg-secondary"><?= e($exp['empresa'] ?? '') ?></span></div>
                                <p class="mb-0"><?= nl2br(e($exp['descricao'] ?? '')) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-muted">Nenhuma experiência informada.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      // Após imprimir/baixar PDF, redireciona para a página de sucesso
      function redirectSucesso(){ window.location.href = 'sucesso.php'; }
      document.getElementById('btn-baixar')?.addEventListener('click', function(){
        window.print();
        // Fallback para navegadores sem onafterprint
        setTimeout(redirectSucesso, 400);
      });
      if ('onafterprint' in window) {
        window.onafterprint = redirectSucesso;
      }
    </script>
</body>
</html>
<?php
// Encerrar a sessão no final do preview
session_destroy();
?>