<?php

session_start();

include('conexaolog.php');

$nome=mysqli_real_escape_string($conexao, $_POST['nome']);
$endereco= mysqli_real_escape_string($conexao, $_POST['endereco']);
$complemento= mysqli_real_escape_string($conexao, $_POST['complemento']);
$telefone= mysqli_real_escape_string($conexao, $_POST['telefone']);
$cpf= mysqli_real_escape_string($conexao, $_POST['cpf']);
$email= mysqli_real_escape_string($conexao, $_POST['email']);
$senha= mysqli_real_escape_string($conexao, $_POST['senha']);

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