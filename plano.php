<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['firstName'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $nome_mae = $_POST['mae'];
    $endereco = $_POST['Endereco'];
    $telefone = $_POST['tel'];
    $telefone2 = $_POST['tel2'];
    $data_nascimento = $_POST['dt_nasc'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $cep = $_POST['cep'];
    $uf = $_POST['state'];
    $sexo = $_POST['sexo'];
    $plano = $_POST['inlineRadioOptions'];

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO plano (nome, email, cpf, nome_mae, endereco, telefone, telefone2, data_nascimento, bairro, cidade, cep, uf, sexo, plano) 
            VALUES ('$nome', '$email', '$cpf', '$nome_mae', '$endereco', '$telefone', '$telefone2', '$data_nascimento', '$bairro', '$cidade', '$cep', '$uf', '$sexo', '$plano')";

    if ($conn->query($sql) === TRUE) {
        echo "Dados gravados com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>