<?php
// allocate.php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $animal_id = $_POST['animal_id'];
    $responsible_name = $_POST['responsible_name'];
    $responsible_location = $_POST['responsible_location'];

    if (!empty($animal_id) && !empty($responsible_name) && !empty($responsible_location)) {
        try {
            $stmt = $pdo->prepare("UPDATE animais SET status = 'allocated', responsible_name = ?, responsible_location = ? WHERE id = ?");
            $stmt->execute([$responsible_name, $responsible_location, $animal_id]);
            header("Location: index.html?message=" . urlencode("Animal alocado com sucesso."));
            exit();
        } catch (PDOException $e) {
            echo "Erro ao alocar o animal: " . $e->getMessage();
        }
    } else {
        echo "Todos os campos devem ser preenchidos.";
    }
}
?>
