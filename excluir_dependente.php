<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'conexao.php';

// Excluir o dependente
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM dependentes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "Dependente excluído com sucesso!";
    } else {
        echo "Erro ao excluir dependente: " . $conn->error;
    }
    $stmt->close();
}

$conn->close();
?>