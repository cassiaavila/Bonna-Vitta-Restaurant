<?php
    require_once('../class/ReservasDAO.php');



    $reservas = new Reservas();

	$reservas-> data = filter_var($_POST['date'],FILTER_SANITIZE_STRINGc) ;
    $reservas-> horario = filter_var($_POST['time'], FILTER_SANITIZE_STRING);
	$reservas-> Qtd_pessoas = filter_var($_POST['people'],FILTER_SANITIZE_STRING);
    $reservas-> telefone = filter_var($_POST['phone'],FILTER_SANITIZE_STRING);
    $reservas-> email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $reservas-> nome = filter_var($_POST['name'],FILTER_SANITIZE_STRING);

    $reservasdao = new ReservasDAO();
    $reservasdao->store($reservas);

    header('location: ../reservation.php');

?>
