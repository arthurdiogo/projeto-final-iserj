<?php

session_start();

include('conexaolog.php');

$nome= $_POST['nome'];
$endereco= $_POST['endereco'];
$complemento= $_POST['complemento'];
$telefone= $_POST['telefone'];
$cpf= $_POST['cpf'];
$email= $_POST['email'];
$senha= $_POST['senha'];

$query="SELECT email FROM usuarios WHERE email = '{$email}'";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);
if ($row == 1) {
    header('Location: cadastro.php?op=1');
    echo $row;exit();
}

$query = "INSERT INTO usuarios (nome, endereco, complemento, telefone, cpf, email, senha) 
            VALUES ('{$nome}', '{$endereco}', '{$complemento}', '{$telefone}', '{$cpf}', '{$email}', md5('{$senha}'));";

$result = mysqli_query($conexao, $query);

$_SESSION['nome'] = $nome;

header('Location: home.php');