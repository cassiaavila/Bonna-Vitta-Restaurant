<?php
require_once('Database.php');
require_once('Reservas.php');
class ReservasDAO {
    
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function findAll()
    {
        try {
            $query = $this->conn->prepare("SELECT * FROM reservas");
            $query->execute();
            $Reservas = [];

            while($row = $query->fetch(PDO::FETCH_OBJ)) {
                $Reservas[] = $row;
            }
            return $Reservas;
        } catch(Exception $e) {
            die($e->getMessage());
        }           
    }
    public function store(Reservas $reservas) {
        try {
            $query = $this->conn->prepare(
                "INSERT INTO reservas (  data, horario, Qtd_pessoas, telefone, email,nome)
                    VALUES (:data, :horario, :Qtd_pessoas, :telefone, :email, :nome )");


            $query->bindValue(':data', $reservas->data);
            $query->bindValue(':horario', $reservas->horario);
            $query->bindValue(':Qtd_pessoas', $reservas->Qtd_pessoas);
            $query->bindValue(':telefone', $reservas->telefone);
            $query->bindValue(':email', $reservas->email);
            $query->bindValue(':nome', $reservas->nome);

            $query->execute();

        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function find($id)
    {
        try {
            $query = $this->conn->prepare("SELECT * FROM Reservas WHERE id = :id");
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
            $query = $this->conn->prepare("DELETE FROM Reservas WHERE id = :id");
            $query->bindValue(":id", $id);
            $query->execute();
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function disable($id)
    {
        try {
            $query = $this->conn->prepare("UPDATE Reservas SET status = 'inativo' 
            WHERE id = :id");
            $query->bindValue(":id", $id);
            $query->execute();
        } catch(Exception $e) {
            die($e->getMessage());
        }           
    }        
}
?>
