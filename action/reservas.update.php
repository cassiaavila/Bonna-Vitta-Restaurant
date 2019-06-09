<?php
    require_once('../class/$ReservasDAO.php');

    $_POST['data'] = str_replace("T", " ", $_POST['data']);

    $reservas = new Reservas();
    $reservas->id = $_POST['id'];
  	$reservas->data = $_POST['data'];
	$reservas->Qtd_pessoas = $_POST['Qtd_pessoas'];
    $reservas->email = $_POST['email'];	
	$reservas->nome_id = $_POST['nome'];

    $reservasdao = new ReservasDAO();
    $reservasdao->update($reservas);

    header('location: ../index.php');
?>
