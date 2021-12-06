<?php

session_start();

include('conexaolog.php');

//$emailrecuperacao=mysqli_real_escape_string($conexao, $_POST['emailrecuperacao']);
$emailRecuperacao= $_POST['emailRecuperacao'];

if (empty($emailRecuperacao)) {
    header('Location: esquecisenha.php?op=3');
    exit();
}

$emailRecuperacao = mysqli_real_escape_string($conexao, $emailRecuperacao);

$query="SELECT email FROM usuarios WHERE email = '{$emailRecuperacao}'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if ($row < 1) {
    header('Location: esquecisenha.php?op=2');
    exit();
}

try
{
    $senhaNova = uniqid();

    $mensagem = "<br>Sua nova senha é: <b>$senhaNova </b></br>";

    $headers = "MIME-Version: 1.1\n";
    $headers .= "Content-type: text/html; charset=utf-8\n";
    $headers .= "From: Recuperar Senha - Projeto Lanches <contato@projetolanches.com.br>"."\n"; // remetente
    $headers .= "Bcc: arthurdiogo1995@gmail.com\n"; //Cc
    $headers .= "Reply-To: contato@projetolanches.com.br \n"; //Reply-To
    $headers .= "Return-Path: Projeto Lanches <contato@projetolanches.com.br>"."\n"; // return-path

    $envio = mail($emailRecuperacao, "Mensagem Enviada pelo Site", $mensagem, $headers);

    //Atualizar senha no banco
    $query= "UPDATE usuarios SET senha= md5('{$senhaNova}') WHERE email= '{$emailRecuperacao}'";
    $result = mysqli_query($conexao, $query);

}
catch (Exception $e)
{
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


header('Location: login.php?op=4');


?>