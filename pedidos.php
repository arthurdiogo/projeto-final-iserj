<?php

session_start();

if (empty($_SESSION['nome'])) {
    header('Location: index.php');
}

include('conexaolog.php');

$quantidade = $_POST['quantidade'];
$produto_id = $_POST['produto_id'];
$valor = $_POST['valor'] * $quantidade;

$query = "SELECT quantidade FROM produtos WHERE id = $produto_id";
$result = mysqli_query($conexao, $query);
$data = mysqli_fetch_row($result);

if ($quantidade > $data[0]) {
    header('Location: detalhes.php?id='.$produto_id."&op=1");
    exit();
}

if (empty($quantidade)) {
    header('Location: detalhes.php?id='.$produto_id);
    exit();
}

$quantidade = mysqli_real_escape_string($conexao, $quantidade);
$produto_id = mysqli_real_escape_string($conexao, $produto_id);

$today = date("Y-m-d");

if (empty($_SESSION['pedido_id'])) {
    $query= "INSERT INTO pedidos (cliente_id, status, data) VALUES ($_SESSION[cliente_id], 'aberto', '{$today}');";
    
    $result = mysqli_query($conexao, $query);
    
    $_SESSION['pedido_id']= mysqli_insert_id($conexao);
}

$query= "INSERT INTO itens (produto_id, pedido_id, quantidade, valor) VALUES ($produto_id, $_SESSION[pedido_id], $quantidade, $valor);";
$result = mysqli_query($conexao, $query);

$quantidadeTotal = $data[0];
$novaQuantidade = $quantidadeTotal - $quantidade;

$query = "UPDATE produtos SET quantidade = $novaQuantidade WHERE id = $produto_id";
$result = mysqli_query($conexao, $query);

$query = "SELECT id FROM `itens` WHERE pedido_id= $_SESSION[pedido_id]";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

$_SESSION['quantidade'] = $row;
header('Location: home.php');