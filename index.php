<?php
// index.php - Formulário de entrada
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerador de Currículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Gerador de Currículos</a>
        </div>
    </nav>

    <div class="container my-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="h4 mb-3">Preencha seus dados</h1>
                        <form action="processador.php" method="POST" novalidate>
                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <label for="nome" class="form-label">Nome Completo</label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome completo" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                                    <div class="form-text" id="idadeDisplay">Idade: —</div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="seu@email.com" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="telefone" class="form-label">Telefone</label>
                                    <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="(xx) xxxxx-xxxx" required>
                                </div>
                                <div class="col-12">
                                    <label for="objetivo" class="form-label">Objetivo Profissional</label>
                                    <textarea class="form-control" id="objetivo" name="objetivo" rows="4" placeholder="Descreva seu objetivo" required></textarea>
                                </div>
                            </div>

                            <hr class="my-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h2 class="h5 m-0">Experiências Profissionais</h2>
                                <button type="button" id="add-exp-btn" class="btn btn-sm btn-primary">+ Adicionar</button>
                            </div>
                            <div id="experiencias-container">
                                <div class="repeatable-item card border-0 shadow-sm mb-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="fw-semibold">Experiência</span>
                                            <button type="button" class="btn btn-sm btn-outline-danger btn-remove" title="Remover">✕</button>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Cargo</label>
                                                <input type="text" class="form-control" name="exp_cargo[]" placeholder="Ex.: Analista de Sistemas" required>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Empresa</label>
                                                <input type="text" class="form-control" name="exp_empresa[]" placeholder="Ex.: ACME Ltda." required>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Período</label>
                                                <input type="text" class="form-control" name="exp_periodo[]" placeholder="Ex.: 2020-2022" required>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Descrição</label>
                                                <textarea class="form-control" name="exp_descricao[]" rows="3" placeholder="Descreva atividades e resultados" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h2 class="h5 m-0">Referências</h2>
                                <button type="button" id="add-ref-btn" class="btn btn-sm btn-primary">+ Adicionar</button>
                            </div>
                            <div id="referencias-container">
                                <div class="repeatable-item card border-0 shadow-sm mb-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="fw-semibold">Referência</span>
                                            <button type="button" class="btn btn-sm btn-outline-danger btn-remove" title="Remover">✕</button>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Nome</label>
                                                <input type="text" class="form-control" name="ref_nome[]" placeholder="Ex.: Maria Silva" required>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Telefone</label>
                                                <input type="tel" class="form-control" name="ref_telefone[]" placeholder="(xx) xxxxx-xxxx" required>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" name="ref_email[]" placeholder="referencia@email.com" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-success">Gerar Currículo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center py-4 text-muted">
        <small>APO - Fundamentos de Programação para Internet</small>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="JS/script.js"></script>
</body>
</html>