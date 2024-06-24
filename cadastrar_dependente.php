<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conexão com o banco de dados
include 'conexao.php';


// Cadastrar o dependente
if (isset($_POST['nome_dep']) && isset($_POST['dependente']) && isset($_POST['cpf_dep']) && isset($_POST['dt_nasc_dep'])) {
    $nome = $_POST['nome_dep'];
    $parentesco = $_POST['dependente'];
    $cpf = $_POST['cpf_dep'];
    $data_nascimento = $_POST['dt_nasc_dep'];
    $cpf_titular = $_POST['cpf_titular'];

    $sql = "INSERT INTO dependentes (nome, parentesco, cpf, data_nascimento,cpf_titular) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nome, $parentesco, $cpf, $data_nascimento, $cpf_titular);
    if ($stmt->execute()) {
        echo "	Cadastrado com sucesso !	";
    } else {
        echo "Erro ao cadastrar dependente: " . $conn->error;
    }
    $stmt->close();
}

$conn->close();
?>