<?php
include_once 'cliente.php';


$cliente = new Cliente();
$cliente->setId($_GET['id']);
$stmt = $cliente->getForID();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode($row);
?>
