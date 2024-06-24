<?php
// conexao.php
$servername = "172.20.0.4";
$username = "root";
$password = "Ncm@647534";
$dbname = "candelaria";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}


?>