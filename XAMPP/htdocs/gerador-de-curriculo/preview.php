<?php
session_start();
if (!isset($_SESSION['cv_data'])) {
    header('Location: index.php');
    exit;
}
$data = $_SESSION['cv_data'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Currículo - <?php echo $data['nome']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print { body { font-size: 12pt; } .no-print { display: none; } .sidebar { border-right: 2px solid #dee2e6; } }
        body { background-color: #f8f9fa; }
        .sidebar { background-color: #e9ecef; padding: 20px; height: fit-content; }
        .main-content { padding: 20px; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Gerador de Currículo</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Ajuda</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4 sidebar">
                <h2><?php echo $data['nome']; ?></h2>
                <p><strong>Idade:</strong> <?php echo $data['idade']; ?> anos</p>
                <p><strong>Email:</strong> <?php echo $data['email']; ?></p>
                <p><strong>Telefone:</strong> <?php echo $data['telefone']; ?></p>
                <h5>Objetivo Profissional</h5>
                <p><?php echo nl2br($data['objetivo']); ?></p>
                <h5>Referências</h5>
                <?php if (!empty($data['referencias'])): ?>
                    <?php foreach ($data['referencias'] as $ref): ?>
                        <p><strong><?php echo $ref['nome']; ?></strong><br>
                        <?php echo $ref['telefone']; ?> | <?php echo $ref['email']; ?></p>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Nenhuma referência adicionada.</p>
                <?php endif; ?>
            </div>
            <div class="col-md-8 main-content">
                <h5>Experiências Profissionais</h5>
                <?php if (!empty($data['experiencias'])): ?>
                    <?php foreach ($data['experiencias'] as $exp): ?>
                        <div class="mb-4 border-bottom pb-3">
                            <h6><?php echo $exp['cargo']; ?> - <?php echo $exp['empresa']; ?></h6>
                            <p><em><?php echo $exp['periodo']; ?></em></p>
                            <p><?php echo nl2br($exp['descricao']); ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Nenhuma experiência adicionada.</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="text-center no-print mt-4">
            <button onclick="window.print()" class="btn btn-success me-2">📄 Imprimir</button>
            <a href="preview.php" class="btn btn-info me-2" onclick="window.print(); return false;">💾 Baixar PDF</a>
            <a href="index.php" class="btn btn-secondary">← Voltar para Edição</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php session_destroy();  ?>
