<?php
// deallocate.php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $animal_id = $_POST['animal_id'];

    if (!empty($animal_id)) {
        try {
            $stmt = $pdo->prepare("UPDATE animais SET status = 'available', responsible_name = NULL, responsible_location = NULL WHERE id = ?");
            $stmt->execute([$animal_id]);
            echo "Animal desalocado com sucesso.";
        } catch (PDOException $e) {
            echo "Erro ao desalocar o animal: " . $e->getMessage();
        }
    } else {
        echo "Selecione um animal para desalocar.";
    }
}
?>
