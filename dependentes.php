<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$cpf_titular = $_GET['cpf_titular'];

include 'conexao.php';

$sql = "SELECT * FROM dependentes WHERE cpf_titular = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $cpf_titular);
$stmt->execute();
$result = $stmt->get_result();

$dependentes = array();
while ($row = $result->fetch_assoc()) {
    $dependentes[] = $row;
}


echo json_encode($dependentes);

$conn->close();
?>