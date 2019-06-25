<?php
require_once('Database.php');
require_once('Usuario.php');
class UsuarioDAO {
    
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }
    public function login($email, $senha): string {
        $usuario = $this->findByEmail($email);
        if(password_verify($senha, $usuario->senha)) {
            return $usuario->nome_completo;
        } else {
            throw new Exception();
        }
    }

    public function findByEmail($email)
    {
        try {
            $query = $this->conn->prepare("SELECT * FROM Usuario WHERE email = :email");
            $query->bindValue(':email', $email);

            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ);

        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function findAll()
    {
        try {
            $query = $this->conn->prepare("SELECT * FROM usuario");
            $query->execute();
            $usuario = [];

            while($row = $query->fetch(PDO::FETCH_OBJ)) {
                $usuario[] = $row;
            }
            return $usuario;
        } catch(Exception $e) {
            die($e->getMessage());
        }           
    }
    public function store(Usuario $usuario) {
        try {
            $query = $this->conn->prepare(
                "INSERT INTO usuario (   nome, telefone, email, senha)
                    VALUES (  :nome, :telefone,:email, :senha )");


            $query->bindValue(':nome', $usuario->nome);
            $query->bindValue(':telefone', $usuario->telefone);
            $query->bindValue(':email', $usuario->email);
            $query->bindValue(':senha', password_hash($usuario->senha, PASSWORD_DEFAULT));

            $query->execute();

        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function find($id)
    {
        try {
            $query = $this->conn->prepare("SELECT * FROM Usuario WHERE id = :id");
            $query->bindValue(":id", $id);
            $query->execute();
            
            return $query->fetch(PDO::FETCH_OBJ);

        } catch(Exception $e) {
            die($e->getMessage());
        }           
    }    

    public function remove($id)
    {
        try {
            $query = $this->conn->prepare("DELETE FROM Usuario WHERE id = :id");
            $query->bindValue(":id", $id);
            $query->execute();
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function disable($id)
    {
        try {
            $query = $this->conn->prepare("UPDATE Usuario SET status = '0' 
            WHERE id = :id");
            $query->bindValue(":id", $id);
            $query->execute();
        } catch(Exception $e) {
            die($e->getMessage());
        }           
    }        
}
?>
