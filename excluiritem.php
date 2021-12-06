<?php

session_start();

if (empty($_SESSION['nome'])) {
    header('Location: login.php');
}

include('conexaolog.php');

$item_id = $_GET['item_id'];

//devolver quantidade do item cancelado do pedido
$query = "SELECT p.id, p.quantidade, i.quantidade FROM itens i
INNER JOIN produtos p ON i.produto_id = p.id WHERE i.id = $item_id";
$result = mysqli_query($conexao, $query);
$data = mysqli_fetch_row($result);

$quantidadeTotal = $data[1];
$novaQuantidade = $quantidadeTotal + $data[2];

//excluir um item
$query= "DELETE FROM itens WHERE id=$item_id";
$result = mysqli_query($conexao, $query);

$query = "UPDATE produtos SET quantidade = $novaQuantidade WHERE id = $data[0]";
$result = mysqli_query($conexao, $query);

$query="SELECT id FROM itens WHERE pedido_id= $_SESSION[pedido_id]";

$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

$_SESSION['quantidade'] = $row;

header('Location:fecharpedidos.php');