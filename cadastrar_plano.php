<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Conexão com o banco de dados
include 'conexao.php';
//include 'LAYOUTHTML.php';
//include 'LAYOUT2HTML.php';
include 'retorno_msg.php';

// Recebe os dados do formulário
$nome = isset($_POST['firstName']) ? $_POST['firstName'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
$mae = isset($_POST['mae']) ? $_POST['mae'] : '';
$endereco = isset($_POST['Endereco']) ? $_POST['Endereco'] : '';
$telefone = isset($_POST['tel']) ? $_POST['tel'] : '';
$telefone2 = isset($_POST['tel2']) ? $_POST['tel2'] : '';
$data_nascimento = isset($_POST['dt_nasc']) ? $_POST['dt_nasc'] : '';
$bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
$cep = isset($_POST['cep']) ? $_POST['cep'] : '';
$uf = isset($_POST['state']) ? $_POST['state'] : '';
$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
$plano = isset($_POST['inlineRadioOptions']) ? $_POST['inlineRadioOptions'] : '';

//echo "<script>console.log('". addslashes($cpf) ."');</script>";

// Verifica se o CPF já está cadastrado
$sql_check = "SELECT cpf FROM plano WHERE cpf = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("s", $cpf);
$stmt_check->execute();
$stmt_check->store_result();

  

// Verifica se o CPF já existe
if ($stmt_check->num_rows > 0) {
    setGlobalExcept();
    global $layout1_html;
    echo $layout1_html; //"Erro: CPF já cadastrado.";
} else {
    // Prepara a inserção
   
     $sql = "INSERT INTO plano (nome, email, cpf, nome_mae, endereco, telefone, telefone2, data_nascimento, bairro, cidade, cep, uf, sexo, plano)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    // Verifica se a preparação da consulta foi bem-sucedida
    if ($stmt === false) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    // Vincula os parâmetros
    $stmt->bind_param("ssssssssssssss", $nome, $email, $cpf, $mae, $endereco, $telefone, $telefone2, $data_nascimento, $bairro, $cidade, $cep, $uf, $sexo, $plano);

    // Executa a consulta e verifica se foi bem-sucedida
    if ($stmt->execute()) {
        setGlobalSucess();
        global $layout_html;
        echo  $layout_html; //"Novo registro criado com sucesso";
    } else {
        echo "Erro na execução da consulta: " . $stmt->error;
    }

    // Fecha a declaração
    $stmt->close();
}

// Fecha a declaração de verificação e a conexão
$stmt_check->close();
$conn->close();
?>