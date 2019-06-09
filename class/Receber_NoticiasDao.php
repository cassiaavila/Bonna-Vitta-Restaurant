<?php

require_once('Database.php');
require_once('Receber_Noticias.php');

class Receber_NoticiasDAO {
    
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function find($id)
    {
        try {        
            $query = $this->conn->prepare(
                "SELECT Receber_Noticias.id, Receber_Noticias.email,
                , Receber_Noticias.ativo
                FROM Receber_Noticias JOIN email 
                ON email.id = Receber_Noticias.id
                WHERE Receber_Noticias.id = :id AND Receber_Noticias.status_id = 1");

            $query->bindValue(':id', $id);
            $query->execute();

            return $Receber_Noticias = $query->fetch(PDO::FETCH_OBJ);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function findAll()
    {
        try {        
            $query = $this->conn->prepare(
                "SELECT Receber_Noticias.id, Receber_Noticias.email, Receber_Noticias.ativos,
                Receber_Noticias.inativos
                FROM Receber_Noticias JOIN email 
                ON email.id = Receber_Noticias.email.id
                WHERE Receber_Noticias.ativo = 1");

            $query->execute();
            $Receber_Noticias = [];

            while($row = $query->fetch(PDO::FETCH_OBJ)) {
                $Receber_Noticias[] = $row;
            }
            return $Receber_Noticias;
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function store(Receber_Noticias $Receber_Noticias) {
        try {
            $query = $this->conn->prepare(
                "INSERT INTO Receber_Noticias (id, email, ativos, inativos)
                    VALUES (:id, :email, 1)");

            $query->bindValue(':id', $Receber_Noticias->id);
            $query->bindValue(':email', $Receber_Noticias->email);
            $query->bindValue(':ativos', $Receber_Noticias->ativos);

            $query->execute();
            
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function remove($id) {
        try {
            $query = $this->conn->prepare(
                "DELETE FROM Receber_Noticias WHERE id = :id");

            $query->bindValue(':id', $id); 
            $query->execute();

        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function disable($id) {
        try {
            $query = $this->conn->prepare(
                "UPDATE Receber_Noticias SET status_id = inativos
                WHERE id = :id");

            $query->bindValue(':id', $id); 
            $query->execute();

        } catch(Exception $e) {
            die($e->getMessage());
        }
    } 
    
    public function update(Receber_Noticias $receber_Noticias, $Receber_Noticias) {//dúvidas
        try {
            $query = $this->conn->prepare(
                "UPDATE Receber_Noticias SET 
                    id = :id,
                    email = :email,
                    ativo = :1
                WHERE id = :id");

            $query->bindValue(':id',    $Receber_Noticias->id);
            $query->bindValue(':email', $Receber_Noticias->email);
            $query->bindValue(':ativo', $Receber_Noticias->ativos);
            $query->execute();

        } catch(Exception $e) {
            die($e->getMessage());
        }
    }     
}
?>
