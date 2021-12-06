<?php

session_start();

include('conexaolog.php');

$nome=mysqli_real_escape_string($conexao, $_POST['nome']);
$cep=mysqli_real_escape_string($conexao, $_POST['cep']);
$cidade=mysqli_real_escape_string($conexao, $_POST['cidade']);
$bairro=mysqli_real_escape_string($conexao, $_POST['bairro']);
$enderecoNumero= mysqli_real_escape_string($conexao, $_POST['enderecoNumero']);
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

$query = "INSERT INTO usuarios (nome, cep, cidade, bairro, endereco_numero, complemento, telefone, cpf, email, senha, tipo) 
            VALUES ('{$nome}', '{$cep}', '{$cidade}', '{$bairro}', '{$enderecoNumero}', '{$complemento}', '{$telefone}', '{$cpf}', '{$email}', md5('{$senha}'), 'cliente');";


$result = mysqli_query($conexao, $query);


$_SESSION['nome'] = $nome;
$_SESSION['email'] = $email;
$_SESSION['cliente_id']= mysqli_insert_id($conexao);

header('Location: index.php');