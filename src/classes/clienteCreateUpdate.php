<?php
include_once 'cliente.php';

$cliente = new Cliente();
$cliente->setNome($_POST['nome']);
$cliente->setEmail($_POST['email']);
$cliente->setTelefone($_POST['telefone']);

if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = '../image/';
    $uploadFileName = basename($_FILES['foto']['name']);
    $uploadFile = $uploadDir . $uploadFileName;

    if (file_exists($uploadFile)) {
        $uploadFileName = uniqid() . '_' . $uploadFileName;
        $uploadFile = $uploadDir . $uploadFileName;
    }

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadFile)) {
        $fotoPath = 'image/' . $uploadFileName;
        $cliente->setFoto($fotoPath);
    } else {
        echo "Erro ao mover o arquivo para o servidor.";
        exit;
    }
}

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $cliente->setId($_POST['id']);
    if ($cliente->update()) {
        echo "Cliente atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar cliente.";
    }
} else {
    if ($cliente->create()) {
        echo "Cliente cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar cliente.";
    }
}
?>
