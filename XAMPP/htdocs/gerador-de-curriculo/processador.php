<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = htmlspecialchars($_POST['nome']);
    $idade = $_POST['idade'];
    $email = htmlspecialchars($_POST['email']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $objetivo = htmlspecialchars($_POST['objetivo']);

    // Experiências (arrays dinâmicos, com período do esboço)
    $experiencias = [];
    if (isset($_POST['exp_cargo'])) {
        for ($i = 0; $i < count($_POST['exp_cargo']); $i++) {
            $experiencias[] = [
                'cargo' => htmlspecialchars($_POST['exp_cargo'][$i]),
                'empresa' => htmlspecialchars($_POST['exp_empresa'][$i]),
                'periodo' => htmlspecialchars($_POST['exp_periodo'][$i] ?? ''),  // Período como no esboço
                'descricao' => htmlspecialchars($_POST['exp_descricao'][$i])
            ];
        }
    }

    // Referências
    $referencias = [];
    if (isset($_POST['ref_nome'])) {
        for ($i = 0; $i < count($_POST['ref_nome']); $i++) {
            $referencias[] = [
                'nome' => htmlspecialchars($_POST['ref_nome'][$i]),
                'telefone' => htmlspecialchars($_POST['ref_telefone'][$i]),
                'email' => htmlspecialchars($_POST['ref_email'][$i])
            ];
        }
    }

    // Armazena na session pra passar pro preview
    session_start();
    $_SESSION['cv_data'] = [
        'nome' => $nome,
        'idade' => $idade,
        'email' => $email,
        'telefone' => $telefone,
        'objetivo' => $objetivo,
        'experiencias' => $experiencias,
        'referencias' => $referencias
    ];

    // Redireciona pro preview (tela 2 do esboço)
    header('Location: preview.php');
    exit;
} else {
    // Se acessar direto, volta pro form
    header('Location: index.php');
    exit;
}
?>
