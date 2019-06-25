<?php
require_once('../class/UsuarioDAO.php');

$email = $_POST['email'];
$senha = $_POST['senha'];

$usuariodao = new UsuarioDAO();

try {
    $nome = $usuariodao->login($email, $senha);
    session_start();
    session_regenerate_id();

    $_SESSION['usuario']['nome'] = $nome;
    $_SESSION['usuario']['email'] = $email;
    $_SESSION['UsuarioLog'] = true;
    header('location: ../reservation.php');
} catch(Exception $e) {
    header('location: ../loginreservation.php?error');
}
?>
