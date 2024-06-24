<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'conexao.php';


// Recuperar os dados dos dependentes
$sql = "SELECT id, nome, parentesco,cpf, data_nascimento FROM dependentes";
$result = $conn->query($sql);

// Verificar se a consulta foi bem-sucedida
if ($result === false) {
    die("Erro na consulta SQL: " . $conn->error);
}

$dependentes = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dependentes[] = $row;
    }
} else {
    $dependentes = [];
}

$conn->close();

// Retornar os dados em formato JSON
header('Content-Type: application/json');
echo json_encode($dependentes);
?>