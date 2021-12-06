<?php

session_start();

if (empty($_SESSION['nome'])) {
    header('Location: login.php');
}

include('conexaolog.php');

$valorTotal = $_GET['valorTotal'];

$query = "UPDATE pedidos SET status = 'fechado', valor_total = $valorTotal WHERE id= $_SESSION[pedido_id]";
$result = mysqli_query($conexao, $query);

$_SESSION['quantidade'] = 0;

$pedido_id = $_SESSION['pedido_id'];

unset($_SESSION['pedido_id']);

try
{

    $mensagem.= "O seu pedido de número <b>$pedido_id</b> foi finalizado. Informe esse número para o atendente e efetue o pagamento!
    <br> Whatsapp: (21)99344-2846
    <br> Obrigado pela preferência! :)";

    $headers = "MIME-Version: 1.1\n";
    $headers .= "Content-type: text/html; charset=utf-8\n";
    $headers .= "From: Pedido Finalizado - Projeto Lanches <contato@projetolanches.com.br>"."\n"; // remetente
    $headers .= "Bcc: arthurdiogo1995@gmail.com\n"; //Cc
    $headers .= "Reply-To: contato@projetolanches.com.br \n"; //Reply-To
    $headers .= "Return-Path: Projeto Lanches <contato@projetolanches.com.br>"."\n"; // return-path

    $envio = mail($_SESSION['email'], "Mensagem Enviada pelo Site", $mensagem, $headers);

}
catch (Exception $e)
{
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

header("Location:pedidofinalizado.php?pedido_id=$pedido_id");
?>