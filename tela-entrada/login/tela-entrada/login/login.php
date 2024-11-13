<?php
// Arquivo: login/login.php

session_start();
require_once '../database/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        $query = "SELECT * FROM usuarios WHERE username = :username";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: dashboard.php"); // Redireciona para o painel do usuário
            exit;
        } else {
            echo "<p style='color:red; text-align:center;'>Nome de usuário ou senha incorretos.</p>";
        }
    } else {
        echo "<p style='color:red; text-align:center;'>Por favor, preencha todos os campos.</p>";
    }
}
?>
