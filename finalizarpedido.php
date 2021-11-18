<?php

session_start();

if (empty($_SESSION['nome'])) {
    header('Location: index.php');
}

include('conexaolog.php');

$query = "UPDATE pedidos SET status = 'fechado' WHERE id= $_SESSION[pedido_id]";
$result = mysqli_query($conexao, $query);

$_SESSION['quantidade'] = 0;

$query= "DELETE FROM itens WHERE pedido_id=$_SESSION[pedido_id]";
$result = mysqli_query($conexao, $query);

header('Location:pedidofinalizado.php')
?>