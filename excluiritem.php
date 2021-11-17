<?php

session_start();

if (empty($_SESSION['nome'])) {
    header('Location: index.php');
}

include('conexaolog.php');

$item_id = $_GET['item_id'];

//excluir todos os itens
if ($_GET['op']== 1) {
    $query= "DELETE FROM itens WHERE pedido_id=$_SESSION[pedido_id]";
    
    $result = mysqli_query($conexao, $query);

    $_SESSION['quantidade'] = 0;

    header('Location:fecharpedidos.php');
}

//excluir um item
$query= "DELETE FROM itens WHERE id=$item_id";
    
$result = mysqli_query($conexao, $query);

$query="SELECT id FROM itens WHERE pedido_id= $_SESSION[pedido_id]";

$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

$_SESSION['quantidade'] = $row;

header('Location:fecharpedidos.php');