<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/cliente.js"></script>
    <link rel="stylesheet" type="text/css" href="css/index.css">

    <style>
        .custom-file-input {
            display: none;
        }
        
        .custom-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
        }
        
        .custom-button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <h1>Cadastro de Clientes</h1>
    <form id="clienteForm">
        <input type="hidden" id="id" name="id">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone"><br><br>

        <div id="fotoPerfil">
            <p id="textoPerfil">Foto de Perfil:</p>
            <label for="foto" id="fotoLabel" class="custom-button">Selecionar Foto</label>
            <input type="file" id="foto" name="foto" accept="image/*" class="custom-file-input" onchange="updatePhotoLabel(this)">
        </div>

        <button type="submit">Salvar</button>
        <button type="button" id="deleteButton">Deletar</button>
    </form>
    <br>
    <h2>Lista de Clientes</h2>
    <div id="clienteList"></div>

    <script>
        function updatePhotoLabel(input) {
            var fileName = input.files[0].name;
            var photoLabel = document.getElementById('fotoLabel');
            photoLabel.textContent = fileName;
        }
    </script>
</body>
</html>