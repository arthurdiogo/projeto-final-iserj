<?php
$message = "";
if (isset($_GET['op']) and $_GET['op'] == 1) {
    $message = '<h6>O email informado já está cadastrado. Por favor informe um outro ou faça o login!</h6>';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">

    <!-- bootstrap css -->
    <!-- CSS only -->

    <title>Cadastro</title>
</head>
<body>
<div class="container" >
    <a class="links" id="paracadastro"></a>
    <a class="links" id="paralogin"></a>
     
    <div class="content">    
      <!--FORMULÁRIO DE LOGIN-->
      <div id="login">
          <img class="logo" src="img/logoprojetolanches.png" alt="">          
          <form method="post" action="cadastrar.php"> 
            <h1>Cadastro</h1>
            <p> 
              <label for="nome">Seu nome:</label>
              <input name="nome" type="text" placeholder="ex. Arthur Diogo Luna de Melo" required maxlength="80"/>
            </p>
            <p> 
              <label for="cep">Seu CEP:</label>
              <input name="cep" type="number" placeholder="ex. 27587306" required maxlength="8"/>
            </p>
            <p> 
              <label for="cidade">Sua cidade:</label>
              <input name="cidade" type="text" placeholder="ex. Rio de Janeiro" required maxlength="80"/>
            </p>
            <p> 
              <label for="bairro">Seu bairro:</label>
              <input name="bairro" type="text" placeholder="ex. São Cristóvão" required maxlength="80"/>
            </p>
            <p> 
              <label for="enderecoNumero">Seu endereço e número:</label>
              <input name="enderecoNumero" type="text" placeholder="ex. Rua Mariz e Barros 104" required maxlength="120"/>
            </p>
            <p> 
              <label for="complemento">Seu complemento:</label>
              <input name="complemento" type="text" placeholder="ex. APT 302" required maxlength="30"/>
            </p>
            <p> 
              <label for="telefone">Número de telefone:</label>
              <input name="telefone" type="number" placeholder="ex. 21937532053" required maxlength="11"/>
            </p>
            <p> 
              <label for="cpf">Seu CPF:</label>
              <input name="cpf" type="number" placeholder="ex. 10473516397" required maxlength="11"/>
            </p>
            <p> 
              <label for="email">Seu e-mail:</label>
              <?php echo "<br>".$message;?>
              <input name="email" type="email" placeholder="ex. meuemail@gmail.com" required maxlength="80"/>
            </p>
            <p> 
              <label for="senha">Sua senha:</label>
              <input name="senha" type="password" required maxlength="30"/>
            </p>
            <p> 
              <input type="submit" value="Cadastrar"/> 
            </p>
            
            <p class="link">
            </p>
        </form>
      </div>
    </div>
  </div>
</body>
</html>