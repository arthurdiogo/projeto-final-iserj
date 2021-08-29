<?php
$nome= $_POST['nome'] ?? 'erro campo nome';
$enderecoenum= $_POST['endereco'] ?? 'erro campo endereco';
$complemento= $_POST['complemento'] ?? 'erro campo complemento';
$numerotel= $_POST['numero'] ?? 'erro campo numero';
$cpf= $_POST['cpf'] ?? 'erro campo cpf';
$email= $_POST['email'] ?? 'erro campo email';
$senha= $_POST['senha'] ?? 'erro campo senha';

    echo "Nome: ".$nome."<br>";
    echo "Endereço e número: ".$enderecoenum."<br>";
    echo "Complemento: ".$complemento."<br>";
    echo "Número telefone: ".$numerotel."<br>";
    echo "CPF: ".$cpf."<br>";
    echo "Email: ".$email."<br>";
    echo "Senha: ".$senha."<br>";
?>