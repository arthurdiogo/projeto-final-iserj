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
    $senhaNova = uniqid();

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
	$remetente='ISERJ';
    $mail->setFrom('web2iserj@gmail.com', $remetente);
    // Define o destinatário
	$destinatario= $emailRecuperacao;
    $mail->addAddress($destinatario);
    // Conteúdo da mensagem
    $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
    $mail->Subject = 'Recuperar senha';
    $mail->Body    = 'Sua nova senha é: '.$senhaNova;
    $mail->AltBody = 'Este é o corpo da mensagem para clientes de e-mail que não reconhecem HTML';
    // Enviar
    $mail->send();

    //Atualizar senha no banco
    $query= "UPDATE usuarios SET senha= md5('{$senhaNova}') WHERE email= '{$emailRecuperacao}'";
    $result = mysqli_query($conexao, $query);

}
catch (Exception $e)
{
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


header('Location: index.php?op=4');


?>