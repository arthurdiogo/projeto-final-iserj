<?php

session_start();

if (empty($_SESSION['nome'])) {
    header('Location: index.php');
}

include('conexaolog.php');

$valorTotal = $_GET['valorTotal'];

$query = "UPDATE pedidos SET status = 'fechado', valor_total = $valorTotal WHERE id= $_SESSION[pedido_id]";
$result = mysqli_query($conexao, $query);

$_SESSION['quantidade'] = 0;


//apagar a sessão do pedido finalizado
$query= "DELETE FROM itens WHERE pedido_id=$_SESSION[pedido_id]";
$result = mysqli_query($conexao, $query);

$pedido_id = $_SESSION['pedido_id'];

unset($_SESSION['pedido_id']);

// Importar as classes 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

// Carregar o autoloader do composer
//require 'vendor/autoload.php';

// Instância da classe
$mail = new PHPMailer(true);
try
{

    // Configurações do servidor
    $mail->isSMTP();        //Devine o uso de SMTP no envio
    $mail->SMTPAuth = true; //Habilita a autenticação SMTP
    $mail->Username   = 'web2iserj@gmail.com';
    $mail->Password   = 'faetec2011';
    // Criptografia do envio SSL também é aceito
    $mail->SMTPSecure = 'tls';
    // Informações específicadas pelo Google
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    // Define o remetente
	$remetente='Projeto Lanches';
    $mail->setFrom('web2iserj@gmail.com', $remetente);
    // Define o destinatário
	$destinatario= $_SESSION['email'];
    $mail->addAddress($destinatario);
    // Conteúdo da mensagem
    $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
    $mail->Subject = 'Projeto Lanches - Pedido Finalizado';
    $mail->Body    = 'O seu pedido de número <b>'.$pedido_id.'</b> foi finalizado. Informe esse número para o atendente e efetue o pagamento!
    <br> Whatsapp: (21)99344-2846
    <br> Obrigado pela preferência! :)';
    $mail->AltBody = 'Este é o corpo da mensagem para clientes de e-mail que não reconhecem HTML';
    // Enviar
    $mail->send();

}
catch (Exception $e)
{
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

header("Location:pedidofinalizado.php?pedido_id=$pedido_id")
?>