<?php
include_once '../dataBase/dataBase.php';

class Cliente extends Database {
    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $foto;

    public function __construct() {
        $this->conn = $this->getConnection();
    }


    #get e set do id
    public function setId($id) {
        $this->id = $id; 
    }
    public function getId() {
        return $this->id; 
    }

    #get e set do Nome
    public function setNome($nome) {
        $this->nome = $nome; 
    }
    public function getNome() {
        return $this->nome; 
    }

    #get e set do Email
    public function setEmail($email) {
        $this->email = $email; 
    }
    public function getEmail() {
        return $this->email; 
    }

    #get e set do Telefone
    public function setTelefone($telefone) {
        $this->telefone = $telefone; 
    }
    public function getTelefone() {
        return $this->telefone; 
    }

    #get e set do Foto
    public function setFoto($foto) {
        $this->foto = $foto; 
    }
    public function getFoto() {
        return $this->foto; 
    }


    #Função para cadatras um cliente
    public function create() {
        $query = "INSERT INTO clientes SET nome=:nome, email=:email, telefone=:telefone, foto=:foto";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":foto", $this->foto);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    #Função para pegar os cliente do banco de dados
    public function read() {
        $query = "SELECT * FROM clientes";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    #Função para pegar os cliente apartir do id
    public function getForID() {
        $query = "SELECT * FROM clientes WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }
    

    #Função para atualizar um cadastro
    public function update() {
        $query = "UPDATE clientes SET nome=:nome, email=:email, telefone=:telefone, foto=:foto WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":foto", $this->foto);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    #Função para deletar um cadastro
    public function delete() {
        
        $query = "DELETE FROM clientes WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
