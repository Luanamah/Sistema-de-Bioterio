<?php
// cadastro_alimentacao.php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $quantidade = $_POST['quantidade'] ?? '';
    $calorias = $_POST['calorias'] ?? null;
    $data_hora = $_POST['data_hora'] ?? '';
    $observacoes = $_POST['observacoes'] ?? '';

    if (!empty($nome) && !empty($categoria) && !empty($quantidade) && !empty($data_hora)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO alimentacao (nome, categoria, quantidade, calorias, data_hora, observacoes) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$nome, $categoria, $quantidade, $calorias, $data_hora, $observacoes]);
            header("Location: cadastro_alimentacao.html?message=" . urlencode("Cadastro realizado com sucesso!"));
            exit();
        } catch (PDOException $e) {
            echo "Erro ao salvar o cadastro: " . $e->getMessage();
        }
    } else {
        echo "Por favor, preencha todos os campos obrigatórios.";
    }
}
?>
