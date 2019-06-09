<?php
    require_once('../class/ReservasDAO.php');

    $id = (int) $_GET['id'];

    $reservasdao = new ReservasDAO();
    $reservasdao->disable($id);

    header('location: ../index.php');
?>
