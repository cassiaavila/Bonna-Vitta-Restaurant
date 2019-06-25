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
                "INSERT INTO reservas (  data, horario, Qtd_pessoas)
                    VALUES (:data, :horario, :Qtd_pessoas )");


            $query->bindValue(':data', $reservas->data);
            $query->bindValue(':horario', $reservas->horario);
            $query->bindValue(':Qtd_pessoas', $reservas->Qtd_pessoas);

            $query->execute();

        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function find($id)
    {
        try {
            $query = $this->conn->prepare("SELECT * FROM reservas WHERE id = :id");
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
            $query = $this->conn->prepare("DELETE FROM reservas WHERE id = :id");
            $query->bindValue(":id", $id);
            $query->execute();
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function disable($id)
    {
        try {
            $query = $this->conn->prepare("UPDATE reservas SET status = '0' 
            WHERE id = :id");
            $query->bindValue(":id", $id);
            $query->execute();
        } catch(Exception $e) {
            die($e->getMessage());
        }           
    }        
}
?>
