<?php
session_start();

function sanitize($value) {
    return htmlspecialchars(trim((string)$value), ENT_QUOTES, 'UTF-8');
}

function calcularIdadePHP($dataStr) {
    if (empty($dataStr)) return null;
    try {
        $nasc = new DateTime($dataStr);
        $hoje = new DateTime('today');
        $diff = $nasc->diff($hoje);
        return (int)$diff->y;
    } catch (Exception $e) {
        return null;
    }
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$nome = sanitize($_POST['nome'] ?? '');
$data_nascimento = sanitize($_POST['data_nascimento'] ?? '');
$email = sanitize($_POST['email'] ?? '');
$telefone = sanitize($_POST['telefone'] ?? '');
$objetivo = sanitize($_POST['objetivo'] ?? '');

// Experiências
$experiencias = [];
$exp_cargos = $_POST['exp_cargo'] ?? [];
$exp_empresas = $_POST['exp_empresa'] ?? [];
$exp_periodos = $_POST['exp_periodo'] ?? [];
$exp_descricoes = $_POST['exp_descricao'] ?? [];

$countExp = max(count($exp_cargos), count($exp_empresas), count($exp_periodos), count($exp_descricoes));
for ($i = 0; $i < $countExp; $i++) {
    $cargo = isset($exp_cargos[$i]) ? sanitize($exp_cargos[$i]) : '';
    $empresa = isset($exp_empresas[$i]) ? sanitize($exp_empresas[$i]) : '';
    $periodo = isset($exp_periodos[$i]) ? sanitize($exp_periodos[$i]) : '';
    $descricao = isset($exp_descricoes[$i]) ? sanitize($exp_descricoes[$i]) : '';
    if ($cargo || $empresa || $periodo || $descricao) {
        $experiencias[] = [
            'cargo' => $cargo,
            'empresa' => $empresa,
            'periodo' => $periodo,
            'descricao' => $descricao,
        ];
    }
}

// Referências
$referencias = [];
$ref_nomes = $_POST['ref_nome'] ?? [];
$ref_telefones = $_POST['ref_telefone'] ?? [];
$ref_emails = $_POST['ref_email'] ?? [];

$countRef = max(count($ref_nomes), count($ref_telefones), count($ref_emails));
for ($i = 0; $i < $countRef; $i++) {
    $rnome = isset($ref_nomes[$i]) ? sanitize($ref_nomes[$i]) : '';
    $rtel = isset($ref_telefones[$i]) ? sanitize($ref_telefones[$i]) : '';
    $remail = isset($ref_emails[$i]) ? sanitize($ref_emails[$i]) : '';
    if ($rnome || $rtel || $remail) {
        $referencias[] = [
            'nome' => $rnome,
            'telefone' => $rtel,
            'email' => $remail,
        ];
    }
}

$idade = calcularIdadePHP($data_nascimento);

$_SESSION['cv_data'] = [
    'nome' => $nome,
    'data_nascimento' => $data_nascimento,
    'idade' => $idade,
    'email' => $email,
    'telefone' => $telefone,
    'objetivo' => $objetivo,
    'experiencias' => $experiencias,
    'referencias' => $referencias,
];

header('Location: preview.php');
exit;
?>