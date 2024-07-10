<link rel="stylesheet" type="text/css" href="css/tabelaCliente.css">

<?php
include_once 'cliente.php';


$cliente = new Cliente();
$stmt = $cliente->read();
$num = $stmt->rowCount();



if ($num > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        ?>
        <div class="tab">
            <div class="tabCliente">
                <div class="divImg">
                    <img <?php echo "src='{$foto}'" ?> alt="Foto de Perfil" class="img">
                </div>
                
                <div class="texto">
                    <p><strong>Nome:</strong> <?php echo $nome; ?></p>
                    <p><strong>Email:</strong> <?php echo $email?></p>
                    <p><strong>Telefone:</strong> <?php echo $telefone ?></p>
                </div>
            </div>
            <div class="Button">
                <?php echo "<button class='editButton' data-id='{$id}'>Editar</button>"; ?>
            </div>
        </div>
        <?php 
    }
} else {
    echo "<p>Nenhum cliente encontrado.</p>";
}
?>
