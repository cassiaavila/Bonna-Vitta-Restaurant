

<?php
require('class/ReservasDAO.php');
$reservasdao = new ReservasDAO();
$reservas = $reservasdao->findAll();
?>
<link rel="stylesheet" type="text/css" href="css/viewtabela.css">

<table>

    <colgroup span="3"></colgroup>

    <tr>
        <th>Nome Cliente</th>
        <th>Email</th>
        <th>Horario</th>
        <th> Qtd de Pessoas</th>
        <th> Data</th>
        <th> Telefone</th>
    </tr>
    <?php foreach ($reservas  as $dados) { ?>
    <tr>
        <th><?php echo $dados->nome ?></th>
        <th><?php echo $dados->email ?></th>
        <th><?php echo $dados->horario ?></th>
        <th><?php echo $dados->Qtd_pessoas ?></th>
        <th><?php echo $dados->data ?></th>
        <th><?php echo $dados->telefone ?></th>
    </tr>
    <?php }?>
</table>
