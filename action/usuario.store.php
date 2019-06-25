<?php
    require_once('../class/UsuarioDAO.php');



    $usuario = new Usuario();

    $usuario-> nome = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $usuario-> telefone = filter_var($_POST['phone'],FILTER_SANITIZE_STRING);
    $usuario-> email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $usuario-> senha = filter_var($_POST['senha'],FILTER_SANITIZE_STRING);


    $usuariodao = new UsuarioDAO();
    $usuariodao->store($usuario);

    session_start();
    session_regenerate_id();

    $_SESSION['usuario']['nome'] = $nome;
    $_SESSION['usuario']['email'] = $email;
    $_SESSION['UsuarioLog'] = true;

    header('location: ../reservation.php');

?>
