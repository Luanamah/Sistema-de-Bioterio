<?php
// Arquivo: database/db_connection.php

$host = 'localhost';
$dbname = 'nome_do_banco';
$user = 'usuario_do_banco';
$pass = 'senha_do_banco';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>
