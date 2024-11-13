<?php
// controle_saude.php
include 'db.php';

if (isset($_POST['submit_exame'])) {
    $tipoExame = $_POST['tipo_exame'];
    $dataExame = $_POST['data_exame'];
    $resultadoExame = $_POST['resultado_exame'];

    $stmt = $pdo->prepare("INSERT INTO exames (tipo_exame, data_exame, resultado_exame) VALUES (?, ?, ?)");
    $stmt->execute([$tipoExame, $dataExame, $resultadoExame]);
    echo "Exame salvo com sucesso!";
}

if (isset($_POST['submit_vacina'])) {
    $nomeVacina = $_POST['nome_vacina'];
    $dataVacina = $_POST['data_vacina'];
    $proximaVacina = $_POST['proxima_vacina'];

    $stmt = $pdo->prepare("INSERT INTO vacinas (nome_vacina, data_vacina, proxima_vacina) VALUES (?, ?, ?)");
    $stmt->execute([$nomeVacina, $dataVacina, $proximaVacina]);
    echo "Vacina salva com sucesso!";
}

if (isset($_POST['submit_tratamento'])) {
    $tipoTratamento = $_POST['tipo_tratamento'];
    $dataInicio = $_POST['data_inicio_tratamento'];
    $dataFim = $_POST['data_fim_tratamento'];
    $observacoes = $_POST['observacoes_tratamento'];

    $stmt = $pdo->prepare("INSERT INTO tratamentos (tipo_tratamento, data_inicio, data_fim, observacoes) VALUES (?, ?, ?, ?)");
    $stmt->execute([$tipoTratamento, $dataInicio, $dataFim, $observacoes]);
    echo "Tratamento salvo com sucesso!";
}

