 <!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Currículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Gerador de Currículo</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Ajuda</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2 class="text-center mb-4">Preencha seus Dados Pessoais</h2>
                <form id="cvForm" method="POST" action="process.php">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nome" class="form-label">Nome Completo *</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: João Silva" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="dataNasc" class="form-label">Data de Nascimento *</label>
                            <input type="date" class="form-control" id="dataNasc" name="dataNasc" required onchange="calcularIdade()">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="idade" class="form-label">Idade (Calculada Auto)</label>
                            <input type="number" class="form-control" id="idade" name="idade" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ex: joao@email.com" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone *</label>
                        <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Ex: (11) 99999-9999" required>
                    </div>
                    <div class="mb-3">
                        <label for="objetivo" class="form-label">Objetivo Profissional *</label>
                        <textarea class="form-control" id="objetivo" name="objetivo" rows="3" placeholder="Ex: Busco oportunidade como desenvolvedor..." required></textarea>
                    </div>

                    <!-- Experiências Profissionais -->
                    <h5>Experiências Profissionais</h5>
                    <div id="experiencias">
                        <div class="experiencia mb-3 border rounded p-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" class="form-control mb-2" name="exp_cargo[]" placeholder="Cargo">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control mb-2" name="exp_empresa[]" placeholder="Empresa">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control mb-2" name="exp_periodo[]" placeholder="Período (ex: 2020-2022)">
                                </div>
                                <div class="col-md-2">
                                    <textarea class="form-control" name="exp_descricao[]" rows="2" placeholder="Descrição"></textarea>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger btn-sm mt-2" onclick="removerCampo(this)">✕</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-primary mb-3" onclick="adicionarExperiencia()">+ Adicionar Experiência</button>

                    <!-- Referências Pessoais -->
                    <h5>Referências Pessoais</h5>
                    <div id="referencias">
                        <div class="referencia mb-3 border rounded p-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control mb-2" name="ref_nome[]" placeholder="Nome">
                                </div>
                                <div class="col-md-4">
                                    <input type="tel" class="form-control mb-2" name="ref_telefone[]" placeholder="Telefone">
                                </div>
                                <div class="col-md-4">
                                    <input type="email" class="form-control" name="ref_email[]" placeholder="Email">
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm" onclick="removerCampo(this)">✕</button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-primary mb-3" onclick="adicionarReferencia()">+ Adicionar Referência</button>

                    <button type="submit" class="btn btn-primary w-100">Gerar Currículo</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>