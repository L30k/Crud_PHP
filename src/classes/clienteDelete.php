<?php
include_once 'cliente.php';

$cliente = new Cliente();
$cliente->setId($_POST['id']);

if ($cliente->delete()) {
    echo "Cliente deletado com sucesso!";
} else {
    echo "Erro ao deletar cliente.";
}
?>
