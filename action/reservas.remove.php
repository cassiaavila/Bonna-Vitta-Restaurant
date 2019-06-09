<?php
    require_once('../class/ReservasDAO.php');

    $id = (int) $_GET['id'];

    $reservasdao = new ReservasDAO();
    $reservasdao->remove($id);

    header('location: ../index.php');
?>