<?php
// processa_denuncia.php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // Only accept POST requests
    http_response_code(405);
    echo "Método não permitido. Por favor, envie o formulário corretamente.";
    exit;
}
// Collect and sanitize inputs
$nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$descricao = isset($_POST['descricao']) ? trim($_POST['descricao']) : '';
// Validate required fields
$errors = [];
if (empty($email)) {
    $errors[] = "O campo E-mail é obrigatório.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "O E-mail informado não é válido.";
}
if (empty($descricao)) {
    $errors[] = "A descrição do caso é obrigatória.";
}
if (!empty($errors)) {
    // Show errors and stop
    http_response_code(400);
    echo "Erros no formulário:<br>";
    foreach ($errors as $error) {
        echo htmlspecialchars($error) . "<br>";
    }
    exit;
}
$nome = htmlspecialchars($nome, ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
$descricao = htmlspecialchars($descricao, ENT_QUOTES, 'UTF-8');

$date = date('Y-m-d H:i:s');
$logEntry = "Data: $date" . PHP_EOL .
            "Nome: " . ($nome !== '' ? $nome : '[Não informado]') . PHP_EOL .
            "E-mail: $email" . PHP_EOL .
            "Descrição: $descricao" . PHP_EOL .
            "------------------------------" . PHP_EOL;

$file = 'denuncias.txt';

if (file_put_contents($file, $logEntry, FILE_APPEND | LOCK_EX) === false) {
    http_response_code(500);
    echo "Erro ao salvar a denúncia. Por favor, tente novamente mais tarde.";
    exit;
}
// Success message
?>
