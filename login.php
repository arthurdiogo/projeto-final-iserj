<?php

session_start();

include('conexaolog.php');

$email = $_POST['email'];
$senha = $_POST['senha'];

if (empty($email) || empty($senha)) {
    header('Location: index.php');
    exit();
}

$email = mysqli_real_escape_string($conexao, $email);
$senha = mysqli_real_escape_string($conexao, $senha);

$query="SELECT id, nome FROM usuarios WHERE email = '{$email}' and senha = md5('{$senha}');";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);
$data = mysqli_fetch_row($result);

if ($row > 0) {
    $_SESSION['nome'] = $data[1];
    $_SESSION['cliente_id'] = $data[0];
    $_SESSION['email'] = $email;
    header('Location: home.php');
}else{
    header('Location: index.php?op=1');
}